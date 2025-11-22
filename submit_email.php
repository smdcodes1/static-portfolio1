
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
// or
// require 'PHPMailer/src/Exception.php';
// require 'PHPMailer/src/PHPMailer.php';
// require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        // SMTP Settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'ace567871@gmail.com';   
        $mail->Password   = 'mbfr wfqs cdzr qtlm';     
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Sender & Receiver
        $mail->setFrom('acesmd6@gmail.com', 'Website Contact Form');
        $mail->addAddress('ace567871@gmail.com');   // Receive emails here

        // Email Content
        $mail->isHTML(true);
        $mail->Subject = "New Contact Message from $name";
        $mail->Body    = "
            <h3>Contact Form Details</h3>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Message:</strong><br>$message</p>
        ";

        $mail->send();
        echo "Email Sent Successfully!";
    } catch (Exception $e) {
        echo "Email could not be sent. Error: {$mail->ErrorInfo}";
    }
}
?>
