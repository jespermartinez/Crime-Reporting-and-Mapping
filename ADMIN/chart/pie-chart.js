				
		var today = new Date();	
		var date = today.getDay();

		/* Get Day Process */
		
			var weekday = new Array(7);

			weekday[0] = "Sunday";
			weekday[1] = "Monday";
			weekday[2] = "Tuesday";
			weekday[3] = "Wednesday";
			weekday[4] = "Thursday";
			weekday[5] = "Friday";
			weekday[6] = "Saturday";

			var holder_current_day = weekday[today.getDay()];

		/* Get Time Process */
			
		    var hours = today.getHours();
		    var minutes = today.getMinutes();
		    var ampm = hours >= 12 ? 'PM' : 'AM';
		    hours = hours % 12;
		    hours = hours ? hours : 12; // the hour '0' should be '12'
		    minutes = minutes < 10 ? '0'+minutes : minutes;
		    var strTime = hours + ':' + minutes + ' ' + ampm;

		/* End Get Time Process */    


		function baseUrlAction(){
			     return location.protocol + "//" + location.host + "/mobile_crime_reporting_and_mapping_system/ADMIN/inc/ajax/ajax_controller.php";
		}


		var final_get_brgy_value="";
		var final_get_total_rank_value="";


		crime_hotspot_time_onchange();

		function crime_hotspot_time_onchange(){

				var holder_current_time = $('#time_id').val();

				var holder_current_time_sort="";

				if(holder_current_time == "1"){

					holder_current_time_sort = "12,1,2,3,4,5,AM";

				}else if(holder_current_time == "2"){

					holder_current_time_sort = "6,7,8,9,10,11,AM";

				}else if(holder_current_time == "3"){

					holder_current_time_sort = "12,1,2,3,4,5,PM";
					
				}else if(holder_current_time == "4"){
					
					holder_current_time_sort = "6,7,8,9,10,11,PM";
				}


				//alert(holder_current_time);
				
						$.ajax({
				            type:'POST',
				            url: baseUrlAction() + '?btn=method_process_for_crime_hotspot',
				            context: this,
				            dataType: 'json',
				            data: { 
				                   					      		                                      
				                 holder_current_municipality : $('#muni_id_crime_hotspot').val(),
				                 current_day_holder : holder_current_day
		     
				            },

				            error: function(ts) { 
				            	console.log(ts.responseText)
				            	//alert(console.log(ts));
				            },

				            success: function(data) { 

				  				
				  				if(jQuery.isEmptyObject(data)){
			           
				  					
						        }else{

						        	var location="",time="",Holder_brgy="",holder_brgy_concat="",tester="false",holder_brgy_concat_all="";
						        	

						        	var prev_time_concat="",prev_time_AM_PM="",prev_time_concat_final="";
						        	var time_tester_2="",AM_PM_tester_2="";

						        	var tester2 = "";

						        	$.each(data, function(key,value){

						        		location = value.Location;
						        		time = value.Time_happened;


						        			var holder_prev_time = time.split(" ");

						        			for(var z = 0; z < holder_prev_time.length; z++){

						        				if(z == 0){
						        					prev_time_concat = holder_prev_time[z];  
						        				}else if(z == 1){
						        					prev_time_AM_PM = holder_prev_time[z];
						        				}
						        			}

						        			var array_concat_time_prev = prev_time_concat.split(":");

						        			for(var a = 0; a < array_concat_time_prev.length; a++){
						        				if(a == 0){
						        					prev_time_concat_final = array_concat_time_prev[a];
						        				}
						        			}


						        			var array_test_sorting_time = holder_current_time_sort.split(",");						        			

						        			for(var c = 0; c < array_test_sorting_time.length; c++){

						        				if(prev_time_concat_final == array_test_sorting_time[c]){
						        					time_tester_2 = "true";
						        				}else if(prev_time_AM_PM == array_test_sorting_time[c]){
						        					AM_PM_tester_2 = "true";
						        				}
						        			}



						        			if(time_tester_2 == "true" && AM_PM_tester_2 == "true"){

						        				time_tester_2="";
						        				AM_PM_tester_2="";

						        				var array_location = location.split(",");

									        		for(var x = 0; x < array_location.length; x++){
									        			if(x == 1){
									        				Holder_brgy = array_location[x];

									        				if(holder_brgy_concat == ""){

									        					holder_brgy_concat = Holder_brgy+",";

									        				}else{

									        					for(var y = 0; y < holder_brgy_concat.length; y++){
									        						if(holder_brgy_concat[y] == Holder_brgy ){
									        							tester = "true"
									        						}
									        					}

									        					if(tester == "false"){
									        						holder_brgy_concat += Holder_brgy+",";
									        						tester = "false";
									        					}

									        				}

									        				holder_brgy_concat_all += Holder_brgy+",";

									        			}		
									        		}


						        			}else{

						        			}		
						        		

						        	});	


						        	var overall_holder_brgy_val="",overall_holder_total="";
						        	var counter_value=0;

						        	var holder_final_brgy="",holder_brgy_total_rank="";


						        	var specific_brgy_holder_array = holder_brgy_concat.split(",");
						        	var all_holder_brgy_array = holder_brgy_concat_all.split(",");

						        	for(var x = 0; x < specific_brgy_holder_array.length-1; x++){
						        		for(var y = 0; y < all_holder_brgy_array.length-1; y++){
						        			if(specific_brgy_holder_array[x] == all_holder_brgy_array[y]){
						        				counter_value++;
						        			}
						        		}

						        		overall_holder_brgy_val += specific_brgy_holder_array[x]+":"+counter_value+",";
						        		overall_holder_total += counter_value+",";

						        		

						        		if(holder_brgy_total_rank != ""){

						        			if(holder_brgy_total_rank <  counter_value){
						        				holder_brgy_total_rank = counter_value;
						        				holder_final_brgy = specific_brgy_holder_array[x];
						        			}

						        		}else{

						        			holder_brgy_total_rank = counter_value;
						        			holder_final_brgy = specific_brgy_holder_array[x];

						        		}


						        		counter_value=0;
						        	}


						        	final_get_brgy_value = holder_final_brgy;


						        	var weekday2 = new Array(7);

									weekday2[0] = "Sunday";
									weekday2[1] = "Monday";
									weekday2[2] = "Tuesday";
									weekday2[3] = "Wednesday";
									weekday2[4] = "Thursday";
									weekday2[5] = "Friday";
									weekday2[6] = "Saturday";

									final_get_total_rank_value = weekday2[today.getDay()];


						        	if(final_get_brgy_value == ""){

						        		final_get_total_rank_value = "Day";
						        		final_get_brgy_value = "Barangay";
					        		
						        	}


						        	//alert(final_get_brgy_value);


						        	table_process_method();

						        	final_get_brgy_value ="";
						        	final_get_total_rank_value="";
						        }

						    }
						});  

		}




		function table_process_method(){

			$("#chart7").empty();

			Morris.Donut({
				element: 'chart7',
				data: [
					{value: 100, label: final_get_total_rank_value, formatted: final_get_brgy_value}
					// {value: 15, label: 'bar', formatted: 'approx. 15%' },
					// {value: 10, label: 'baz', formatted: 'approx. 10%' },
					// {value: 5, label: 'A really really long label', formatted: 'at most 5%' }
				],
				formatter: function (x, data) { return data.formatted; },
				colors: ['#b92527', '#d13c3e', '#ff6264', '#ffaaab']
			});



		}