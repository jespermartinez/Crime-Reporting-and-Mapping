<?php
class Controller{
    //no json
	public function __construct(){
		$model = new model();


/*
        if(isset($_POST['login_btn'])){
           $sucess =  $model->login($_POST);
            if($sucess == TRUE){
                    echo '<script>document.location.href="admin.php?page=home"</script>';
            }else{
            	$_POST['error']['login'] = 'Invalid Username/Password!';
            }
        }
*/
        
        if(isset($_GET['logout'])){
            
             if(session_destroy()){
                 echo '<script>document.location.href="index.php"</script>';
             }
                
        }


        if(isset($_POST['btn_confirm_from_decline'])){
           $sucess =  $model->process_for_decline_reports($_POST);
        }




// // Process for Municipal

//         if(isset($_POST['municipal_deactivate_button'])){
//             $sucess =  $model->municipal_Deactivate_process($_POST);
//         }

//         if(isset($_POST['municipal_activate_button'])){
//             $sucess =  $model->municipal_Activate_process($_POST);
//         }


// // Process for Crime type

//         if(isset($_POST['crime_type_deactivate_button'])){
//             $sucess =  $model->deactivate_crime_name($_POST);
//         }
//         if(isset($_POST['crime_type_activate_button'])){
//             $sucess =  $model->activate_crime_name($_POST);
//         }

// // Process for Crime Name

//         if(isset($_POST['managcrime_name_deactivate_button'])){
//             $sucess =  $model->crime_name_Deactivate_process($_POST);
//         }

//          if(isset($_POST['manage_crime_name_activate_button'])){
//             $sucess =  $model->crime_name_activate_process($_POST);
//         }

// // Process for Barangay

//          if(isset($_POST['brgy_deactivate_button'])){
//             $sucess =  $model->barangay_deactivate_process($_POST);
//         }

//          if(isset($_POST['brgy_activate_button'])){
//             $sucess =  $model->barangay_activate_process($_POST);
//         }

// // Process for manage Crime

//         if(isset($_POST['manage_crime_deactivate_button'])){
//             $sucess =  $model->process_manage_crime_deactivate($_POST);
//         }

//         if(isset($_POST['manage_crime_activate_button'])){
//             $sucess =  $model->process_manage_crime_activate($_POST);
//         }

// // Process for  user

//          if(isset($_POST['user_deactivate_button'])){
//             $sucess =  $model->user_deactivate_process($_POST);
//         }

//         if(isset($_POST['user_activate_button'])){
//             $sucess =  $model->user_activate_process($_POST);
//         }

// //Proceess for Purok

//          if(isset($_POST['prk_deactivate_button'])){
//             $sucess =  $model->purok_deactivate_process($_POST);
//         }

//         if(isset($_POST['prk_activate_button'])){
//             $sucess =  $model->purok_activate_process($_POST);
//         }

// //Proceess for Administrator

//          if(isset($_POST['administrator_deactivate_button'])){
//             $sucess =  $model->administrator_deactivate_process($_POST);
//         }

//         if(isset($_POST['administrator_activate_button'])){
//             $sucess =  $model->administrator_activate_process($_POST);
//         }

	}	
}
$contro = new Controller();
?>

<?php
//ADD//




?>
