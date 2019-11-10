


			function baseUrlAction(){
			     return location.protocol + "//" + location.host + "/mobile_crime_reporting_and_mapping_system/ADMIN/inc/ajax/ajax_controller.php";
			}


			var January="",February="",March="",April="",May="",June="",July="",August="",September="",October="",November="",December="";


			total_crime_onchange_method();

			function total_crime_onchange_method(){

				var bases_year = $('#total_crime_id').val();

				//alert(bases_year);

					$.ajax({
				            type:'POST',
				            url: baseUrlAction() + '?btn=btn_total_crime_onchange_method',
				            context: this,
				            dataType: 'json',
				            data: { 
				                   					      		                                      
				                 holder_muni_val : $('#muni_id').val()
	         
				            },

				            error: function(ts) { 
				            	console.log(ts.responseText)
				            	//alert(console.log(ts));
				            },

				            success: function(data) { 

				  				
				  				if(jQuery.isEmptyObject(data)){
			           

						        }else{
						        	
						        	var holder_date = "",holder_month="",holder_year="";
						        	var jan_count=0,feb_count=0,mar_count=0,april_count=0,may_count=0,june_count=0,july_count=0,august_count=0,sep_count=0,octoc_count=0,nov_count=0,december_count=0;

						        	$.each(data, function(key,value){

						        		holder_date = value.holder_date_var;

						        		var arr = holder_date.split("-");

						        		for(var x = 0; x < arr.length; x++){

						        			if(x == 0){
						        				holder_month = arr[x];
						        			}else if(x == 2 ){
						        				holder_year = arr[x];	
						        			}
						        		}

						        		if(holder_month == "January" && holder_year == bases_year ){

						        			jan_count++;

						        		}else if(holder_month == "February" && holder_year == bases_year){

						        			feb_count++;

						        		}else if(holder_month == "March" && holder_year == bases_year){

						        			mar_count++;

						        		}else if(holder_month == "April" && holder_year == bases_year){

						        			april_count++;

						        		}else if(holder_month == "May" && holder_year == bases_year){

						        			may_count++;

						        		}else if(holder_month == "June" && holder_year == bases_year){

						        			june_count++;

						        		}else if(holder_month == "July" && holder_year == bases_year){

						        			july_count++;

						        		}else if(holder_month == "August" && holder_year == bases_year){

						        			august_count++;

						        		}else if(holder_month == "September" && holder_year == bases_year){

						        			sep_count++;

						        		}else if(holder_month == "October" && holder_year == bases_year){

						        			octoc_count++;

						        		}else if(holder_month == "November" && holder_year == bases_year){

						        			nov_count++;

						        		}else if(holder_month == "December" && holder_year == bases_year){

						        			december_count++;

						        		}

						        			
						        	});

						        	January = jan_count;
						        	February = feb_count;
						        	March = mar_count;
						        	April = april_count;
						        	May = may_count;
						        	June = june_count;
						        	July = july_count;
						        	August = august_count;
						        	September = sep_count;
						        	October = octoc_count;
						        	November = nov_count;
						        	December = december_count;



						        	display_tbl_method();

	
						        		
						        }


				              
				            }
					});	




					

			}




			function display_tbl_method(){

				
				$("#chart8").empty();
					
				// Line Chart
					var day_data = [
						{"elapsed": "January", "value": January},
						{"elapsed": "February", "value": February},
						{"elapsed": "March", "value": March},
						{"elapsed": "April", "value": April},
						{"elapsed": "May", "value": May},
						{"elapsed": "June", "value": June},
						{"elapsed": "July", "value": July},
						{"elapsed": "August", "value": August},
						{"elapsed": "September", "value": September},
						{"elapsed": "October", "value": October},
						{"elapsed": "November", "value": November},
						{"elapsed": "December", "value": December}
					];
					
					Morris.Line({
						element: 'chart8',
						data: day_data,
						xkey: 'elapsed',
						ykeys: ['value'],
						labels: ['Total'],
						parseTime: false,
						lineColors: ['#242d3c']
					});
					
					
					
				// Area Chart
					// Morris.Area({
					// 	element: 'chart10',
					// 	data: [
					// 		{ y: '2006', a: getRandomInt(10,100), b: getRandomInt(10,100) },
					// 		{ y: '2007', a: getRandomInt(10,100),  b: getRandomInt(10,100) },
					// 		{ y: '2008', a: getRandomInt(10,100),  b: getRandomInt(10,100) },
					// 		{ y: '2009', a: getRandomInt(10,100),  b: getRandomInt(10,100) },
					// 		{ y: '2010', a: getRandomInt(10,100),  b: getRandomInt(10,100) },
					// 		{ y: '2011', a: getRandomInt(10,100),  b: getRandomInt(10,100) },
					// 		{ y: '2012', a: getRandomInt(10,100), b: getRandomInt(10,100) }
					// 	],
					// 	xkey: 'y',
					// 	ykeys: ['a', 'b'],
					// 	labels: ['Series A', 'Series B']
					// });

 	
			}

