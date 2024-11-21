<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $fullName = htmlspecialchars(trim($_POST['full_name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $mobileNumber = htmlspecialchars(trim($_POST['mobile_number']));
    $subject = htmlspecialchars(trim($_POST['email_subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate email address
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // Your email address
    $to = "martmwangin@gmail.com"; 
    $emailSubject = "New Contact Form Submission: " . $subject;

    // Email body
    $emailBody = "Name: $fullName\n";
    $emailBody .= "Email: $email\n";
    $emailBody .= "Mobile: $mobileNumber\n\n";
    $emailBody .= "Message:\n$message";

    // Headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send email
    if (mail($to, $emailSubject, $emailBody, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send the message. Please try again later.";
    }
} else {
    echo "Invalid request method.";
}
?>
