<!-- Sidebar START -->
<style>
  aside {
    background: #f8f9fa;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
  }

  aside h5 {
    font-size: 1.1rem;
    font-weight: bold;
    color: #333;
    margin-bottom: 15px;
    border-bottom: 2px solid #ddd;
    padding-bottom: 6px;
  }

  #searchInput,
  #priceFilter {
    border-radius: 8px;
    border: 1px solid #ccc;
  }

  .category-list ul {
    list-style: none;
    padding-left: 0;
    margin-top: 10px;
  }

  .category-list li {
    margin-bottom: 10px;
  }

  .category-list a {
    text-decoration: none;
    font-size: 15px;
    padding: 8px 10px;
    display: block;
    color: #333;
    border-radius: 6px;
    transition: 0.2s;
  }

  .category-list a:hover {
    background-color: #343a40;
    color: #fff;
  }

  .featured-products .featured-product {
    background: #ffffff;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 10px;
    transition: all 0.2s ease-in-out;
  }

  .featured-products .featured-product:hover {
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  }

  .featured-product img {
    width: 40px;
    height: 40px;
    object-fit: cover;
    border-radius: 6px;
  }

  .featured-product-info h6 {
    font-size: 14px;
    margin-bottom: 2px;
    color: #333;
  }

  .featured-product-info small {
    color: #777;
  }

  .featured-products button {
    white-space: nowrap;
  }
</style>

<aside class="col-md-3 mb-4">
  <input type="text" class="form-control mb-3" id="searchInput" placeholder="Search for products" />

  <label for="priceFilter" class="form-label">Filter by Price</label>
  <select id="priceFilter" class="form-select mb-4">
    <option value="" selected>All Prices</option>
    <option value="under20">Under $20</option>
    <option value="20to50">$20 to $50</option>
    <option value="above50">Above $50</option>
  </select>

  <div class="category-list mb-4">
    <h5>Product Categories</h5>
    <ul id="sidebarCategoryList">
      <li><a href="?category=" class="category-link">All Products</a></li>
      <li><a href="?category=Gift%20Cards" class="category-link">🎁 Gift Cards</a></li>
      <li><a href="?category=TopUp" class="category-link">🔋 Top-Up</a></li>
      <li><a href="?category=Software_Tools" class="category-link">🧰 Software & Tools</a></li>
      <li><a href="?category=Others" class="category-link">✨ Others</a></li>
    </ul>
  </div>

  <div class="featured-products">
    <h5>Featured Products</h5>

    <div class="featured-product d-flex align-items-center mb-3">
      <img src="image/paypal2.png" alt="PayPal Gift Cards" />
      <div class="featured-product-info flex-grow-1 ms-2">
        <h6 class="mb-0">PayPal Gift Cards</h6>
        <small>$200.00</small>
      </div>
      <button class="btn btn-sm btn-dark ms-2 buy-btn"
              data-id="169"
              data-name="PayPal Gift Cards"
              data-price="200.00"
              data-image="image/paypal2.png">Buy</button>
    </div>

    <div class="featured-product d-flex align-items-center mb-3">
      <img src="image/visa20.png" alt="Visa Gift Cards" />
      <div class="featured-product-info flex-grow-1 ms-2">
        <h6 class="mb-0">Visa Gift Cards</h6>
        <small>$100.00</small>
      </div>
      <button class="btn btn-sm btn-dark ms-2 buy-btn"
              data-id="170"
              data-name="Visa Gift Cards"
              data-price="100.00"
              data-image="image/visa20.png">Buy</button>
    </div>

    <div class="featured-product d-flex align-items-center mb-3">
      <img src="image/poppolive.jpg" alt="Poppo Live Coins" />
      <div class="featured-product-info flex-grow-1 ms-2">
        <h6 class="mb-0">Poppo Live Coins</h6>
        <small>$15.00</small>
      </div>
      <button class="btn btn-sm btn-dark ms-2 buy-btn"
              data-id="58"
              data-name="Poppo Live Coins"
              data-price="15.00"
              data-image="image/poppolive.jpg">Buy</button>
    </div>

    <div class="featured-product d-flex align-items-center mb-3">
      <img src="image/mastercard.webp" alt="MasterCard Gift Cards" />
      <div class="featured-product-info flex-grow-1 ms-2">
        <h6 class="mb-0">MasterCard Gift Cards</h6>
        <small>$50.00</small>
      </div>
      <button class="btn btn-sm btn-dark ms-2 buy-btn"
              data-id="171"
              data-name="MasterCard Gift Cards"
              data-price="50.00"
              data-image="image/mastercard.webp">Buy</button>
    </div>

    <div class="featured-product d-flex align-items-center mb-3">
      <img src="image/tiktok.png" alt="TikTok Coins TopUp" />
      <div class="featured-product-info flex-grow-1 ms-2">
        <h6 class="mb-0">TikTok Coins TopUp</h6>
        <small>$25.00</small>
      </div>
      <button class="btn btn-sm btn-dark ms-2 buy-btn"
              data-id="54"
              data-name="TikTok Coins TopUp"
              data-price="25.00"
              data-image="image/tiktok.png">Buy</button>
    </div>
  </div>
</aside>
<!-- Sidebar END -->
