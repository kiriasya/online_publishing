<?php
$login=filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$pass=filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);
$pass=md5($pass);

$mysql=new mysqli('127.0.0.1','root',"",'registerdb');

$result=$mysql->query("SELECT * FROM `users` WHERE `login`='$login' AND `pass`='$pass'");
$user=$result->fetch_assoc();
if (count((array)$user) == 0)  {
echo "Неверный логин или пароль";
exit();
}
setcookie('user',$user['login'],time()+3600, "/");




$mysql->close();
header('Location:hs.php');





?>
