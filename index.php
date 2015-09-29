<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Менеджер персонала</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	
<body>
	<div class="header">
		<div class="container">
			<h1>Менеджер персонала</h1>
			<div id="login-block">
				<?php 
				if (!isset($_SESSION['logged']) or $_SESSION['logged'] == false){
					echo "
					Логин:
					<input id=\"username\" type=\"text\">
					
					Пароль:
					<input id=\"password\" type=\"password\">
					<button onclick=\"javascript:login();\">Войти</button>
					<p id=\"login-label\"></p>";
				} else {
					echo "Вы вошли как ".$_SESSION['username']."&nbsp &nbsp<a href=\"#\" onclick=\"javascript:logout();\">Выйти</a>";
				}
						
				 ?>
											
			</div>
		</div>			
	</div>
	<div class="container">
		<div class="controls">
			Выбор месяца: 
			<select id="month_box" onchange="javascript:request_page(1);">
				<option>Январь</option>
				<option>Февраль</option>
				<option>Март</option>
				<option>Апрель</option>
				<option>Май</option>
				<option>Июнь</option>
				<option>Июль</option>
				<option>Август</option>
				<option>Сентябрь</option>
				<option>Октябрь</option>
				<option>Ноябрь</option>
				<option>Декабрь</option>
			<select>			
			Показать:
			<select id="show_box" onchange="javascript:request_page(1);">
				<option selected>Всех</option>
				<option>Постоянных сотрудников</option>
				<option>Контрактников</option>
			</select>
		</div>
		<div id="result_box">
			
		</div>
		<div id="pagination_controls">
		</div>	
	
	</div>
	
	<div id="overlay" onclick="javascript:close_pop();"></div>
	<div id="popup">
		<button id="close" onclick="javascript:close_pop();">X</button>
		<div id="pop-content">
			ФИО на русском: <input id="fio-rus" type="text"><br><br>
			ФИО на английском: <input id="fio-eng" type="text"><br><br>
			Тип: <select id="is-contract">
					<option>Постоянный</option>
					<option>Контрактник</option>
				</select>
			<span id="if_is_contr">Отработано часов: <input id="hours" type="text"></span><br><br>
			Начислено: <input id="income" type="text"><br><br>
			Подоходный налог: <input id="income-tax" type="text"><br><br>
			<span id="if_is_emplo">Взносы страховые и пенсионные:<input id="pensuranse" type="text"><br><br></span>
			Итого налогов и сборов: <input id="total-tax" type="text"><br><br>
			Сумма к выплате: <input id="total-payout" type="text"><br><br>
		</div>
	</div>
	
</head>
	
	<script src="main.js" charset="UTF-8"></script>
</body>
</html>