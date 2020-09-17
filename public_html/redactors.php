<?php
require "blocks/header.php";
require "db.php";
if (empty($_SESSION['logged_user']) ) {
    //Если пользователь не авторизован не допускать вход в личный кабинет и перенаправить на страницу авторизации
    exit("<meta http-equiv='refresh' content='0; url= /log.php'>");
}
?>
<head>
    <title>Онлайн издательство</title>
</head>
<body>
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <a class="my-0 mr-md-auto font-weight-normal p-2 text-dark" href="director.php">Главная страница</a>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="redactors.php">Список редакторов</a>
        <a class="p-2 text-dark" href="new_redactor.php">Новые редакторы</a>
        <a class="btn btn-outline-primary" href="#"><?php echo $_SESSION['logged_user']->email?></a>
<a class="btn btn-outline-primary" href="logout.php">Выйти</a>
</nav>
</div>
<?php
echo "<h2>Редакторы:</h2> ";
$mysql=new mysqli('localhost','nepeytsev_root',  'Misha2010!', 'nepeytsev_root');
$em=$_SESSION['logged_user']->email;
$query = "SELECT * FROM `users` WHERE `rights`='editor123'";
if ($result = $mysql->query($query)) {
    while ($row = $result->fetch_row()) {
        $id4=$row[1];
        echo "
<form action=\"orders.php\" class=\"form-signin\" method=\"post\" >  
      <article>
      <br> email: $row[1] <br> Редактор:  $row[3] <br> Номер:  $row[5]  <br>
    <button type=\"submit\" name=\"orders\" value=\" $id4 \" class='btn btn-lg btn-primary btn-block'>Закрепленные заказы</button>
<form>  </article> ";

    }

    mysqli_free_result($result);
}