

<?php
require "blocks/header.php";
require "db.php";
$data=$_POST;
if (isset($data['new_red'])){
    $errors=array();
    $user=R::findOne('users','email=?',array($data['email']));
    if ($user){
// login is found
        $id=$user->id;
        $result=R::load('users',$id);
        $result->rights='editor123';
        R::store($result);
        $OK=array();
        $OK[]=$user->email.' Успешно добавлен';
        echo '<div style="color:#000000;">' .array_shift($OK);'</div><hr>;';

    }
    else {
        if (! filter_var($data['email'],FILTER_VALIDATE_EMAIL) ){
            $errors[]='Некорректный email';
        }
        $errors[]='Пользователь с таким email не найден';
    }
    if (! empty($errors) ){

        echo '<div style="color:#000000;">' .array_shift($errors);'</div><hr>;';

    }
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





<body class="text-center">
<form class="form-signin" action="new_redactor.php" method="POST">
    <h1 class="h3 mb-3 font-weight-normal">Добавить нового редактора</h1>
    <input type="text" class="form-control" name="email" id="email" placeholder="Email">
    <button type="submit" name="new_red" class="btn btn-lg btn-primary btn-block">Добавить</button>
</form>
</body>