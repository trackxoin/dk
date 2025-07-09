
<?php include 'header.php'; ?>

<?php
// You can replace this with your actual header include if you have one
function renderHeader() {
  echo <<<HTML
<header class="bg-primary text-white p-3">
  <div class="container">
    <h1>YourSiteName Support</h1>
    <nav>
      <a href="index.php" class="text-white me-3">Home</a>
      <a href="products.php" class="text-white me-3">Products</a>
      <a href="support.php" class="text-white fw-bold">Support</a>
    </nav>
  </div>
</header>
HTML;
}

// You can replace this with your actual footer include if you have one
function renderFooter() {
  $year = date('Y');
  echo <<<HTML
<footer class="bg-dark text-white text-center py-3 mt-5">
  <div class="container">
    &copy; $year YourSiteName. All rights reserved.
  </div>
</footer>
HTML;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Support - YourSiteName</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
   <link href="style.css" rel="stylesheet" />
 <style>
  body {
    background: #f8f9fa;
  }
  .support-container {
    max-width: 700px;
    margin: 40px auto;
    background: #fff;
    padding: 30px 20px; /* reduce side padding on mobile */
    border-radius: 8px;
    box-shadow: 0 0 12px rgb(0 0 0 / 0.1);
  }
  .faq-section {
    max-width: 700px;
    margin: 40px auto;
    padding: 0 15px;
  }

  /* On small screens, make container full width with some margin */
  @media (max-width: 576px) {
    .support-container, .faq-section {
      max-width: 100%;
      margin: 20px 10px;
      padding: 20px 15px;
    }
    h2, h3 {
      font-size: 1.5rem;
    }
  }
</style>

</head>
<body>



<div class="container support-container">
  <h2 class="mb-4 text-center">Contact Support</h2>
  <form id="supportForm" method="POST" action="support_submit.php" novalidate>
    <div class="mb-3">
      <label for="nameInput" class="form-label">Your Name</label>
      <input type="text" class="form-control" id="nameInput" name="name" placeholder="Enter your name" required />
      <div class="invalid-feedback">Please enter your name.</div>
    </div>
    <div class="mb-3">
      <label for="emailInput" class="form-label">Email address</label>
      <input type="email" class="form-control" id="emailInput" name="email" placeholder="name@example.com" required />
      <div class="invalid-feedback">Please enter a valid email.</div>
    </div>
    <div class="mb-3">
      <label for="subjectInput" class="form-label">Subject</label>
      <input type="text" class="form-control" id="subjectInput" name="subject" placeholder="Subject" required />
      <div class="invalid-feedback">Please enter a subject.</div>
    </div>
    <div class="mb-3">
      <label for="messageInput" class="form-label">Message</label>
      <textarea class="form-control" id="messageInput" name="message" rows="5" placeholder="Write your message here..." required></textarea>
      <div class="invalid-feedback">Please enter your message.</div>
    </div>
    <button type="submit" class="btn btn-primary w-100">Send Message</button>
  </form>
</div>

<div class="faq-section">
  <h3 class="mb-4 text-center">Frequently Asked Questions (FAQ)</h3>
  <div class="accordion" id="faqAccordion">
    <div class="accordion-item">
      <h2 class="accordion-header" id="faqHeadingOne">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqOne" aria-expanded="false" aria-controls="faqOne">
          How long does it take to get a response from support?
        </button>
      </h2>
      <div id="faqOne" class="accordion-collapse collapse" aria-labelledby="faqHeadingOne" data-bs-parent="#faqAccordion">
        <div class="accordion-body">
          We typically respond within 24 to 48 hours on business days. We appreciate your patience.
        </div>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header" id="faqHeadingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqTwo" aria-expanded="false" aria-controls="faqTwo">
          What payment methods do you accept?
        </button>
      </h2>
      <div id="faqTwo" class="accordion-collapse collapse" aria-labelledby="faqHeadingTwo" data-bs-parent="#faqAccordion">
        <div class="accordion-body">
          We accept various payment methods including credit cards, PayPal, and cryptocurrencies depending on the product.
        </div>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header" id="faqHeadingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqThree" aria-expanded="false" aria-controls="faqThree">
          Can I get a refund if I’m not satisfied?
        </button>
      </h2>
      <div id="faqThree" class="accordion-collapse collapse" aria-labelledby="faqHeadingThree" data-bs-parent="#faqAccordion">
        <div class="accordion-body">
          Refunds depend on the product and service purchased. Please contact support with your order details and we will review your request.
        </div>
      </div>
    </div>
  </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="script.js"></script>
<script>
// Bootstrap form validation
(() => {
  'use strict'
  const form = document.getElementById('supportForm');
  form.addEventListener('submit', event => {
    if (!form.checkValidity()) {
      event.preventDefault()
      event.stopPropagation()
    }
    form.classList.add('was-validated')
  }, false)
})();
</script>

</body>
</html>



<?php include 'footer.php'; ?>
