# Simple PHP Email Contact Form

This PHP script handles contact form submissions (name, email, and message) and sends them via email using **PHPMailer** and **SMTP**.

### How It Works:
1. **Form Submission**: The user fills out a contact form with their name, email, and message.
2. **PHPMailer**: The form data is sent to the server, where PHPMailer is used to send the email via SMTP.
3. **SMTP Server**: The email is sent securely using SMTP with TLS encryption (configured with SMTP server credentials).
4. **Error Handling**: If the email cannot be sent, an error message is shown.

### Requirements:
- PHP 7.0+
- PHPMailer library (installed via Composer)
- A valid SMTP server (e.g., `smtp.example.com`)

### Setup:
1. Clone the repository:
   ```bash
   git clone https://github.com/RyanNikbin/php-contact-form.git

##Configuration:
Edit the email-sending script to include your SMTP server credentials:

php
Copy
$mail->isSMTP();  // Send using SMTP
$mail->Host       = 'smtp.example.com';   // Set the SMTP server to send through
$mail->SMTPAuth   = true;                 // Enable SMTP authentication
$mail->Username   = 'your-email@example.com'; // SMTP username
$mail->Password   = 'your-email-password';    // SMTP password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable implicit TLS encryption
$mail->Port       = 587;                  // TCP port to connect to; use 587 for STARTTLS
