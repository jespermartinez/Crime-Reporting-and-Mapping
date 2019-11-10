<?php

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		require 'json_config.php';
		view_crime_process();
	}

	function view_crime_process(){


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
		echo json_encode(array("var_all_crime"=>$log_array));
		mysqli_close($connect);


	}


?>