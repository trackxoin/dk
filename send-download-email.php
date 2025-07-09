<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $product = $_POST['product'] ?? '';
    $downloadURL = $_POST['download_url'] ?? '';

    if (filter_var($email, FILTER_VALIDATE_EMAIL) && $downloadURL) {
        $subject = "Your Download: $product";
        $message = "Thank you for your purchase!\n\nYour download link:\n$downloadURL\n\nEnjoy!";
        $headers = "From: support@yourdomain.com";

        if (mail($email, $subject, $message, $headers)) {
            echo "Download link sent!";
        } else {
            echo "Failed to send email.";
        }
    } else {
        echo "Invalid input.";
    }
}
?>
