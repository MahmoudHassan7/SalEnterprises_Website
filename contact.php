<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Your email
    $to = "headoffice@salenterprises.ae";

    // Subject
    $subject = "New Contact Form Message";

    // Email body
    $body = "
    You received a new message from your website.

    Name: $name
    Email: $email

    Message:
    $message
    ";

    // Headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send message.";
    }

} else {
    echo "Invalid request.";
}
?>