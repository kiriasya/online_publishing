<?php
require "blocks/header.php";
require "db.php";
if (empty($_SESSION['logged_user']) )
        exit("<meta http-equiv='refresh' content='0; url= /log.php'>");
?>
 <head>
  <title>Онлайн издательство</title>
 </head>
<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <a class="my-0 mr-md-auto font-weight-normal p-2 text-dark" href="office.php">Главная страница</a>
  <nav class="my-2 my-md-0 mr-md-3">
   <a class="p-2 text-dark" href="order.php">Статус заказа</a>
    <a class="p-2 text-dark" href="message.php">Сообщения</a>
    <a class="p-2 text-dark" href="about_aut.php">Личный кабинет</a>
  <a class="btn btn-outline-primary" href="#"><?php echo $_SESSION['logged_user']->email?></a>
    <a class="btn btn-outline-primary" href="logout.php">Выйти</a>
  </nav>
  </div>
<?php
  echo"<div class=\"main\">
  <h1> <font size=\"+5\"><b>Онлайн издательство</b></font></h1>
  <div class=\"news\">
    <h2>Статус заказа</h2>
   <br>  <a class='btn btn-outline-primary' href='new_order.php'>Оформить заказ</a> <br>
  ";
  $mysql=new mysqli('localhost','nepeytsev_root',  'Misha2010!', 'nepeytsev_root');
$em=$_SESSION['logged_user']->email;
    $query = "SELECT * FROM `book` WHERE `email`='$em'";
    if ($result = $mysql->query($query)) {
    while ($row = $result->fetch_row()) {
  echo "
      <article>
     <br> Заказ номер: $row[0]  <br> Название:  $row[2]  <br> Дата запроса: $row[5] <br> Редактор: $row[6] <br>   e-mail Редактора: $row[7] <br> Статус: $row[8] <br>  <br>";
       echo "<form action=\"message.php\" method=\"post\"  >
<button type=\"submit\" name=\"email\"  value=\"$row[7]\" class='btn btn-outline-primary'>Связаться с редактором</button>
</form>
<a href = \"http://$row[4]\" download class='btn btn-outline-primary'>Скачать текст</a>
  </article>";
  }
      /* очищаем результирующий набор */
  mysqli_free_result($result);
  }
  echo" </div>
  </div>";

    $mysql->close();
   ?>
   </body>
</html>
