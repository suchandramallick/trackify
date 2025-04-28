<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name    = htmlspecialchars(trim($_POST["name"]));
    $email   = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST["message"]));

    if (!empty($name) && !empty($email) && !empty($message)) {
        $to      = "your_email@example.com"; // <-- Replace with your actual email
        $subject = "New Contact Message from $name";
        $body    = "Name: $name\nEmail: $email\n\nMessage:\n$message";
        $headers = "From: $email\r\nReply-To: $email\r\n";

        if (mail($to, $subject, $body, $headers)) {
            // Success – redirect to thank you page
            header("Location: thank_you.php");
            exit;
        } else {
            echo "Something went wrong. Please try again later.";
        }
    } else {
        echo "Please fill in all the fields.";
    }
} else {
    header("Location: contact.php");
    exit;
}
