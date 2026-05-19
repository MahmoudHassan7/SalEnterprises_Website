<?php

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $to = "headoffice@salenterprises.ae";
    $subject = "New Contact Form Message";

    $body = "
<html>
<head>
  <style>
    body { font-family: Arial; background:#f6f6f6; padding:20px; }
    .box { background:#ffffff; padding:20px; border-radius:10px; }
    h2 { color:#b49d71; }
  </style>
</head>
<body>
  <div class='box'>
    <h2>New Contact Message</h2>
    <p><strong>Name:</strong> $name</p>
    <p><strong>Email:</strong> $email</p>
    <p><strong>Message:</strong><br>$message</p>
  </div>
</body>
</html>
";

    $headers  = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    $headers .= "From: no-reply@salenterprises.ae\r\n";
    $headers .= "Reply-To: $email\r\n";
    $success = mail($to, $subject, $body, $headers);

    if ($success) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error"]);
    }
} else {
    echo json_encode(["status" => "invalid"]);
}
