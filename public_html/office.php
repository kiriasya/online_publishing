<?php
require "blocks/header.php";
require "db.php";
//if (empty($_SESSION['logged_user'])) {
    //Если пользователь не авторизован не допускать вход в личный кабинет и перенаправить на страницу авторизации
  //exit("<meta http-equiv='refresh' content='0; url= /log.php'>");

//}
?>

 <head>
  <title>Онлайн издательство</title>
 </head>
<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <a class="my-0 mr-md-auto font-weight-normal p-2 text-dark" href="#">Главная страница</a>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="order.php">Статус заказа</a>
    <a class="p-2 text-dark" href="message.php">Сообщения</a>
    <a class="p-2 text-dark" href="about_aut.php">Личный кабинет</a>
  <a class="btn btn-outline-primary" href="#"><?php echo $_SESSION['logged_user']->email?></a>
  <?php   if($_SESSION['logged_user']->rights==moder1876433):  ?>
        <a class="btn btn-outline-primary" href="moder.php">Добавить статью</a>
      <?php endif ?>
    <a class="btn btn-outline-primary" href="logout.php">Выйти</a>
  </nav>
  </div>
<?php
  echo"<div class=\"main\">
  <h1> <font size=\"+5\"><b>Онлайн издательство</b></font></h1>
  <div class=\"news\">
    <h2>Новости</h2>
  ";
  $mysql=new mysqli('localhost','nepeytsev_root',  'Misha2010!', 'nepeytsev_root');

    $query = "SELECT * FROM `news`";
    if ($result = $mysql->query($query)) {
    while ($row = $result->fetch_row()) {
  echo "
      <article> $row[1] <br> Дата: $row[2] <br> $row[3]
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
