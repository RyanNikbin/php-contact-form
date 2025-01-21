<?php

$email = $_POST['email'];
$name = $_POST['name'];
$message = $_POST['message'];

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try { 
    // Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;  // Enable verbose debug output
    $mail->Debugoutput = function($str, $level) {
        file_put_contents('phpmailer_debug.log', date('Y-m-d H:i:s') . " - $str\n", FILE_APPEND); 
    }; // Fixed missing semicolon after the function

    $mail->isSMTP();  // Send using SMTP
    $mail->Host       = 'smtp.example.com';   // Set the SMTP server to send through
    $mail->SMTPAuth   = true;               // Enable SMTP authentication
    $mail->Username   = 'Email'; // SMTP username
    $mail->Password   = 'Password';        // SMTP password (make sure this is correct)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable implicit TLS encryption
    $mail->Port       = 587;                // TCP port to connect to; use 587 for STARTTLS

    // Recipients
    // $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress($email, $name);      // Corrected this line (removed quotes around variables)
    // $mail->addAddress('email@example.com');  // Uncomment if you want to send a copy to yourself
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');  // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); // Optional name

    // Content
    $mail->isHTML(true);                     // Set email format to HTML
    $mail->Subject = 'Test email for PHPMailer'; // Set email subject
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>'; // HTML body content
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; // Plain text body content

    // Set a timeout limit for the script
    set_time_limit(300);  // Increases PHP timeout limit to 5 minutes

    // Send the email
    $mail->send();
    echo 'Message has been sent'; // Confirmation message
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; // Error handling
}
?>
