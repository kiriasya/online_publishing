<?php require "blocks/head.html" ?>
<div class=text-style>
  <div style="text-align: center">
  <h2 >Добавить врача</h2>
</div>
<form action="addd.php" method="post">
  <input type="text" class="form-control_2" name="number" id="number" placeholder="Номер кабинета">
</br>
      <input type="text" class="form-control_2" name="fio" id="fio" placeholder="ФИО">
      </br>
        <input type="text" class="form-control_2" name="position" id="position" placeholder="Должность">
        </br>
        <p> Время работы чч.мм - чч.мм </p>
      </br>
          <input type="text" class="form-control_2" name="date1" id="date1" placeholder="Понедельник ">
          </br>
          <input type="text" class="form-control_2" name="date2" id="date2" placeholder="Вторник">
          </br>
            <input type="text" class="form-control_2" name="date3" id="date3" placeholder="Среда">
            </br>
            <input type="text" class="form-control_2" name="date4" id="date4" placeholder="Четверг">
            </br>
            <input type="text" class="form-control_2" name="date5" id="date5" placeholder="Пятница">
            </br>
<p>	<button class="submit btn-primary_2">Добавить</button> </p>
</form>
</div>
