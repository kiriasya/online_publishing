<?php
require "blocks/header.php";
require "db.php";
if (empty($_SESSION['logged_user']) ) {
    //Если пользователь не авторизован не допускать вход в личный кабинет и перенаправить на страницу авторизации
    exit("<meta http-equiv='refresh' content='0; url= /log.php'>");
}
$result=R::findOne('users','email= ?',array($_SESSION['logged_user']->email));
$data=$_POST;
$id=$result->id;
if (isset($data['do_login']) ) {
    $user = R::load('users', $id);
    $user->fio = $data['fio'];
    $user->number=$data['number'];
    $user->works=$data['works'];
    $user->date=$data['date'];
    R::store($user);
}
//Изменение статуса заказа
if (isset($data['status'])) {
    $id = $data['status'];
    $user = R::load('book', $id);
    $status=$_POST['status_option'];
    $user->status =$status ;
    R::store($user);
}

?>
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <a class="my-0 mr-md-auto font-weight-normal p-2 text-dark" href="office.php">Главная страница</a>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="order.php">Статус заказа</a>
    <a class="p-2 text-dark" href="message.php">Сообщения</a>
    <a class="p-2 text-dark" href="about_aut.php">Личный кабинет</a>
  <a class="btn btn-outline-primary" href="#"><?php echo $_SESSION['logged_user']->email?></a>
    <a class="btn btn-outline-primary" href="logout.php">Выйти</a>
    </nav>
</div>
<body>
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    
 <caption>Моя информация</caption>  
<table>
<tr><td>ФИО</td><td><?php echo @$result->fio;?></td></tr>
<tr><td>Номер телефона</td><td><?php echo @$result->number;?></td></tr>
<tr><td>Работы</td><td><?php echo @$result->works;?></td></tr>
<tr><td>Дата рождения</td><td><?php echo @$result->date;?></td></tr>
</table>
     <a class="btn btn-outline-primary" href="about_au_edit.php">Изменить</a>
</div>
   <?php
        if($_SESSION['logged_user']->rights==editor123): 
   ?>
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
    <button type=\"submit\" name=\"do_signup\" value=\" $id4 \" class='btn btn-lg btn-primary btn-block'>Принять заявку</button>
<form>  </article> ";

  }
  
         mysqli_free_result($result);
  }

  echo" <h2>Заказы в обработке:</h2> ";
  $mysql=new mysqli('localhost','nepeytsev_root',  'Misha2010!', 'nepeytsev_root');
  $em=$_SESSION['logged_user']->email;
    $query1 = "SELECT * FROM `book` WHERE `red_email`='$em'";
    if ($result = $mysql->query($query1)) {
    while ($row = $result->fetch_row()) {
        $id_2=$row[0];
        $au_email=$row[3];
  echo "
      <article>
     <br> Заказ номер: $row[0] <br> Автор:  $row[1] <br> Название:  $row[2]  <br> Дата запроса: $row[5] <br>  e-mail Автора: $row[3] <br> Статус: $row[8] <br>   <br>";
       echo "
       <form action=\"about_aut.php\" method=\"post\"  >
       <select name=\"status_option\">
  <option value='Ожидает подтверждения'>Ожидает подтверждения</option> 
  <option value='В обработке'>В обработке</option>
  <option value='Подготавливается макет'>Подготавливается макет</option> 
  <option value='Отдан в типографию'>Отдан в типографию</option> 
  <option value='Тираж готов'>Тираж готов</option> 

</select>     
<button type=\"submit\" name=\"status\" value=\" $id_2 \" class='btn btn-outline-primary' >Изменить статус</button>
</form>
       <form action=\"message.php\" method=\"post\"  >
<button type=\"submit\" name=\"email\"  value=\"$row[3]\" class='btn btn-outline-primary'>Связаться с автором</button>
</form>
  <a href = \"http://$row[4]\" download class='btn btn-outline-primary'>Скачать текст</a>
         <form action=\"update.php\" method=\"post\" enctype=\"multipart/form-data\" >
          <label for=\"inputfile\"></label>
    <input required type=\"file\" id=\"inputfile\" name=\"inputfile\">
<button type=\"submit\" name=\"id\"  value=\"$row[0]\" class='btn btn-outline-primary'>Обновить текст</button>
</form>

  </article>";
  }
  /* очищаем результирующий набор */
  mysqli_free_result($result);
  }
  echo" </div>
  </div>";
  $mysql->close();
   ?>
   <?php endif ?>
</body>
</html>

