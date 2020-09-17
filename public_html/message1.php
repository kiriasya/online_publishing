<?php
require "blocks/header.php";
require "db.php";
if (empty($_SESSION['logged_user']) ) {
    //Если пользователь не авторизован не допускать вход в личный кабинет и перенаправить на страницу авторизации
    exit("<meta http-equiv='refresh' content='0; url= /log.php'>");
}
?>
<html>
 <head>
  <style>
   .colortext {
    background-color: #ffe; /* Цвет фона */
    color: #930; /* Цвет текста */
   }
  </style>
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


<body>
<?php
if( $_POST['mess'])
{
    $messagea= $_POST['mess'];
    $em=$_SESSION['logged_user']->email;
    $em1=$_SESSION['name'];  
    echo "<h2>Сообщение  $messagea <br> Кому:   $em1</h2>";

    $mess=R::dispense('message');
    $mess->who= $em;
        $mess->to= $em1;
            $mess->message= $_POST['mess'];
            R::store($mess);
 if (R::store($mess))
 {
     echo "<h2>Сообщение отправлено!</h2>";
 }
else
{
    echo"<h1>Ошибка, не сохранено</h1>";
}
}
else
{
echo "<h1>Ошибка...</h1>";
}
$mysql->close();
?>
</body>
</html>