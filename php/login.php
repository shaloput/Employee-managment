<?php 
	session_start();
	include_once ("connect.php");

	
	if (isset($_POST['username'])) {
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		

		$sql = "SELECT * FROM users WHERE username='$username' AND password='$password' ";
		//echo $sql;
		$res = mysqli_query($mysqli, $sql);
		
		if (mysqli_num_rows($res)) {
			$_SESSION['logged'] = true;
			$_SESSION['username'] = $username;		
			echo "Вы вошли как ".$_SESSION['username']."&nbsp &nbsp<a href=\"#\" onclick=\"javascript:logout();\">Выйти</a>";
		} else {
			$_SESSION['logged'] = false;
		}

	mysqli_close($mysqli);
	}
 ?>