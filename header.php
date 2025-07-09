<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>BLACKWORLD Shop</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  
  <link rel="icon" href="image/fevicon1.png" type="image/png">
  </head>
<body>




<!-- Desktop Header -->
<header class="container-fluid py-3 border-bottom desktop-header d-none d-md-flex" style="background-color: #121212;">
  <div class="container d-flex justify-content-between align-items-center">
    
    <div class="logo fw-bold" style="color: #f1f1f1;">DRKMART</div>

    <nav class="menu d-flex gap-3">
      <a href="products?category" class="text-light text-decoration-none fw-semibold">SHOP</a>
      <a href="products?category=Gift%20Cards" class="text-light text-decoration-none fw-semibold">GIFT CARDS</a>
      <a href="products?category=TopUp" class="text-light text-decoration-none fw-semibold">TOP-UP</a>
      <a href="products?category=Software_Tools" class="text-light text-decoration-none fw-semibold">SOFTWARE & TOOLS</a>
      <a href="products?category=Others" class="text-light text-decoration-none fw-semibold">OTHERS</a>
    </nav>

    <div class="d-flex align-items-center">
      <a href="support.php" class="text-light mx-3 text-decoration-none fw-semibold">SUPPORT</a>
    </div>

  </div>
</header>



<!-- Mobile Header -->
<div class="mobile-header d-md-none">
  <div class="logo">DRKMART</div>
  <div class="mobile-menu-btn" role="button" tabindex="0" aria-label="Open menu"
       onclick="toggleSidebar()" onkeydown="if(event.key==='Enter' || event.key===' ') toggleSidebar()">
    &#9776;
  </div>
</div>

<!-- Mobile Slide-out Sidebar -->
<div class="mobile-sidebar" id="mobileSidebar" aria-label="Mobile navigation sidebar" tabindex="-1">
  <div class="close-btn" role="button" tabindex="0" aria-label="Close menu"
       onclick="toggleSidebar()" onkeydown="if(event.key==='Enter' || event.key===' ') toggleSidebar()">
    &times;
  </div>
  
  <a href="products?category">SHOP</a>
  <a href="products?category=Gift%20Cards">GIFT CARDS</a>
  <a href="products?category=TopUp">TOP-UP</a>
  <a href="products?category=Software_Tools">SOFTWARE & TOOLS</a>
  <a href="products?category=Others">OTHERS</a>



  <div class="featured-products">
    <h5>Featured Products</h5>


    <div class="featured-product d-flex align-items-center mb-2">
      <img src="image/paypal2.png" alt="PayPal Gift Cards" />
      <div class="featured-product-info flex-grow-1 ms-2">
        <h6 class="mb-0">PayPal Gift Cards</h6>
        <small>$200.00</small>
      </div>
      <button class="btn btn-sm btn-dark buy-btn" data-id="169" data-name="Visa Gift Cards" data-price="$25.00" data-image="https://via.placeholder.com/150x100?text=Netflix">Buy</button>
    </div>


    <div class="featured-product d-flex align-items-center mb-2">
      <img src="image/visa20.png" alt="Visa Gift Cards" />
      <div class="featured-product-info flex-grow-1 ms-2">
        <h6 class="mb-0">Visa Gift Cards</h6>
        <small>$100.00</small>
      </div>
      <button class="btn btn-sm btn-dark buy-btn" data-id="170" data-name="Visa Gift Cards" data-price="$100.00" data-image="https://via.placeholder.com/150x100?text=Amazon">Buy</button>
    </div>


    <div class="featured-product d-flex align-items-center mb-2">
      <img src="image/poppolive.jpg" alt="Poppo Live Coins" />
      <div class="featured-product-info flex-grow-1 ms-2">
        <h6 class="mb-0">Poppo Live Coins</h6>
        <small>$15.00</small>
      </div>
      <button class="btn btn-sm btn-dark buy-btn" data-id="58" data-name="Poppo Live Coins" data-price="$15.00" data-image="https://via.placeholder.com/150x100?text=PUBG">Buy</button>
    </div>


    <div class="featured-product d-flex align-items-center mb-2">
      <img src="image/mastercard.webp" alt="MasterCard Gift Cards" />
      <div class="featured-product-info flex-grow-1 ms-2">
        <h6 class="mb-0">MasterCard Gift Cards</h6>
        <small>$50.00</small>
      </div>
      <button class="btn btn-sm btn-dark buy-btn" data-id="171" data-name="MasterCard Gift Cards" data-price="$50.00" data-image="https://via.placeholder.com/150x100?text=Google">Buy</button>
    </div>


    <div class="featured-product d-flex align-items-center mb-2">
      <img src="image/tiktok.png" alt="TikTok Coins TopUp" />
      <div class="featured-product-info flex-grow-1 ms-2">
        <h6 class="mb-0">TikTok Coins TopUp</h6>
        <small>$25.00</small>
      </div>
      <button class="btn btn-sm btn-dark buy-btn" data-id="54" data-name="TikTok Coins TopUp" data-price="$25.00" data-image="https://via.placeholder.com/150x100?text=Roblox">Buy</button>
    </div>
  </div>
</div>

<div id="sidebarOverlay" onclick="toggleSidebar()"></div>





<script>
function toggleSidebar() {
  const sidebar = document.getElementById("mobileSidebar");
  const overlay = document.getElementById("sidebarOverlay");

  const isOpen = sidebar.classList.contains("active");

  if (isOpen) {
    sidebar.classList.remove("active");
    overlay.style.display = "none";
    document.body.style.overflow = ""; // enable scroll again
  } else {
    sidebar.classList.add("active");
    overlay.style.display = "block";
    document.body.style.overflow = "hidden"; // prevent body scroll
  }
}
</script>
