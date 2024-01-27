<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get form data
  $name = $_POST["name"];
  $email = $_POST["email"];
  $subject = $_POST["subject"];
  $message = $_POST["message"];

  // Validate email
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "invalid_email";
    exit();
  }

  // Your Gmail email address
  $to = "asifuddaola933@gmail.com";

  // Set email headers
  $headers = "From: $name <$email>" . "\r\n" .
    "Reply-To: $email" . "\r\n" .
    "Content-Type: text/html; charset=UTF-8" . "\r\n";

  // Compose the email message
  $email_message = "
    <html>
    <head>
        <title>$subject</title>
    </head>
    <body>
        <p>$message</p>
    </body>
    </html>
    ";

  // Send email
  if (mail($to, $subject, $email_message, $headers)) {
    echo "success";
  } else {
    echo "error";
  }
} else {
  echo "Invalid request";
}
