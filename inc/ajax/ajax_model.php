<?php
class Json_Model{
    var $con;
    var $logged;
    var $dbhost;
    var $dbuser;
    var $dbpass;
    var $dbname;
    
    function __construct() {
      
        $this->dbhost = 'localhost';
        $this->dbuser = 'root';
        $this->dbpass = '';
        $this->dbname = 'm_c_m_s';  
        $this->InitDB();
    }
    function InitDB(){
        $this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass)  or die(mysqli_error($this->con));
        mysqli_select_db($this->con, $this->dbname) or die(mysqli_error($this->con));  

        session_start();  
    }
    function query($query){
        return mysqli_query($this->con,$query);
    }
    function free_result($query){
        return mysqli_free_result($query);
    }
    function num_rows($query){
        return mysqli_num_rows($query);
    }
    function fetch_data($query){
        return mysqli_fetch_assoc($query);
    }


    public function login_process($post){ 

          $query = $this->query('SELECT * FROM tbl_admin where email = "'.$post['username'].'" and password = "'.md5($post['password']).'" ');


          if( $result = $this->fetch_data($query)){

                $query_log = $this->query('INSERT into tbl_log_admin VALUES(null,"'.$result['admin_id'].'",1)');

                $_SESSION['adminlogged'] = $result;

                return 1;

          }else{
              return mysql_error();
          }
    }

     public function register_process($post){

          $query = $this->query('INSERT INTO tbl_admin VALUES(
                              null,
                              "'.ucwords($post['fname']).'",
                              "'.ucwords($post['mname']).'",
                              "'.ucwords($post['lname']).'",
                              "'.$post['gender'].'",
                              "'.$post['municipality'].'", 
                              "'.$post['age'].'",  
                              "'.$post['email'].'", 
                              "'.md5($post['password']).'",
                              "'.md5($post['verification_code']).'",                                        
                              1
                                 )');

          if( $query ){
              return 1;
          }else{
              return mysql_error();
          }
    }

     public function btn_confirm_crime_reports($post){



           $query = $this->query('UPDATE tbl_report_crime set

                     status = "'."1".'",
                     crime_id = "'.$post['crime_name'].'",
                     location = "'.$post['location'].'",
                     suspect_id = "'."Under Investigation".'",
                     date_happened = "'.$post['date_happened'].'",
                     time_happened = "'.$post['time_happened'].'",
                     day_happened = "'.$post['day_happened'].'"

                        where report_id = "'.$post['holder_id'].'"

                ');

         

         if( $post['holder_suspect_val'] == "true"){   

                $query2 = $this->query('INSERT INTO tbl_suspect VALUES(
                                null,
                                "'.ucwords($post['fname']).'",
                                "'.ucwords($post['mname']).'",
                                "'.ucwords($post['lname']).'",
                                "'.$post['age'].'",
                                "'.$post['gender'].'", 
                                "'.$post['height'].'",  
                                "'.$post['color'].'", 
                                "'.$post['holder_id'].'",                                                               
                                1
                                   )');
         /* Insert suspect */         
                $holder_name ="";  
                $holder_query = $this->query('SELECT * from tbl_suspect where report_crime_id = "'.$post['holder_id'].'"  ');

                    if($holder_result = mysqli_fetch_assoc($holder_query)){

                              $holder_name = $holder_result['fname']." ".$holder_result['lname'];

                    }

                 $query = $this->query('UPDATE tbl_report_crime set

                     
                     suspect_id = "'.$holder_name.'"

                        where report_id = "'.$post['holder_id'].'"

                ');   
         /* End Insert suspect */          



                  if( $query2 && $query ){
                      return 1;
                  }else{
                      return mysql_error();
                  }


                
          }else{


          }


          if( $query ){
              return 1;
          }else{
              return mysql_error();
          }




    }



/* Method for Filtering process */

    public function filter_limit_admin_register($muni_var){

        $query = $this->query('SELECT * from tbl_admin where municipality = "'.$muni_var.'" ');

        if( $result = $this->fetch_data($query)){
            return true;
        }else{
            return false;
        }
    }

    public function admin_filter_verification_code($municipal,$verify_code){

        $query = $this->query('SELECT * from tbl_verification_code where municipality = "'.$municipal.'" and verification_code = "'.$verify_code.'"  ');

        if($result = $this->fetch_data($query)){
            return true;
        }else{
            return false;
        }

    }

/* End Method for Filtering process */

/* Method for conbo box change */

    public function process_crime_category_change($post){

        $data="";

        $query = $this->query('SELECT * FROM tbl_crime WHERE category_id = "'.$post['category_id'].'" and status = 1  ');

        if($this->num_rows($query)>0){
            while($yu = $this->fetch_data($query)){
                $data[] = $yu;

            }
            return $data;
        }else{
            return FALSE;
        }
   }

/* End Method for conbo box change */   

/* Method for getting lat and lng */

  public function process_get__report_lat_lng($post){

        $data="";

        $query = $this->query('SELECT * FROM tbl_report_crime WHERE report_id = "'.$post['var_report_id'].'" ');

        if($this->num_rows($query)>0){
            while($yu = $this->fetch_data($query)){
                $data[] = $yu;

            }
            return $data;
        }else{
            return FALSE;
        }
   }

/* End Method for getting lat and lng */


      public function process_get_all_crime_reports($post){

        $data="";

        $query = $this->query('SELECT * FROM tbl_report_crime tr, tbl_crime tc, tbl_user tu  where tr.crime_id = tc.crime_id and tr.status = 1 and tr.user_id = tu.user_id order by tr.report_id asc ');

        if($this->num_rows($query)>0){
            while($yu = $this->fetch_data($query)){
                $data[] = $yu;

            }
            return $data;
        }else{
            return FALSE;
        }
      }



      public function process_get_all_police_station_data(){

          $data="";

          $query = $this->query('SELECT * FROM tbl_police_station ');

          if($this->num_rows($query)>0){
              while($yu = $this->fetch_data($query)){
                  $data[] = $yu;

              }
              return $data;
          }else{
              return FALSE;
          }

      }

       public function process_get_police_station_lat_lng($post){

          $data="";

          $query = $this->query('SELECT * FROM tbl_police_station where municipality_name = "'.$post['id_muni'].'" ');

          if($this->num_rows($query)>0){
              while($yu = $this->fetch_data($query)){
                  $data[] = $yu;

              }
              return $data;
          }else{
              return FALSE;
          }

      } 


      public function process_get_suspect_details_from_modal($post){

          $data="";

          $query = $this->query('SELECT * FROM tbl_suspect where report_crime_id = "'.$post['suspect_id'].'" ');

          if($this->num_rows($query)>0){
              while($yu = $this->fetch_data($query)){
                  $data[] = $yu;

              }
              return $data;
          }else{
              return FALSE;
          }

      }


        public function btn_add_suspect($post){

            $query = $this->query('INSERT INTO tbl_suspect VALUES(
                                null,
                                "'.ucwords($post['fname']).'",
                                "'.ucwords($post['mname']).'",
                                "'.ucwords($post['lname']).'",
                                "'.$post['age'].'",
                                "'.$post['gender'].'", 
                                "'.$post['height'].'", 
                                "'.$post['color'].'", 
                                "'.$post['holder_suspect_val'].'",                                         
                                1
                                   )');

            $holder_suspect_name = ucwords($post['fname'])." ".ucwords($post['lname']);


            $query_2 = $this->query('UPDATE tbl_report_crime set
                     
                     suspect_id = "'.$holder_suspect_name.'"

                        where report_id = "'.$post['holder_suspect_val'].'"

                ');   



            if( $query && $query_2){
                return 1;
            }else{
                return mysql_error();
            }
      }


      public function process_alert_report_crime($post){

          $data="";

          $query = $this->query('SELECT * FROM tbl_report_crime where status = 0 ');

          if($this->num_rows($query)>0){
              while($yu = $this->fetch_data($query)){
                  $data[] = $yu;

              }
              return $data;
          }else{
              return FALSE;
          }

      }


      public function btn_total_crime_onchange_method($post){

          $data="";

          $query = $this->query('SELECT * FROM tbl_report_crime where status = 1 and municipality = "'.$post['holder_muni_val'].'" ');

          if($this->num_rows($query)>0){
              while($yu = $this->fetch_data($query)){
                  $data[] = $yu;

              }
              return $data;
          }else{
              return FALSE;
          }

      }


      public function process_notification_show($post){

          $data="";

          $query = $this->query('SELECT * FROM tbl_report_crime where status = 0 and municipality = "'.$post['municpality_holder'].'" ');

          if($this->num_rows($query)>0){
              while($yu = $this->fetch_data($query)){
                  $data[] = $yu;

              }
              return $data;
          }else{
              return FALSE;
          }

      }


      public function process_get_user_name($post){

          $data="";

          $query = $this->query('SELECT * FROM tbl_user where user_id = "'.$post['user_id_holder'].'"  ');

          if($this->num_rows($query)>0){
              while($yu = $this->fetch_data($query)){
                  $data[] = $yu;

              }
              return $data;
          }else{
              return FALSE;
          }

      }

/* Graph Process */

       public function specific_crime_onchange_method_6($post){

          $data="";

          $query = $this->query('SELECT count(crime_id) as crime_name FROM tbl_report_crime where crime_id = 6');

          if($this->num_rows($query)>0){
              while($yu = $this->fetch_data($query)){
                  $data[] = $yu;

              }
              return $data;
          }else{
              return FALSE;
          }

      }

      public function specific_crime_onchange_method_8($post){

          $data="";

          $query = $this->query('SELECT count(crime_id) as crime_name FROM tbl_report_crime where crime_id = 8');

          if($this->num_rows($query)>0){
              while($yu = $this->fetch_data($query)){
                  $data[] = $yu;

              }
              return $data;
          }else{
              return FALSE;
          }

      }


      public function specific_crime_onchange_method_9($post){

          $data="";

          $query = $this->query('SELECT count(crime_id) as crime_name FROM tbl_report_crime where crime_id = 9');

          if($this->num_rows($query)>0){
              while($yu = $this->fetch_data($query)){
                  $data[] = $yu;

              }
              return $data;
          }else{
              return FALSE;
          }

      }


      public function specific_crime_onchange_method_11($post){

          $data="";

          $query = $this->query('SELECT count(crime_id) as crime_name FROM tbl_report_crime where crime_id = 11');

          if($this->num_rows($query)>0){
              while($yu = $this->fetch_data($query)){
                  $data[] = $yu;

              }
              return $data;
          }else{
              return FALSE;
          }

      }


       public function specific_crime_onchange_method_12($post){

          $data="";

          $query = $this->query('SELECT count(crime_id) as crime_name FROM tbl_report_crime where crime_id = 12');

          if($this->num_rows($query)>0){
              while($yu = $this->fetch_data($query)){
                  $data[] = $yu;

              }
              return $data;
          }else{
              return FALSE;
          }

      }


      public function specific_crime_onchange_method_16($post){

          $data="";

          $query = $this->query('SELECT count(crime_id) as crime_name FROM tbl_report_crime where crime_id = 16');

          if($this->num_rows($query)>0){
              while($yu = $this->fetch_data($query)){
                  $data[] = $yu;

              }
              return $data;
          }else{
              return FALSE;
          }

      }


      public function specific_crime_onchange_method_17($post){

          $data="";

          $query = $this->query('SELECT count(crime_id) as crime_name FROM tbl_report_crime where crime_id = 17');

          if($this->num_rows($query)>0){
              while($yu = $this->fetch_data($query)){
                  $data[] = $yu;

              }
              return $data;
          }else{
              return FALSE;
          }

      }


      public function specific_crime_onchange_method_20($post){

          $data="";

          $query = $this->query('SELECT count(crime_id) as crime_name FROM tbl_report_crime where crime_id = 20');

          if($this->num_rows($query)>0){
              while($yu = $this->fetch_data($query)){
                  $data[] = $yu;

              }
              return $data;
          }else{
              return FALSE;
          }

      }


      public function specific_crime_onchange_method_24($post){

          $data="";

          $query = $this->query('SELECT count(crime_id) as crime_name FROM tbl_report_crime where crime_id = 24');

          if($this->num_rows($query)>0){
              while($yu = $this->fetch_data($query)){
                  $data[] = $yu;

              }
              return $data;
          }else{
              return FALSE;
          }

      }


      public function specific_crime_onchange_method_25($post){

          $data="";

          $query = $this->query('SELECT count(crime_id) as crime_name FROM tbl_report_crime where crime_id = 25');

          if($this->num_rows($query)>0){
              while($yu = $this->fetch_data($query)){
                  $data[] = $yu;

              }
              return $data;
          }else{
              return FALSE;
          }

      }


/* End Graph Process */



      public function method_process_for_crime_hotspot($post){

          $data="";

          $query = $this->query('SELECT * from tbl_report_crime where status = 1 and municipality = "'.$post['holder_current_municipality'].'" and day_happened = "'.$post['current_day_holder'].'"  ');

          if($this->num_rows($query)>0){
              while($yu = $this->fetch_data($query)){
                  $data[] = $yu;

              }
              return $data;
          }else{
              return FALSE;
          }

      }




}


$model = new json_model();

?>
