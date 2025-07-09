<?php
session_start();

// Define access duration
$accessDuration = 30 * 60;

// Check if user has access
if (!isset($_SESSION['market_access']) || time() > $_SESSION['market_access'] + $accessDuration) {
    // Redirect to index.php with delay
    echo '<!DOCTYPE html><html><head><meta http-equiv="refresh" content="2;url=index.php">';
    echo '<style>body{background:#0a0a0a;color:white;text-align:center;padding-top:20%;font-family:sans-serif;}</style>';
    echo '</head><body><h2>⏳ Redirecting to market entry page...</h2></body></html>';
    exit;
}
?>
