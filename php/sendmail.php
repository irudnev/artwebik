<?php
//Проверка правильности ввода EMAIL
if(trim($_POST['email']) == '')  {
$email = "-";
} else {
$email = htmlspecialchars(trim($_POST['email']));
}
//Проверка наличия телефона
if(trim($_POST['phone']) == '') {
$phone = "-";
} else {
$phone = htmlspecialchars(trim($_POST['Phone']));
}

$emailTo = 'rudnev.dn@mail.ru';
$body = "New website order.\n\nClient: $email \nPhone: $phone";
$name = "$email";
$headers = "Content-type: text/plain; charset='utf-8'r";
$headers .= 'From: <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email ."r";
mail($emailTo, $name, $body, $headers);

$redirect = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER']:'../index.html';
header("Location: $redirect");
exit();
?>