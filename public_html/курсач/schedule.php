<?php
if(empty($_COOKIE['user'])){
  echo "<script language = 'javascript'>
  document.location.href = 'hs.php';
  </script>";
}
?>
<?php require "blocks/head.html" ?>

<div style="text-align: center">
<div class="text-style">
  <div class="text-style_2">
    <h2>Расписание</h2>
    </div>
    </div>
    </div>
    <a class="text-style text-style_2" href="add_doctor.php"> Добавить </a>
    <a class="text-style" href="delete_doctor.php"> Удалить </a>
    <div class="text-style">
      <div class="text-style_2">
<?php
$mysql=new mysqli('localhost','mihanep997_misha',"misha2010",'mihanep997_misha');
$result=$mysql->query("SELECT * FROM `schedule` ORDER BY `number`");
$rows = mysqli_num_rows($result);
header('Content-type: text/html; charset=utf-8');
echo "<table id='display'><tr><th>№ каб.</th><th>ФИО</th><th>Должность</th><th>Пон</th><th>Вт</th><th>Ср</th><th>Чет</th><th>Пят</tr>";
for ($i = 0 ; $i < $rows ; ++$i)
   {
       $row = mysqli_fetch_row($result);
       echo "<tr>";
           for ($j = 0 ; $j < 8 ; ++$j) echo "<td>$row[$j]</td>";
       echo "</tr>";
   }
   echo "</table>";
   // очищаем результат
   mysqli_free_result($result);


$mysql->close();
?>
</div>
</div>
</div>
