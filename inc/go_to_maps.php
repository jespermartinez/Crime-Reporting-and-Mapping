<hr />
      <ol class="breadcrumb bc-3" style="margin-left: 970px">
            <li>
        <a href="admin.php?page=user_reports"><i class="entypo-reply-all"></i>Back</a>
      </li>
          
        
      </ol>
      

<!-- <div class="earth3dmap-com"><iframe id="iframemap" src="https://maps.google.com/maps?q=philippines&amp;ie=UTF8&amp;iwloc=&amp;output=embed" width="100%" height="500" frameborder="0" scrolling="no"></iframe><div style="color: #333; font-size: 14px; font-family: Arial, Helvetica, sans-serif; text-align: right; padding: 10px;">Map by <a style="color: #333; text-decoration: underline; font-size: 14px; font-family: Arial, Helvetica, sans-serif; text-align: right;" href="http://earth3dmap.com/?from=embed" target="_blank" >Earth3DMap.com</a></div>
 -->

  <div id="map" style="height: 500px;width: 100%;background-color: lightgray;margin:0;padding:0">

  </div>

  <input type="hidden" value="<?php echo $_GET['id'] ?>" id="holder_id">







  <script type="text/javascript">

/* Process getting latitude and longitude */

  function baseUrlAction(){
     return location.protocol + "//" + location.host + "/mobile_crime_reporting_and_mapping_system/ADMIN/inc/ajax/ajax_controller.php";
  }

    var latitude = "";
    var longitude = "";

    var id = $('#holder_id').val();

      $.ajax({
        type : 'POST',
        url : baseUrlAction() + '?btn=process_get__report_lat_lng',
        context : this,
        dataType : 'json',
        data : {
          var_report_id : id
        },
        error : function(ts){
          alert(console.log(ts.responseText));
        },
        success : function(data){

          if(jQuery.isEmptyObject(data)){
           
          }else{
            
              $.each(data, function(key,value){

                latitude = value.holder_latitude;
                longitude = value.holder_longitude;

              })
          
          }

        }
      })



/* End Process getting latitude and longitude */

    
    function initMap(){

        var location = new google.maps.LatLng(latitude, longitude);

        var myOptions = {
            zoom: 16,
            center: location,
            mapTypeId: 'satellite'
        }

        map = new google.maps.Map(document.getElementById('map'), myOptions);

        var icon = {
            url: 'http://192.168.254.152/mobile_crime_reporting_and_mapping_system/crime_images/turn.gif', // url
            scaledSize: new google.maps.Size(100,100), // scaled size
            origin: new google.maps.Point(0,0) // origin
        };


      //var image_icon = 'http://192.168.254.101/mobile_crime_reporting_and_mapping_system/crime_images/turn.gif';


        var marker = new google.maps.Marker({

          position: location, 
          map: map,
          title: 'Crime Reported',
          icon: icon

        });

        var marker = new google.maps.Marker({

          position: location, 
          map: map,
          title: 'Crime Reported'

        });



    }

    
    

  </script>

  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCW-LxWC1ML0a6FbUzgC6ExKfh6xrb8oZM&callback=initMap"> </script>


             

<br />





