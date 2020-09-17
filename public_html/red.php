<?php
require "blocks/header.html";
require "db.php";
if (empty($_SESSION['logged_user']) )
    exit("<meta http-equiv='refresh' content='0; url= /log.php'>");
?>
<head>
  <title>Онлайн издательство</title>
 </head>
<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <a class="my-0 mr-md-auto font-weight-normal p-2 text-dark" href="#">Главная страница</a>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href=".php">Заказы</a>
    <a class="p-2 text-dark" href="#">Сообщения</a>
    <a class="p-2 text-dark" href="about_aut.php">Личный кабинет</a>
  <a class="btn btn-outline-primary" href="#"><?php echo $_SESSION['logged_user']->email?></a>
      <a class="btn btn-outline-primary" href="logout.php">Выйти</a>
  </nav>
    </div>



    <?php
    echo"<div class=\"main\">
  <h1> <font size=\"+5\"><b>Онлайн издательство</b></font></h1>
  <div class=\"news\">
    <h2>Свободные заявки</h2>
  ";
    $mysql=new mysqli('localhost','nepeytsev_root',  'Misha2010!', 'nepeytsev_root');

    $query = "SELECT * FROM `book` WHERE redactor=''";
    if ($result = $mysql->query($query)) {
        while ($row = $result->fetch_row()) {
            echo "
      <article> Автор: $row[1] <br> Наименование работы:  $row[2] <br> email: $row[3] <br> Текст работы $row[4] <br> Дата обращения: $row[5]
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
