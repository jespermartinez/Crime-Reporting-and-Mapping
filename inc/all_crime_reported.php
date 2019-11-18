<hr />
      <ol class="breadcrumb bc-3">
            <li>
        <a href="admin.php?page=home"><i class="entypo-home"></i>Home</a>
      </li>
          <li>
      
              <a href="">All crime reported</a>
          </li>
        
       </ol>
      

<br />

<!-- Table Crime  -->

              <!-- <h2>List of Crime Name</h2> -->

              <br />

          <table class="table table-bordered datatable" id="all_crime_reported_table">
            <thead>
              <tr>
                <th style="text-align: center"># of Column</th>
                <th style="text-align: center">Name of user</th>
                <th style="text-align: center">Crime name</th>
                <th style="text-align: center">Location</th>
                <!-- <th style="text-align: center">Latitude</th>
                <th style="text-align: center">Longitude</th> -->
                <th style="text-align: center">Date reported</th>
                <th style="text-align: center">Time reported</th>
                <th style="text-align: center">Day reported</th>
                <th style="text-align: center">Date happened</th>
                <th style="text-align: center">Time happened</th>
                <th style="text-align: center">Day happened</th>
                <th style="text-align: center">Suspect</th>
              </tr>
            </thead>
            <tbody>

             <?php
                   $count=1;
                  $query = $model->read_tbl_reported_crime_from_all_crime_reported($_SESSION['adminlogged']['municipality']); 
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

              <?php
                  $holder_cime_name="";
                  $query_3 = $model->read_tbl_crime_to_all_crime_reported($result['crime_id']);
                    if( $result_3 = $model->fetch($query_3)){

                       $holder_cime_name = $result_3['crime_name'];
                    }

              ?>

              <tr class="odd gradeX">
                <td style="text-align: center"><?php echo $count++; ?></td>
                <td style="text-align: center"><?php echo $holder_user_name ?></td>
                <td class="center" style="text-align: center"><?php echo $holder_cime_name  ?></td>
                <td style="text-align: center"><?php echo $result['location'] ?></td>
                <!-- <td style="text-align: center"><?php echo $result['latitude'] ?></td>
                <td style="text-align: center"><?php echo $result['longitude'] ?></td> -->
                <td style="text-align: center"><?php echo $result['date_reported'] ?></td>
                <td style="text-align: center"><?php echo $result['time_reported'] ?></td>
                <td style="text-align: center"><?php echo $result['day_reported'] ?></td>
                <td style="text-align: center"><?php echo $result['date_happened'] ?></td>
                <td style="text-align: center"><?php echo $result['time_happened'] ?></td>
                <td style="text-align: center"><?php echo $result['day_happened'] ?></td>

                <td style="text-align: center">

                  <!-- <form method="post"> -->

                        
                      <button type="button" onclick="javascript:btn_view_id(<?php echo $result['report_id'] ?>,'table_1');" data-toggle="modal" data-target="#suspect_modal" class="btn btn-default btn-sm btn-icon icon-left" style="color:green" >
                      <i class="entypo-popup"></i> 
                            View details
                      </button>

                  <!-- </form> -->   

                        
                </td>
            
              </tr>


            <?php

                      }while($result = $model->fetch($query));
                   }

              ?>
                  
            </tbody>

           
        </table>

<!-- DATATABLE Javascrip of All crime reported -->

            <script type="text/javascript">
                          var responsiveHelper;
                          var breakpointDefinition = {
                              tablet: 1024,
                              phone : 480
                          };
                          var tableContainer;

                            jQuery(document).ready(function($)
                            {
                              tableContainer = $("#all_crime_reported_table");
                              
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

<!-- End DATATABLE Javascrip of All crime reported -->            

            <br />


            <script type="text/javascript" language="javascript">

               function baseUrlAction(){
                         return location.protocol + "//" + location.host + "/mobile_crime_reporting_and_mapping_system/ADMIN/inc/ajax/ajax_controller.php";
              }  
              

               function btn_view_id($value,table_id){


                  document.getElementById("suspect_value_id_bases").value = $value;


                  /* Process Display for Suspect details table*/

                    
                      var holder_val_bases = $value;
                      //var tester = "";

                        $.ajax({
                          type : 'POST',
                          url : baseUrlAction() + '?btn=process_get_suspect_details_from_modal',
                          context : this,
                          dataType : 'json',
                          data : {
                            suspect_id : holder_val_bases
                          },
                          error : function(ts){
                            alert(console.log(ts.responseText));
                          },
                          success : function(data){

                            if(jQuery.isEmptyObject(data)){
                             
                                
                                document.getElementById('table_1').style.visibility = "hidden";
                                document.getElementById('id_filter_table').style.visibility = "visible";
                                 

                            }else{

                                document.getElementById('table_1').style.visibility = "visible";
                                document.getElementById('id_filter_table').style.visibility = "hidden";
                              
                             /* Delete Row */ 
                                var table_prev = document.getElementById(table_id);
                                var rowCount_prev = table_prev.rows.length;
                        
                                  if(rowCount_prev != 1 ){
                                    
                                      try{

                                      for(var i = 1; i < rowCount_prev; i++){
                          
                                          table_prev.deleteRow(i);

                                          i--;                                                                            
                                      }

                                      
                                    }catch(e){
                                      //alert(e);
                                    }
                                   
                                  }else{

                                       //alert("Empty Row");  
                                  }

                             /* End Delete Row */ 

                             /* Add Row */  

                                var table = document.getElementById(table_id);
                                
                                
                                $.each(data, function(key,value){

                                  // tester = value.fname;

                                   // document.getElementById('tbl_suspect_id').innerHTML = count++;
                                   // document.getElementById('fname').innerHTML = value.fname;
                                  // document.getElementById('mname').innerHTML = value.mname;
                                  // document.getElementById('lname').innerHTML = value.lname;
                                  // document.getElementById('age').innerHTML = value.age;
                                  // document.getElementById('gender').innerHTML = value.gender;
                                  // document.getElementById('height').innerHTML = value.height;
                                  // document.getElementById('color').innerHTML = value.color;

                                    var rowCount = table.rows.length;
                                    var row = table.insertRow(rowCount);


                                  
                                    var cell = row.insertCell(0);
                                    cell.innerHTML = rowCount;

                                    var cell2 = row.insertCell(1);
                                    cell2.innerHTML = value.fname;

                                    var cell3 = row.insertCell(2);
                                    cell3.innerHTML = value.mname;

                                    var cell4 = row.insertCell(3);
                                    cell4.innerHTML = value.lname;

                                    var cell5 = row.insertCell(4);
                                    cell5.innerHTML = value.age;

                                    var cell6 = row.insertCell(5);
                                    cell6.innerHTML = value.gender;

                                    var cell7 = row.insertCell(6);
                                    cell7.innerHTML = value.height;

                                    var cell8 = row.insertCell(7);
                                    cell8.innerHTML = value.color;



                                })

                              /* End Add Row */  

                                //alert(tester);
                            
                            }

                          }
                        })

                  /* End Process Display for Suspect details table*/

                 
               }


             
                  
            

            </script>


  






