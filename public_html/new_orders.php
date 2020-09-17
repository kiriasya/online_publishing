<?php
require "blocks/header.php";
require "db.php";
?>
<head>
    <title>Онлайн издательство</title>
</head>
<body>
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <a class="my-0 mr-md-auto font-weight-normal p-2 text-dark" href="#">Главная страница</a>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="redactors.php">Список редакторов</a>
        <a class="p-2 text-dark" href="#">Новые редакторы</a>
        <a class="btn btn-outline-primary" href="#"><?php echo $_SESSION['logged_user']->email?></a>
        <a class="btn btn-outline-primary" href="logout.php">Выйти</a>
    </nav>
</div>
<?php
echo "<h2>Свободные заказы:</h2> ";
$mysql=new mysqli('localhost','nepeytsev_root',  'Misha2010!', 'nepeytsev_root');
$em=$_SESSION['logged_user']->email;
$query = "SELECT * FROM `book` WHERE `red_email`='' ORDER BY `date`";
if ($result = $mysql->query($query)) {
    while ($row = $result->fetch_row()) {
        $id4=$row[0];
        echo "
<form action=\"agree.php\" class=\"form-signin\" method=\"post\" >  
      <article>
      <br> Заказ номер: $row[0] <br> Автор:  $row[1] <br> Название:  $row[2]  <br> Дата запроса: $row[5] <br>  e-mail Автора: $row[3] <br> Статус: $row[8] <br> <br>
    <button type=\"submit\" name=\"do_signup\" value=\" $id4 \" class='btn btn-lg btn-primary btn-block'>Назначить редактора</button>
<form>  </article> ";

    }

    mysqli_free_result($result);
}

?>