<?php
$surname=filter_var(trim($_POST['surname']),FILTER_SANITIZE_STRING);
$name=filter_var(trim($_POST['name']),FILTER_SANITIZE_STRING);
$middle_name=filter_var(trim($_POST['middle_name']),FILTER_SANITIZE_STRING);
$police=filter_var(trim($_POST['police']),FILTER_SANITIZE_STRING);
$history=filter_var(trim($_POST['history']),FILTER_SANITIZE_STRING);
$date=filter_var(trim($_POST['date']),FILTER_SANITIZE_STRING);
$mysql=new mysqli('127.0.0.1','root',"",'sui');
$result=$mysql->query("SELECT police FROM `pat` WHERE `police`='$police'");
$user=$result->fetch_assoc();
if (count((array)$user) > 0)  {
echo "Пациент уже внесен в базу";
exit();
}
$mysql->query("INSERT INTO `pat` (`surname`,`name`,`middle_name`,`police`,`history`,`date`)  VALUES('$surname','$name','$middle_name','$police','$history','$date')");
$mysql->close();
header('Location:pat.php');
