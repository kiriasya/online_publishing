<?php
header('Content-type: text/html; charset=utf-8');
$number=filter_var(trim($_POST['number']),FILTER_SANITIZE_STRING);
$fio=filter_var(trim($_POST['fio']),FILTER_SANITIZE_STRING);
$position=filter_var(trim($_POST['position']),FILTER_SANITIZE_STRING);
$date1=filter_var(trim($_POST['date1']),FILTER_SANITIZE_STRING);
$date2=filter_var(trim($_POST['date2']),FILTER_SANITIZE_STRING);
$date3=filter_var(trim($_POST['date3']),FILTER_SANITIZE_STRING);
$date4=filter_var(trim($_POST['date4']),FILTER_SANITIZE_STRING);
$date5=filter_var(trim($_POST['date5']),FILTER_SANITIZE_STRING);
$mysql=new mysqli('localhost','mihanep997_misha',"misha2010",'mihanep997_misha');
if (empty($_POST['number'])){
    echo "Введите номер кабинета";
    exit();
}
if (empty($_POST['fio'])){
    echo "Введите ФИО";
    exit();
}
if (empty($_POST['position'])){
    echo "Введите должность";
    exit();
}
if (empty($_POST['date1'])){
    echo "Понедельник";
    exit();
}
if (empty($_POST['date2'])){
    echo "Вторникн";
    exit();
}
if (empty($_POST['date3'])){
    echo "Среда";
    exit();
}
if (empty($_POST['date4'])){
    echo "Четверг";
    exit();
}
if (empty($_POST['date5'])){
    echo "Пятница";
    exit();
}
$mysql->query("INSERT INTO `schedule` (`number`,`fio`,`position`,`date1`,`date2`,`date3`,`date4`,`date5`)  VALUES('$number','$fio','$position','$date1','$date2','$date3','$date4','$date5') ");

$mysql->close();
header('Location:pat.php');
