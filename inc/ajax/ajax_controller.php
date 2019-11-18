<?php

class Json_Controller{

	public function __construct(){
		
		$button=null;
		
        if(isset($_GET['btn'])){		   
	       $button = $_GET['btn'];		   
		}
		switch($button){	


			case 'login_process':
		    	$this->login_process();
		    	break;

		    case 'register_process':
		    	$this->register_process();
		    	break;

		    case 'process_crime_category_change':
		    	$this->process_crime_category_change();
		    	break;

		    case 'process_get__report_lat_lng':
		    	$this->process_get__report_lat_lng();
		    	break;

		    case 'btn_confirm_crime_reports':
		    	$this->btn_confirm_crime_reports();
		    	break;	
		   
		    case 'process_get_all_crime_reports':
		    	$this->process_get_all_crime_reports();
		    	break;	

		    case 'process_get_suspect_details_from_modal':
		    	$this->process_get_suspect_details_from_modal();
		    	break;

		    case 'btn_add_suspect':
		    	$this->btn_add_suspect();
		    	break;

		    case 'process_alert_report_crime':
		    	$this->process_alert_report_crime();
		    	break;

		    case 'btn_total_crime_onchange_method':
		    	$this->btn_total_crime_onchange_method();
		    	break;

		    case 'process_notification_show':
		    	$this->process_notification_show();
		    	break;

		    case 'process_get_user_name':
		    	$this->process_get_user_name();
		    	break;

		    case 'specific_crime_onchange_method':
		    	$this->specific_crime_onchange_method();
		    	break;	

		    case 'method_process_for_crime_hotspot':
		    	$this->method_process_for_crime_hotspot();
		    	break;					

		}
	}


	public function login_process(){
		
		include 'ajax_model.php';
		$data = array();
		$error = false;
							
		if(!$error){

			$query = $model->login_process($_POST);

			if($query){
				$data['status'] = 1;
				$data['redirect_page'] = 'admin.php?page=home';
			}else{
				$data['status'] = 'Wrong combination of Email and Password';
			}

		}else{
			$data['redirect_page'] = '?page=add_user';
		}

		echo json_encode($data);
	}

	public function register_process(){
		
		include 'ajax_model.php';
		$data = array();
		$error = false;

/* Filter for Empty fields */

		if( empty($_POST['fname']) || empty($_POST['mname']) || empty($_POST['lname']) || empty($_POST['gender']) || empty($_POST['age']) || empty($_POST['municipality']) || empty($_POST['verification_code']) || empty($_POST['email']) || empty($_POST['password']) ){

			$data['status'] = "Don't leave the fields empty !";
			$error = true;
		}
		
/* Filter for Register Existing */

		 $query_limit = $model->filter_limit_admin_register($_POST['municipality']);
		 if( $query_limit == true ){
		 	$data['status'] = " Maximum numbers of Administrator in every municipality was reach!!! ";
			$error = true;
		 }

/* Filtering for Verification code */

		$query_virify_code = $model->admin_filter_verification_code($_POST['municipality'],$_POST['verification_code']);
		if( $query_virify_code == false ){
			$data['status'] = "Sorry!. We can't process your request because your verification code is incorrect.";
			$error = true;
		}


		if(!$error){

			$query = $model->register_process($_POST);

			if($query){
				$data['status'] = 1;
				$data['redirect_page'] = 'register.php';
			}else{
				$data['status'] = 'There was an error while inserting data';
			}

		}else{
			$data['redirect_page'] = 'register.php';
		}

		echo json_encode($data);
	}



/* End Process Adminstrator */


/* Process Cateory conbo box */
	

	public function process_crime_category_change(){

		include 'ajax_model.php';

		$arr = array();
		$error = false;

		$data['result'] = $model->process_crime_category_change($_POST);

		if($data['result']){
			foreach($data['result'] as $row){
				$arr[] = array('holder_crime_id'=>$row['crime_id'],
								'holder_crime_name'=>$row['crime_name'],								
								'status'=>$row['status']);
			}
		}
		echo json_encode($arr);
	}


/* End Process Cateory conbo box */

/* Process Getting Lat an lng  */

	public function process_get__report_lat_lng(){

		include 'ajax_model.php';

		$arr = array();
		$error = false;

		$data['result'] = $model->process_get__report_lat_lng($_POST);

		if($data['result']){
			foreach($data['result'] as $row){
				$arr[] = array('holder_latitude'=>$row['latitude'],
								'holder_longitude'=>$row['longitude']);
			}
		}
		echo json_encode($arr);
	}



/* End Process Getting Lat an lng  */


	public function btn_confirm_crime_reports(){
		
		include 'ajax_model.php';
		$data = array();
		$error = false;


		if(!$error){

			$query = $model->btn_confirm_crime_reports($_POST);

			if($query){
				$data['status'] = 1;
				$data['redirect_page'] = '?page=user_reports';
			}else{
				$data['status'] = 'There was an error while inserting data';
			}

		}else{
			$data['redirect_page'] = '?page=confirm_reports';
		}

		echo json_encode($data);
	}


	public function process_get_all_crime_reports(){

		include 'ajax_model.php';

		$arr = array();
		$error = false;

/* All crime query */

		$data['result'] = $model->process_get_all_crime_reports($_POST);

		if($data['result']){
			foreach($data['result'] as $row){
				$arr[] = array('user_name'=>$row['fname']." ".$row['lname'],
								'crime_id'=>$row['crime_id'],
								'crime_name'=>$row['crime_name'],
								'location'=>$row['location'],
								'latitude'=>$row['latitude'],
								'longitude'=>$row['longitude'],
								'date_reported'=>$row['date_reported'],
								'time_reported'=>$row['time_reported'],							
								'day_reported'=>$row['day_reported'],
								'suspect_id'=>$row['suspect_id'],
								'municipality'=>$row['municipality'],
								'date_happened'=>$row['date_happened'],
								'time_happened'=>$row['time_happened'],
								'day_happened'=>$row['day_happened']);
			}
		}

/* End all crime query */

/* ALl query police station */

				$data['result_data'] = $model->process_get_all_police_station_data($_POST);

				if($data['result_data']){
					foreach($data['result_data'] as $row){
						$arr[] = array('muni_name'=>$row['municipality_name'],
										'Police_latitude'=>$row['latitude'],
										'Police_longitude'=>$row['longitude'],
										'Police_hotline'=>$row['police_hotline']);
					}
				}
	
/* End query police station */

/* get LAt long in police station  */

				$data['result_P_station'] = $model->process_get_police_station_lat_lng($_POST);

				if($data['result_P_station']){
					foreach($data['result_P_station'] as $row){
						$arr[] = array('ps_latitude_final'=>$row['latitude'],
										'ps_longitude_final'=>$row['longitude']);
					}
				}
		
/* End get LAt long in police station  */		
		echo json_encode($arr);
	}


		public function process_get_suspect_details_from_modal(){

			include 'ajax_model.php';

			$arr = array();
			$error = false;

			$data['result'] = $model->process_get_suspect_details_from_modal($_POST);

			if($data['result']){
				foreach($data['result'] as $row){
					$arr[] = array('fname'=>$row['fname'],
									'mname'=>$row['mname'],
									'lname'=>$row['lname'],
									'age'=>$row['age'],
									'gender'=>$row['gender'],
									'height'=>$row['height'],
									'color'=>$row['color']
								);
				}
			}
			echo json_encode($arr);
		}

		public function btn_add_suspect(){
		
				include 'ajax_model.php';
				$data = array();
				$error = false;


				if(!$error){

					$query = $model->btn_add_suspect($_POST);

					if($query){
						$data['status'] = 1;
						$data['redirect_page'] = '?page=all_crime_reported';
					}else{
						$data['status'] = 'There was an error while inserting data';
					}

				}else{
					$data['redirect_page'] = '?page=add_suspect&id='+$_POST['holder_suspect_val'];
				}

				echo json_encode($data);
		}


		public function process_alert_report_crime(){

			include 'ajax_model.php';

			$arr = array();
			$error = false;

			$data['result'] = $model->process_alert_report_crime($_POST);

			if($data['result']){
				foreach($data['result'] as $row){
					$arr[] = array('holder_value'=>$row['report_id']);
				}
			}
			echo json_encode($arr);
		}


		public function btn_total_crime_onchange_method(){

			include 'ajax_model.php';

			$arr = array();
			$error = false;

			$data['result'] = $model->btn_total_crime_onchange_method($_POST);

			if($data['result']){
				foreach($data['result'] as $row){
					$arr[] = array('holder_date_var'=>$row['date_happened']);
				}
			}
			echo json_encode($arr);
		}


		public function process_notification_show(){

			include 'ajax_model.php';

			$arr = array();
			$error = false;

			$data['result'] = $model->process_notification_show($_POST);

			if($data['result']){
				foreach($data['result'] as $row){
					$arr[] = array('report_id'=>$row['report_id'],
									'user_id'=>$row['user_id'],
									'crime_id'=>$row['crime_id'],
									'date_reported'=>$row['date_reported'],
									'time_reported'=>$row['time_reported'],
									'day_reported'=>$row['day_reported']);
				}
			}

			echo json_encode($arr);
		}


		public function process_get_user_name(){

			include 'ajax_model.php';

			$arr = array();
			$error = false;

			
			$data['result'] = $model->process_get_user_name($_POST);

			if($data['result']){
				foreach($data['result'] as $row){
					$arr[] = array('user_id_2'=>$row['user_id'],
									'fname'=>$row['fname'],
									'lname'=>$row['lname']);
			

					}
			}


			echo json_encode($arr);
		}


		public function specific_crime_onchange_method(){

			include 'ajax_model.php';

			$arr = array();
			$error = false;

			
			$data['result_6'] = $model->specific_crime_onchange_method_6($_POST);

			if($data['result_6']){
				foreach($data['result_6'] as $row){
					$arr[] = array('crime_6'=>$row['crime_name']);
					}
			}


			$data['result_8'] = $model->specific_crime_onchange_method_8($_POST);

			if($data['result_8']){
				foreach($data['result_8'] as $row){
					$arr[] = array('crime_8'=>$row['crime_name']);
					}
			}


			$data['result_9'] = $model->specific_crime_onchange_method_9($_POST);

			if($data['result_9']){
				foreach($data['result_9'] as $row){
					$arr[] = array('crime_9'=>$row['crime_name']);
					}
			}


			$data['result_11'] = $model->specific_crime_onchange_method_11($_POST);

			if($data['result_11']){
				foreach($data['result_11'] as $row){
					$arr[] = array('crime_11'=>$row['crime_name']);
					}
			}


			$data['result_12'] = $model->specific_crime_onchange_method_12($_POST);

			if($data['result_12']){
				foreach($data['result_12'] as $row){
					$arr[] = array('crime_12'=>$row['crime_name']);
					}
			}


			$data['result_16'] = $model->specific_crime_onchange_method_16($_POST);

			if($data['result_16']){
				foreach($data['result_16'] as $row){
					$arr[] = array('crime_16'=>$row['crime_name']);
					}
			}


			$data['result_17'] = $model->specific_crime_onchange_method_17($_POST);

			if($data['result_17']){
				foreach($data['result_17'] as $row){
					$arr[] = array('crime_17'=>$row['crime_name']);
					}
			}


			$data['result_20'] = $model->specific_crime_onchange_method_20($_POST);

			if($data['result_20']){
				foreach($data['result_20'] as $row){
					$arr[] = array('crime_20'=>$row['crime_name']);
					}
			}


			$data['result_24'] = $model->specific_crime_onchange_method_24($_POST);

			if($data['result_24']){
				foreach($data['result_24'] as $row){
					$arr[] = array('crime_24'=>$row['crime_name']);
					}
			}


			$data['result_25'] = $model->specific_crime_onchange_method_25($_POST);

			if($data['result_25']){
				foreach($data['result_25'] as $row){
					$arr[] = array('crime_25'=>$row['crime_name']);
					}
			}


			echo json_encode($arr);
		}



		public function method_process_for_crime_hotspot(){

			include 'ajax_model.php';

			$arr = array();
			$error = false;

			
			$data['result'] = $model->method_process_for_crime_hotspot($_POST);

			if($data['result']){
				foreach($data['result'] as $row){
					$arr[] = array('Location'=>$row['location'],
									'Time_happened'=>$row['time_happened']);
					}
			}


			echo json_encode($arr);
		}


		
    
 }

$contros = new Json_Controller();

?>