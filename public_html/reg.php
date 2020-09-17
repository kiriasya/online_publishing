<link href="css/signin.css" rel="stylesheet">
<?php require "blocks/header.php";
require "db.php";
$data=$_POST;
if (isset($data['do_signup'])) {
    //reg?
    $errors = array();
    if (! filter_var($data['email'],FILTER_VALIDATE_EMAIL)   ){
        //Проверка на корректный email адрес
        $errors[] = 'email введен неккоректно';
    }
    if ($data['password_2'] != $data['password']) {
        $errors[] = 'Пароли не совпадают';
    }
    if (R::count('users',"email = ? ",array($data['email'])) > 0 ){
        $errors[]='Пользователь с таким email уже существует';
    };

    if (empty($errors)) {
        //all is OK, will reg
        $user=R::dispense('users');
        $user->email=$data['email'];
        $user->password=password_hash($data['password'],PASSWORD_DEFAULT);
            R::store($user);
        exit("<meta http-equiv='refresh' content='0; url= /log.php'>");
    } else {
        echo '<div style="color:#000000;">' .array_shift($errors);'</div><hr>;';
    }
}
    ?>
<body class="text-center">
<form action="reg.php" class="form-signin" method="POST">
    <h1 class="h3 mb-3 font-weight-normal">Регистрация</h1>
    <input type="text" class="form-control" name="email" id="email" required placeholder="Email" value="<?php echo @$data['email'];?>" >
    <input type="password" class="form-control" name="password" id="password" required placeholder="Пароль" value="<?php echo @$data['password'];?>" >
    <input type="password" class="form-control" name="password_2" id="password_2" required placeholder="Повторите пароль" value="<?php echo @$data['password_2'];?>" >
</br>
    <button type="submit" name="do_signup" class="btn btn-lg btn-primary btn-block">Зарегистироваться</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2020-2021</p>
</form>
</body>


