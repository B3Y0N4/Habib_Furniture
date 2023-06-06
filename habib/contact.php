<?php
require 'phpmailer/PHPMailerAutoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Create a new PHPMailer instance
    $mail = new PHPMailer();

    // Configure SMTP settings
    $mail->isSMTP();
    $mail->Host = 'smtp.example.com';  // Specify your SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'your_username@example.com';  // SMTP username
    $mail->Password = 'your_password';  // SMTP password
    $mail->SMTPSecure = 'tls';  // Enable encryption, 'ssl' also accepted
    $mail->Port = 587;  // TCP port to connect to

    // Set sender and recipient
    $mail->setFrom('sender@example.com', 'Sender Name');
    $mail->addAddress('recipient@example.com', 'Recipient Name');

    // Set email subject and body
    $mail->Subject = 'New Message from Contact Form';
    $mail->Body = "First Name: $fname\nLast Name: $lname\nEmail: $email\n\n$message";

    // Send the email
    if ($mail->send()) {
        // Display success message
        echo '<div class="mt-4">';
        echo '<p>Thank you for your message, ' . $fname . '!</p>';
        echo '</div>';
        exit; // Stop executing the rest of the code
    } else {
        // Display error message
        echo '<div class="mt-4">';
        echo '<p>Sorry, an error occurred. Please try again later.</p>';
        echo '</div>';
    }
}
?>

<div class="untree_co-section">
    <!-- Rest of the HTML code -->
    <div class="untree_co-section">
  <div class="container">
    <div class="block">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-8 pb-4">
          <div class="row mb-5">
            <!-- Address -->
          </div>

          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label class="text-black" for="fname">First name</label>
                  <input type="text" class="form-control" id="fname" name="fname">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label class="text-black" for="lname">Last name</label>
                  <input type="text" class="form-control" id="lname" name="lname">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="text-black" for="email">Email address</label>
              <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="form-group mb-5">
              <label class="text-black" for="message">Message</label>
              <textarea name="message" class="form-control" id="message" cols="30" rows="5"></textarea>
            </div>

            <button type="submit" class="btn btn-primary-hover-outline">Send Message</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
