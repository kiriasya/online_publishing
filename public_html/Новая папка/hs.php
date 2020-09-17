<?php require "blocks/head.html" ?>
  <div style="text-align: center">
   <h2>Пациенты больницы<h2>
   <h2>Для просмотра информации о пациентах необходимо выполнить вход<h2>
  </div>
	<div class="text-style">
		<?php
		error_reporting(0);
		if ($_COOKIE['user']==''):
		   ?>
		<p>Логин<p>
      <div class="form-label-group">
			<form action="auth.php" method="post">
				<input type="text" class="form-control_2" name="login" id="login" placeholder="Введите логин">
      </div>
        <p>Пароль</p>
				<input type="password" class="form-control_2" name="pass" id="pass" placeholder="Введите пароль">
      </br>
				<p>	<button class="checkbox mb-3 btn-primary_2">Войти</button> </p>
</form>
	<form action="registration.php" method="get">
    	<button class="checkbox mb-3 btn-primary_2" >Регистрация</button>
  </form>
<?php else:header('Location:pat.php'); ?>
<?php endif; ?>
</div>
</div>
<footer>
  <div style="text-align: center">
  ©Mikhail Nepeytsev
</div>
</footer>
