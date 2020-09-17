<?php require "blocks/head.html" ?>
<div class=text-style>
  <div style="text-align: center">
  <h2 >Добавить пациента</h2>
</div>
<form action="add.php" method="post">
  <input type="text" class="form-control_2" name="surname" id="surname" placeholder="Фамилия">
</br>
      <input type="text" class="form-control_2" name="name" id="name" placeholder="Имя">
      </br>
        <input type="text" class="form-control_2" name="middle_name" id="middle_name" placeholder="Отчество">
        </br>
          <input type="text" class="form-control_2" name="police" id="police" placeholder="Полис">
          </br>
          <input type="text" class="form-control_2" name="history" id="history" placeholder="Диагноз">
          </br>
            <input type="date" class="form-control_2" name="date" id="date" placeholder="Дата поступления">
            </br>
<p>	<button class="submit btn-primary_2">Добавить</button> </p>
</form>
</div>
