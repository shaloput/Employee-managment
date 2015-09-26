<?php 
	include_once("connect.php");
	
	$res = mysqli_query($mysqli, "SELECT * FROM employees");
	$row = mysqli_fetch_array($res);
	foreach ($row as $value) {
		echo $value."<br>";
	}
	echo "<br>";
	echo $row;
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Менеджер персонала</title>
	
</head>
<body>
	
</body>
</html>