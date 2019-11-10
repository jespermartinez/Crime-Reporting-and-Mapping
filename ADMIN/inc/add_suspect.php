
<hr />
      <ol class="breadcrumb bc-3" style="margin-left: 970px">
            <li>
        <a href="admin.php?page=all_crime_reported"><i class="entypo-reply-all"></i>Back</a>
      </li>
          
        
      </ol>

<br />
      


<div class="row">
  <div class="col-md-12">
    
    <div class="panel panel-primary" data-collapsed="0">
    
      <div class="panel-heading">
        <div class="panel-title">
          Fill-up this Form
        </div>
        
        <div class="panel-options">
          <!-- <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a> -->
          <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
          <!-- <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> -->
          <!-- <a href="#" data-rel="close"><i class="entypo-cancel"></i></a> -->
        </div>
      </div>
      
      <div class="panel-body">
        
        <form class="form-horizontal form-groups-bordered" method="post">
  
      
          <div class="form-group" id="">
            <label for="field-1" class="col-sm-3 control-label">First Name</label>
            
            <div class="col-sm-5">
              <input type="text" class="form-control" onkeypress="isInputnumber(event)" id="suspect_fname"  placeholder="Enter First Name" required="">
            </div>
          </div>

          <div class="form-group" id="">  
            <label for="field-1" class="col-sm-3 control-label">Middle Name</label>
            
            <div class="col-sm-5">
              <input type="text" class="form-control" onkeypress="isInputnumber(event)" id="suspect_mname"  placeholder="Enter Middle Name" required="">
            </div>
          </div>

          <div class="form-group" id="">
            <label for="field-1" class="col-sm-3 control-label">Last Name</label>
            
            <div class="col-sm-5">
              <input type="text" class="form-control" onkeypress="isInputnumber(event)" id="suspect_lname"  placeholder="Enter Last Name" required="">
            </div>
          </div>

          <div class="form-group" id="">
            <label for="field-1" class="col-sm-3 control-label">Age</label>
            
            <div class="col-sm-5">
              <input type="number" class="form-control" onkeypress="isInputLetter(event)" id="suspect_age"  placeholder="Enter Age" required="">
            </div>
          </div>


          <div class="form-group">
            <label class="col-sm-3 control-label">Gender</label>
            
            <div class="col-sm-5">
              <select class="form-control" id="suspect_gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>
          </div>

          <div class="form-group" id="">
            <label for="field-1" class="col-sm-3 control-label">Height</label>
            
            <div class="col-sm-5">
              <input type="text" class="form-control"  id="suspect_height"  placeholder="Enter Height" required="">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 control-label">Color</label>
            
            <div class="col-sm-5">
              <select class="form-control" id="suspect_color">
                <option value="Brown">Brown</option>
                <option value="White">White</option>
                <option value="Black">Black</option>
              </select>
            </div>
          </div>

          <input type="hidden" value="<?php echo $_GET['id'] ?>" id="holder_val_id_suspect">

                  
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-5">
   
                <button class="btn btn-success" id="btn_add_suspect"> Add suspect  <i class="entypo-user-add"></i></button>

            </div>
          </div>


        </form>
        
      </div>
    
    </div>
  
  </div>
</div>






