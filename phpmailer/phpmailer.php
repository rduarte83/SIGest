<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

function sendMail($recipient, $subject, $body, $altbody)
{
    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer();
    $mail->CharSet = 'UTF-8';
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF;                      // Enable verbose debug output
        $mail->isSMTP();                                         // Send using SMTP
        $mail->Host = 'mail.segimprima.pt';                      // Set the SMTP server to send through
        $mail->SMTPAuth = true;                                  // Enable SMTP authentication
        $mail->Username = 'sigest@segimprima.pt';                // SMTP username
        $mail->Password = '';                        // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;      // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port = 587;                                       // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('sigest@segimprima.pt');
        $mail->addAddress($recipient);                              // Add a recipient

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AltBody = $altbody;

        $mail->send();
        echo "success ";
    } catch (Exception $e) {
        echo "error ";
    }
}