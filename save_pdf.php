<?php
// Import PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Include PHPMailer autoload
require 'vendor/autoload.php';

// Include FPDF
require('fpdf186/fpdf.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Create new PDF instance
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    
    // Add Title
    $pdf->Cell(0, 10, 'Form Submission Data', 0, 1, 'C');
    $pdf->Ln(10);

    // Add content
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(40, 10, 'Name: ' . $name);
    $pdf->Ln(10);
    $pdf->Cell(40, 10, 'Email: ' . $email);
    $pdf->Ln(10);
    $pdf->MultiCell(0, 10, 'Message: ' . $message);
    $pdf->Ln(10);

    // Set PDF file name
    $fileName = "form-data-" . time() . ".pdf";
    $filePath = __DIR__ . '/' . $fileName;

    // Save PDF to local file
    $pdf->Output($filePath, 'F'); // 'F' means save the file to a path

    // Send PDF via email
    sendEmailWithAttachment($filePath, $email, $name);

    // Delete the PDF after sending to clean up
    unlink($filePath);
} else {
    echo "Invalid request.";
}

// Function to send email with PDF attachment
function sendEmailWithAttachment($filePath, $recipientEmail, $recipientName) {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();                                      // Use SMTP
        $mail->Host       = 'smtp.gmail.com';                 // SMTP server
        $mail->SMTPAuth   = true;                             // Enable SMTP authentication
        $mail->Username   = 'rke49127@gmail.com';             // Your Gmail address
        $mail->Password   = 'gyxa dyuc zhks gkon';            // Your Gmail App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;      // SSL encryption
        $mail->Port       = 465;                              // SMTP port

        // Recipients
        $mail->setFrom('rke49127@gmail.com', 'frederick');    // Sender's email and name
        $mail->addAddress($recipientEmail, $recipientName);   // Recipient's email and name
        $mail->addAddress('felisaaquino06@gmail.com', 'admin'); // Send a copy to another admin

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Form Submission with PDF Attachment';
        $mail->Body    = '<p>Please find the attached form submission data.</p>';

        // Attach PDF file
        $mail->addAttachment($filePath, 'Form-Submission.pdf');

        // Send email
        if ($mail->send()) {
            echo '✅ Email with PDF attachment has been sent successfully!';
        } else {
            echo '❌ Email could not be sent.';
        }
    } catch (Exception $e) {
        echo "❗ Error: {$mail->ErrorInfo}";
    }
}
?>
