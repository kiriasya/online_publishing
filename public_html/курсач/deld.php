<?php
header('Content-type: text/html; charset=utf-8');
$number=filter_var(trim($_POST['number']),FILTER_SANITIZE_STRING);
$fio=filter_var(trim($_POST['fio']),FILTER_SANITIZE_STRING);
$mysql=new mysqli('localhost','mihanep997_misha',"misha2010",'mihanep997_misha');
$mysql->query("DELETE FROM `schedule` WHERE fio='$fio'");


header('Location:pat.php');
?>
