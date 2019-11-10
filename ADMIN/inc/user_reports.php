<hr />
      <ol class="breadcrumb bc-3">
            <li>
        <a href="admin.php?page=home"><i class="entypo-home"></i>Home</a>
      </li>
          <li>
      
              <a href="">User Reports</a>
          </li>
        
       </ol>
      

<br />

<!-- Table Crime  -->

              <br />

               <table class="table table-bordered datatable" id="table-1">
                    <thead>
                      <tr>
                        <th style="text-align: center"># of Column</th>
                        <th style="text-align: center">Name of user</th>
                        <th style="text-align: center">Crime</th>
                        <!-- <th style="text-align: center">Longitude</th> -->
                        <th style="text-align: center">Date Reported</th>
                        <th style="text-align: center">Time Reported</th>
                        <th style="text-align: center">Day Reported</th>
                        <th style="text-align: center">Map</th>
                        <th style="text-align: center;width:20px">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php

                            date_default_timezone_set('Asia/Manila');
                            $date2 = date('F-d-Y',time());

                           $count=1;
                           $tester="";
                          $query = $model->read_tbl_reported_crime_from_user_report($_SESSION['adminlogged']['municipality']);  //FROM MODEL
                            if( $result = $model->fetch($query) ){
                              do{

                      ?>

                      <?php  
                          $holder_user_name = "";
                          $query_2 = $model->read_tbl_user_to_fix_name($result['user_id']);
                            if( $result_2 = $model->fetch($query_2)){

                               $holder_user_name = $result_2['fname']." ".$result_2['lname'];
                            }
                            
                      ?>

                      

                      <tr class="odd gradeX">
                        <td style="text-align: center">&nbsp;&nbsp;<?php echo $count++; ?></td>
                        <td style="text-align: center">

                          <?php   
   
                                  $prev_date = $result['date_reported'];

                                    if( $date2 == $prev_date ){ 

                              ?>        
                                   <span style="margin-left: -39px" class="badge badge-secondary">new</span> <br>

                              <?php } ?>                             

    
                          <?php echo $holder_user_name  ?>
                          
                        </td>
                        <td class="center" style="text-align: center"><?php echo $result['crime_id'] ?></td>
                        <!-- <td style="text-align: center"><?php echo $result['longitude'] ?></td> -->
                        <td style="text-align: center"><?php echo $result['date_reported'] ?></td>
                        <td style="text-align: center"><?php echo $result['time_reported'] ?></td>
                        <td style="text-align: center"><?php echo $result['day_reported'] ?></td>

                        <form method="post">
                          <td style="">
                          
                              <a href="admin.php?page=go_to_maps&id=<?php echo $result['report_id']; ?>" class="btn btn-default btn-sm btn-icon icon-left" style="color:blue">
                              <i class="entypo-location"></i> 
                                    View-to-Map
                              </a>

                          </td>
                          <td style="margin-top:15px">
                                                 
                                <a href="admin.php?page=confirm_reports&id=<?php echo $result['report_id']; ?>" style="color: green;margin-top:17px" class="btn btn-default btn-sm btn-icon icon-left">
                                  Complete details to Confirm
                                <i class="entypo-forward"></i>
                                </a>

                                <a href="" style="color: red;margin-top: -44px;margin-left: 190px" class="btn btn-default btn-sm btn-icon icon-left" onclick="javascript:crime_reports_decline_method(<?php echo $result['report_id']  ?>)" data-toggle="modal" data-target="#id_modal_reports_decline" >
                                  Decline
                                <i class="entypo-trash"></i>
                                </a>
                          
                          </td>
                      </form>

                      </tr>


                      <?php

                              }while($result = $model->fetch($query));
                           }

                      ?>
                          
                    </tbody>
              </table>

<!-- Script function -->

        <script type="text/javascript">
          
              function crime_reports_decline_method($id){

               
                 document.getElementById("holder_decline_reports_id").value = $id;


              }


        </script>


<!-- DATATABLE Javascrip of Crime Reports  -->              

              <script type="text/javascript">
                    var responsiveHelper;
                    var breakpointDefinition = {
                        tablet: 1024,
                        phone : 480
                    };
                    var tableContainer;

                      jQuery(document).ready(function($)
                      {
                        tableContainer = $("#table-1");
                        
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
                </script>

<br />



