<?php

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		require 'json_config.php';
		Login_user_log_process();
	}

	function Login_user_log_process(){

		global $connect;

		$user_id = $_POST["user_id_holder"];

		$query = "INSERT into tbl_log_user values(null,'$user_id','1');";

		// $query2 = "INSERT into tbl_log_basihan values(null,'$user_id');";		
		
		mysqli_query($connect,$query) or die (mysqli_error($connect));
		// mysqli_query($connect,$query2) or die (mysqli_error($connect));
		mysqli_close($connect);

	}


?>