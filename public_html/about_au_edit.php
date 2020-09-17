<?php
require "blocks/header.php";
require "db.php";
if (empty($_SESSION['logged_user']) ) {
    //Если пользователь не авторизован не допускать вход в личный кабинет и перенаправить на страницу авторизации
    exit("<meta http-equiv='refresh' content='0; url= /log.php'>");
}
?>
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
<body class="text-center">
<form class="form-signin" action="about_aut.php" method="POST">
    <h1 class="h3 mb-3 font-weight-normal">Моя информация</h1>
    <input type="text" class="form-control" name="fio" id="fio"required placeholder="ФИО" value="<?php echo @$result->fio;?>">
    </br>
    <input type="date" required class="form-control" name="date" id="date" value="<?php echo @$result->date;?>">
    </br>
    <input type="text" class="form-control" name="number" id="number" required placeholder="Контактный номер" value="<?php echo @$result->number;?>" >
    </br>
    <input type="text" class="form-control" name="email" id="email" required placeholder="email" value="<?php echo @$result->email;?>" >
    </br>
    <input type="text" class="form-control" name="works" id="works" required placeholder="Работы" value="<?php echo @$result->works;?>" >
    </br>
    <button type="submit" name="do_login" href="about_aut.php" class="btn btn-lg btn-primary btn-block">Сохранить изменения</button>
</form>
</body>


