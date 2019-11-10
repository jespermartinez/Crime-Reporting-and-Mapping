<hr />
      <ol class="breadcrumb bc-3">
            <li>
        <a href="admin.php?page=home"><i class="entypo-home"></i>Home</a>
      </li>
          <li>
      
              <a href="">Manage Administrator</a>
          </li>
      
      </ol>
      
<br />

<!-- Table Crime  -->

<h2>List of Administrator</h2>

<br />

<table style="width:1000px" class="table table-bordered datatable" id="table-1">
  <thead>
    <tr>
      <th data-hide="phone">Admin ID</th>
      <th>First Name</th>
      <th data-hide="phone">Middle Name</th>
      <th data-hide="phone">Last Name</th>
      <th data-hide="phone">Gender</th>
      <th data-hide="phone">Age</th>
      <th data-hide="phone">Username</th>
      <th data-hide="phone">Password</th>
      <th data-hide="phone,tablet">Status</th>
      <th data-hide="phone,tablet">Action</th>
    </tr>
  </thead>
  <tbody>

    <?php

        $query_table = $model->read_tbl_administrator();
          if($result_fetch = $model->fetch($query_table)){
              do{
    ?>

    <tr class="odd gradeX">

      <td><?php echo $result_fetch['admin_id']; ?></td>
      <td><?php echo $result_fetch['fname']; ?></td>
      <td><?php echo $result_fetch['mname']; ?></td>
      <td><?php echo $result_fetch['lname']; ?></td>
      <td><?php echo $result_fetch['gender']; ?></td>
      <td><?php echo $result_fetch['age']; ?></td>
      <td><?php echo $result_fetch['username']; ?></td>
      <td><?php echo $result_fetch['password']; ?></td>
      <td class="center"> 

                 <form method="post">
                          <?php if($result_fetch['status'] == 1 ){ ?>

                          <input type="hidden" name="input_text_deactivate" value="<?php echo $result_fetch['admin_id']; ?>">
                          <button class="btn btn-default btn-sm btn-icon icon-left" name="administrator_deactivate_button" style="color:blue ">
                          <i class="entypo-pencil"></i> 
                            Activate </button>
                      
                          <?php }else if($result_fetch['status'] == 0 ) { ?>

                          <input type="hidden" name="input_text_activate" value="<?php echo $result_fetch['admin_id']; ?>">
                          <button class="btn btn-default btn-sm btn-icon icon-left" name="administrator_activate_button" style="color:red ">
                          <i class="entypo-pencil"></i> 
                            Deactivate
                          </button>
                    
                          <?php  }  ?>
                </form>
      </td>
      <td>        
                <a href="admin.php?page=edit_administrator&id=<?php echo $result_fetch['admin_id']; ?>" class="btn btn-default btn-sm btn-icon icon-left" style="color:blue">
                      <i class="entypo-pencil"></i> 
                            Edit
                </a>
      </td>
      
    </tr>
      
      <?php
              }while($result_fetch = $model->fetch($query_table));

          }
      ?>

  </tbody>
 
</table>

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
<br />
<br />
<br />
<br />
<br />



