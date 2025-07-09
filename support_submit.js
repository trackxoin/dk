<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars(trim($_POST['name'] ?? ''));
    $email = htmlspecialchars(trim($_POST['email'] ?? ''));
    $subject = htmlspecialchars(trim($_POST['subject'] ?? ''));
    $message = htmlspecialchars(trim($_POST['message'] ?? ''));

    if (!$name || !$email || !$subject || !$message) {
        die("Please fill all the fields.");
    }

    // Basic email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    $to = "darkgiftshop@protonmail.com";  // Change to your support email
    $email_subject = "Support Request: $subject";
    $email_body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
    $headers = "From: $email";

    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Thank you for contacting support. We will get back to you soon.";
    } else {
        echo "Error sending email. Please try again later.";
    }
} else {
    header("Location: support.php");
    exit;
}
