<?php require "blocks/head.html" ?>
<div style="text-align: center">

<h2>Список пациентов</h2>

</div>
<div class="text-style">
        <?php
$mysql=new mysqli('localhost','mihanep997_misha',"misha2010",'mihanep997_misha');
$result=$mysql->query("SELECT * FROM `pat`");
$rows = mysqli_num_rows($result);

echo "<table><tr><th>Фамилия</th><th>Имя</th><th>Отчество</th><th>Полис</th><th>Диагноз</th><th>Дата поступления</tr>";
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
