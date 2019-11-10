<?php

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		require 'json_config.php';
		process_display_profile();
	}

	function process_display_profile(){

/* Process Login */

		global $connect;

		$query = "SELECT * from tbl_log_user tl , tbl_user ts  where tl.user_id = ts.user_id order by tl.log_id asc";

		$result = mysqli_query($connect,$query);
		$number_of_rows = mysqli_num_rows($result);

		$log_array = array();

		if($number_of_rows > 0){
			while($row = mysqli_fetch_assoc($result)){
				$log_array[] = $row;
			}
		}

		header('Content-Type: application/json');
		echo json_encode(array("var_display_header"=>$log_array));
		mysqli_close($connect);

/* Process Login */

	}


?>