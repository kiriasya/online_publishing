<?
require "db.php";
    $id = $_POST['do_signup'];
    $user = R::load('book', $id);
    $user->redactor = $_SESSION['logged_user']->fio;
    $user->red_email = $_SESSION['logged_user']->email;
    $user->status = "В обработке";
    R::store($user);
   exit("<meta http-equiv='refresh' content='0; url= /about_aut.php'>");
?>

