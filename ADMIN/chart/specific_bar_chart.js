


		function baseUrlAction(){
			     return location.protocol + "//" + location.host + "/mobile_crime_reporting_and_mapping_system/ADMIN/inc/ajax/ajax_controller.php";
		}

		var Drugs="",Homicide="",Robbery="",Murder="",Kidnapping="",Assault="",Theft="",Rape="",Alcohol="",Burglary="";

		specific_crime_onchange_method();


		function specific_crime_onchange_method(){


			var current_year = $('#total_crime_id').val();

			var holder_muni = $('#holder_muni_tester').val();

			//alert(current_year);
           

				$.ajax({
		            type:'POST',
		            url: baseUrlAction() + '?btn=specific_crime_onchange_method',
		            context: this,
		            dataType: 'json',
		            data: { 
		                   					      		                                      
		                 // holder_muni_val : $('#muni_id').val()
     
		            },

		            error: function(ts) { 
		            	console.log(ts.responseText)
		            	//alert(console.log(ts));
		            },

		            success: function(data) { 

		  				
		  				if(jQuery.isEmptyObject(data)){


				        }else{

				        	//var count=0;

				        	$.each(data, function(key,value){


				        		if(current_year == "2019"){

					        		if(value.crime_6 != null){	

						        		Drugs = value.crime_6;

									}else if(value.crime_8 != null){

						        		Homicide = value.crime_8;

						        	}else if(value.crime_9 != null){
						        		
						        		Robbery = value.crime_9;

						        	}else if(value.crime_11 != null){	

						        		Murder = value.crime_11;

						        	}else if(value.crime_12 != null){	

						        		Kidnapping = value.crime_12;

						        	}else if(value.crime_16 != null){	

						        		Assault = value.crime_16;

						        	}else if(value.crime_17 != null){	

						        		Theft = value.crime_17;

						        	}else if(value.crime_20 != null){	

						        		Rape = value.crime_20;

						        	}else if(value.crime_24 != null){	

						        		Alcohol = value.crime_24;

						        	}else if(value.crime_25 != null){	

						        		Burglary = value.crime_25;

						        	}	

					        	}else{

					        		Drugs ="0";
					        		Homicide ="0";
					        		Robbery ="0";
					        		Murder ="0";
					        		Kidnapping ="0";
					        		Assault ="0";
					        		Theft ="0";
					        		Rape ="0";
					        		Alcohol = "0";
					        		Burglary ="0";

					        	}


				        	})

				        		//alert(Drugs);


				        		if(current_year == "2019" && holder_muni == "Banaybanay"){
				        			table_method();
				        		}else{
				        			table_method_none_value();
				        		}
				        }

				  	}

				});



			

		}



		function table_method(){

			$("#chart3").empty();

			// Bar Charts
				Morris.Bar({
					element: 'chart3',
					axes: true,
					data: [
						{x: 'Crime', c1: Drugs, c2: Homicide, c3: Robbery, c4: Murder, c5: Kidnapping, c6: Assault, c7: Theft, c8: Rape, c9: Alcohol, c10: Burglary}
					],
					xkey: 'x',
					ykeys: ['c1', 'c2', 'c3', 'c4', 'c5', 'c6', 'c7', 'c8', 'c9', 'c10'],
					labels: ['Drugs', 'Homicide', 'Robbery', 'Murder', 'Kidnapping', 'Assault', 'Theft', 'Rape', 'Alcohol', 'Burglary'],
					barColors: ['red', 'blue', 'skyblue', 'green', 'black', 'brown', 'violet', 'grey', 'orange', '#57b400']
				});	
		}



		function table_method_none_value(){

			$("#chart3").empty();

			// Bar Charts
				Morris.Bar({
					element: 'chart3',
					axes: true,
					data: [
						{x: 'Crime'}
					],
					xkey: 'x',
					ykeys: [],
					labels: [],
					barColors: []
				});	
		}
