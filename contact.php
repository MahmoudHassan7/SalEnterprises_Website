<?php

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $to = "headoffice@salenterprises.ae";
    $subject = "New Contact Form Message";

    $body = "Name: $name\nEmail: $email\nMessage:\n$message";

    $headers = "From: $email\r\nReply-To: $email\r\n";

    $success = mail($to, $subject, $body, $headers);

    if ($success) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error"]);
    }

} else {
    echo json_encode(["status" => "invalid"]);
}