
<?php
require "blocks/header.php";
require "db.php";
session_start();

$data=$_POST;
if (isset($data['do_login']) )
{
$errors=array();
$user=R::findOne('users','email = ?',array($data['email']) );
if ($user){
// login is found
    if (password_verify($data['password'],$user->password)){
        //Login and password is right
//echo 'test';
$_SESSION['logged_user']=$user;
        if($user->rights==director123){
            exit("<meta http-equiv='refresh' content='0; url= /director.php'>");
        }
     //   echo $_SESSION['logged_user'];

exit("<meta http-equiv='refresh' content='0; url= /office.php'>");
    }



else{
        $errors[]='Неверный пароль';

    }

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



<link href="css/signin.css" rel="stylesheet">
<body class="text-center">
<form class="form-signin" action="log.php" method="POST">
    <h1 class="h3 mb-3 font-weight-normal">Авторизация</h1> <?php //        echo $_SESSION['logged_user'];
?>
    <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo @$data['email'];?>">
    <input type="password" class="form-control" name="password" id="password" placeholder="Пароль" >
<br/>
    <button type="submit" name="do_login" class="btn btn-lg btn-primary btn-block">Войти</button>
    <a class="btn btn-lg btn-primary btn-block" href="reg.php">Регистрация</a>
    <p class="mt-5 mb-3 text-muted">&copy; 2020-2021</p>
</form>
</body>
