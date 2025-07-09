<?php
session_start();

// Define access duration in seconds (30 mins)
$accessDuration = 30 * 60;

// Check if user already has access
$hasAccess = false;
if (isset($_SESSION['market_access']) && time() < $_SESSION['market_access'] + $accessDuration) {
  $hasAccess = true;
}

// Handle form submit
$message = '';
$showForm = !$hasAccess;
$welcome = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $userAnswer = intval($_POST['captcha_answer']);
  $correctAnswer = $_SESSION['captcha_result'] ?? -1;

  if ($userAnswer === $correctAnswer) {
    $_SESSION['market_access'] = time();
    $welcome = true;
    $showForm = false;
  } else {
    $message = "<div class='error'>❌ Wrong answer! Try again.</div>";
  }

  unset($_SESSION['captcha_result']);
}

// Generate CAPTCHA if needed
if ($showForm && !$welcome) {
  $num1 = rand(1, 10);
  $num2 = rand(1, 10);
  $_SESSION['captcha_result'] = $num1 + $num2;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Enter Market</title>
  <style>
    body {
      margin: 0; padding: 0;
      background: #0a0a0a;
      color: #fff;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      display: flex; justify-content: center; align-items: center;
      height: 100vh;
    }

    .container {
      background: #121212;
      border-radius: 14px;
      padding: 25px 20px;
      width: 95%;
      max-width: 280px;
      text-align: center;
      box-shadow: 0 0 18px rgba(0, 255, 170, 0.15);
    }

    h1 {
      font-size: 18px;
      color: #00ffbf;
      margin-bottom: 10px;
      text-shadow: 0 0 5px #00ffbf;
    }

    .message {
      font-size: 16px;
      margin: 12px 0;
    }

    .input-field {
      width: 90%;
      padding: 7px 10px;
      font-size: 14px;
      margin-top: 10px;
      border-radius: 6px;
      border: none;
      background: #222;
      color: white;
    }

    .btn {
      margin-top: 15px;
      padding: 8px 20px;
      background: linear-gradient(145deg, #00ffbf, #008080);
      border: none;
      color: white;
      font-size: 14px;
      border-radius: 20px;
      cursor: pointer;
      transition: 0.3s ease;
    }

    .btn:hover {
      background: linear-gradient(145deg, #008080, #00ffbf);
    }

    .error {
      color: #ff6b6b;
      font-size: 14px;
      margin-bottom: 10px;
    }

    .welcome-message {
      font-size: 16px;
      margin-top: 20px;
      color: #00ffbf;
      animation: glow 1.5s ease-in-out infinite alternate;
    }

    @keyframes glow {
      from {
        text-shadow: 0 0 4px #00ffbf, 0 0 8px #00ffbf;
      }
      to {
        text-shadow: 0 0 12px #00ffbf, 0 0 24px #00ffbf;
      }
    }
  </style>

  <?php if ($welcome): ?>
  <script>
    setTimeout(() => {
      window.location.href = "products.php"; // Change destination if needed
    }, 1500);
  </script>
  <?php endif; ?>

  <?php if ($hasAccess && !$welcome): ?>
  <script>
    // Automatically redirect to market if session valid
    window.location.href = "products.php"; // Or market.php etc.
  </script>
  <?php endif; ?>
</head>
<body>
  <div class="container">
    <h1>Welcome to the BLACKWORLD</h1>

    <?php if ($welcome): ?>
      <div class="welcome-message">✨ Welcome! You’re entering the DARK market... ✨</div>
    <?php elseif ($showForm): ?>
      <?php echo $message; ?>
      <form method="POST">
        <div class="message">What is <strong><?php echo $num1; ?> + <?php echo $num2; ?></strong>?</div>
        <input type="text" name="captcha_answer" class="input-field" required placeholder="Your Answer" />
        <br>
        <button type="submit" class="btn">Enter the Market</button>
      </form>
    <?php endif; ?>
  </div>
</body>
</html>
