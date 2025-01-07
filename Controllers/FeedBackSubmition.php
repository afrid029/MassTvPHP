<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// require '../vendor/autoload.php';
require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

if (isset($_POST['feedback'])) {

    session_start();
    $name = $_POST['fname'];
    $surename = $_POST['sname'];
    $email = $_POST['feedemail'];
    $mobile = $_POST['mobile'];
    $message = $_POST['message'];


    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();  // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Set the SMTP server to send through (e.g., Gmail, Mailgun, etc.)
        $mail->SMTPAuth = true;  // Enable SMTP authentication
        $mail->Username = 'mafrid029@gmail.com';  // SMTP username (email)
        $mail->Password = '';  // SMTP password -- App Password from Gmail 2FA
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` for SSL
        $mail->Port = 587;  // SMTP port (587 for TLS, 465 for SSL)

        //Recipients
        $mail->setFrom('afrid2023@gmail.com', $name);  // Set the sender's email address and name
        $mail->addAddress('mafrid029@gmail.com', 'Afrid');  // Add recipient's email address and name
        //$mail->addReplyTo('another_email@example.com', 'Reply-to Name');  // Optional: Set a reply-to email address

        //Content
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = 'Test Email from PHPMailer';
        $mail->Body    = "<h5>Hi Afrid</h5>
                        <h5>You have feedback from $name $surename </h5>
                        <p>$message</p>
                        <h5>With Regards<br>$name $surename<br>$email<br>$mobile</h5>";

        // Debugging (optional, turn off in production)
        //$mail->SMTPDebug = 2;  // Set this to 2 for verbose debugging output (0 = off, 1 = client, 2 = client and server)

        // Send the email
        if ($mail->send()) {
            echo 'Message has been sent';
            $_SESSION['message'] = 'Succefully sent';
            $_SESSION['status'] = true;
            $_SESSION['fromAction'] = true;
            header("Location: /");
        } else {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;  // Display the error message if mail fails

            $_SESSION['message'] = $mail->ErrorInfo;
            $_SESSION['status'] = false;
            $_SESSION['fromAction'] = true;
            header("Location: /");
        }
    } catch (Exception $e) {
        // Catch any exceptions
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        $_SESSION['message'] = $mail->ErrorInfo;
        $_SESSION['status'] = false;
        $_SESSION['fromAction'] = true;
        header("Location: /");
    }
} else {
    header("Location: /sdas");
}
