<?php

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		require 'json_config.php';
		process_report_declined();
	}

	function process_report_declined(){

		global $connect;

		$id = $_POST["var_id_report_crime"];

		$query = " UPDATE tbl_report_crime set status = '3' where report_id = '$id'  ";

		mysqli_query($connect,$query) or die (mysqli_error($connect));
		mysqli_close($connect);

	}


?>