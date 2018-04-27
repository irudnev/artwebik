<?php
//что менять
$chars_bad = array(";", ".", "?", "/", ":");
//на что менять
$chars_good = array("[tchszpt]", "[tch]", "[qst]", "[del]", "[dvtch]");
//Проверка правильности ввода EMAIL
if(trim($_POST['email']) == '')  {
$email = "-";
$hasError = true;
} else {
$email = str_replace($chars_bad, $chars_good, trim($_POST['email']));
$hasError = false;
}
//Проверка наличия телефона
if(trim($_POST['phone']) == '') {
$phone = "-";
$hasError = $hasError == true;
} else {
$phone = str_replace($chars_bad, $chars_good, trim($_POST['phone']));
$hasError = false;
}
//Если ошибок нет, отправить email
if($hasError == false) {
$emailTo = 'artwebik@gmail.com';
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