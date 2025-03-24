<?php
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Include Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();                                           // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                           // Specify main SMTP server
    $mail->SMTPAuth = true;                                     // Enable SMTP authentication
    $mail->Username = 'rke49127@gmail.com';       
    $mail->Password = 'gyxa dyuc zhks gkon';          // SMTP username
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption
    $mail->Port = 465;                                          // TCP port to connect to

    // Recipients
    $mail->setFrom('rke49127@gmail.com', 'frederick');      // Your email and name
    $mail->addAddress('felisaaquino06@gmail.com', 'admin');    // Add recipient email and name

    // Content
    $mail->isHTML(true);                                        // Set email format to HTML
    $mail->Subject = 'Test Email from PHPMailer';
    $mail->Body    = '<h1>tumulong kanaman sa research ano na</h1>';

    // Send email
     $mail->SMTPDebug = 2; // Options: 0 = off, 1 = client messages, 2 = client and server messages
    $mail->send();
    echo 'Email has been sent successfully';
} catch (Exception $e) {
    echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
