<?php
header('Content-type: text/html; charset=utf-8');
$police=filter_var(trim($_POST['police']),FILTER_SANITIZE_STRING);
$mysql=new mysqli('localhost','mihanep997_misha',"misha2010",'mihanep997_misha');
$result=$mysql->query("SELECT police FROM `pat` WHERE `police`='$police'");
$user=$result->fetch_assoc();
if (count((array)$user)== 0)  {
echo "Пациент с таким номером не найден";
exit();
}
$mysql->query("DELETE FROM `pat` WHERE police=$police");
$mysql->close();
header('Location:pat.php');
