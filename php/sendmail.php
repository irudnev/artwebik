<?php
//Проверка правильности ввода EMAIL
if(trim($_POST['email']) == '')  {
$email = "-";
$hasError = true;
} else {
$email = htmlspecialchars(trim($_POST['email']));
$hasError = false;
}
//Проверка наличия телефона
if(trim($_POST['phone']) == '') {
$phone = "-";
$hasError = $hasError == true;
} else {
$phone = htmlspecialchars(trim($_POST['Phone']));
$hasError = false;
}
//Если ошибок нет, отправить email
if($hasError == false) {
$emailTo = 'rudnev.dn@mail.ru';
$body = "New website order.\n\nClient: $email \nPhone: $phone";
$name = "$email";
$headers = "Content-type: text/plain; charset='utf-8'r";
$headers .= 'From: <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email ."r";
mail($emailTo, $name, $body, $headers);
}
$redirect = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER']:'../index.html';
header("Location: $redirect");
exit();
?>