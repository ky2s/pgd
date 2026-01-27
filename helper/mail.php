<?php 

ini_set( 'display_errors', 1 );   
error_reporting( E_ALL );

include('src/PHPMailer.php');

use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php';

function sendMail($subject, $receiver){
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'mail.etalastok.com';
    $mail->Port = 465;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Username = 'admin@etalastok.com';
    $mail->Password = 'tKSGnrBGBfr5';

    $mail->setFrom('admin@etalastok.com', 'Etalastok Emas');
    $mail->Subject = $subject;

    $mail->addAddress($receiver['email'], $receiver['name']);
    $mail->Body = $receiver['message'];
    

    $mail->isHTML(true);
    // $mail->msgHTML(file_get_contents('message.html'), __DIR__);

    if (!$mail->send()) {
        $error_message = 'Error: ' . $mail->ErrorInfo;
        file_put_contents('mail_error_log.txt', $error_message . "\n", FILE_APPEND);
        
        $msg = 'Sorry, something went wrong. Please try again later.';
    } else {
        $msg = 'Message sent! Thanks for contacting us.';
        file_put_contents('mail_success_log.txt', $receiver['email'] . $msg . "\n", FILE_APPEND);
    }

    return $msg;
}
?>