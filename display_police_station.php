<?php

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		require 'json_config.php';
		display_crime_process();
	}

	function display_crime_process(){

		global $connect;

		$query = "SELECT * from tbl_police_station";

		$result = mysqli_query($connect,$query);
		$number_of_rows = mysqli_num_rows($result);

		$log_array = array();

		if($number_of_rows > 0){
			while($row = mysqli_fetch_assoc($result)){
				$log_array[] = $row;
			}
		}

		header('Content-Type: application/json');
		echo json_encode(array("var_police_station_icon"=>$log_array));
		mysqli_close($connect);


	}


?>