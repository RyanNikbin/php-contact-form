# Simple PHP Email Contact Form

This PHP script handles contact form submissions (name, email, message) and sends them via email using **PHPMailer** and **SMTP**.

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
1. Install dependencies via Composer:
   ```bash
   composer install
