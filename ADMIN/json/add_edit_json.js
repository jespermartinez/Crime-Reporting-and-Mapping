 function baseUrl(){
	return location.protocol + "//" + location.host + "/";
}
 function baseUrlAction(){
     return location.protocol + "//" + location.host + "/mobile_crime_reporting_and_mapping_system/ADMIN/inc/ajax/ajax_controller.php";
 }



	$('#btn_confirm_crime_reports').bind('click', function(eve){

	//alert(location.protocol + "//" + location.host + "/mobile_crime_mapping_system/ADMIN/inc/ajax/ajax_controller.php");

	eve.preventDefault();   

	$('#btn_confirm_crime_reports').show('slow').html('<i class="fa fa-spinner"></i> Processing...');
		

		        $.ajax({
			            type:'POST',
			            url: baseUrlAction() + '?btn=btn_confirm_crime_reports',
			            context: this,
			            dataType: 'json',
			            data: { 
			                   					      		                    
			                    crime_name : $('#crime_name').val(),
			                    location : $('#location').val(),
			                    date_happened : $('#date_happened').val(),
			                    time_happened : $('#time_happened').val(),
			                    day_happened : $('#day_happened').val(),


			                    fname : $('#susprct_fname').val(),
			                    mname : $('#suspect_mname').val(),
			                    lname : $('#suspect_lname').val(),
			                    age : $('#suspect_age').val(),
			                    gender : $('#suspect_gender').val(),
			                    height : $('#suspect_height').val(),
			                    color : $('#suspect_color').val(),

			                    holder_id : $('#holder_ID').val(),
			                    holder_suspect_val : $('#holder_suspect_val').val()

			                    
			                   
			            },

			            error: function(ts) { 
			            	console.log(ts.responseText)
			            	alert(console.log(ts));
			            },

			            success: function(data) { 

			            	//alert("sdsdds");

			                if(parseFloat(data.status)==1){        

	 					
								setTimeout(function(){
				                        alert("Confirmed Successfully");
				                    }, 1500)

								setTimeout(function(){
			                            window.location.href = data.redirect_page ;
			                      }, 1500)
	       	

			                }else{ 
								
				                    alert(data.status);

				                    $('#btn_confirm_crime_reports').show('slow').html('<i class="fa fa-spinner"></i> Click to Confirm ');
			                }
			            }
			        });
			
	 });







	$('#btn_add_suspect').bind('click', function(eve){

	eve.preventDefault();   

	$('#btn_add_suspect').show('slow').html('<i class="fa fa-spinner"></i> Processing...');
			
			var holder_suspect_id = $('#holder_val_id_suspect').val();

		        $.ajax({
			            type:'POST',
			            url: baseUrlAction() + '?btn=btn_add_suspect',
			            context: this,
			            dataType: 'json',
			            data: { 
			                   					      		                    
			                    fname : $('#suspect_fname').val(),
			                    mname : $('#suspect_mname').val(),
			                    lname : $('#suspect_lname').val(),
			                    age : $('#suspect_age').val(),
			                    gender : $('#suspect_gender').val(),
			                    height : $('#suspect_height').val(),
			                    color : $('#suspect_color').val(),
			                   

			                    holder_suspect_val : holder_suspect_id

			              
			            },

			            error: function(ts) { 
			            	console.log(ts.responseText)
			            	alert(console.log(ts));
			            },

			            success: function(data) { 

			            	//alert("sdsdds");

			                if(parseFloat(data.status)==1){        

	 					
								setTimeout(function(){
				                        alert("Suspect is added Successfully");
				                    }, 1500)

								setTimeout(function(){
			                            window.location.href = data.redirect_page ;
			                      }, 1500)
	       	

			                }else{ 
								
				                    alert(data.status);

				                    $('#btn_add_suspect').show('slow').html('<i class="fa fa-spinner"></i> Add suspect ');
			                }
			            }
			        });
			
	 });






