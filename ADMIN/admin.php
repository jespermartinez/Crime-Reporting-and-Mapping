<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />
	
	<title> Admin Crime | Dashboard</title>
	

	<link rel="stylesheet" href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/neon-core.css">
	<link rel="stylesheet" href="assets/css/neon-theme.css">
	<link rel="stylesheet" href="assets/css/neon-forms.css">
	<link rel="stylesheet" href="assets/css/custom.css">


	<script src="assets/js/jquery-1.11.0.min.js"></script>




	
	<!-- js -->
		<!-- <script src="js/jquery-1.11.1.min.js"></script> -->


	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
	<!-- <script scr="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
	<!-- <script scr="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

		
	
</head>
	
		<?php include('inc/config.php'); ?>
		<?php include('inc/model.php'); ?>
		<?php include('inc/controller.php'); ?>

<body class="page-body  page-fade" >

	<?php   

            if(isset($_SESSION['adminlogged']) ){

              
            }else{

              echo '<script>document.location.href="index.php"</script>';
                
            }  

    ?>




<div class="page-container">

<!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->	
	
	<div class="sidebar-menu">
		
			
		<header class="logo-env">
			
<!-- logo -->

			<div class="logo">
				<a href="admin.php?page=home">
					<img src="assets/images/logo_logo_final.png" width="120" height="90"  alt="" style="margin-left: 20px;margin-top: -20px" />
				</a>
			</div>
			
<!-- logo collapse icon -->
						
			<div class="sidebar-collapse">
				<a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
					<i class="entypo-menu"></i>
				</a>
			</div>
			
<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->

			<div class="sidebar-mobile-menu visible-xs">
				<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
					<i class="entypo-menu"></i>
				</a>
			</div>
			
		</header>
				
		
		
				
				
		<ul id="main-menu" class="">
			<!-- add class "multiple-expanded" to allow multiple submenus to open -->
			<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->


<!-- Search Bar -->

			<li id="search">
				<div class="search-input" ></div>
				<!-- <form method="get" action="">
					<input type="text" name="q" class="search-input" placeholder=""/>
					<button type="submit">
						<i class="entypo-search"></i>
					</button> 
				</form> -->
			</li>
			
<!-- Home -->	
					
			<li>
				<a href="admin.php?page=home">
					<i class="entypo-home"></i>
					<span>Home</span>
				</a>
			</li>

<!-- Manage Administrator-->		

			<!-- <li>
				<a href="">
					<i class="entypo-user"></i>
					<span>Manage Administrator</span>
				</a>
				 <ul>
					<li>
						<a href="admin.php?page=add_administrator">
							<span>Add Administrator</span>
						</a>
					</li>
					<li>
						<a href="admin.php?page=List_of_administrator">
							<span>List of Administrator</span>
						</a>
					</li>
				</ul> 
			</li> -->

<!-- types of Crime-->

			<li>
				<a href="admin.php?page=all_crime_name">
					<i class="entypo-list-add"></i>
					<span>List of Crime</span>
				</a>
			</li>

<!-- All crime Reported -->

			<li>
				<a href="admin.php?page=all_crime_reported">
					<i class="entypo-database"></i>
					<span>List of Reported Crime</span>
				</a>
			</li>

<!-- Suspect list -->

			<li>
				<a href="" data-toggle="modal" data-target="#suspect_list_modal">
					<i class="entypo-cc-by"></i>
					<span>Suspects List</span>
				</a>
			</li>

<!-- Users list -->

			<li>
				<a href="" data-toggle="modal" data-target="#users_list_modal">
					<i class="entypo-users"></i>
					<span>Users List</span>
				</a>
			</li>			

<!-- USer Reports -->

			<?php
				$count_new_message=0;
				$query = $model->read_tbl_reported_crime_from_admin_show_msg($_SESSION['adminlogged']['municipality']);  //FROM MODEL
                    if( $result = $model->fetch($query) ){
                      do{
                      	$count_new_message++;
                      }while($result = $model->fetch($query));
                   }
			?>
	
			<li>
				<a href="admin.php?page=user_reports">
					<i class="entypo-mobile"></i>
					<span>Crime Reports</span>
				</a>

			</li>

				<?php  if( $count_new_message != 0){       ?>

						<div style="margin-top: -40px;margin-left: 31px">
							<span class="badge badge-secondary"><?php echo $count_new_message ?></span>
						</div>

				<?php  }   ?>


		</ul>

		
				
	</div>	

		

<!--  Upper body START..  -->

<div class="main-content">
		
<div class="row">
	
	<!-- Profile Info and Notifications -->
	<div class="col-md-6 col-sm-8 clearfix">
		
		<ul class="user-info pull-left pull-none-xsm">
		
<!-- Profile Info -->
			<li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->
				
				<a href="admin.php?page=home" class="dropdown-toggle" data-toggle="dropdown">
					<img src="assets/images/admin_prof.png" alt="" class="img-circle" width="44"/>
					
					<b><?php echo $_SESSION['adminlogged']['fname'] ?>&nbsp;&nbsp;<?php echo $_SESSION['adminlogged']['lname'] ?></b>

					| <i>Police Chief Inspector</i> of <b><?php echo $_SESSION['adminlogged']['municipality'] ?></b>  

				</a>
				
				<ul class="dropdown-menu">
					
<!-- Reverse Caret -->
					<li class="caret"></li>
					
<!-- Profile sub-links -->
					<li>
						<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-3">
							<i class="entypo-cog"></i>
							Account Settings
						</a>
					</li>
									
				</ul>
			</li>
		
		</ul>
				
		<ul class="user-info pull-left pull-right-xs pull-none-xsm">

			<?php
				$count_new_message=0;
				$query = $model->read_tbl_reported_crime_from_admin_show_msg($_SESSION['adminlogged']['municipality']);  //FROM MODEL
                    if( $result = $model->fetch($query) ){
                      do{
                      	$count_new_message++;
                      }while($result = $model->fetch($query));
                   }

			?>

			
		</ul>
	
	</div>
	
<!-- Raw Links -->
	<div class="col-md-6 col-sm-4 clearfix hidden-xs">
		
		<ul class="list-inline links-list pull-right">

			
			<li class="sep"></li>
						
			<!-- <li>
				<a href="#" data-toggle="chat" data-animate="1" data-collapse-sidebar="1">
					<i class="entypo-chat"></i>
					Chat
					
					<span class="badge badge-success chat-notifications-badge is-hidden">0</span>
				</a>
			</li> -->
			
			<li class="sep"></li>
			
			<li>
				<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-2" class="bg"> Log Out <i class="entypo-logout right"></i>    </a>
				
			</li>
		</ul>
		
	</div>
	
</div>

<!--  Upper body End...  -->




<!--   body  -->

	<?php  include('inc/view.php'); ?>

<!--  End body  -->




<!-- Footer -->
<footer class="main">
	
		
	&copy; 2018-2019 <strong>Crime</strong> Repoting and Mapping System of Davao Oriental with Global Positioning System (GPS) by <a href="http://laborator.co" target="_blank">DORSU-BC | <strong>Ges-MartZ</strong> | Developer</a>
	
</footer>	</div>
	
	



<!-- Chat Histories -->

</div>






<!-- Sample Modal (Default skin) -->

			<!-- <div class="modal fade" id="sample-modal-dialog-1">
				<div class="modal-dialog">
					<div class="modal-content">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title"><b>Notice</b></h4>
						</div>
						
						<div class="modal-body">
							<p>	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Are you sure do you want to Logout ? </p>
						</div>
						
						<div class="modal-footer">

							<button type="button" class="btn btn-default" data-dismiss="modal">No</button>

							<a href="index.php?logout" class="btn btn-primary">Yes</a>
					
						</div>
					</div>
				</div>
			</div> -->



	<!-- Modal For view suspect -->

                    <div class="modal fade" id="suspect_modal" role="dialog" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);">
                            <div class="modal-dialog" style="width:500px">
                              <div class="modal-content">
                                <form method="post"> 
	                                <div class="modal-header">
	                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                                  <h4 class="modal-title"><b>Suspect Details</b></h4>
	                                </div>

	                                <input type="hidden" value="" name="suspect_value_id_bases" id="suspect_value_id_bases">  
                                          
	                                <div class="modal-body">

	                                	<p style="font-size: 15px;text-align: center;" id="id_filter_table">No suspects list; this crime is Under Investigation</p>	

	                                    <table class="table table-bordered datatable" id="table_1">
	                                           	                                            	
	                                              <tr class="odd gradeX">
	                                                <td style="text-align: center" id="tbl_suspect_id">Column #</td>
	                                                <td style="text-align: center" id="fname">First Name</td>
	                                                <td style="text-align: center" id="mname">Middle Name</td>
	                                                <td style="text-align: center" id="lname">Last Name</td>
	                                                <td style="text-align: center" id="age">Age</td>
	                                                <td style="text-align: center" id="gender">Gender</td>
	                                                <td style="text-align: center" id="height">Height</td>
	                                                <td style="text-align: center" id="color">Color</td>                               
	                                              </tr>
	                                   
	                                    </table>
	                                   
	                                   
	                                </div>
	                                
	                                <div class="modal-footer">

	                                 	
	                                  <a href="" id="anchor_id" class="btn btn-default" onclick="javascript:function_suspect_pass_id()"><i class="entypo-user-add"></i> Add </a>

	                                  <!-- <button  class="btn btn-default"><i class="entypo-pencil"></i> Edit </button> -->

	                                  <button  class="btn btn-primary" data-dismiss="modal"> Close </button>

	                                  <script type="text/javascript">
	           							
	                                  		function function_suspect_pass_id(){

	                                  			 var id = document.getElementById("suspect_value_id_bases").value;

	                                  			 $('#anchor_id').attr('href','admin.php?page=add_suspect&id='+id);	
	                                  			 
	                                  		}

	                                  </script>                                
	                              
	                                </div>

                                </form> 

                              </div>
                            </div>
                    </div>           

<!-- End Modal For view suspect -->


<!-- Logout Modal Sample Modal (Skin inverted) -->
				<div class="modal invert fade" id="sample-modal-dialog-2">
					<div class="modal-dialog" style="width:400px">
						<div class="modal-content">
							
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title"><b>Notice</b></h4>
							</div>
							
							<div class="modal-body">
								<p style="font-size: 15px;color: white;margin-left: 60px"> Are you sure you want to Logout ? </p>
							</div>
							
							<div class="modal-footer">
								
								<button type="button" class="btn btn-default" data-dismiss="modal">No</button>

								<a href="index.php?logout" class="btn btn-default">Yes</a>

								
							</div>
						</div>
					</div>
				</div>

<!-- Account Modal Sample Modal (Skin gray) -->

				<div class="modal gray fade" id="sample-modal-dialog-3">
					<div class="modal-dialog">
						<div class="modal-content">
							
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title"><b>Account Settings</b></h4>
							</div>
							
							<div class="modal-body">
								<!-- <p></p> -->

								  <?php
						                  
						                  $count=1;
						                  $query = $model->read_tbl_admin_from_account_settings($_SESSION['adminlogged']['admin_id'],$_SESSION['adminlogged']['municipality']); 
						                    if( $result = $model->fetch($query) ){

						                    	$fname_admin = $result['fname'];
						                    	$mname_admin = $result['mname'];
						                    	$lname_admin = $result['lname'];
						                    	$gender_admin = $result['gender'];
						                    	$age_admin = $result['age'];
						                    	$email_admin = $result['email'];
						                    	$tl_hotline_admin = $result['police_hotline'];

						                    }

						          ?>

								<table class="table table-bordered datatable" id="table-1" >
						            <thead>
						              <tr>
						                <th style="text-align: center">First Name</th>
						                <th style="text-align: center">Middle Name</th>
						                <th style="text-align: center">Last name</th>
						                <th style="text-align: center">Gender</th>
						                <th style="text-align: center">Age</th>
						                <th style="text-align: center">Email</th>
						               					       
						              </tr>
						            </thead>
						            <tbody>
						          
						              <tr class="odd gradeX">
						                <td style="text-align: center"><?php echo $fname_admin  ?></td>
						                <td style="text-align: center"><?php echo $mname_admin  ?></td>
						                <td style="text-align: center"><?php echo $lname_admin  ?></td>
						                <td style="text-align: center"><?php echo $gender_admin  ?></td>
						                <td style="text-align: center"><?php echo $age_admin  ?></td>
						                <td style="text-align: center"><?php echo $email_admin  ?></td>					                   
						              </tr>
						                  
						            </tbody>   

						        </table>

						        	<br>
							        <button type="button" data-toggle="modal" data-dismiss="modal" data-target="#sample-modal-dialog-5" class="btn btn-default btn-sm btn-icon icon-left" style="color:green" >
						                      <i class="entypo-pencil"></i> 
						                            Change
						             </button>
					            
					            	<label style="margin-left: 10px">Telephone / Hotline # : </label>&nbsp;<label><b><?php echo $tl_hotline_admin  ?></b></label>

							</div>
							
							<div class="modal-footer">
								<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
								<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
							</div>
						</div>
					</div>
				</div>

<!-- Change Account Settings  -->

				<div class="modal gray fade" id="sample-modal-dialog-5">
					<div class="modal-dialog">
						<div class="modal-content">
							
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title"><b>Edit Account</b></h4>
							</div>
							
							<div class="modal-body">
			
						          <label for="field-1">First Name</label>
						            
			
					              <input style="text-align: center;" type="text" class="form-control" onkeypress="isInputnumber(event)" id="fname" value="<?php echo $fname_admin  ?>" required="">
						  
		
					              <label style="margin-top: 5px">Middle Name</label>
					            
					 
					              <input style="text-align: center;" type="text" class="form-control" onkeypress="isInputnumber(event)" id="mname" value="<?php echo $mname_admin  ?>"  required="">

					     
								  <label style="margin-top: 5px">Last Name</label>
					            
					 
					              <input style="text-align: center;" type="text" class="form-control" onkeypress="isInputnumber(event)" id="lname" value="<?php echo $lname_admin  ?>" required="">


					              <label style="margin-top: 5px">Gender</label>
					            
					 
					              <input style="text-align: center;" type="text" class="form-control" onkeypress="isInputnumber(event)" id="gender" value="<?php echo $gender_admin  ?>"  required="">


					              <label style="margin-top: 5px">Age</label>
					            
					 
					              <input style="text-align: center;" type="text" class="form-control" onkeypress="isInputLetter(event)" id="age" value="<?php echo $age_admin  ?>" required="">


					              <label style="margin-top: 5px">Email</label>
					            
					 
					              <input style="text-align: center;" value="<?php echo $email_admin  ?>" type="text" class="form-control" id="email"  required="">


					              <label style="margin-top: 5px">Telephone / Hotline #</label>
					            
					 
					              <input style="text-align: center;" value="<?php echo $tl_hotline_admin  ?>" type="text" class="form-control" onkeypress="isInputLetter(event)" id="tl_hotline_no"  required="">	

								  
							</div>
							
							<div class="modal-footer">
								<button type="button" class="btn btn-primary" data-toggle="modal" data-dismiss="modal" data-target="#sample-modal-dialog-3">Back</button>
								<button type="button" class="btn btn-primary" id="btn_change_admin_account">Save changes</button>
							</div>
						</div>
					</div>
				</div>


<!-- Modal of Suspect List  -->

				<div class="modal gray fade" id="suspect_list_modal">
					<div class="modal-dialog" style="width:1000px">
						<div class="modal-content">
							
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title"><b>List of Suspects</b></h4>
							</div>
							
							<div class="modal-body">
								
								<table class="table table-bordered datatable" id="table-1">
						            <thead>
						              <tr>
						                <th style="text-align: center;background-color: white"># of Column</th>
						                <th style="text-align: center;background-color: white">Crime Invloved</th>
						                <th style="text-align: center;background-color: white">First Name</th>
						                <th style="text-align: center;background-color: white">Middle Name</th>
						                <th style="text-align: center;background-color: white">Last Name</th>
						                <th style="text-align: center;background-color: white">Age</th>
						                <th style="text-align: center;background-color: white">Gender</th>
						                <th style="text-align: center;background-color: white">Height</th>
						                <th style="text-align: center;background-color: white">Color</th>
						              </tr>
						            </thead>
						            <tbody>

						             <?php

						             	$count=1;
						             	$tester=$_SESSION['adminlogged']['municipality'];
						                  $query = $model->read_tbl_suspect_from_list_of_suspect_display(); 
						                    if( $result = $model->fetch($query) ){
						                     	do{

						                    $query_2 = $model->read_tbl_crime_report_from_list_suspect_disp($result['report_crime_id']);
						                    	if( $result_2 = $model->fetch($query_2)){
						                    		$holder_munic = $result_2['municipality'];
						                    		$crime_id = $result_2['crime_id'];
						                    	}

						                    $query_3 = $model->read_tbl_crime_from_suspect_list_display($crime_id);	 
						                    	if( $result_3 = $model->fetch($query_3)){
						                    		$crime_name_holder = $result_3['crime_name'];
						                    	}	

						                  		if( $holder_munic == $tester ){
						              ?> 
					              

						              <tr class="odd gradeX">
						                <td style="text-align: center"><?php echo $count++ ?></td>
						                <td style="text-align: center"><?php echo $crime_name_holder  ?></td>
						                <td style="text-align: center"><?php echo $result['fname'] ?></td>
						                <td style="text-align: center"><?php echo $result['mname'] ?></td>
						                <td style="text-align: center"><?php echo $result['lname'] ?></td>
						                <td style="text-align: center"><?php echo $result['age'] ?></td>
						                <td style="text-align: center"><?php echo $result['gender'] ?></td>
						                <td style="text-align: center"><?php echo $result['height'] ?></td>
						                <td style="text-align: center"><?php echo $result['color'] ?></td>
						                
						              </tr>


						             <?php

						             			}
						             			
						             			}while($result = $model->fetch($query));
						                   }						                     

						              ?> 
						                  
						            </tbody>

						           
						        </table>

									         	  
							</div>
							
							<div class="modal-footer">

								<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

							</div>
						</div>
					</div>
				</div>

<!-- Modal of Users List  -->

				<div class="modal gray fade" id="users_list_modal" >
					<div class="modal-dialog" style="width:1000px">
						<div class="modal-content">
							
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title"><b>List of Users</b></h4>
							</div>
							
							<div class="modal-body">
								
								<table class="table table-bordered datatable" id="users_table_modal">
						            <thead>
						              <tr>
						                <th style="text-align: center;background-color: white"># of Column</th>
						                <th style="text-align: center;background-color: white">First Name</th>
						                <th style="text-align: center;background-color: white">Middle Name</th>
						                <th style="text-align: center;background-color: white">Last Name</th>
						                <th style="text-align: center;background-color: white">Age</th>
						                <th style="text-align: center;background-color: white">Gender</th>
						                <th style="text-align: center;background-color: white">Address</th>
						                <th style="text-align: center;background-color: white">Contact #</th>						               
						                <th style="text-align: center;background-color: white">Email Address</th>
						                <th style="text-align: center;background-color: white">Password</th>
						              </tr>
						            </thead>
						            <tbody>

						             <?php

						             	$count=1;
						                  $query = $model->read_tbl_users_from_user_list_display(); 
						                    if( $result = $model->fetch($query) ){
						                     	do{
						                  
						              ?> 
					              
						              <tr class="odd gradeX">
						                <td style="text-align: center"><?php  echo $count++  ?></td>
						                <td style="text-align: center"><?php  echo $result['fname']  ?></td>
						                <td style="text-align: center"><?php  echo $result['mname']  ?></td>
						                <td style="text-align: center"><?php  echo $result['lname']  ?></td>
						                <td style="text-align: center"><?php  echo $result['age']  ?></td>
						                <td style="text-align: center"><?php  echo $result['gender']  ?></td>
						                <td style="text-align: center"><?php  echo $result['address']  ?></td>
						                <td style="text-align: center"><?php  echo $result['contact_no']  ?></td>						           
						                <td style="text-align: center"><?php  echo $result['email_address']  ?></td>
						                <td style="text-align: center"><?php  echo $result['password']  ?></td>
						              </tr>


						            <?php

						                      	}while($result = $model->fetch($query));
						                   }
			                     
						              ?>
						                  
						            </tbody>

						           
						        </table>
						         
							</div>
							
							<div class="modal-footer">

								<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

							</div>
						</div>
					</div>

<!-- 
					<script type="text/javascript">
		                    var responsiveHelper;
		                    var breakpointDefinition = {
		                        tablet: 1024,
		                        phone : 480
		                    };
		                    var tableContainer;

		                      jQuery(document).ready(function($)
		                      {
		                        tableContainer = $("#users_table_modal");
		                        
		                        tableContainer.dataTable({
		                          "sPaginationType": "bootstrap",
		                          "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
		                          "bStateSave": true,
		                          

		                            // Responsive Settings
		                            bAutoWidth     : false,
		                            fnPreDrawCallback: function () {
		                                // Initialize the responsive datatables helper once.
		                                if (!responsiveHelper) {
		                                    responsiveHelper = new ResponsiveDatatablesHelper(tableContainer, breakpointDefinition);
		                                }
		                            },
		                            fnRowCallback  : function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
		                                responsiveHelper.createExpandIcon(nRow);
		                            },
		                            fnDrawCallback : function (oSettings) {
		                                responsiveHelper.respond();
		                            }
		                        });
		    
		                      $(".dataTables_wrapper select").select2({
		                        minimumResultsForSearch: -1
		                      });
		                    });
                	</script> -->

				</div>	

<!-- Modal of Users List  -->

				<div class="modal gray fade" id="id_modal_reports_decline" style="margin-top: 200px" >
					<div class="modal-dialog" style="width:400px">
						<div class="modal-content">	
							
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title"><b>Decline</b></h4>
							</div>
							
							<div class="modal-body">
								
								<p style="margin-left: 55px;margin-top: 15px"><b>Are you sure you want to decline this report ? </b></p>
						         
							</div>
							
							<div class="modal-footer">

								<form method="post">
									<input type="hidden" value="" id="holder_decline_reports_id" name="holder_decline_reports_id">
									
									<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

									<button class="btn btn-primary"  name="btn_confirm_from_decline" >Confirm</button>
								</form>	

							</div>
						</div>
					</div>
				</div>


		


	<link rel="stylesheet" href="assets/js/jvectormap/jquery-jvectormap-1.2.2.css">
	<link rel="stylesheet" href="assets/js/rickshaw/rickshaw.min.css">

	<!-- Bottom Scripts -->
	<script src="assets/js/gsap/main-gsap.js"></script>
	<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/joinable.js"></script>
	<script src="assets/js/resizeable.js"></script>
	<script src="assets/js/neon-api.js"></script>
	<script src="assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="assets/js/jvectormap/jquery-jvectormap-europe-merc-en.js"></script>
	<script src="assets/js/jquery.sparkline.min.js"></script>
	<script src="assets/js/rickshaw/vendor/d3.v3.js"></script>
	<script src="assets/js/rickshaw/rickshaw.min.js"></script>
	<script src="assets/js/raphael-min.js"></script>
	<script src="assets/js/morris.min.js"></script>
	<script src="assets/js/toastr.js"></script>
	<script src="assets/js/neon-chat.js"></script>
	<script src="assets/js/neon-custom.js"></script>
	<script src="assets/js/neon-demo.js"></script>

	<link rel="stylesheet" href="assets/js/datatables/responsive/css/datatables.responsive.css">
	<link rel="stylesheet" href="assets/js/select2/select2-bootstrap.css">
	<link rel="stylesheet" href="assets/js/select2/select2.css">

	<!-- Bottom Scripts -->
	<script src="assets/js/jquery.dataTables.min.js"></script>
	<script src="assets/js/datatables/TableTools.min.js"></script>
	<script src="assets/js/dataTables.bootstrap.js"></script>
	<script src="assets/js/datatables/jquery.dataTables.columnFilter.js"></script>
	<script src="assets/js/datatables/lodash.min.js"></script>
	<script src="assets/js/datatables/responsive/js/datatables.responsive.js"></script>
	<script src="assets/js/select2/select2.min.js"></script>

	<!-- Bottom Scripts -->
	<!-- <script src="assets/js/bootstrap-tagsinput.min.js"></script> -->
	<script src="assets/js/typeahead.min.js"></script>
	<script src="assets/js/selectboxit/jquery.selectBoxIt.min.js"></script>
	<script src="assets/js/bootstrap-datepicker.js"></script>
	<script src="assets/js/bootstrap-timepicker.min.js"></script>
	<script src="assets/js/bootstrap-colorpicker.min.js"></script>
	<script src="assets/js/daterangepicker/moment.min.js"></script>
	<script src="assets/js/daterangepicker/daterangepicker.js"></script>
	<script src="assets/js/jquery.multi-select.js"></script>
	<script src="assets/js/icheck/icheck.min.js"></script>

	<link rel="stylesheet" href="assets/js/select2/select2-bootstrap.css">
	<link rel="stylesheet" href="assets/js/select2/select2.css">
	<link rel="stylesheet" href="assets/js/selectboxit/jquery.selectBoxIt.css">
	<link rel="stylesheet" href="assets/js/daterangepicker/daterangepicker-bs3.css">
	<link rel="stylesheet" href="assets/js/icheck/skins/minimal/_all.css">
	<link rel="stylesheet" href="assets/js/icheck/skins/square/_all.css">
	<link rel="stylesheet" href="assets/js/icheck/skins/flat/_all.css">
	<link rel="stylesheet" href="assets/js/icheck/skins/futurico/futurico.css">
	<link rel="stylesheet" href="assets/js/icheck/skins/polaris/polaris.css">
	<script src="assets/js/jquery.inputmask.bundle.min.js"></script>


	<!-- <script src="json/jquery-1.11.0.js"></script> -->
	<!-- <script src="json/jquery-1.11.3.min.js"></script> -->
	<script src="json/add_edit_json.js"></script>
	<script src="json/gentel.js"></script>


	<!-- <script src="assets/js/neon-charts.js"></script> -->

	<script src="chart/line-chart.js"></script>
	<script src="chart/pie-chart.js"></script>
	<script src="chart/specific_bar_chart.js"></script>



		<script>
   
			   function isInputLetter(evt){

			      var hold = String.fromCharCode(evt.which);

			      if((/[a-z A-Z*!@#$%^&*()_/\=+{},?";'"|]/.test(hold))){

			        evt.preventDefault();

			      }
			  }

			  function isInputSymbol(evt){
			      var hold = String.fromCharCode(evt.which);

			      if((/[*!@#$%^&*()_/\-=+{}?";.'"|]/.test(hold))){

			        evt.preventDefault();

			      }
			  }

			  function isInputnumber(evt){

			      var hold = String.fromCharCode(evt.which);

			      if((/[0-9*!@#$%^&()_/\-=+{},?";.'"|]/.test(hold))){

			        evt.preventDefault();

			      }
			  }

			  function Username(evt){

			      var hold = String.fromCharCode(evt.which);

			      if((/[*!#$%^&*()_/\-=+{},?";'"|]/.test(hold))){

			        evt.preventDefault();

			      }
			  }

		</script>

</body>


	<!-- Real Time alert Process -->

		<script type="text/javascript">

			function baseUrlAction(){
		     	return location.protocol + "//" + location.host + "/mobile_crime_reporting_and_mapping_system/ADMIN/inc/ajax/ajax_controller.php";
			}

			
				setInterval(function(){

					var holder_tester = "";

					$.ajax({
						        type : 'POST',
						        url : baseUrlAction() + '?btn=process_alert_report_crime',
						        context : this,
						        dataType : 'json',
						        data : {
						          // holder_muni : $('#municipality').val(),
						          // holder_date : $('#date_holder').val()
						        },
						        error : function(ts){
						          alert(console.log(ts.responseText));
						        },
						        success : function(data){

						        	if(jQuery.isEmptyObject(data)){
			           						
						        			
						          	}else{
							         
						          		beep.play();					          		

						          	}


								}

					})

					console.log('F - output = ');

				
					//document.getElementById("ssss").value = "1";	

					//document.getElementById("free_play_first_digit").contentEditable = "false";
					// var hhhh = document.getElementById("free_play_first_digit").innerHTML = "3";

					// var spanToChance = document.getElementById("#free_play_first_digit");

					// 	spanToChange.innerHTML = 1; 

					// for(var x = 0; x < 55; x++){

					// 	document.getElementById("free_play_first_digit").innerHTML = "1";
					

					// }

					// document.getElementById("free_play_first_digit").innerHTML = "1";
					

					// console.log("Hello World...");
		   //          console.log("WOW");
		   //          console.log("That's a div logger hehe :D");

			     		      		      
			    },8000);  // run every 8 seconds	

		</script>

		<script type="text/javascript">
  			
  			var beep = new Audio();
  			beep.src = "http://192.168.254.152/mobile_crime_reporting_and_mapping_system/alert/alert.mp3";

  		</script>


	<!-- End Real Time alert Process -->



			



	
</html>