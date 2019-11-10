<?php
class model{
    public $query;
    var $con;
    var $logged;
    var $dbhost;
    var $dbuser;
    var $dbpass;
    var $dbname;
    var $dbname2;
    function __construct(){
     
    }
    public function fetch($post){
        return mysql_fetch_assoc($post);
    } 
    public function query($post){
        return mysql_query($post);
    }
    public function numrows($post){
        return mysql_num_rows($post);
    }
    


    public function process_for_decline_reports($post){

        $query = mysql_query('UPDATE tbl_report_crime set

                     status = "'."2".'"
                        where report_id = "'.$post['holder_decline_reports_id'].'"

                ');

        if( $query ){

            //echo '<script> alert("Successfully Deactivated")</script>';

            ?>
                <script type="text/javascript">

                    jQuery(document).ready(function($) 
                    {
                      // Sample Toastr Notification
                      setTimeout(function()
                      {     
                        var opts = {
                          "closeButton": true,
                          "debug": false,
                          "positionClass": rtl() || public_vars.$pageContainer.hasClass('right-sidebar') ? "toast-top-left" : "toast-top-right",
                          "toastClass": "black",
                          "onclick": null,
                          "showDuration": "300",
                          "hideDuration": "1000",
                          "timeOut": "5000",
                          "extendedTimeOut": "1000",
                          "showEasing": "swing",
                          "hideEasing": "linear",   
                          "showMethod": "fadeIn",
                          "hideMethod": "fadeOut"
                        };

                        toastr.success("The report has been declined", "Declined Successful", opts);
                      }, 3000);
                      
                      
                    });


                </script>

            <?php    
          

        }else{
            echo '<script> alert("Error Found !")</script>';
        }

    }

    


/* Method function for Form php */

    public function read_tbl_all_crime_from_all_crime(){
        return $this->query('SELECT * FROM tbl_crime where status = 1 ');
    }

    public function read_tbl_crime_category_from_crime_category($cat_id){
        return $this->query('SELECT * FROM tbl_crime_category where category_id = "'.$cat_id.'" ');
    }

    public function read_tbl_reported_crime_from_user_report($municipal){
        return $this->query('SELECT * FROM tbl_report_crime where status = 0 and municipality = "'.$municipal.'" order by report_id desc ');
    }

    public function read_tbl_reported_crime_from_admin_show_msg($municipal){
        return $this->query('SELECT * FROM tbl_report_crime where status = 0 and municipality = "'.$municipal.'" ');
    }

    public function read_tbl_user_to_fix_name($user_id){
        return $this->query('SELECT * FROM tbl_user where user_id = "'.$user_id.'"   ');
    }

    public function read_tbl_crime_category_from_confirm_report(){
        return $this->query('SELECT * FROM tbl_crime_category  ');
    }

    public function read_tbl_reported_crime_from_all_crime_reported($municipal){
        return $this->query('SELECT * FROM tbl_report_crime where status = 1 and municipality = "'.$municipal.'" order by report_id desc   ');
    }

    public function read_tbl_crime_to_all_crime_reported($crime_id){
        return $this->query('SELECT * FROM tbl_crime where crime_id = "'.$crime_id.'" ');
    }

    public function read_tbl_reported_crime_from_disp_total_crime($municipal){
        return $this->query('SELECT count(municipality) as total from tbl_report_crime  where municipality = "'.$municipal.'" and status = 1 ');
    }

    public function read_tbl_admin_from_account_settings($admin_id,$municipal){
        return $this->query('SELECT * from tbl_admin ta, tbl_police_station tp  where ta.admin_id = "'.$admin_id.'" and tp.municipality_name = "'.$municipal.'" ');
    }

    public function read_tbl_user_from_disp_total_users(){
        return $this->query('SELECT count(fname) as total FROM tbl_user ');
    }


     public function read_tbl_new_report_from_home_display($municipal,$date){
        return $this->query('SELECT count(report_id) as holder_total from tbl_report_crime where status = 0 and municipality = "'.$municipal.'" and date_reported = "'.$date.'"   ');
    }

    public function read_tbl_users_from_user_list_display(){
        return $this->query('SELECT * FROM tbl_user  ');
    }

    public function read_tbl_suspect_from_list_of_suspect_display(){
        return $this->query('SELECT * FROM tbl_suspect  ');
    }

    public function read_tbl_crime_report_from_list_suspect_disp($crime_id){
        return $this->query('SELECT * FROM tbl_report_crime where report_id = "'.$crime_id.'" ');
    }

    public function read_tbl_crime_from_suspect_list_display($crime_id){
        return $this->query('SELECT * FROM tbl_crime where crime_id = "'.$crime_id.'" ');
    }

    public function read_tbl_suspects_from_display_total_suspect($muni){
        return $this->query('SELECT * from tbl_suspect ts, tbl_report_crime tr where ts.report_crime_id = tr.report_id and tr.municipality = "'.$muni.'"  ');
    }


    

/* End Method function for Form php */

}

$model = new model();
?>

<?php

   

?>