   <!DOCTYPE html>
<html lang=ru dir="ltr">
    <meta charset="utf-8">
    <?php
if($_SESSION['logged_user']->rights!=moder1876433)
        exit("<meta http-equiv='refresh' content='0; url= /log.php'>");
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
  <?php
// присваиваем переменные
$name_new=$_POST['name_new'];
$date=$_POST['date_new'];
$new=$_POST['text_new'];

   //обращаемся к базе данных
$mysql=new mysqli('localhost','nepeytsev_root',  'Misha2010!', 'nepeytsev_root');

 $query = "INSERT INTO `news` (`name_new`, `date_new`,`text_new`, `image_new`)
VALUES('$name_new', $date', '$new', '')";
    if ($result = $mysql->query($query)) {
//выходим из базы данных
$mysql->close();
echo "Статья добавлена!";}
else {echo"Статья не добавлена!";}
 ?>
</div>
</body>
  </html>
