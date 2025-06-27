<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'abilarqam0@gmail.com';
    $mail->Password = 'xqvlpizrqqpsabrp';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('abilarqam0@gmail.com', 'Tes Email');
    $mail->addAddress('abilarqam0@gmail.com', 'Penerima');
    $mail->Subject = 'Tes Kirim Email';
    $mail->Body = 'Ini hanya tes email dari PHPMailer';

    $mail->send();
    echo 'Berhasil mengirim email!';
} catch (Exception $e) {
    echo "Gagal mengirim email: {$mail->ErrorInfo}";
}
