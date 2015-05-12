<script>
    $('.datepicker').datepicker({
       format: 'yyyy-mm-dd',
       startDate: '-3d'

   });
    $(".parsley_form").parsley();
</script>


<!-- panel preview -->
<div class="col-md-12 panel panel-default">
  <div class="col-md-12 custom">
    <form class = "form_custom parsley_form" id="roads_form" method="POST" enctype="multipart/form-data" data-parsley-validate>
        <fieldset>

<?php
   	$id = $_GET['element_id'];
	if(isset($id)){
        if($id == 1){
?>


            <div class="form-group">
                <div class="col-sm-3"></div>
                <div class="col-sm-9">
                    <div class="col-sm-6 form-group pull-left">
                    <label for="concept" class="control-label">Select Road:</label>
                    <select name="roads" class="form-control">
                        <option>Please Select Relevant Road</option>
                        <option value="1">Road one</option>
                    </select>
                    </div>&nbsp;
                    <div class="col-sm-6 form-group pull-right">
                        <label for="concept" class="control-label">What Traffic signs exists:</label>
                        <input type="text" class="form-control" id="concept" name="road_sign">
                    
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-3"></div>
                <div class="col-sm-9">
                    <div class="col-sm-6 form-group pull-left">
                        <label for="slocation" class="control-label">Location of Signs:</label>
                        <input type="text" class="form-control" id="slocation" name="location">
                    </div>&nbsp;
                    <div class="col-sm-6 form-group pull-right">
                        <label for="description" class="control-label">Condition:</label>
                    <input type="text" class="form-control" id="description" name="conditon">
                    </div>

                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-3"></div>
                <div class="col-sm-9">
                    <div class="col-sm-6 pull-left form-group">
                        <label for="concept" class="control-label">Distance from road edge:</label>
                        <input type="text" class="form-control" id="concept" name="distance">
                    </div>&nbsp;
                    <div class="col-sm-6 pull-right form-group pull-right">
                        <label for="concept" class="control-label">Station</label>
                        <input type="text" class="form-control" id="concept" name="station" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-3"></div>
                <div class="col-sm-9">
                	<div class="col-sm-6 pull-left form-group">
                    	<label for="sneeded" class="control-label">Signs Needed:</label>
                        <input type="number" class="form-control" id="sneeded" name="sign">
                    </div>&nbsp;
                    <div class="col-sm-6 pull-right form-group pull-right">
                    	<label for="status" class="control-label">Date Surveyed:</label>
                        <input type="text" type="text" class="form-control datepicker" name="date">
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
                        <label for="width" class="control-label">Sample Pictures:</label>
                        <input type="file" class="form-control" id="file" name="pic[]"><a href="javascript:;" onclick ="AddFileUpload()">+ Add More</a>
                    </div>&nbsp;
                </div>
            </div>

            

<?php
}elseif ($id==2) {
?>



                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left">
                            <label for="concept" class="control-label">Select Road:</label>
                            <select name="roads" class="form-control">
                                <option>Please Select Relevant Road</option>
                                <option value="1">Road one</option>
                            </select>
                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-right">
                            <label for="concept" class="control-label">Type of pavement marking:</label>
                            <input type="text" class="form-control" id="concept" name="type_pavement">
                        </div>
                    </div>
                </div>
			
                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left">
                            <label for="slocation" class="control-label">Location of pavement marking? Station? Lane?</label>
                            <input type="text" class="form-control" id="slocation" name="location">
                                    
                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-right">
                            <label for="concept" class="control-label">Condition:</label>
                                                <input type="text" class="form-control" id="concept" name="condition" required>
                                            
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left">
                            <label for="concept" class="control-label">Pavement marking needed</label>
                            <input type="text" class="form-control" id="concept" name="pavement_marking">
                      
                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-right">
                            <label for="status" class="control-label">Date Surveyed:</label>
                            <input type="text" type="text" name="date" class="form-control datepicker">
                        </div>
                    </div>
                </div>


                <div class="form-group">
                  <div class="col-sm-3"></div>
                  <div class="col-sm-9">
                    <label for="date" class="control-label">What Maintenance Required:</label>
                      <textarea class="form-control" rows="7" name = "maintenance"></textarea>
                  </div>
                </div> 


                <div class="form-group">
                <div class="col-sm-3"></div>
                  <div class="col-sm-9">
                    <div class="col-sm-6 form-group pull-left" id ="FileUploadContainer">
                        <label for="sneeded" class="control-label">Sample Picture:</label>
                        <input type="file" class="form-control" id="file" name="pic[]"><a href="javascript:;" onclick ="AddFileUpload()">+ Add More</a>
                      
                    </div>&nbsp;
                  </div>
                </div>

                

<?php
}elseif ($id==3) {
?>



                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left">
                            <label for="concept" class="control-label">Select Road:</label>
                            <select name="roads" class="form-control">
                                <option>Please Select Relevant Road</option>
                                <option value="1">Road one</option>
                            </select>
                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-right">
                            <label for="concept" class="control-label">Number of street lights in every 100m:</label>
                            <input type="text" class="form-control" id="concept" name="number_light">
                                   
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left">
                            <label for="slocation" class="control-label">Type of street lighting:</label>
                            <input type="text" class="form-control" id="slocation" name="type_street">
                                   
                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-right">
                            <label for="description" class="control-label">Number of street lights needed to be installed:</label>
                            <input type="text" class="form-control" id="description" name="install_light">
                                   
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 pull-left form-group">
                            <label for="concept" class="control-label">Source of power:</label>
                            <input type="text" class="form-control" id="concept" name="power">
                        </div>&nbsp;
                        <div class="col-sm-6 pull-right form-group pull-right">
                            <label for="concept" class="control-label">Condition:</label>
                            <input type="text" class="form-control" id="concept" name="condition" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                    	<label for="date" class="control-label">What Maintenance Required:</label>
                        <textarea class="form-control" rows="7" name="maintenace"></textarea>
                    </div>
                </div>                   

                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left" id="FileUploadContainer">
                            <label for="sneeded" class="control-label">Sample Picture:</label>
                            <input type="file" class="form-control" id="file" name="pic[]"><a href="javascript:;" onclick ="AddFileUpload()">+ Add More</a>
               
                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-right">
                            <label for="status" class="control-label">Date Surveyed:</label>
                            <input type="text" type="text" class="form-control datepicker" name="date">
                        </div>
                    </div>
                </div>

               
<?php
}elseif ($id==4) {
?>



                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left">
                            <label for="concept" class="control-label">Select Road:</label>
                            <select name="roads" class="form-control">
                                <option>Please Select Relevant Road</option>
                                <option value="1">Road one</option>
                            </select>
                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-right">
                            <label for="concept" class="control-label">Type of traffic signals? pre-time or Actuated?:</label>
                            <input type="text" class="form-control" id="concept" name="type_signal" required>
                    
                        </div>
                    </div>
                </div>



                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left">
                            <label for="slocation" class="control-label">Source of power:</label>
                            <input type="text" class="form-control" id="slocation" name="power">
                                      
                        </div>&nbsp;
                        <div class="col-sm-6 form-group pull-right">
                            <label for="slocation" class="control-label">Direction the traffic signals need to be installed:</label>
                            <input type="text" class="form-control" id="slocation" name="direction">        
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left">
                            <label for="slocation" class="control-label">Condition:</label>
                            <input type="text" class="form-control" id="slocation" name="condition">
                    
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
                        <textarea class="form-control" rows="7" name="maintenace"></textarea>
                    </div>
                </div> 

                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="col-sm-6 form-group pull-left" id="FileUploadContainer">
                            <label for="sneeded" class="control-label">Sample Picture:</label>
                            <input type="file" class="form-control" id="file" name="pic[]"><a href="javascript:;" onclick ="AddFileUpload()">+ Add More</a>           
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
</div><!-- / panel preview -->
    <?php
}

?>
