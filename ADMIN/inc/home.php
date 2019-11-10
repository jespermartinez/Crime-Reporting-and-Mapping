<hr />

	<input type="hidden" value="<?php echo $_SESSION['adminlogged']['municipality'] ?>" id="muni_id" />

  	<div id="map" style="height: 550px;width: 76%;background-color: lightgray;margin:0;padding:0">

  	</div>

<br />
 

	<div class="row">

		<a href="admin.php?page=user_reports">
			<div class="col-sm-3" style="margin-top: -567px;margin-left: 799px;">			
				<div class="tile-stats tile-plum" style="height: 125px">	
					<div class="icon"><i class="entypo-mobile"></i></div>

					<?php				

							date_default_timezone_set('Asia/Manila');
							$date = date('F-d-Y', time());

							//echo $date;

							$query = $model->read_tbl_new_report_from_home_display($_SESSION['adminlogged']['municipality'],$date);
								if( $holder_result = $model->fetch($query) ){
									$holder_total = $holder_result['holder_total'];
								}

					?>

					<div class="num"><?php echo $holder_total  ?></div>
					
					<h3>New Reports</h3>
					<p style="font-size:9px">Reports per day.</p>
				</div>				
			</div>	
		</a>

	
		<a href="admin.php?page=all_crime_reported">
			<div class="col-sm-3" style="margin-top: -426px;margin-left: 799px">		
				<div class="tile-stats tile-cyan" style="height: 125px">
					<div class="icon"><i class="entypo-database"></i></div>

					<?php
						$count_new_message=0;
						$query = $model->read_tbl_reported_crime_from_disp_total_crime($_SESSION['adminlogged']['municipality']);  //FROM MODEL
		                    if( $result = $model->fetch($query) ){
		                      $holder_total = $result['total'];
		                   
					?>

					<div class="num"><?php echo $holder_total ?></div>

					<?php  }  ?>
					
					<h3>Reported Crime</h3>
					<p style="font-size:9px">this is the total of crime on this municipality.</p>
				</div>			
			</div>
		</a>	

		<div class="col-sm-3" style="margin-top: -285px;margin-left: 799px">
		
			<div class="tile-stats tile-brown" style="height: 125px">
				<div class="icon"><i class="entypo-users"></i></div>

				<?php

					$query_user = $model->read_tbl_user_from_disp_total_users();
						if( $result_user = $model->fetch($query_user) ){
							$total_user = $result_user['total'];
						}	
				?>

				<div class="num"><?php echo $total_user ?></div>
				
				<h3>Registered Users</h3>
				<p style="font-size:9px">so far on this system.</p>
			</div>
			
		</div>
		
	
		<a href="" data-toggle="modal" data-target="#suspect_list_modal">
			<div class="col-sm-3" style="margin-top: -142px;margin-left: 799px">
			
				<div class="tile-stats tile-primary" style="height: 125px">
					<div class="icon"><i class="entypo-cc-by"></i></div>

					<?php
						$count=0;	
						$query_user = $model->read_tbl_suspects_from_display_total_suspect($_SESSION['adminlogged']['municipality']);
					
							while ($result_user = $model->fetch($query_user)) {
								$count++;
							}
					?>				

					<div class="num"><?php echo $count ?></div>
					
					<h3>Total Suspects</h3>
					<p style="font-size:9px">so far on this municipality</p>
				</div>
				
			</div>
		</a>		

	</div>

<!-- <br /> -->

<!-- ALL PROCESS SAMPLE HACKING -->

	<div>Registration closes in <span id="time">05:00</span> minutes!</div>

	<!-- <input type="" name="" id="ssss" value="0"> -->

	<!-- <div id="time_remaining" class="hasCountdown">

	<span class="countdown_row countdown_show2"><span class="countdown_section"><span class="countdown_amount">51</span><br>Minutes</span><span class="countdown_section"><span class="countdown_amount">19</span><br>Seconds</span></span>

	</div> -->


	

	<!-- <span id="free_play_first_digit">2</span> -->


	<script type="text/javascript">
		


		function startTimer(duration, display) {
			
			    var timer = duration, minutes, seconds;
			    setInterval(function () {
			        minutes = parseInt(timer / 60, 10);
			        seconds = parseInt(timer % 60, 10);

			        minutes = minutes < 10 ? "0" + minutes : minutes;
			        seconds = seconds < 10 ? "0" + seconds : seconds;

			        display.textContent = minutes + ":" + seconds;

			        if (--timer < 0) {
			            timer = duration;
			        }
			    }, 1000);
		}

		window.onload = function () {
		    var fiveMinutes = 60 * 5,
		        display = document.querySelector('#time');
		    startTimer(fiveMinutes, display);
		};


		//alert((Math.floor(0*10)));

		title_countdown();

		function title_countdown(tot_time){

			//alert("sdsdsd");

			var countdown_end=(new Date()/1000)+tot_time;
			
			setInterval(function(){
				if(tot_time<1){
					$('title').html('0m:0s - FreeBitco.in - Win free bitcoins every hour!');
						return;
				}else{
					tot_time=countdown_end-(new Date()/1000)-1;
					var mins=Math.floor(tot_time/60);
					var secs=Math.floor(tot_time-(mins*60));
					$('title').html(mins+'m:'+secs+'s - '+'FreeBitco.in - Win free bitcoins every hour!');
				}
			},1000);
		}

		// var hhh = title_countdown().countdown_end;

		// alert(hhh);


	</script>



	




<!-- ENd ALL PROCESS SAMPLE HACKING -->


























	 <script type="text/javascript">

/* Process getting latitude and longitude of crime */


  function baseUrlAction(){
     return location.protocol + "//" + location.host + "/mobile_crime_reporting_and_mapping_system/ADMIN/inc/ajax/ajax_controller.php";
  }


  		function initMap(){


			    var all_holder = "";

			     
			      $.ajax({
			        type : 'POST',
			        url : baseUrlAction() + '?btn=process_get_all_crime_reports',
			        context : this,
			        dataType : 'json',
			        data : {
			          id_muni : $('#muni_id').val()
			        },
			        error : function(ts){
			          alert(console.log(ts.responseText));
			        },
			        success : function(data){

			        

			          if(jQuery.isEmptyObject(data)){
			           

			          }else{

			         /* Process for map view center */	
			          		var map;

			          		$.each(data, function(key,value){

				          		 map = new google.maps.Map(document.getElementById('map'), {
			      						zoom: 15,
								      	center: new google.maps.LatLng(value.ps_latitude_final,value.ps_longitude_final),
								      	mapTypeId: google.maps.MapTypeId.ROADMAP
								});

				          	})

				    /* End Process for map view center */      	

							var infowindow = new google.maps.InfoWindow();
							var infowindow_2 = new google.maps.InfoWindow();

						   	var marker;	
						   	var marker_2;

						   	//var map;
			            
			              $.each(data, function(key,value){

			              
			         /* Process for display All crime */     	

			              	/* insert icon */	
			                	var icon = {
						            url: 'http://192.168.254.152/mobile_crime_reporting_and_mapping_system/crime_images/mapping_images/'+value.crime_id+'.png', // url
						            scaledSize: new google.maps.Size(40,40), // scaled size
						            origin: new google.maps.Point(0,0) // origin
						        };	
						    /* End icon */ 

						    /* holder infowindow content */

						    	var content_Holder = '<p style="text-align:center"><strong>'+value.crime_name+'</strong></p>'+
						    						'<p style="font-size:11px">'+"Crime name : "+value.crime_name+'</p>'+
						    						'<p style="font-size:11px">'+"Location : "+value.location+'</p>'+
						    						'<p style="font-size:11px">'+"Municipality : "+value.municipality+'</p>'+
						    						'<p style="font-size:11px">'+"Date Happened : "+value.date_happened+'</p>'+
						    						'<p style="font-size:11px">'+"Time Happened : "+value.time_happened+'</p>'+
						    						'<p style="font-size:11px">'+"Day Happened : "+value.day_happened+'</p>'+
						    						'<p style="font-size:11px">'+"Latitude : "+value.latitude+'</p>'+
						    						'<p style="font-size:11px">'+"Longitude : "+value.longitude+'</p>'+
						    						'<p style="font-size:11px">'+"Date Reported : "+value.date_reported+'</p>'+
						    						'<p style="font-size:11px">'+"Time Reported : "+value.time_reported+'</p>'+
						    						'<p style="font-size:11px">'+"Day Reported : "+value.day_reported+'</p>'+
						    						'<p style="font-size:11px">'+"Suspect : "+value.suspect_id+'</p>'
						    						;



						    /* End infowindow content */

						    /* process insert infowindow */	
			                	 google.maps.event.addListener(marker, 'click', (function(marker, i) {
							        return function() {
							          infowindow.setContent(content_Holder);
							          infowindow.open(map, marker);
							        }
							      })(marker));
			                /* end insert process infowindow */
			                
						    /* insert marker */   
			                	marker = new google.maps.Marker({
							        position: new google.maps.LatLng(value.latitude, value.longitude),
							        map: map,
							        icon: icon
								});
			                /* End Marker */
			                
			                	

			/* Process for display police station */ 

			            	var icon_2 = {
						            url: 'http://192.168.254.152/mobile_crime_reporting_and_mapping_system/crime_images/mapping_images/police.png', // url
						            scaledSize: new google.maps.Size(40,40), // scaled size
						            origin: new google.maps.Point(0,0) // origin
						    };

						    var content_Holder_2 = '<p style="text-align:center"><strong>'+"Police Station"+'</strong></p>'+
						    						'<p style="font-size:11px">'+"Municipality : "+value.muni_name+'</p>'+
						    						'<p style="font-size:11px">'+"Telephone/Hotline # : "+value.Police_hotline+'</p>'+
						    						'<p style="font-size:11px">'+"Latitude : "+value.Police_latitude+'</p>'+
						    						'<p style="font-size:11px">'+"Longitude : "+value.Police_longitude+'</p>'
						    						;

			                marker_2 = new google.maps.Marker({
							        position: new google.maps.LatLng(value.Police_latitude, value.Police_longitude),
							        map: map,
							        icon: icon_2
								});

			                 google.maps.event.addListener(marker_2, 'click', (function(marker_2, i) {
							        return function() {
							          infowindow_2.setContent(content_Holder_2);
							          infowindow_2.open(map, marker_2);
							        }
							      })(marker_2));

									
			              })

			     				//alert(all_holder);

			          }

			               
			        }

			      })



	   }   

	      //alert(counter);


/* End Process getting latitude and longitude */


   
    		
  </script>


  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCW-LxWC1ML0a6FbUzgC6ExKfh6xrb8oZM&callback=initMap"> </script>


  	<br>

  
  		<div class="row" style="width: 580px">
			<div class="col-md-12">
				
				<div class="panel panel-primary">
					
					<div class="panel-heading">
						<div class="panel-title"><b>Statistical Crime Rate</b></div>
				
						<div class="panel-options">
							
							<div style="margin-top: 10px">
								<label class="panel-title"><b>Select Year</b></label>&nbsp;
								<select id="total_crime_id" onchange="specific_crime_onchange_method()" style="height: 25px;font-size: 15px">			
									<option value="2019">2019</option>
									<option value="2020">2020</option>
									<option value="2021">2021</option>
									<option value="2022">2022</option>
									<option value="2023">2023</option>
									<option value="2024">2024</option>
									<option value="2025">2025</option>
								</select>
							</div>

						</div>
					</div>
					
					
					<br />

					<!-- <div id="chart8" style="height: 300px"></div> -->

					<div id="chart3" style="height: 250px"></div>

					<input id="holder_muni_tester" type="hidden" value="<?php echo $_SESSION['adminlogged']['municipality'] ?>">
					
					
				</div>
			
			</div>
		</div>



		<div class="row" style="width: 500px;margin-left: 545px;margin-top: -328px;">
			<div class="col-md-12" >
				
				<div class="panel panel-primary">
					
					<div class="panel-heading">
						<div class="panel-title" style="margin-top: -35px;"><b>Crime Hotspot</b></div>
				
						<div class="panel-options">

							<div style="margin-top:-23px">
							<select id="time_id" onchange="crime_hotspot_time_onchange()" style="height: 25px;font-size: 15px;margin-top: -35px">			
									<option value="1">12 - 5 AM</option>
									<option value="2">6 - 11 AM</option>
									<option value="3">12 - 5 PM</option>
									<option value="4">6 - 11 PM</option>
					
							</select>
							</div>
							
						</div>

					</div>
					
					
					<br />
					
					<div id="chart7" style="height: 250px"></div>

					<input type="hidden" id="muni_id_crime_hotspot" value="<?php echo $_SESSION['adminlogged']['municipality'] ?>">
					
				</div>
			
			</div>
		</div>


	<br>
	<br>


	


		<script type="text/javascript">


			function baseUrlAction(){
		     	return location.protocol + "//" + location.host + "/mobile_crime_reporting_and_mapping_system/ADMIN/inc/ajax/ajax_controller.php";
			}


			var holder_id_report="",holder_id_user="",holder_date="",holder_time="",holder_day="";
						
 	
			setInterval(function(){
	    		
	    		//alert(municpality_holder);

	    		$.ajax({
				        type : 'POST',
				        url : baseUrlAction() + '?btn=process_notification_show',
				        context : this,
				        dataType : 'json',
				        data : {

				           municpality_holder : $('#muni_id').val()
				          
				        },
				        error : function(ts){
				          alert(console.log(ts.responseText));
				        },
				        success : function(data){

				        	if(jQuery.isEmptyObject(data)){
	           						
				        			//alert("Empty");
				          	}else{
					         					         	
				          			$.each(data, function(key,value){

				          				var current_holder = value.report_id;
				          				

				          				if(current_holder != null){
				          			
						          				 
						          				 //holder_id_user = value.user_id;	
						          				// holder_id_crime = value.crime_id;	
						          				// holder_date = value.date_reported;	
						          				// holder_time = value.time_reported;	
						          				// holder_day = value.day_reported;	


						          			/* Get User name Process */

							          				var get_holder_user_id = value.user_id;
							          				var holder_name="";
							          				//var holder_id_crime = value.crime_id;	

								          				$.ajax({
													        type : 'POST',
													        url : baseUrlAction() + '?btn=process_get_user_name',
													        context : this,
													        dataType : 'json',
													        data : {

													           user_id_holder : get_holder_user_id
													          
													        },
													        error : function(ts){
													          alert(console.log(ts.responseText));
													        },
													        success : function(data){

													        	if(jQuery.isEmptyObject(data)){
		           						
													        			
													          	}else{

													          			$.each(data, function(key,value){

													          				holder_name = value.fname+" "+value.lname;
													          			})

																}

															}

													    })

						          			/* End Get User name Process */
						          				

						          				if(holder_id_report != ""){
											
							          				 var arr = holder_id_report.split(",");
							          				 var tester = "false";

							          					for(var x = 0; x < arr.length; x++){

							          						if(arr[x] == current_holder){
							          							tester = "true";	
							          						}				          						
							          					}

							          					if(tester == "false"){
							          						

						          						/* Sample Toastr Notification */

										                      setTimeout(function(){    
									                
											                        var opts = {
																		"closeButton": true,
																		"debug": false,
																		"positionClass": rtl() || public_vars.$pageContainer.hasClass('right-sidebar') ? "toast-top-left" : "toast-top-right",
																		"onclick": function(){window.location.href = "admin.php?page=user_reports";} ,
																		"showDuration": "300",
																		"hideDuration": "1000",
																		"timeOut": "60000",
																		"extendedTimeOut": "1000",
																		"showEasing": "swing",
																		"hideEasing": "linear",
																		"showMethod": "fadeIn",
																		"hideMethod": "fadeOut"
																	};

																	toastr.info("Date : "+value.date_reported+", Time : "+value.time_reported,"User : "+holder_name, opts);
												

										                      }, 2000);

								                        		 holder_id_report += value.report_id+",";
								                        		 // tester = "";

			      							    		/* End Sample Toastr Notification */

			      							    		}
							          					
							          				
						          				}else{
						          						
						          						/* Sample Toastr Notification */

										                      setTimeout(function(){    

										                
											                        var opts = {
																		"closeButton": true,
																		"debug": false,
																		"positionClass": rtl() || public_vars.$pageContainer.hasClass('right-sidebar') ? "toast-top-left" : "toast-top-right",
																		"onclick": function(){window.location.href = "admin.php?page=user_reports";} ,
																		"showDuration": "300",
																		"hideDuration": "1000",
																		"timeOut": "60000",
																		"extendedTimeOut": "1000",
																		"showEasing": "swing",
																		"hideEasing": "linear",
																		"showMethod": "fadeIn",
																		"hideMethod": "fadeOut"
																	};

																	toastr.info("Date : "+value.date_reported+", Time : "+value.time_reported,"User : "+holder_name, opts);
												

										                      }, 2000);

								                       		  holder_id_report += value.report_id+",";

			      							    		/* End Sample Toastr Notification */
						          				}		


				          				 }


				          			})	

				          							          		
				          			//alert(holder_time);
				          	}


						}

				})	


	        },2000);              
                      
    	</script>


			

