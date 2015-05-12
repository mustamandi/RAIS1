<?php
    include("config/connection.php");
    $q = mysql_query("select * from roads");
    $id = $_GET['element_id'];
    $table = $_GET['table'];
?>

<script>
    $('.datepicker').datepicker({
       format: 'yyyy-mm-dd',
       startDate: '-3d'

   });
     $(".parsley_form").parsley();

 $("#add_structure_form").on('submit',(function(e){
        e.preventDefault();
        page_opacity();
        $.ajax({
            url: base_url + "controller/structure_insertion.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            dataType:"json",
            processData:false,
            success: function(result){
//            alert(result); 
            if(result[0] == 1){
                    load_structures('<?=$id?>','<?=$table?>');
                    $(".loading").css('display','none');
                    $(".success_error_imgages").css('display','none');
                    $(".message").html('');
                    $(".form-group").css('opacity','');
                    $("#add_structure_form")[0].reset();
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

<?php
    if(isset($id))
    {
        
        ?>
        <div class="panel panel-default col-md-12">
    <div class="col-md-12 custom">
        <form class = "form_custom parsley_form" action="" method="POST" id="add_structure_form" enctype="multipart/form-data" data-parsley-validate>
            <fieldset>
            <input type="hidden" name="element_id" value="<?=$id?>"/>
                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left">
                            <label for="concept" class="control-label">Select Road:</label>
                            <select name="name_of_road" class="form-control">
                            <option>Please Select Relevant Road</option>
                            <?php
                                while($row = mysql_fetch_assoc($q))
                                { ?>
                                    <option value="<?=$row['id']?>"><?=$row['name']?></option> 
                                    
                                    <?php
                                }
                            ?>
                               
                            </select>
                        </div>&nbsp;
            <?php
    	if($id == 1)
    	{
    		
?>
    <!-- panel preview -->

              
                        <div class="col-sm-6 form-group pull-right">
                            <label for="slocation" class="control-label">Location:Station?</label>
                            <input type="text" class="form-control" name="slocation" name="location">
                            
                        </div>
                    </div>
                </div>

            	<div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left">
                            <label for="number_of_lanes" class="control-label">Number of Lanes:</label>
                            <input type="text" class="form-control" id="number_of_lanes" name="number_lanes">
                                    
                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-right">
                            <label for="under_clearance" class="control-label">Under clearance:</label>
                            <input type="number" class="form-control" id="under_clearance" name="under_clearance">
                                    
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                    	<div class="col-sm-6 form-group pull-left">
                        	<label for="width" class="control-label">Size (Width)</label>
                            <input type="text" class="form-control" id="width" name="width">
                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-right">
                        	<label for="lenght" class="control-label">Size (Length)</label>
                            <input type="text" class="form-control" id="lenght" name="lenght">
                        </div>

                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left">
                            <label for="condition" class="control-label">Condition:</label>
                            <input type="number" class="form-control" id="condition" name="condition">
                                     
                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-right">
                            <label for="lenght" class="control-label">Type of Bridge Structure</label>
                            <input type="text" class="form-control" id="lenght" name="bridge" required>
                        </div>
                        
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left">
                            <label for="lenght" class="control-label">Under CLearance</label>
                            <input type="text" class="form-control" id="lenght" name="clearance">
                              
                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-right">
                            <label for="status" class="control-label">Date Surveyed:</label>
                            <input type="text" type="text" class="form-control datepicker" name="date">
                        </div>
                        
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <label for="date" class="control-label">What Maintenance Required:</label>
                        <textarea class="form-control" rows="7" name="what_maintenance"></textarea>
                    </div>
                </div>

                 <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left" id="FileUploadContainer">
                            <label for="sneeded" class="control-label">Sample Pictures:</label>
                            <input type="file" class="form-control" id="file" name="image[]"><a href="javascript:;" onclick ="AddFileUpload()">+ Add More</a>
                                   
                        </div>&nbsp;
                        
                    </div>
                </div>
     
              
<?php
}elseif ($id==2) {
	
?>


                
                        <div class="col-sm-6 form-group pull-right">
                            <label for="concept" class="control-label">type of post structure:</label>
                            <select name="post_structure" class="form-control">
                                <option value ="metal">Metal</option>
                                <option value="concrete">Concrete</option>
                                <option value="wood">Wood</option>
                            </select>
                        </div>
                    </div>
                </div>

            	<div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left">
                            <label for="pupose_used_for" class="control-label">Purpose used for?</label>
                            <input type="text" class="form-control" id="pupose_used_for" name="pupose">
                                   
                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-right">
                            <label for="number_of_posts_in_every_100m" class="control-label">Number of posts in every 100m</label>
                            <input type="text" class="form-control" id="number_of_posts_in_every_100m" name="number_posts">
                                    
                        </div>
                    </div>
                </div>	

                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                    
                    	<div class="col-sm-6 form-group pull-left">
                        	<label for="diameter" class="control-label">Size (Diameter)</label>
                            <input type="text" class="form-control" id="diameter" name="diameter">
                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-right">
                        	<label for="height" class="control-label">Size (Height)</label>
                            <input type="text" class="form-control" id="height" name="height" required>
                        </div>

                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left">
                            <label for="distance_from_edge_of_the_road" class="control-label">Distance from edge of the road</label>
                            <input type="text" class="form-control" id="distance_from_edge_of_the_road" name="distance">
                                       
                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-right">
                            <label for="condition" class="control-label">Condition</label>
                            <input type="text" class="form-control" id="condition" name="condition">
                                       
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <label for="date" class="control-label">What Maintenance Required:</label>
                        <textarea class="form-control" rows="7" name="what_maintenance"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left" id="FileUploadContainer">
                            <label for="sneeded" class="control-label">Sample Pictures:</label>
                            <input type="file" class="form-control" id="file" name="image[]"><a href="javascript:;" onclick ="AddFileUpload()">+ Add More</a>
                                       
                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-right">
                            <label for="status" class="control-label">Date Surveyed:</label>
                            <input type="text" type="text" class="form-control datepicker" name="date">
                        </div>
                    </div>
                </div>        

<?php
}elseif ($id==3) {
	
?>
                
                        <div class="col-sm-6 form-group pull-right">
                            <label for="depth_pipes_located" class="control-label">Depth pipes located</label>
                            <input type="text" class="form-control" id="depth_pipes_located" name="depth_pipes">
                                       
                        </div>
                    </div>
                </div>
    			
                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left">
                            <label for="distance_from_edge_of_the_road" class="control-label">Distance from edge of the road:</label>
                            <input type="text" class="form-control" id="distance_from_edge_of_the_road" name="distance">
                                       
                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-right">
                            <label for="number_of_pipes" class="control-label">Number of pipes:</label>
                            <input type="text" class="form-control" id="number_of_pipes" name="number_pipes">
                                       
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left">
                            <label for="diameter" class="control-label">Size (Diameter)</label>
                            <input type="text" class="form-control" id="diameter" name="diameter" required>
                                            
                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-right">
                            <label for="pupose_used_for" class="control-label">Purpose used for:</label>
                            <input type="text" class="form-control" id="pupose_used_for" name="pupose">
                                        
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
                            <label for="status" class="control-label">Date Surveyed:</label>
                            <input type="text" type="text" class="form-control datepicker" name="date">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                    	<label for="date" class="control-label">What Maintenance Required:</label>
                        <textarea class="form-control" rows="7" name="what_maintenance"></textarea>
                    </div>
                </div> 

                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left" id="FileUploadContainer">
                            <label for="sneeded" class="control-label">Sample Pictures:</label>
                            <input type="file" class="form-control" id="file" name="image[]"><a href="javascript:;" onclick ="AddFileUpload()">+ Add More</a>
                                        
                        </div>&nbsp;
                        
                    </div>
                </div>

<?php
}elseif ($id==4) {
	
?>
               
                        <div class="col-sm-6 form-group pull-right">
                            <label for="concept" class="control-label">Type of post structure:</label>
                            <select name="type_structure" class="form-control">
                                <option value="metal">Metal</option>
                                <option value="concrete">Concrete</option>
                                <option value="wood">Wood</option>
                            </select>
                        </div>
                    </div>
                </div>
    	
                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left">
                            <label for="pupose_used_for" class="control-label">Purpose used for:</label>
                            <input type="text" class="form-control" id="pupose_used_for" name="pupose">
                                        
                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-right">
                            <label for="location" class="control-label">Location:</label>
                            <input type="text" class="form-control" id="location" name="location" required>
                                        
                        </div>
                    </div>
                </div>       

                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
        
                    	<div class="col-sm-6 form-group pull-left">
                        	<label for="width" class="control-label">Size of Board (Width)</label>
                            <input type="text" class="form-control" id="width" name="width">
                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-right">
                        	<label for="height" class="control-label">Size of Board (Height)</label>
                            <input type="text" class="form-control" id="height" name="height">
                        </div>

                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left">
                            <label for="distance_from_edge_of_the_road" class="control-label">Distance from the edge of the road:</label>
                            <input type="text" class="form-control" id="distance_from_edge_of_the_road" name="distance">
                                       
                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-right">
                            <label for="status" class="control-label">Date Surveyed:</label>
                            <input type="text" type="text" class="form-control datepicker" name="date">
                        </div>
                    </div>
                </div>
                    
                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                    	<label for="date" class="control-label">What Maintenance Required:</label>
                        <textarea class="form-control" rows="7" name="what_maintenance"></textarea>
                    </div>
                </div> 

                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left" id="FileUploadContainer">
                            <label for="sneeded" class="control-label">Sample Pictures:</label>
                            <input type="file" class="form-control" id="file" name="image[]"><a href="javascript:;" onclick ="AddFileUpload()">+ Add More</a>
                                       
                        </div>&nbsp;
                        
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
