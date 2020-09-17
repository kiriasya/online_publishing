<?php require "blocks/head.html" ?>
<?$login="guest";
setcookie('user',$user['login'],time()+3600, "/");
?>
<div style="text-align: center">
<h2> Пациенты <a class="btn btn-primary_2 " href="exit.php">Гость Выйти</a></button></h2>
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
$mysql=new mysqli('localhost','mihanep997_misha',"misha2010",'mihanep997_misha');
$result=$mysql->query("SELECT * FROM `pat`");
$rows = mysqli_num_rows($result);

echo "<table><tr><th>Фамилия </th><th>Имя</th><th>Отчество</th><th>Полис</th><th>Диагноз</th><th>Дата поступления</tr>";
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
