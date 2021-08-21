<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'php.mailer/src/Exception.php';
require 'php.mailer/src/PHPMailer.php';

$mail = new PHPMailer(true);
$mail->CharSet = 'utf-8';

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];



// $mail->isSMTP();                                  
// $mail->Host = '';  																							// Specify main and backup SMTP servers
// $mail->SMTPAuth = true;                              
// $mail->Username = ''; 
// $mail->Password = ''; 
// $mail->SMTPSecure = '';                           
// $mail->Port = 465; 

$mail->setFrom('tatevikatayan@mail.ru'); 
$mail->addAddress('tatevikatayan@pyahoo.com');    

$mail->isHTML(true);                                  

$mail->Subject = 'Заявка с тестового сайта';
$mail->Body    = '' .$name . ' оставил заявку, его телефон ' .$phone. '<br>Почта этого пользователя: ' .$email;
$mail->AltBody = '';

if(!$mail->send()){
    $message = 'Ошибка';
}else{
    $message = 'Данные отправлены!';
}
$response = ['message' => $message];
header('Content-type: application/json');
echo json_encode($response);
?>