<?php
    include("config/connection.php");
?>
<script>   
$(document).ready(function (e) {
  $(".parsley_form").parsley();

     $("#roads_form").on('submit',(function(e){
        e.preventDefault();
        page_opacity();
        $.ajax({
            url: base_url + "controller/roads_insertion.php",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            dataType:"json",
            processData:false,
            success: function(result){
            if(result[0] == 1){
//                    success_alert(result[1]);
                    load_roads(result[1]);
                    $(".loading").css('display','none');
                    $(".success_error_imgages").css('display','none');
                    $(".message").html('');
                    $(".form-group").css('opacity','');
                    $("#roads_form")[0].reset();                
                } 
                else{
                    error_alert(result[1]);
                    timeout_func();
                }
            },
              error: function(){
                  alert("failure");
              }             
       });
    }));
});

  $('.datepicker').datepicker({
       format: 'yyyy-mm-dd',
       startDate: '-3d'

   });
    

</script>

<div class="alert" style="text-align: center; border-bottom:3px solid #B3ADAD;width: 100%; margin-left: -1px; background:#f9f9f9;">
          <button class="btn btn-default pull-left">Back</button>
          <h4>Add Roads New Records</h4>
    </div>   
<div class="col-md-12 panel panel-default">
  
  <div class="col-md-12 custom">
    <form class = "form_custom parsley_form" id="roads_form" method="POST" enctype="multipart/form-data" data-parsley-validate>
       
      <fieldset>

        <div class="form-group">
            <div class="col-sm-3"></div>
            <div class="col-sm-9">
              <div class="col-sm-6 form-group pull-left">
                  <label for="width" class="control-label">Name of Road</label>
                    <input type="text" class="form-control" id="name_of_road" name="name_of_road">
                </div>&nbsp;
                <div class="col-sm-6 form-group pull-right">
                <?php
                $q = mysql_query("select * from distracts");
                ?>
                  <label for="length" class="control-label">District:</label>
                   <select name="distract" class="form-control">
                   <?php
                       while($row = mysql_fetch_assoc($q))
                       {
                   ?>
                    <option value="<?=$row['id']?>"><?=$row['d_name']?></option>
                    <?php
                       }
                    ?>
                  </select>  
                  </div>

            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-3"></div>
            <div class="col-sm-9">
              <div class="col-sm-6 form-group pull-left">
                  <label for="width" class="control-label">Type:</label>
                  <select onchange="select();" id ="type" name="type" class="form-control" id = "type">
                    <option value="paved_roads" id ="paved">Paved Roads</option>
                    <option value="gravel_roads" id ="gravel">Gravel Roads</option>
                  </select>
                </div>&nbsp;
                <div class="col-sm-6 form-group pull-right">
                  <label for="lenght" class="control-label">Paved Roads Type:</label>
                   <select id = "paved_roads" name="paved_roads_type" class="form-control">
                   <option value="">Select Type</option>
                    <option value="1">Asphalt</option>
                    <option value="2">Cement</option>
                    <option value="3">Concrete</option>
                  </select>  
                  </div>

            </div>
        </div>
 
        <div class="form-group">
            <div class="col-sm-3"></div>
            <div class="col-sm-9">
              <div class="col-sm-6 form-group pull-left">
                  <label for="width" class="control-label">Width</label>
                    <input type="text" class="form-control" id="width" name="width" required>
                </div>&nbsp;
                <div class="col-sm-6 form-group pull-right">
                  <label for="lenght" class="control-label">Length</label>
                    <input type="text" class="form-control" id="length" name="length" required>
                </div>

            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-3"></div>
            <div class="col-sm-9">
              <div class="col-sm-6 form-group pull-left">
                  <label for="width" class="control-label">Number of Lanes</label>
                    <input type="text" class="form-control" id="width" name="number_lanes">
                </div>&nbsp;
                <div class="col-sm-6 form-group pull-right">
                  <label for="lenght" class="control-label">Pavement Condition</label>
                    <input type="text" class="form-control" id="lenght" name="p_condation">
                </div>

            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-3"></div>
            <div class="col-sm-9">
              <div class="col-sm-6 form-group pull-left">
                  <label for="property_of" class="control-label">Property of:</label>
                    <input type="text" class="form-control" id="property_of" name="property_of">
                </div>&nbsp;
                
                  <div class="col-sm-6 form-group pull-right">
                  <label for="location" class="control-label">Location</label>
                    <input type="text" class="form-control" id="location" name="location">
                </div>

            </div>
        </div>
                                  
        <div class="form-group">
          <div class="col-sm-3"></div>
          <div class="col-sm-9">
            <label for="date" class="control-label">What Maintenance Required:</label>
              <textarea class="form-control" rows="7" name = "what_maintenance"></textarea>
          </div>
        </div> 

        
        <div class="form-group">
            <div class="col-sm-3"></div>
            <div class="col-sm-9">
              <div class="col-sm-6 form-group pull-left" id="FileUploadContainer">
                  <label for="width" class="control-label">Sample Pictures:</label>
                   <input type="file" class="form-control" id="file" name="image[]"><a href="javascript:;" onclick ="AddFileUpload()">+ Add More</a>
                </div>&nbsp;
                <div class="col-sm-6 form-group pull-right">
                            <label for="status" class="control-label">Date Surveyed:</label>
                            <input type="text" class="form-control datepicker" name="date_surveyed">
                </div>


            </div>
        </div>

        <div class="form-group">
          <div class="col-sm-3"></div>
          <div class="col-sm-9">
             <input type="submit" class="btn btn-primary pull-right preview-add-button" value="Add Record">
<!--             <input type="button" class="btn btn-primary pull-right preview-add-button" value="Add Record">-->
          </div>
        </div>
                              
      </fieldset>
    </form> 
  </div>           
</div> <!-- / panel preview -->




