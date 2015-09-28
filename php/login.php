<?php 
	session_start();
	include_once ("connect.php");

	
	if (isset($_POST['username'])) {
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		

		$sql = "SELECT * FROM users WHERE username=$username AND password=$password";
		//echo $sql;
		$res = mysqli_query($mysqli, $sql);

		if (mysqli_num_rows($res) == 1) {
			$_SESSION['logged'] = true;
			$_SESSION['username'] = $username;			
			header("Location: ../index.php");
		} else {
			//$_SESSION['logged'] = false;
		}

		//$row = mysqli_fetch_array($res);
		//$out = print_r($row);
		//	echo "row";

	mysqli_close($mysqli);
}
 ?>