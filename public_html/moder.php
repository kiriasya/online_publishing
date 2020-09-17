<?php
require "blocks/header.php";
require "db.php";
if($_SESSION['logged_user']->rights!=moder1876433)
    exit("<meta http-equiv='refresh' content='0; url= /log.php'>");
$data=$_POST;
if (isset($data['do_login']) ) {
    $user=R::dispense('news');
    $user->name_new=$data['name_new'];
    $user->date_new=$data['date_new'];
    $user->text_new=$data['text_new'];
    R::store($user);
    exit("<meta http-equiv='refresh' content='0; url= /office.php'>");
}
 ?>
 <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal href="office.php>Главная страница</h5>
  <nav class="my-2 my-md-0 mr-md-3">
   <a class="p-2 text-dark" href="order.php">Статус заказа</a>
    <a class="p-2 text-dark" href="message.php">Сообщения</a>
    <a class="p-2 text-dark" href="about_aut.php">Личный кабинет</a>
  <a class="btn btn-outline-primary" href="#"><?php echo $_SESSION['logged_user']->email?></a>
    <a class="btn btn-outline-primary" href="logout.php">Выйти</a>
  </nav>
  </div>
<div>

<form action="moder.php" method="post">
    <input type="text" class="form-control" name="name_new" id="name_new" required
placeholder="Заголовок новости:"><br>
    Выберите дату
  <input type="date" class="form-control" name="date_new" id="date_new"><br>
<input type="text" class="form-control" name="text_new" id="text_new" required
placeholder="Сообщите о новости:"><br>
    <button type="submit" name="do_login" class="btn btn-lg btn-primary btn-block">Отправить</button>
</form>
</div>
