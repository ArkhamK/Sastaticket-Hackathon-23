<?php
// Get the form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$date1 = $_POST['date1'];
$date2 = $_POST['date2'];
$message = $_POST['message'];


// Sanitize and validate the form data
$name = filter_var($name, FILTER_SANITIZE_STRING);
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$phone = filter_var($phone, FILTER_SANITIZE_STRING);
$date1 = filter_var($date1, FILTER_SANITIZE_STRING);
$date2 = filter_var($date2, FILTER_SANITIZE_STRING);
$message = filter_var($message, FILTER_SANITIZE_STRING);

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  // Invalid email address
  // Redirect the user back to the form with an error message
  header("Location: enquiry-form.php?status=error");
  exit;
}


// Send an email with the form data
$to = 'your-email@example.com';
$subject = 'Enquiry Form Submission';

$body = "Name: $name\nEmail: $email\nPhone: $phone\nFrom: $date1\nTo: $date2\nMessage:\n$message";

$headers = "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=utf-8\r\n";

if (mail($to, $subject, $body, $headers)) {
  // Email sent successfully
  // Redirect the user to a thank you page
  header("Location: thank-you.php");
  exit;
} else {
  // Email failed to send
  // Redirect the user back to the form with an error message
  header("Location: enquiry-form.php?status=error");
  exit;
}
?> 
