<hr />
      <ol class="breadcrumb bc-3">
            <li>
        <a href="admin.php?page=home"><i class="entypo-home"></i>Home</a>
      </li>
          <li>
      
              <a href="">All Crime Name</a>
          </li>
        
       </ol>
      

<br />

<!-- Table Crime  -->

              <!-- <h2>List of Crime Name</h2> -->

              <br />

               <table class="table table-bordered datatable" id="all_crime_name_table">
                    <thead>
                      <tr>
                        <th style="text-align: center"># of Column</th>
                        <th style="text-align: center">Icon</th>
                        <th style="text-align: center">Crime Name</th>
                        <th style="text-align: center">Crime Category</th>
                        <th style="text-align: center">Status</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                            $count = 1;
                             $query = $model->read_tbl_all_crime_from_all_crime();  //FROM MODEL
                                if( $result = $model->fetch($query) ){
                                  do{      
                      ?>

                      <?php
                             $query_for_category = $model->read_tbl_crime_category_from_crime_category($result['category_id']);
                                if($result2 = $model->fetch($query_for_category)){
                                    $final_category = $result2['category_name'];
                                }
                      ?>

                      <tr class="odd gradeX">
                        <td style="text-align: center"><?php echo $count++ ?></td>
                        <td style="text-align: center"><img alt="" height="70" src="/mobile_crime_reporting_and_mapping_system/crime_images/<?php echo $result['crime_id']  ?>.png"></td>
                        <td class="center" style="text-align: center"><?php echo $result['crime_name']; ?></td>
                        <td style="text-align: center"><?php echo $final_category ?></td>
                        <td style="text-align: center">

                          
                          <?php if($result['status'] == 1 ){ ?>

                                      <p><i class="entypo-check"></i> Active</p>
                              
                                  <?php }else if($result['status'] == 0 ){ ?>

                                      <p><i class="entypo-check"></i> Deactive</p>
                            
                          <?php  } ?>
                          

                        </td>

                      </tr>


                      <?php

                              }while($result = $model->fetch($query));
                           }

                      ?>
                          
                    </tbody>           
                </table>


<!-- DATATABLE Javascrip of All crime name -->

                <script type="text/javascript">
                  var responsiveHelper;
                  var breakpointDefinition = {
                      tablet: 1024,
                      phone : 480
                  };
                  var tableContainer;

                    jQuery(document).ready(function($)
                    {
                      tableContainer = $("#all_crime_name_table");
                      
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



