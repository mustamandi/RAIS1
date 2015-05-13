<?php
    include("config/connection.php");
?>
<script>   
$(document).ready(function (e) {
  $(".parsley_form").parsley();

     $("#road_element_form").on('submit',(function(e){
        e.preventDefault();
        var e_id = $("#element_type_id").val();
        //alert(e_id);
        page_opacity();
        $.ajax({
            url: base_url + "controller/r_element_controller.php",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            dataType:"json",
            processData:false,
            success: function(result){ 
            if(result[0] == 1){
                    load_roads_equ(e_id);
                    $(".loading").css('display','none');
                    $(".success_error_imgages").css('display','none');
                    $(".message").html('');
                    $(".form-group").css('opacity','');
                    $("#road_element_form")[0].reset();
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
<style type="text/css">
        .message{
                    padding-top: 20px;
                    text-align: center;
                    font-size:16pt;
                    width:auto;z-index:2000;margin:auto;position: absolute;top:40%;left:45%; height:100px;
                }
                .loading{
                    width:100px;z-index:2000;margin:auto;position: absolute;top:50%;left:55%; height:100px;
                    display: none;
                }
                .success_error_imgages{
                    width:100px;z-index:2000;margin:auto;position: absolute;top:50%;left:60%; height:100px;
                    display: none;
                }
        </style>

        
        <div class="loading"><img src="assets/img/103.gif"></div>
        <div class="success_error_imgages error_img"><img src="assets/img/error.png"></div>
        <div class="success_error_imgages success_img"><img src="assets/img/success.jpg"></div>
        <div class="message"></div>
 <!-- panel preview -->
 <div class="alert" style="text-align: center; border-bottom:3px solid #B3ADAD;width: 100%; margin-left: -1px; background:#f9f9f9;">
          <button class="btn btn-default pull-left">Back</button>
          <h4>
                <?php
                $para = $_GET['para'];
                 if(isset($para))
                 {
                    $q = mysql_query("SELECT * FROM element_type WHERE id=".$para);
                    $rows = mysql_fetch_assoc($q);
                 }
                    
                ?>
                Add <?= $rows['type_name'] ?> Records
          </h4>
    </div>
<div class="panel panel-default col-md-12">
    
    <div class="col-md-12 custom">
      <form class = "form_custom parsley_form"  enctype="multipart/form-data" data-parsley-validate id="road_element_form">
        <fieldset>
<?php
   $para = $_GET['para'];
    if(isset($para))
    {

      if($para == 1)
      {
?>     
              <input type="hidden" value="<?= $para ?>" name="element_type" id="element_type_id"> 
                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left">
                            <label for="concept" class="control-label">Name of Parking</label>
                            <input type="text" class="form-control" name="parking">
                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-right">
                            <label for="concept" class="control-label">Select Road:</label>
                            <select name="roads_id" class="form-control">
                                <?php
                                   $q = mysql_query("SELECT * FROM roads");
                                ?>
                                <option>Please Select Relevant Road</option>
                                <?php
                                  while($records = mysql_fetch_array($q))
                                  {
                                    ?>
                                      <option value="<?= $records['id'] ?>"><?= $records['name']; ?></option>
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
                            <label for="number_of_lanes" class="control-label">Size (width)</label>
                            <input type="text" class="form-control" name="width" required />

                                    
                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-right">
                            <label for="under_clearance" class="control-label">Size (Height)</label>
                            <input type="text" class="form-control" id="under_clearance" name="height" required>
                                    
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                      <div class="col-sm-6 form-group pull-left">
                          <label for="width" class="control-label">Capacity: Number of Passenger Cars</label>
                            <input type="text" class="form-control" id="width" name="capacity">
                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-right">
                          <label for="length" class="control-label">Location</label>
                            <input type="text" class="form-control" id="length" name="location">
                        </div>

                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left">
                            <label for="condition" class="control-label">Condition:</label>
                            <input type="text" class="form-control" id="condition" name="condition">
                                     
                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-right">
                            <label for="length" class="control-label">Property of</label>
                            <input type="text" class="form-control" id="length" name="property" required>
                        </div>
                        
                    </div>
                </div>
                <!-- this -->
                 <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left">
                            <label for="slocation" class="control-label">Type:</label>
                            <select name="type" class="form-control">
                                <option value = "asphalt">Asphalt</option>
                                <option value = "cement">Cement</option>
                                <option value="concrete">Concrete</option>
                                <option value="gravel">Gravel</option>
                            </select>                            
                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-right">
                            <label for="status" class="control-label">Date Surveyed:</label>
                            <input type="text" type="text" class="form-control dateimageker" name="date">
                        </div>
                        
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <label for="date" class="control-label">What Maintenance Required:</label>
                        <textarea class="form-control" rows="7" name="maintenance"></textarea>
                    </div>
                </div>

                 <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left" id="FileUploadContainer">
                            <label for="sneeded" class="control-label">Sample Picture:</label>
                            <input type="file" class="form-control" id="file" name="image[]"><a href="javascript:;" onclick ="AddFileUpload()">+ Add More</a>
                                   
                        </div>&nbsp;
                        
                        
                    </div>
                </div>
     

<?php
}elseif ($para==2) {
  
?>

            <input type="hidden" value="<?= $para ?>" name="element_type" id="element_type_id"> 
              <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left">
                            <label for="concept" class="control-label">Select Road:</label>
                            <select name="roads_id" class="form-control">
                                <?php
                                   $q = mysql_query("SELECT * FROM roads");
                                ?>
                                <option>Please Select Relevant Road</option>
                                <?php
                                  while($records = mysql_fetch_array($q))
                                  {
                                    ?>
                                      <option value="<?= $records['id'] ?>"><?= $records['name']; ?></option>
                                    <?php
                                  }
                                ?>
                                
                            </select>
                        </div>
                        &nbsp;
                        <div class="col-sm-6 form-group pull-right">
                            <label for="number_of_posts_in_every_100m" class="control-label">Length</label>
                            <input type="text" class="form-control" id="number_of_posts_in_every_100m" name="length" required>
                                    
                        </div>
                    </div>
                </div>  

                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                    
                      <div class="col-sm-6 form-group pull-left">
                          <label for="diameter" class="control-label">Location</label>
                            <input type="text" class="form-control" id="diameter" name="location">
                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-right">
                          <label for="height" class="control-label">Condition</label>
                            <input type="text" class="form-control" id="height" name="condition">
                        </div>

                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left">
                            <label for="distance_from_edge_of_the_road" class="control-label">Property of</label>
                            <input type="text" class="form-control" id="distance_from_edge_of_the_road" name="property">
                                       
                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-right">
                            <label for="pupose_used_for" class="control-label">Width</label>
                            <input type="text" class="form-control" id="pupose_used_for" name="width" required>
                                   
                        </div>
                        
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <label for="date" class="control-label">What Maintenance Required:</label>
                        <textarea class="form-control" rows="7" name="maintenance"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left" id="FileUploadContainer">
                            <label for="sneeded" class="control-label">Sample imagetures:</label>
                            <input type="file" class="form-control" id="file" name="image[]"><a href="javascript:;" onclick ="AddFileUpload()">+ Add More</a>
                                       
                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-right">
                            <label for="status" class="control-label">Date Surveyed:</label>
                            <input type="text" type="text" class="form-control dateimageker" name="date">
                        </div>
                        
                    </div>
                </div>        

                
<?php
}elseif ($para==3) {
  
?>


            <input type="hidden" value="<?= $para ?>" name="element_type" id="element_type_id"> 
                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left">
                            <label for="concept" class="control-label">Select Road:</label>
                            <select name="roads_id" class="form-control">
                                <?php
                                   $q = mysql_query("SELECT * FROM roads");
                                ?>
                                <option>Please Select Relevant Road</option>
                                <?php
                                  while($records = mysql_fetch_array($q))
                                  {
                                    ?>
                                      <option value="<?= $records['id'] ?>"><?= $records['name']; ?></option>
                                    <?php
                                  }
                                ?>
                                
                            </select>
                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-right">
                            <label for="depth_pipes_located" class="control-label">Length</label>
                            <input type="text" class="form-control" id="depth_pipes_located" name="length">
                                       
                        </div>
                    </div>
                </div>
          
                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left">
                            <label for="distance_from_edge_of_the_road" class="control-label">Size of Single Curbe</label>
                            <input type="text" class="form-control" id="size_of_curbes" name="size_of_curbe">
                                       
                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-right">
                            <label for="number_of_pipes" class="control-label">Location:</label>
                            <input type="text" class="form-control" id="location" name="location">
                                       
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left">
                            <label for="diameter" class="control-label">Condition</label>
                            <input type="text" class="form-control" id="condtion" name="condition" required>
                                            
                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-right">
                            <label for="pupose_used_for" class="control-label">Property of</label>
                            <input type="text" class="form-control" id="property" name="property">
                                        
                        </div>
                    </div>
                </div> 

                

                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                      <label for="date" class="control-label">What Maintenance Required:</label>
                        <textarea class="form-control" rows="7" name="maintenance"></textarea>
                    </div>
                </div> 

                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left" id="FileUploadContainer">
                            <label for="sneeded" class="control-label">Sample imagetures:</label>
                            <input type="file" class="form-control" id="file" name="image[]"><a href="javascript:;" onclick ="AddFileUpload()">+ Add More</a>
                                        
                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-right">
                            <label for="status" class="control-label">Date Surveyed:</label>
                            <input type="text" type="text" class="form-control dateimageker" name="date">
                        </div>
                        
                    </div>
                </div>
   
                

<?php
}elseif ($para==4) {
  
?>


            <input type="hidden" value="<?= $para ?>" name="element_type" id="element_type_id"> 
                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left">
                            <label for="concept" class="control-label">Select Road:</label>
                            <select name="roads_id" class="form-control">
                                <?php
                                   $q = mysql_query("SELECT * FROM roads");
                                ?>
                                <option>Please Select Relevant Road</option>
                                <?php
                                  while($records = mysql_fetch_array($q))
                                  {
                                    ?>
                                      <option value="<?= $records['id'] ?>"><?= $records['name']; ?></option>
                                    <?php
                                  }
                                ?>
                                
                            </select>
                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-right">
                            <label for="depth_pipes_located" class="control-label">Type</label>
                            <select name="shoulder_type" class="form-control">
                                <option value="1">Asphalt</option>
                                <option value="2">Concrete</option>
                                <option value="3">gravel</option>
                            </select>
                                       
                        </div>
                        
                    </div>
                </div>
          
                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-right">
                            <label for="depth_pipes_located" class="control-label">Location</label>
                            <input type="text" class="form-control" id="depth_pipes_located" name="location">
                                       
                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-left">
                            <label for="number_of_pipes" class="control-label">Width</label>
                            <input type="text" class="form-control" id="number_of_pipes" name="width" required>
                                       
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left">
                            <label for="diameter" class="control-label">Length</label>
                            <input type="text" class="form-control" id="diameter" name="length">
                                            
                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-right">
                            <label for="pupose_used_for" class="control-label">Condition</label>
                            <input type="text" class="form-control" id="pupose_used_for" name="condition">
                                        
                        </div>
                    </div>
                </div> 

                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left">
                            <label for="condition" class="control-label">Property of</label>
                            <input type="text" class="form-control" id="condition" name="property">
                                  

                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-right">
                            <label for="status" class="control-label">Date Surveyed:</label>
                            <input type="text" type="text" class="form-control dateimageker" name="date">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                      <label for="date" class="control-label">What Maintenance Required:</label>
                        <textarea class="form-control" rows="7" name="maintenance"></textarea>
                    </div>
                </div> 

                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left" id="FileUploadContainer">
                            <label for="sneeded" class="control-label">Sample imagetures:</label>
                            <input type="file" class="form-control" id="file" name="image[]"><a href="javascript:;" onclick ="AddFileUpload()">+ Add More</a>
                                        
                        </div>&nbsp;
                        
                    </div>
                </div>
   
                


<?php
}elseif ($para==5) {
  
?>
            <input type="hidden" value="<?= $para ?>" name="element_type" id="element_type_id"> 
                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left">
                            <label for="concept" class="control-label">Select Road:</label>
                            <select name="roads_id" class="form-control">
                                <?php
                                   $q = mysql_query("SELECT * FROM roads");
                                ?>
                                <option>Please Select Relevant Road</option>
                                <?php
                                  while($records = mysql_fetch_array($q))
                                  {
                                    ?>
                                      <option value="<?= $records['id'] ?>"><?= $records['name']; ?></option>
                                    <?php
                                  }
                                ?>
                                
                            </select>
                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-right">
                            <label for="depth_pipes_located" class="control-label">Depth</label>
                            <input type="text" class="form-control" id="depth" name="depth">
                                       
                        </div>
                    </div>
                </div>
          
                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left">
                            <label for="distance_from_edge_of_the_road" class="control-label">Width</label>
                            <input type="text" class="form-control" id="wdith" name="width">
                                       
                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-right">
                            <label for="number_of_pipes" class="control-label">Length</label>
                            <input type="text" class="form-control" id="length" name="length" required>
                                       
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left">
                            <label for="diameter" class="control-label">Location:</label>
                            <input type="text" class="form-control" id="location" name="location">
                                            
                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-right">
                            <label for="pupose_used_for" class="control-label">Condition</label>
                            <input type="text" class="form-control" id="condition" name="condition">
                                        
                        </div>
                    </div>
                </div> 
                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left">
                            <label for="diameter" class="control-label">Property of</label>
                            <input type="text" class="form-control" id="property" name="property">
                                            
                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-right">
                            <label for="status" class="control-label">Date Surveyed:</label>
                            <input type="text" type="text" class="form-control dateimageker" name="date">
                        </div>
                    </div>
                </div> 

                

                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                      <label for="date" class="control-label">What Maintenance Required:</label>
                        <textarea class="form-control" rows="7" name="maintenance"></textarea>
                    </div>
                </div> 

                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left" id="FileUploadContainer">
                            <label for="sneeded" class="control-label">Sample imagetures:</label>
                            <input type="file" class="form-control" id="file" name="image[]"><a href="javascript:;" onclick ="AddFileUpload()">+ Add More</a>
                                        
                        </div>&nbsp;
                        
                        
                    </div>
                </div>
   

<?php
}elseif ($para==6) {
  
?>
            <input type="hidden" value="<?= $para ?>" name="element_type" id="element_type_id"> 
                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left">
                            <label for="concept" class="control-label">Select Road:</label>
                            <select name="roads_id" class="form-control">
                                <?php
                                   $q = mysql_query("SELECT * FROM roads");
                                ?>
                                <option>Please Select Relevant Road</option>
                                <?php
                                  while($records = mysql_fetch_array($q))
                                  {
                                    ?>
                                      <option value="<?= $records['id'] ?>"><?= $records['name']; ?></option>
                                    <?php
                                  }
                                ?>
                                
                            </select>
                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-right">
                            <label for="distance_from_edge_of_the_road" class="control-label">Name of Bus Stop:</label>
                            <input type="text" class="form-control" id="bus_stop_name" name="name" required>
                                       
                        </div>
                    </div>
                </div>
          
                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left">
                            <label for="distance_from_edge_of_the_road" class="control-label">Distance From Bus terminal/Station</label>
                            <input type="text" class="form-control" id="distance" name="distance" required>
                                       
                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-right">
                            <label for="number_of_pipes" class="control-label">Location</label>
                            <input type="text" class="form-control" id="location" name="location" required>
                                       
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left">
                            <label for="diameter" class="control-label">Property of</label>
                            <input type="text" class="form-control" id="property" name="property">
                                            
                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-right">
                            <label for="pupose_used_for" class="control-label">Condition</label>
                            <input type="text" class="form-control" id="condition" name="condition">
                                        
                        </div>
                    </div>
                </div> 

                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                      <label for="date" class="control-label">What Maintenance Required:</label>
                        <textarea class="form-control" rows="7" name="maintenance"></textarea>
                    </div>
                </div> 

                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left" id="FileUploadContainer">
                            <label for="sneeded" class="control-label">Sample imagetures:</label>
                            <input type="file" class="form-control" id="file" name="image[]"><a href="javascript:;" onclick ="AddFileUpload()">+ Add More</a>
                                        
                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-right">
                            <label for="status" class="control-label">Date Surveyed:</label>
                            <input type="text" type="text" class="form-control dateimageker" name="date">
                        </div>
                    </div>
                        
                    </div>
                </div>
   


<?php
}elseif ($para==7) {
  
?>

            <input type="hidden" value="<?= $para ?>" name="element_type" id="element_type_id"> 
                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left">
                            <label for="concept" class="control-label">Select Road:</label>
                            <select name="roads_id" class="form-control">
                                <?php
                                   $q = mysql_query("SELECT * FROM roads");
                                ?>
                                <option>Please Select Relevant Road</option>
                                <?php
                                  while($records = mysql_fetch_array($q))
                                  {
                                    ?>
                                      <option value="<?= $records['id'] ?>"><?= $records['name']; ?></option>
                                    <?php
                                  }
                                ?>
                                
                            </select>
                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-right">
                            <label for="concept" class="control-label">width</label>
                            <input type="text" class="form-control" id="width" name="width" required>
                        </div>
                    </div>
                </div>
      
                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left">
                            <label for="pupose_used_for" class="control-label">Length</label>
                            <input type="text" class="form-control" id="length" name="length">
                                        
                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-right">
                            <label for="pupose_used_for" class="control-label">Height</label>
                            <input type="text" class="form-control" id="height" name="height">
                                        
                        </div>
                        
                    </div>
                </div>       

                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
        
                      <div class="col-sm-6 form-group pull-left">
                          <label for="width" class="control-label">Condition</label>
                            <input type="text" class="form-control" id="condition" name="condition">
                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-right">
                            <label for="location" class="control-label">Location:</label>
                            <input type="text" class="form-control" id="location" name="location">
                                        
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left">
                          <label for="height" class="control-label">Property of</label>
                            <input type="text" class="form-control" id="property" name="property">
                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-right">
                            <label for="status" class="control-label">Date Surveyed:</label>
                            <input type="text" type="text" class="form-control dateimageker" name="date">
                        </div>
                        
                    </div>
                </div>       

               
                    
                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                      <label for="date" class="control-label">What Maintenance Required:</label>
                        <textarea class="form-control" rows="7" name="maintenance"></textarea>
                    </div>
                </div> 

                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left" id="FileUploadContainer">
                            <label for="sneeded" class="control-label">Sample imagetures:</label>
                            <input type="file" class="form-control" id="file" name="image[]"><a href="javascript:;" onclick ="AddFileUpload()">+ Add More</a>
                                       
                        </div>
                      </div>
                </div>
               
        <?php
      }

      ?>

      <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                         <input type="submit" class="btn btn-primary pull-right preview-add-button" value="Add Record">
                    </div>
                </div>
          </fieldset>
        </form>                  
  </div>
</div> <!-- / panel preview -->
      <?php
    }
?>


