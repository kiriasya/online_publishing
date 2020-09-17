<!DOCTYPE html>
<html lang=ru dir="ltr">
    <meta charset="utf-8">
    <?php
if($_SESSION['logged_user']->rights!=moder1876433)
header('Location:log.php');
 ?>
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Онлайн издательство</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="css/main.css">
      <link href="https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Comfortaa&display=swap" rel="stylesheet">
</head>
<body>
 <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal">Главная страница</h5>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="#">Статус заказа</a>
    <a class="p-2 text-dark" href="#">Сообщения</a>
    <a class="p-2 text-dark" href="#">Личный кабинет</a>
     <a class="btn btn-outline-primary" href="logout.php">Выйти</a>
  </nav>
  </div>
<div>
<form action="new.php" method="post">
    <input type="text" class="form-control" name="name_new" id="name_new"
placeholder="Заголовок новости:" required><br>
    Выберите дату
  <input type="date" class="form-control" name="date_new" id="date_new" required><br>
<input type="text" class="form-control" name="text_new" id="text_new"
placeholder="Сообщите о новости:" required><br>
<button class="btn btn-success"><font >Отправить </font></button></form>
</div>

</body>
 </html>