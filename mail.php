<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'mail.sarasmicrogreens.in';  // Change to your actual domain
        $mail->SMTPAuth   = true;
        $mail->Username   = 'info@sarasmicrogreens.in';
        $mail->Password   = 'j)hB$2EkI06]Q';
        $mail->SMTPSecure = 'ssl';  // use tls if 587
        $mail->Port       = 465;

        // Recipients
        $mail->setFrom('info@sarasmicrogreens.in', 'Website Contact');
        $mail->addAddress('gowthamnsri222@gmail.com', 'Gowtham'); // Where you want to receive

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body    = "
            <h3>New Message from Website</h3>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Message:</strong> $message</p>
        ";

        $mail->send();
        header("Location: thankyou.html");
    } catch (Exception $e) {
        echo "Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
