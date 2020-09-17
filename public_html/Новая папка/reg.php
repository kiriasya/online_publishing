<?php
$login=filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$pass=filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);
$pass_2=filter_var(trim($_POST['pass_2']),FILTER_SANITIZE_STRING);
if (empty($_POST['login'])){
  echo "Введите логин";
  exit();
}
if (empty($_POST['pass'])){
  echo "Введите пароль";
  exit();
}
$pass=md5($pass);
$pass_2=md5($pass_2);


$mysql=new mysqli('127.0.0.1','root',"",'registerdb');
$result=$mysql->query("SELECT login FROM `users` WHERE `login`='$login'");
$user=$result->fetch_assoc();
if ($pass!==$pass_2){
echo "Введенные пароли не совпадают, повторите попытку";
exit();
}
if (count((array)$user) > 0)  {
echo "Пользователь уже зарегестрирован";
exit();
}

$mysql->query("INSERT INTO `users` (`login`,`pass`)  VALUES('$login','$pass')");


$mysql->close();
header('Location:hs.php');
?>
