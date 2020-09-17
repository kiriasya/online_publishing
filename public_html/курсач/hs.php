

<?php require "blocks/head.html" ?>
<body background="look.com.ua-251217.jpg">
  <div style="text-align: center">
   <h2>Пациенты<h2>
   <div class="text-style_3">Для получения доступа авторизуйтесь</div>
  </div>
	<div class="text-style">
		<?php
		error_reporting(0);
		if ($_COOKIE['user']==''):
		   ?>
		<p>Логин<p>
      <div class="form-label-group">
			<form action="../aut/auth.php" method="post">
				<input type="text" class="form-control_2" name="login" id="login" placeholder="Введите логин">
      </div>
        <p>Пароль</p>
				<input type="password" class="form-control_2" name="pass" id="pass" placeholder="Введите пароль">
      </br>
					<button class="checkbox mb-3 btn-primary_2">Войти</button>
</form>
	<form action="../aut/registration.php" method="get">
    	<button class="checkbox mb-3 btn-primary_2" >Регистрация</button>
  </form>

<?php else:header('Location:pat.php'); ?>
</div>
</div>
<footer>
  <div style="text-align: center">
  ©Mikhail Nepeytsev
</div>
</body>
</footer>
<?endif?>
