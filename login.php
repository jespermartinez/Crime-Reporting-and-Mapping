<?php

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		require 'json_config.php';
		Login_process();
	}

	function Login_process(){

/* Process Login */

		global $connect;

		$query = "Select * from tbl_user";

		$result = mysqli_query($connect,$query);
		$number_of_rows = mysqli_num_rows($result);

		$log_array = array();

		if($number_of_rows > 0){
			while($row = mysqli_fetch_assoc($result)){
				$log_array[] = $row;
			}
		}

		header('Content-Type: application/json');
		echo json_encode(array("var_login"=>$log_array));
		mysqli_close($connect);

/* Process Login */

	}


?>