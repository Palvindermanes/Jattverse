<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Email configuration
    $to = "palvindermanes08@gmail.com.com"; // Replace with your email address
    $subject = "New Contact Form Submission from $name";
    $body = "You have received a new message from your website:\n\n" .
            "Name: $name\n" .
            "Email: $email\n" .
            "Message:\n$message\n";

    $headers = "From: $email";

    // Attempt to send email
    if (mail($to, $subject, $body, $headers)) {
        // Success message
        echo "<h1>Thank you, $name!</h1>";
        echo "<p>Your message has been sent successfully. We will get back to you shortly.</p>";
    } else {
        // Failure message
        echo "<h1>Oops!</h1>";
        echo "<p>Something went wrong, and your message couldn't be sent. Please try again later.</p>";
    }
} else {
    // If the form wasn't submitted, redirect to the contact page
    header("Location: contact.html");
    exit();
}
?>
