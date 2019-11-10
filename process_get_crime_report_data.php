<?php

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		require 'json_config.php';
		process_report_data();
	}

	function process_report_data(){

/* Process Login */

		global $connect;

		$query = "SELECT * from tbl_report_crime where status = 2 ";

		$result = mysqli_query($connect,$query);
		$number_of_rows = mysqli_num_rows($result);

		$log_array = array();

		if($number_of_rows > 0){
			while($row = mysqli_fetch_assoc($result)){
				$log_array[] = $row;
			}
		}

		header('Content-Type: application/json');
		echo json_encode(array("var_for_report_data"=>$log_array));
		mysqli_close($connect);

/* Process Login */

	}


?>