<?php
require "blocks/header.php";
require "db.php";
if (empty($_SESSION['logged_user']) ) {
    //Если пользователь не авторизован не допускать вход в личный кабинет и перенаправить на страницу авторизации
    exit("<meta http-equiv='refresh' content='0; url= /log.php'>");
}
$id=$_POST[id];
if (isset($id)) {
     //  $user=R::dispense('book');
   // $fio=R::findOne('users','email = ?',array($_SESSION['logged_user']->email));
    $mysql=new mysqli('localhost','nepeytsev_root',  'Misha2010!', 'nepeytsev_root');
$old=$mysql->query("SELECT `way` from `book` where `id`='$id'");
$row = $old->fetch_row();
echo "OLd :$id";
echo "OLd :$row[0]";

if (unlink($row[0])) { echo "Файл удален"; }
else{ echo "Файл не удален";}
if(isset($_FILES) && $_FILES['inputfile']['error'] == 0)
{ // Проверяем, загрузил ли пользователь файл
  if( ($_FILES['inputfile']['type'] == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document')||($_FILES['inputfile']['type'] == 'application/msword')||($_FILES['inputfile']['type'] == 'application/pdf')||($_FILES['inputfile']['type'] == 'application/octet-stream')||($_FILES['inputfile']['type'] == 'text/plain'))
  {
    $destiation_dir = dirname(__FILE__).'/file/'.$_FILES['inputfile']['name']; // Директория для размещения файла$uploadfile= $uloadFileDir.basename($_FILES['userfile']['name']);
    move_uploaded_file($_FILES['inputfile']['tmp_name'], $destiation_dir ); // Перемещаем файл в желаемую директорию
    echo "Успешно загружено!";
    $user1='nepeytsev.beget.tech/file/'.$_FILES['inputfile']['name'];
    $user2='file/'.$_FILES['inputfile']['name'];
    $query1="UPDATE `book` SET `text`='$user1' WHERE `id`='$id'";
    $query="UPDATE `book` SET `way`='$user2' WHERE `id`='$id'";

  }
   else
   {
      echo "Загрузите текстовый файл в формате txt, doc, docx, pdf или djvu.";
  }
   if(($result = $mysql->query($query))&&($result1 = $mysql->query($query1))){
       echo "Успешно отправлено";
   }
   else { echo "Ошибка.";
}
    exit("<meta http-equiv='refresh' content='0; url= /about_aut.php'>");
} 
}
?>
 <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
<a class="my-0 mr-md-auto font-weight-normal p-2 text-dark" href="office.php">Главная страница</a>  <nav class="my-2 my-md-0 mr-md-3">
   <a class="p-2 text-dark" href="order.php">Статус заказа</a>
    <a class="p-2 text-dark" href="message.php">Сообщения</a>
    <a class="p-2 text-dark" href="about_aut.php">Личный кабинет</a>
  <a class="btn btn-outline-primary" href="#"><?php echo $_SESSION['logged_user']->email?></a>
    <a class="btn btn-outline-primary" href="logout.php">Выйти</a>
  </nav>
  </div>
<div>