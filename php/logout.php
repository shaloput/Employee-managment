<?php 
	session_start();
	session_destroy();

	echo "
		Логин:
		<input id=\"username\" type=\"text\">
		
		Пароль:
		<input id=\"password\" type=\"password\">
		<span id=\"login_label\"></span>
		<button onclick=\"javascript:login();\">Войти</button>";
?>