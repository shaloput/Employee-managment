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
			<select id="month_box" onchange="javascript:request_page();">
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
			<select id="show_box" onchange="javascript:request_page();">
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
	</div>
	
</head>
	
	<script src="main.js" charset="UTF-8"></script>
</body>
</html>