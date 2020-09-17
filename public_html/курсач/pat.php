<?php
if(empty($_COOKIE['user'])){
  echo "<script language = 'javascript'>
  document.location.href = 'hs.php';
  </script>";
}
?>
<?header('Content-type: text/html; charset=utf-8');?>
  <?php if(($_COOKIE['admin'])==1234): ?>
<?php require "blocks/head.html" ?>
  <div style="text-align: center">
<h2> Пациенты <a class="btn btn-primary_2 " href="exit.php"><?=$_COOKIE['user'] ?>  Выйти</a></button></h2>
<div class="text-style">
  <div class="row">
    <a class="text-style" href="add_pat.php"> Добавить пациента </a>
    <a class="text-style" href="delete.php"> Удалить пациента </a>
<form action="search.php" method="post">
  <div class="text-style_2"><input type="text" class="form-control_2" name="police" id="police" placeholder="Введите номер полиса"></div>
    <button class="checkbox mb-3 btn-primary_2">Поиск</button>
       </form>
         <a class="text-style" href="schedule.php"> Расписание врачей </a>
  </div>
  <div class="text-style_2">
        <?php
$mysql=new mysqli('localhost','mihanep997_misha',"misha2010",'mihanep997_misha');
$result=$mysql->query("SELECT * from `pat`");
$rows = mysqli_num_rows($result);
echo "<table><tr><th>Фамилия </th><th>Имя</th><th>Отчество</th><th>Полис</th><th>Врач</th><th>Дата поступления</tr>";
for ($i = 0 ; $i < $rows ; ++$i)
   {
       $row = mysqli_fetch_row($result);
       echo "<tr>";
           for ($j = 0 ; $j < 6 ; ++$j) echo "<td>$row[$j]</td>";
       echo "</tr>";
   }
   echo "</table>";
   // очищаем результат
   mysqli_free_result($result);
$mysql->close();
?>
</div>
</div>
<?endif?>
<?php if(($_COOKIE['admin'])==0): ?>
  <?php require "blocks/head.html" ?>
    <div style="text-align: center">
  <h2> Пациенты <a class="btn btn-primary_2 " href="exit.php"><?=$_COOKIE['user'] ?>  Выйти</a></button></h2>
  <div class="text-style">
    <div class="row">
  <form action="search.php" method="post">
    <div class="text-style_2"><input type="text" class="form-control_2" name="police" id="police" placeholder="Введите номер полиса"></div>
      <button class="checkbox mb-3 btn-primary_2">Поиск</button>
         </form>
         <a class="text-style" href="schedule_2.php"> Расписание врачей </a>
    </div>
  <div class="text-style_2">
        <?php
        $doctor=$_COOKIE['user'];
$mysql=new mysqli('localhost','mihanep997_misha',"misha2010",'mihanep997_misha');
for ($i = 0 ; $i < $rows ; ++$i)
   {
       $row = mysqli_fetch_row($result);
       echo "<tr>";
           for ($j = 0 ; $j < 5 ; ++$j) echo "<td>$row[$j]</td>";
       echo "</tr>";
   }
   echo "</table>";
$result=$mysql->query("SELECT `surname`,`name`,`middle_name`,`police`,`date`  FROM `pat` WHERE `doctor`='$doctor'");
$rows = mysqli_num_rows($result);
echo "<table><tr><th>Фамилия </th><th>Имя</th><th>Отчество</th><th>Полис</th><th>Дата поступления</tr>";
for ($i = 0 ; $i < $rows ; ++$i)
   {
       $row = mysqli_fetch_row($result);
       echo "<tr>";
           for ($j = 0 ; $j < 5 ; ++$j) echo "<td>$row[$j]</td>";
       echo "</tr>";
   }
   echo "</table>";
   // очищаем результат
   mysqli_free_result($result);
$mysql->close();
endif?>
