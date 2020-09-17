<?php
header('Content-type: text/html; charset=utf-8');
$surname=filter_var(trim($_POST['surname']),FILTER_SANITIZE_STRING);
$name=filter_var(trim($_POST['name']),FILTER_SANITIZE_STRING);
$middle_name=filter_var(trim($_POST['middle_name']),FILTER_SANITIZE_STRING);
$police=filter_var(trim($_POST['police']),FILTER_SANITIZE_STRING);
$doctor=filter_var(trim($_POST['doctor']),FILTER_SANITIZE_STRING);
$date=filter_var(trim($_POST['date']),FILTER_SANITIZE_STRING);
$mysql=new mysqli('localhost','mihanep997_misha',"misha2010",'mihanep997_misha');
$result=$mysql->query("SELECT police FROM `pat` WHERE `police`='$police'");
$user=$result->fetch_assoc();
if (count((array)$user) > 0)  {
echo "Пациент уже внесен в базу";
exit();
}
if (empty($_POST['surname'])){
    echo "Введите Фамилию";
    exit();
}
if (empty($_POST['name'])){
    echo "Введите Имя";
    exit();
}
if (empty($_POST['police'])){
    echo "Введите полис";
    exit();
}
if (empty($_POST['doctor'])){
    echo "Введите доктора";
    exit();
}
if (empty($_POST['date'])){
    echo "Введите дату прибытия";
    exit();
}
$result=$mysql->query("SELECT login FROM `users` WHERE `login`='$doctor'");
$user=$result->fetch_assoc();
if (count((array)$user) > 0 ) {
  $mysql->query("INSERT INTO `pat` (`surname`,`name`,`middle_name`,`police`,`history`,`date`)  VALUES('$surname','$name','$middle_name','$police','$doctor','$date')");
  $mysql->close();
  header('Location:pat.php');
}
if (count((array)$user) == 0 ) {
  echo "Повторите попытку";
}
