<?php
	
	include_once ("connect.php");

	
// Скрипт срабатывает только когда передан номер страницы.
if(isset($_POST['pn'])) {

	$rpp = preg_replace('#[^0-9]#', '', $_POST['rpp']);
	$last = preg_replace('#[^0-9]#', '', $_POST['last']);
	$pn = preg_replace('#[^0-9]#', '', $_POST['pn']);
	$month = preg_replace('#[^0-9]#', '', $_POST['month']);
	$show = preg_replace('#[^0-9]#', '', $_POST['show']);
	
	$today = getdate();
	//echo $today['month'];
	$days_m = cal_days_in_month(CAL_GREGORIAN, $month+1, $today['year']);
	

	// Это чтобы номер страницы не мог быть меньше одного или больше последней
	if ($pn < 1) { 
    	$pn = 1; 
	} else if ($pn > $last) { 
    	$pn = $last; 
	}
	
	$limit = 'LIMIT ' .($pn - 1) * $rpp .',' .$rpp;
	$json_10 = '{';
	$i = 0;


	if ($show == 0) {
		$show_mode = '';
	} else if ($show == 1) {
		$show_mode = 'WHERE is_contract = 0';
	} else {
		$show_mode = 'WHERE is_contract = 1';
	}

	$query = "SELECT * FROM employees ".$show_mode." ORDER BY id ASC $limit";
	$res = mysqli_query($mysqli, $query);
	
	while($row = mysqli_fetch_array($res)){
		$i++;
		$fio_rus = $row['fio_rus'];
		$fio_eng = $row['fio_eng'];
		$is_contract = $row['is_contract'];

		$hour_rate = $row['hour_rate'];
		$hours = $row['hours'];

		if ($is_contract) {
			$income = $hour_rate * $hours;
		} else {
			$income = $hour_rate*8*$days_m;
		}


		$income_tax = $income * 0.13;
		$pensuranse = $income * 0.26;
		$total_payout = $income - $income_tax - (!$is_contract)*$pensuranse;

		$json_10 .= '"emloyee'.$i.'":{ "fio_rus":"'.$fio_rus.'","fio_eng":"'.$fio_eng.'",
		"is_contract":"'.$is_contract.'","income":"'.$income.'","income_tax":"'.$income_tax.'",
		"pensuranse":"'.$pensuranse*(!$is_contract).'","total_payout":"'.$total_payout.'" },';
	}
	
	// Закрываем соединение
    mysqli_close($mysqli);
	// Отправляем данные обратно в ajax
	$json_10 = chop ($json_10, ",");
	$json_10 .= '}';
    echo $json_10;

	exit();
}

?>