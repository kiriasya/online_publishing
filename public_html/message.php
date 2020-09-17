<?php
require "blocks/header.php";
require "db.php";
if (empty($_SESSION['logged_user']) ) {
    //Если пользователь не авторизован не допускать вход в личный кабинет и перенаправить на страницу авторизации
    exit("<meta http-equiv='refresh' content='0; url= /log.php'>");
}
?>
<html>
 <head>
  <style>
   .colortext {
    background-color: #ffe; /* Цвет фона */
    color: #930; /* Цвет текста */
   }
  </style>
 </head>
<body>
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
<?php
if ( ($naem=$_POST['name'])||($naem = $_POST['email'] ))
{
    $mysql=new mysqli('localhost','nepeytsev_root',  'Misha2010!', 'nepeytsev_root');
    $em=$_SESSION['logged_user']->email;
    $_SESSION['name']=$naem;
    $em1=$naem;
    include message1.php;
    $query = "SELECT * FROM `users` WHERE email='$em1'";
    $query1 = "SELECT * FROM `message` WHERE `who`='$em' AND `to`='$em1' OR `who`='$em1' AND `to`='$em'";
    //    $query2 = "SELECT * FROM `message` WHERE `who`='$em1' AND `to`='$em' ";
    $result = $mysql->query($query);
    $row = $result->fetch_row();
    if ($row[2]) 
    { 
        echo "
    <div class='chat'>
	<div class='chat-messages'>
		<div class='chat-messages__content' id='messages'";
		if ($result1 = $mysql->query($query1)) {
         while ($row1 = $result1->fetch_row()) {
             if($row1[1]==$em)
          {  echo "
           <div class=\"colortext\"> Вы: $row1[3] <br>
          </div>";}
          else
          {
              echo "
         <div class=\"colortext\"> $em1: $row1[3] <br> 
          </div>";}
          }
      mysqli_free_result($result1);

          }

		echo"
		</div>
	</div>
	<div class='chat-input'>
		<form action=\"message1.php\" method=\"post\">
			<input type='text' name=\"mess\" id='message-text' class='chat-form__input' required placeholder='Введите сообщение'> <input type='submit' class='chat-form__submit' value='=>'>
		</form>
	</div>
</div>";

    }
    else 
    {
         echo "Такого пользователя не существует.
          <form action=\"message.php\" method=\"post\">
 <p>E-mail Пользователя: <input type=\"text\" name=\"name\" /></p>
 <p><input type=\"submit\" /></p>
</form>";
        
    }
      mysqli_free_result($result);

}
else
{
  echo " <form action=\"message.php\" method=\"post\">
 <p>E-mail Пользователя: <input type=\"text\" name=\"name\" /></p>
 <p><input type=\"submit\" /></p>
</form>";

}

$mysql->close();
?>
</body>
</html>