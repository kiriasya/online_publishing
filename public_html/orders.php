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
        <a class="p-2 text-dark" href="#">Список редакторов</a>
        <a class="p-2 text-dark" href="#">Новые редакторы</a>
        <a class="btn btn-outline-primary" href="#"><?php echo $_SESSION['logged_user']->email?></a>
<a class="btn btn-outline-primary" href="logout.php">Выйти</a>
</nav>
</div>
<?php
$data=trim($_POST['orders']);
echo $data;
echo "<h1>Заказы:</h1>";
//$R=R::findAll('book','red_email = ?','$data');
//echo $R;
if ($data){
    $mysql=new mysqli('localhost','nepeytsev_root',  'Misha2010!', 'nepeytsev_root');
    $query = "SELECT * FROM `book` WHERE `red_email`='$data'";
    if ($result= $mysql->query($query)) {
        while ($row = $result->fetch_row()) {
            echo "<article> Автор: $row[1] <br> Наименование: $row[2] <br> email: $row[3] <br> Статус: $row[8] <br>
   </article>";
        }
        /* очищаем результирующий набор */
        mysqli_free_result($result);
    }

}