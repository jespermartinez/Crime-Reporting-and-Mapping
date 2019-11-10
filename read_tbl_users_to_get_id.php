<?php

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		require 'json_config.php';
		process_get_tbl_user_id();
	}

	function process_get_tbl_user_id(){

/* Process Login */

		global $connect;

		$query = "SELECT * from tbl_log_user ";

		$result = mysqli_query($connect,$query);
		$number_of_rows = mysqli_num_rows($result);

		$log_array = array();

		if($number_of_rows > 0){
			while($row = mysqli_fetch_assoc($result)){
				$log_array[] = $row;
			}
		}

		header('Content-Type: application/json');
		echo json_encode(array("var_for_users_id"=>$log_array));
		mysqli_close($connect);

/* Process Login */

	}


?>