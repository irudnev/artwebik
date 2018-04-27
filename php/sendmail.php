<?php
//  //Проверка Поля ИМЯ
//  if(trim($_POST['Name']) == '') {
//  $hasError = true;
//  } else {
//  $name = trim($_POST['Name']);
//  }
//Проверка правильности ввода EMAIL
if(trim($_POST['email']) == '')  {
$hasError = true;
} else {
$email = trim($_POST['email']);
}
// //Проверка наличия телефона
//  if(trim($_POST['Phone']) == '') {
//  $hasError = true;
//  } else {
//  $phone = trim($_POST['Phone']);
//  }
//Если ошибок нет, отправить email
if(!isset($hasError)) {
$emailTo = 'rudnevihor@gmail.com';
$body = "Новый заказ сайта: $email";
$name = "name: $email";
// $body = "Name: $name \n\nEmail: $email \n\nPhone: $phone";
$headers = "Content-type: text/plain; charset='utf-8'r";
$headers .= 'From: IDIS <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email ."r";
mail($emailTo, $name, $body, $headers);
$emailSent = true;
}
$redirect = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER']:'../index.html';
header("Location: $redirect");
exit();
?>