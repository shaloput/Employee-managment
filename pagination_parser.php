<?php
	
	include_once ("connect.php");
	//$query = "SELECT * FROM employees ORDER BY id ASC LIMIT 10";
	//$res = mysqli_query($mysqli, $query);

	//print_r($res);


// Make the script run only if there is a page number posted to this script
if(isset($_POST['pn'])) {
	$rpp = preg_replace('#[^0-9]#', '', $_POST['rpp']);
	$last = preg_replace('#[^0-9]#', '', $_POST['last']);
	$pn = preg_replace('#[^0-9]#', '', $_POST['pn']);
	// This makes sure the page number isn't below 1, or more than our $last page
	if ($pn < 1) { 
    	$pn = 1; 
	} else if ($pn > $last) { 
    	$pn = $last; 
	}
	// Connect to our database here
	include_once ("connect.php");
	// This sets the range of rows to query for the chosen $pn
	$limit = 'LIMIT ' .($pn - 1) * $rpp .',' .$rpp;
	// This is your query again, it is for grabbing just one page worth of rows by applying $limit
	$query = "SELECT * FROM employees ORDER BY id ASC $limit";
	$res = mysqli_query($mysqli, $query);
		
	$t_array = array();

	while($row = mysqli_fetch_object($res)){
		array_push($t_array, $row);
	}
	
	$json_10 = json_encode($t_array,JSON_UNESCAPED_UNICODE);
	
	// Close your database connection
    mysqli_close($mysqli);
	// Echo the results back to Ajax
	
    echo $json_10;

	exit();
}

?>