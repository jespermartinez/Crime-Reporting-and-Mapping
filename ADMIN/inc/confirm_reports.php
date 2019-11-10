
<hr />
      <ol class="breadcrumb bc-3" style="margin-left: 970px">
            <li>
        <a href="admin.php?page=user_reports"><i class="entypo-reply-all"></i>Back</a>
      </li>
          
        
      </ol>

<br />
      
<!-- <h2>Add Administrator</h2> -->


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
  
          <div class="form-group">
            <label class="col-sm-3 control-label">Crime Category</label>
            
            <div class="col-sm-5">
              <select class="form-control" id="crime_category" onchange="filtered_crime_category_onchange()">

                <option value="">--- Select crime category ---</option>

               <?php
               
                  $query = $model->read_tbl_crime_category_from_confirm_report();
                    if($result = $model->fetch($query)){
                      do{
                      
               ?>   


                <option value="<?php echo $result['category_id'] ?>"> <?php echo $result['category_name'] ?> </option>


                <?php

                    }while($result = $model->fetch($query));

                  }

                ?>

              </select>
            </div>
          </div>

           <div class="form-group">
            <label class="col-sm-3 control-label">Crime Name</label>
            
            <div class="col-sm-5">
              <select class="form-control" id="crime_name">
                <option value="">NO CRIME NAME RESULT</option>
              </select>
            </div>
          </div>
          
    
          <!-- <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">File Field</label>
            
            <div class="col-sm-5">
              <input type="file" class="form-control" id="field-file" placeholder="Placeholder">
            </div>
          </div> -->
          
          <div class="form-group" id="">
            <label for="field-1" class="col-sm-3 control-label">Location</label>
            
            <div class="col-sm-5">
              <input type="text" class="form-control" onkeypress="isInputSymbol(event)" id="location"  placeholder="Please enter location (Prk,brgy)" required="">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 control-label">Date Happened</label>
            
            <div class="col-sm-3">
              <div class="input-group">
                <input type="text" class="form-control datepicker" data-format="MM-dd-yyyy" id="date_happened" required="">
                
                <div class="input-group-addon">
                  <a href="#"><i class="entypo-calendar"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 control-label">Time Happened</label>
            
            <div class="col-sm-3">
              <input type="text" class="form-control timepicker" data-template="dropdown"  data-default-time="11:25 AM" data-show-meridian="true" data-minute-step="5" id="time_happened" required="" />
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 control-label">Day Happened</label>
            
            <div class="col-sm-5">
              <select class="form-control" id="day_happened">
                <option value="Sunday">Sunday</option>
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
                <option value="Saturday">Saturday</option>               
              </select>
            </div>
          </div>

          <input type="hidden" id="holder_ID" name="holder_ID" value="<?php echo $_GET['id']?>">

          <input type="hidden" id="holder_suspect_val" name="holder_suspect_val" value="">


          <div class="form-group">
            <label class="col-sm-3 control-label">Suspect Details</label>
            
            <div class="col-sm-5">
              <div class="radio radio-replace">
                <input type="radio" onclick="javascript:yesnoCheck();" name="yesno" id="yesCheck"/>
                <label>Add suspect</label>
              </div>
              
              <div class="radio radio-replace">
                <input type="radio" onclick="javascript:yesnoCheck();" name="yesno" id="noCheck"/>
                <label>Under investigation</label>
              </div>             
        
            </div>
          </div>


         <!--  <div id="ifYes" style="visibility:hidden;">If yes, explain:
              <input type='text' id='yes' name='yes'/>
              <br>What can we do to accommodate you?
                  <input type='text' id='acc' name='acc'/>
          </div> -->


          <div class="form-group" id="ifYes" style="visibility:hidden;">

            <label style="margin-left: 180px">First Name</label>
            <input style="margin-left: 25px" type="text" id="susprct_fname" name="susprct_fname" required="">

            <label style="margin-left: 25px">Middle Name</label>
            <input style="margin-left: 25px" type="text" id="suspect_mname" name="suspect_mname" required="">

            <label style="margin-left: 25px">Last Name</label>
            <input style="margin-left: 25px" type="text" id="suspect_lname" name="suspect_lname" required="">

            <label style="margin-left: 25px">Age</label>
            <input style="margin-left: 15px;width:50px;" type="number" id="suspect_age" name="suspect_age" required=""><br>

            <label style="margin-left: 200px;margin-top:10px">Gender</label>
            <select style="margin-left: 25px" id="suspect_gender" name="suspect_gender"> 
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>

            <label style="margin-left: 25px">Height</label>
            <input style="margin-left: 15px;width:50px;" type="text" id="suspect_height" name="suspect_height" required="">

            <label style="margin-left: 25px">Color</label>
            <select style="margin-left: 25px" id="suspect_color" name="suspect_color"> 
                <option value="Brown">Brown</option>
                <option value="White">White</option>
                <option value="Black">Black</option>
            </select>


          </div>


                  
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-5">
   
                <button class="btn btn-success" id="btn_confirm_crime_reports"> Confirm <i class="entypo-check"></i></button>

            </div>
          </div>


        </form>
        
      </div>
    
    </div>
  
  </div>
</div>




    <script type="text/javascript">


        function yesnoCheck() {
          
          if (document.getElementById('yesCheck').checked) {
              document.getElementById('ifYes').style.visibility = 'visible';
              document.getElementById("holder_suspect_val").value = "true";
          }else{
              document.getElementById('ifYes').style.visibility = 'hidden';
              document.getElementById("holder_suspect_val").value = "false";
            }
        }


    </script>







