// Global products array to hold loaded data
let products = [];

let currentPage = 1;
let productsPerPage = 9;
let categoryFilter = new URLSearchParams(window.location.search).get("category") || "";

const productGrid = document.getElementById("product-grid");
const pagination = document.getElementById("pagination");
const searchInput = document.getElementById("searchInput");
const priceFilter = document.getElementById("priceFilter");

const buyModalEl = document.getElementById("buyModal");
const buyModal = new bootstrap.Modal(buyModalEl);
const modalProductName = document.getElementById("modalProductName");
const modalProductPrice = document.getElementById("modalProductPrice");
const modalProductImage = document.getElementById("modalProductImage");
const modalProductDescription = document.getElementById("modalProductDescription");
const confirmBuyBtn = document.getElementById("confirmBuyBtn");
const emailInput = document.getElementById("emailInput");
const userIdInput = document.getElementById("userIdInput");
const smmInput = document.getElementById("smmInput");
const userIdContainer = document.getElementById("userIdContainer");
const smmContainer = document.getElementById("smmContainer");
const variantContainer = document.getElementById("variantContainer");
const variantSelect = document.getElementById("variantSelect");
const buyForm = document.getElementById("buyForm");
const featureList = document.getElementById("modalProductFeatures");

let selectedProduct = null;

// BTC address pool (10 addresses)
const bitcoinAddresses = [
  "1A1zP1eP5QGefi2DMPTfTL5SLmv7DivfNa",
  "1BoatSLRHtKNngkdXEeobR76b53LETtpyT",
  "1Q2TWHE3GMdB6BZKafqwxXtWAWgFt5Jvm3",
  "12c6DSiU4Rq3P4ZxziKxzrL5LmDh8HV2CZ",
  "1dice8EMZmqKvrGE4Qc9bUFf9PX3xaYDp",
  "1Ez69SnzzmePmZX3WpEzMKTrcBF2gpNQ55",
  "1HB5XMLmzFVj8ALj6mfBsbifRoD4miY36v",
  "1JHGkY1LTTkYK4sV35wYdU3EArpNsHyzpj",
  "1L8meV6TxWdtGte5J6f9x2Vg9bX3J3axer",
  "1LuckyR1fFHEsXYyx5QK4UFzv3PEAepPMK"
];

function priceFilterMatch(price, range) {
  switch (range) {
    case "under20": return price < 20;
    case "20to50": return price >= 20 && price <= 50;
    case "above50": return price > 50;
    default: return true;
  }
}

const showCount = document.getElementById("showCount");
const sortBy = document.getElementById("sortBy");

showCount?.addEventListener("change", () => {
  productsPerPage = parseInt(showCount.value);
  currentPage = 1;
  renderProducts();
});

sortBy?.addEventListener("change", () => {
  currentPage = 1;
  renderProducts();
});

function getPrice(product) {
  return product.variants && product.variants.length > 0 ? product.variants[0].price : product.price;
}

function sortProducts(list) {
  const sort = sortBy?.value || "";
  switch (sort) {
    case "priceAsc": return list.sort((a, b) => getPrice(a) - getPrice(b));
    case "priceDesc": return list.sort((a, b) => getPrice(b) - getPrice(a));
    case "newest": return list.sort((a, b) => b.id - a.id);
    default: return list;
  }
}

function renderProducts() {
  const searchTerm = searchInput?.value?.toLowerCase() || "";
  const priceRange = priceFilter?.value || "";

  let filtered = products.filter(p =>
    p.name.toLowerCase().includes(searchTerm) &&
    priceFilterMatch(getPrice(p), priceRange) &&
    (categoryFilter === "" || p.category === categoryFilter)
  );

  filtered = sortProducts(filtered);
  const totalPages = Math.ceil(filtered.length / productsPerPage);
  if (currentPage > totalPages) currentPage = totalPages || 1;

  const start = (currentPage - 1) * productsPerPage;
  const paged = filtered.slice(start, start + productsPerPage);

  productGrid.innerHTML = filtered.length === 0
    ? `<div class="no-products-full text-center">No Products Found</div>`
    : paged.map(p => `
        <div class="col-6 col-md-4 col-lg-4">
          <div class="product-card">
            <img src="${p.img}" alt="${p.name}" />
            <h5>${p.name}</h5>
            <p>$${getPrice(p).toFixed(2)}</p>
            <button class="btn btn-primary buy-btn" data-id="${p.id}">Buy</button>
          </div>
        </div>
      `).join("");

  renderPagination(totalPages);
  attachBuyButtons();
}

function renderPagination(totalPages) {
  pagination.innerHTML = "";
  for (let i = 1; i <= totalPages; i++) {
    const li = document.createElement("li");
    li.className = "page-item" + (i === currentPage ? " active" : "");
    li.innerHTML = `<a class="page-link" href="#">${i}</a>`;
    li.addEventListener("click", e => {
      e.preventDefault();
      currentPage = i;
      renderProducts();
      window.scrollTo({ top: 0, behavior: "smooth" });
    });
    pagination.appendChild(li);
  }
}

function attachBuyButtons() {
  document.querySelectorAll(".buy-btn").forEach(btn => {
    btn.onclick = () => {
      const id = parseInt(btn.dataset.id);
      selectedProduct = products.find(p => p.id === id);
      if (!selectedProduct) return;

      document.getElementById("buyModalLabel").textContent = selectedProduct.name;

      const firstVariantLabel = selectedProduct.variants?.[0]?.label || "";
      modalProductName.textContent = firstVariantLabel ? `${selectedProduct.name} – ${firstVariantLabel}` : selectedProduct.name;
      modalProductDescription.textContent = selectedProduct.description || "";
      modalProductImage.src = selectedProduct.img;
      emailInput.value = userIdInput.value = smmInput.value = "";

      if (selectedProduct.placeholder) {
        userIdContainer.classList.remove("d-none");
        userIdInput.placeholder = selectedProduct.placeholder;
      } else {
        userIdContainer.classList.add("d-none");
      }

      if (selectedProduct.smmRequired) {
        smmContainer.classList.remove("d-none");
      } else {
        smmContainer.classList.add("d-none");
      }

      if (selectedProduct.variants?.length > 0) {
        variantContainer.classList.remove("d-none");
        variantSelect.innerHTML = selectedProduct.variants.map((v, i) =>
          `<option value="${i}">${v.label} - $${v.price.toFixed(2)}</option>`
        ).join("");
        modalProductPrice.textContent = `$${selectedProduct.variants[0].price.toFixed(2)}`;
      } else {
        variantContainer.classList.add("d-none");
        modalProductPrice.textContent = `$${selectedProduct.price.toFixed(2)}`;
      }

      featureList.innerHTML = (selectedProduct.features || []).map(f => `<li>${f}</li>`).join("");

      document.getElementById("btcPaymentBox")?.remove();
      buyForm?.classList.remove("d-none");

      buyModal.show();
    };
  });
}

variantSelect.addEventListener("change", () => {
  if (!selectedProduct?.variants) return;
  const index = parseInt(variantSelect.value || 0);
  const variant = selectedProduct.variants[index];
  modalProductPrice.textContent = `$${variant.price.toFixed(2)}`;
  document.getElementById("buyModalLabel").textContent = `${selectedProduct.name} – ${variant.label}`;
  modalProductName.textContent = `${selectedProduct.name} – ${variant.label}`;
});

async function fetchBTCAmount(usd) {
  try {
    const res = await fetch("https://api.coingecko.com/api/v3/simple/price?ids=bitcoin&vs_currencies=usd");
    const json = await res.json();
    const btcPrice = json.bitcoin.usd;
    return (usd / btcPrice).toFixed(8);
  } catch (e) {
    console.error("Failed to fetch BTC price", e);
    return "-";
  }
}

confirmBuyBtn.onclick = async () => {
  if (!selectedProduct) return alert("No product selected.");

  const email = emailInput.value.trim();
  const userId = userIdInput?.value.trim() || "";
  const smm = smmInput?.value.trim() || "";

  if (!email) return alert("Please enter your email.");
  if (!userIdContainer.classList.contains("d-none") && !userId)
    return alert("Please enter your User ID.");
  if (!smmContainer.classList.contains("d-none") && !smm)
    return alert("Please enter SMM details.");

  let price = selectedProduct.price;
  let variantLabel = "";

  if (selectedProduct.variants?.length > 0) {
    const index = parseInt(variantSelect.value || 0);
    const variant = selectedProduct.variants[index];
    price = variant.price;
    variantLabel = variant.label;
  }

  confirmBuyBtn.disabled = true;
  confirmBuyBtn.textContent = "Processing...";

  const orderData = {
    email,
    product_name: selectedProduct.name,
    price,
    variant: variantLabel,
    placeholder: userId || smm,
    user_id: userId,
    smm
  };

  try {
    const res = await fetch("admin/create-order.php", {
      method: "POST",
      headers: { "Content-Type": "application/x-www-form-urlencoded" },
      body: new URLSearchParams(orderData)
    });

    const text = await res.text();
    const data = JSON.parse(text);

    if (data.success) {
      variantContainer.classList.add("d-none");
      userIdContainer.classList.add("d-none");
      smmContainer.classList.add("d-none");
      emailInput.parentElement.classList.add("d-none");
      confirmBuyBtn.classList.add("d-none");

      const loadingDiv = document.createElement("div");
      loadingDiv.id = "paymentLoading";
      loadingDiv.className = "text-center my-4";
      loadingDiv.innerHTML = `
        <div class="spinner-border text-success mb-3" role="status" style="width: 3rem; height: 3rem;"></div>
        <p class="fw-semibold">Preparing your Bitcoin payment...</p>
      `;
      document.querySelector(".modal-body")?.appendChild(loadingDiv);

      setTimeout(async () => {
        loadingDiv.remove();
        const btcAmount = await fetchBTCAmount(price);
        const randomIndex = Math.floor(Math.random() * bitcoinAddresses.length);
        const btcAddress = bitcoinAddresses[randomIndex];

        const btcDiv = document.createElement("div");
        btcDiv.id = "btcPaymentBox";
        btcDiv.innerHTML = `
          <hr style="margin: 20px 0;">
          <h5>Pay with Bitcoin</h5>
          <p><strong>Amount:</strong> ${btcAmount} BTC</p>
          <img src="https://api.qrserver.com/v1/create-qr-code/?size=180x180&data=${btcAddress}" alt="QR Code" style="margin: 10px 0; max-width: 150px;" />
          <p><strong>Address:</strong> <code>${btcAddress}</code></p>
          <p class="text-muted mt-2" id="countdownText">Waiting for payment...</p>
        `;
        document.querySelector(".modal-body")?.appendChild(btcDiv);

        // Start 30-minute countdown
        let remainingSeconds = 30 * 60;
        const countdownEl = document.getElementById("countdownText");
        const countdownInterval = setInterval(() => {
          const mins = Math.floor(remainingSeconds / 60);
          const secs = remainingSeconds % 60;
          countdownEl.innerHTML = `<strong>⏳ Time left:</strong> ${String(mins).padStart(2, '0')}:${String(secs).padStart(2, '0')}`;
          remainingSeconds--;
          if (remainingSeconds < 0) {
            clearInterval(countdownInterval);
            countdownEl.innerHTML = `<span class="text-danger">⛔ Payment window expired. Please try again.</span>`;
          }
        }, 1000);
      }, 2000);
    } else {
      alert("Failed to save order: " + data.message);
    }
  } catch (e) {
    console.error("Order error", e);
    alert("Something went wrong while saving the order.");
  }

  confirmBuyBtn.disabled = false;
  confirmBuyBtn.textContent = "Confirm Buy";
};

buyModalEl.addEventListener("hidden.bs.modal", () => {
  emailInput.value = userIdInput.value = smmInput.value = "";
  selectedProduct = null;
  document.getElementById("btcPaymentBox")?.remove();
  document.getElementById("paymentLoading")?.remove();
  userIdContainer.classList.remove("d-none");
  smmContainer.classList.remove("d-none");
  emailInput.parentElement.classList.remove("d-none");
  confirmBuyBtn.classList.remove("d-none");
  confirmBuyBtn.disabled = false;
  confirmBuyBtn.textContent = "Confirm Buy";
});

searchInput?.addEventListener("input", () => {
  currentPage = 1;
  renderProducts();
});

priceFilter?.addEventListener("change", () => {
  currentPage = 1;
  renderProducts();
});

fetch('admin/get-products.php')
  .then(response => response.json())
  .then(data => {
    products = data;
    renderProducts();
  })
  .catch(err => {
    console.error('Failed to load products JSON:', err);
    productGrid.innerHTML = `<p>Error loading products.</p>`;
  });
