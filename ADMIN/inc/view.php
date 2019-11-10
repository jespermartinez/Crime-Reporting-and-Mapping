<?php

	if(!isset($_SESSION['page'])){

		$_SESSION['page'] = 'home';
	}
	if(isset($_GET['page'])){
		$_SESSION['page'] = $_GET['page'];
	}

	switch ($_SESSION['page']) {

		case 'home':
			include ('home.php');
			break;	

		case 'all_crime_name':
			include ('all_crime_name.php');
			break;

		case 'user_reports':
			include ('user_reports.php');
			break;

		case 'confirm_reports':
			include ('confirm_reports.php');
			break;

		case 'go_to_maps':
			include ('go_to_maps.php');
			break;


		case 'all_crime_reported':
			include ('all_crime_reported.php');
			break;	

		case 'add_suspect':
			include ('add_suspect.php');
			break;


	}

?>