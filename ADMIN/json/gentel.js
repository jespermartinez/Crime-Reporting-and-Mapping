function baseUrl(){
	return location.protocol + "//" + location.host + "/";
}
function baseUrlAction(){
     return location.protocol + "//" + location.host + "/mobile_crime_reporting_and_mapping_system/ADMIN/inc/ajax/ajax_controller.php";
}


//Process Conbo Box

		function filtered_crime_category_onchange(){

			
			var id = $('#crime_category').val();

			$.ajax({
				type : 'POST',
				url : baseUrlAction() + '?btn=process_crime_category_change',
				context : this,
				dataType : 'json',
				data : {
					category_id : id
				},
				error : function(ts){
					alert(console.log(ts.responseText));
				},
				success : function(data){

					var row = "";

					if(jQuery.isEmptyObject(data)){
						row += '<select disable="" class="form-control" id="crime_name">';
							row += '<option hidden="">NO CRIME NAME RESULT</option>';
						row += '</select>';
					}else{
						row += '<select class="form-control" id="crime_name">';
							$.each(data, function(key,value){
								row += '<option value="'+value.holder_crime_id+'">'+value.holder_crime_name+'</option>';
							})
						row += '</select>';
					}

					$('#crime_name').html(row).fadeIn('slow').slideDown('slow');
				}
			})

		}

	










