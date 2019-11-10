<?php

		$dbname = 'm_c_m_s';
		$dbhost = 'localhost';
		$dbuser = 'root'; 
		$dbpass = '';

		$con = mysql_connect($dbhost,$dbuser,$dbpass);
		mysql_select_db($dbname, $con);

		session_start();

?>