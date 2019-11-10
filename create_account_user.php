<?php

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		require 'json_config.php';
		create_account_process();
	}

	function create_account_process(){

		global $connect;

		$fname = $_POST["fname"];
		$mname = $_POST["mname"];
		$lname = $_POST["lname"];
		$age = $_POST["age"];
		$gender = $_POST["gender"];
		$address = $_POST["address"];
		$contact = $_POST["contact"];
		$username = $_POST["username"];
		$password = $_POST["password"];
		$email_add = $_POST["email_address"];

		$query = "INSERT into tbl_user values(null,'$fname','$mname','$lname','$age','$gender','$address','$contact','$username','$password','$email_add','1');";

		mysqli_query($connect,$query) or die (mysqli_error($connect));
		mysqli_close($connect);

	}


?>