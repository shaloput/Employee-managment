<?php 
	include_once ("connect.php");
	
	$sql = "SELECT COUNT(*) FROM employees";
	$query = mysqli_query($mysqli, $sql);
	$row = mysqli_fetch_row($query);
	
	$total_rows = $row[0];

	
	$rpp = 10;
	
	$last = ceil($total_rows/$rpp);
	
	if ($last < 1) {
		$last = 1;
	}

	$pagenum = 1;

	
	mysqli_close($mysqli);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Менеджер персонала</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script>
		var rpp = <?php echo $rpp ?>;
		var last = <?php echo $last ?>;
	</script>
	<script src="main.js"></script>

<body>
	<div class="header">
		<div class="container">
			<h1>Менеджер персонала</h1>
		</div>			
	</div>
	<div class="container">
		<div id="result_box">
			
		</div>
		<div id="pagination_controls">
	</div>	
	
</div>
<script> request_page(1); </script>
	
</head>
	
</body>
</html>