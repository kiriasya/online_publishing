<?php
$police=filter_var(trim($_POST['police']),FILTER_SANITIZE_STRING);
$mysql=new mysqli('127.0.0.1','root',"",'sui');
$result=$mysql->query("SELECT * FROM `pat` WHERE `police`='$police'");
$user=$result->fetch_assoc();
if (count((array)$user) == 0)  {
echo "Пациент не найден";
exit();
}
$result=$mysql->query("SELECT * FROM `pat` WHERE `police`='$police'");
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
