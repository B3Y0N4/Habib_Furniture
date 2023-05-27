<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Validate form data (you can add more validation if needed)
    if (empty($fname) || empty($lname) || empty($email) || empty($message)) {
        echo 'Please fill in all the fields.';
    } else {
        // Send the email
        $to = 'jalal.jr110@gmail.com'; // Replace with your email address
        $subject = 'New contact form submission';
        $body = "First Name: $fname\n"
            . "Last Name: $lname\n"
            . "Email: $email\n"
            . "Message: $message\n";

        if (mail($to, $subject, $body)) {
            echo 'Your message has been sent successfully.';
        } else {
            echo 'Sorry, there was an error sending your message. Please try again later.';
        }
    }
}
?>
