
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet" />
  
</head>
<body>

<?php include 'header.php'; ?>

<main class="container my-5">
  <div class="row">
    <?php include 'sidebar.php'; ?>

    <div class="col-md-9">
      <div class="filter-bar d-flex justify-content-between align-items-center mb-3 flex-wrap">
        <div class="filter-show">
          Show: 
          <select id="showCount" class="form-select form-select-sm d-inline-block w-auto ms-2">
            <option value="9">9</option>
            <option value="12">12</option>
            <option value="18">18</option>
            <option value="24">24</option>
          </select>
        </div>

        <div class="filter-sort">
          Sort by:
          <select id="sortBy" class="form-select form-select-sm d-inline-block w-auto ms-2">
            <option value="popularity">Popularity</option>
            <option value="priceAsc">Price: Low to High</option>
            <option value="priceDesc">Price: High to Low</option>
            <option value="newest">Newest</option>
          </select>
        </div>
      </div>

      <div class="row g-3" id="product-grid"></div>

      <nav aria-label="Page navigation">
        <ul class="pagination" id="pagination"></ul>
      </nav>
    </div>
  </div>
</main>

<!-- Buy Modal -->
<div class="modal fade" id="buyModal" tabindex="-1" aria-labelledby="buyModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content p-3">
      <div class="modal-header">
        <h5 class="modal-title" id="buyModalLabel">Buy Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <img id="modalProductImage" src="" alt="" style="max-width:100%; max-height:150px; margin-bottom: 15px;">
        <h5 id="modalProductName"></h5>
        <p id="modalProductPrice" class="mb-2"></p>
        <p id="modalProductDescription" class="mb-4 text-muted small"></p>
        <ul id="modalProductFeatures" class="text-start small mb-4" style="padding-left: 20px;"></ul>

        <div class="mb-3 d-none" id="variantContainer">
          <select id="variantSelect" class="form-select"></select>
        </div>

        <!-- ✅ Fixed: Only one userIdContainer -->
        <div class="mb-3 d-none" id="userIdContainer">
          <label for="userIdInput" class="form-label">User ID</label>
          <input type="text" id="userIdInput" class="form-control" placeholder="">
        </div>

        <!-- ✅ Optional: Label added -->
        <div class="mb-3 d-none" id="smmContainer">
          <label for="smmInput" class="form-label">SMM Details</label>
          <input type="text" class="form-control" id="smmInput" placeholder="Enter SMM Details">
        </div>

        <div class="mb-3">
          <input type="email" class="form-control" id="emailInput" placeholder="Enter your email">
        </div>

        <button type="button" class="btn btn-success w-100" id="confirmBuyBtn">Confirm Buy</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="script.js"></script>

<?php include 'footer.php'; ?>
</body>
</html>
