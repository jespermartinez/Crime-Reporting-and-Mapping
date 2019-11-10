<?php

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		require 'json_config.php';
		display_crime_process();
	}

	function display_crime_process(){

		global $connect;

		$query = "SELECT * from tbl_report_crime trc, tbl_crime t where trc.crime_id = t.crime_id and trc.status=1";

		$result = mysqli_query($connect,$query);
		$number_of_rows = mysqli_num_rows($result);

		$log_array = array();

		if($number_of_rows > 0){
			while($row = mysqli_fetch_assoc($result)){
				$log_array[] = $row;
			}
		}

		header('Content-Type: application/json');
		echo json_encode(array("var_crime_map"=>$log_array));
		mysqli_close($connect);

	}


?>