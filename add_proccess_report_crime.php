<?php

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		require 'json_config.php';
		add_crime_process();
	}

	function add_crime_process(){

		global $connect;

		$var_municipal = $_POST["var_municipal"];
		$var_date = $_POST["var_date"];
		$var_time = $_POST["var_time"];
		$var_day = $_POST["var_day"];
		$var_latitude = $_POST["var_latitude"];
		$var_longitude = $_POST["var_longitude"];
		$var_user_id = $_POST["var_user_id"];
		$crime_name = $_POST["crime_name"];

		$query = "INSERT into tbl_report_crime values(null,'$var_user_id','$crime_name',' ','$var_latitude','$var_longitude','$var_time','$var_date',' ','$var_day','$var_municipal',' ',' ',' ','0');";

		mysqli_query($connect,$query) or die (mysqli_error($connect));
		mysqli_close($connect);

	}


?>