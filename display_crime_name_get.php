<?php

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		require 'json_config.php';
		process_display_profile();
	}

	function process_display_profile(){

/* Process Login */

		global $connect;

		$query = "SELECT * from tbl_crime where status = 1 ";

		$result = mysqli_query($connect,$query);
		$number_of_rows = mysqli_num_rows($result);

		$log_array = array();

		if($number_of_rows > 0){
			while($row = mysqli_fetch_assoc($result)){
				$log_array[] = $row;
			}
		}

		header('Content-Type: application/json');
		echo json_encode(array("var_disp_crime_name"=>$log_array));
		mysqli_close($connect);

/* Process Login */

	}


?>