<?php  include('config/connection.php');?>
<script type="text/javascript">
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
<div class="alert" style="text-align: center; border-bottom:3px solid #B3ADAD;width: 100%; margin-left: -1px; background:#f9f9f9;">
          <button class="btn btn-default pull-left">Back</button>
          <h4>Add Intersection Records</h4>
    </div>
<div class="col-md-12 panel panel-default">
  <div class="col-md-12 custom">
    <form class = "form_custom parsley_form" action="" id="" method="POST" enctype="multipart/form-data" data-parsley-validate>
      <fieldset>

        <div class="form-group">
            <div class="col-sm-3"></div>
            <div class="col-sm-9">
              <div class="col-sm-6 form-group pull-left">
                <label for="concept" class="control-label">Select Road:</label>
                <select name="roads" class="form-control">
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
                  <label for="lenght" class="control-label">Name of Intersection:</label>
                   <input type="text" class="form-control" id="name_of_intersection" name="name_of_intersection" required> 
                  </div>

            </div>
        </div>

        
        <div class="form-group">
            <div class="col-sm-3"></div>
            <div class="col-sm-9">
              <div class="col-sm-6 form-group pull-left">
                  <label for="width" class="control-label">Type of Intesection</label>
                    <input type="text" class="form-control" id="type_of_intersection" name="type_of_intersection">
                </div>&nbsp;
                <div class="col-sm-6 form-group pull-right">
                  <label for="lenght" class="control-label">Signalized / Unsignalized:</label>
                   <select name="Signalized_or_unsignalized" class="form-control">
                    <option value="">Please select one</option>
                    <option value="signalized">Signalized</option>
                    <option value="unsignalized">Unsignalized</option>
                  </select> 
                  </div>

            </div>
        </div>

        
 
        <div class="form-group">
            <div class="col-sm-3"></div>
            <div class="col-sm-9">
              <div class="col-sm-6 form-group pull-left">
                  <label for="width" class="control-label">Location</label>
                    <input type="text" class="form-control" id="width" name="location" required>
                </div>&nbsp;
                <div class="col-sm-6 form-group pull-right">
                  <label for="Exsisting Condiation Diragram(drawing)" class="control-label">Exsisting Condiation Diragram(drawing)</label>
                    <input type="file" class="form-control" id="existing_condition_diagram" name="existing_condition_diagram">
                </div>

            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-3"></div>
            <div class="col-sm-9">
              <div class="col-sm-6 form-group pull-left">
                  <label for="width" class="control-label">Property of:</label>
                    <input type="text" class="form-control" id="property_of" name="property_of">
                </div>&nbsp;

                <div class="col-sm-6 form-group pull-right">
                  <label for="lenght" class="control-label">Date Surveyed:</label>
                   <input type="text" type="text" class="form-control datepicker" name="date">
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
                   <input type="file" class="form-control" id="file" name="sample_pictures[]"><a href="javascript:;" onclick ="AddFileUpload()">+ Add More</a>
                </div>&nbsp;
            </div>
        </div>

        <div class="form-group">
          <div class="col-sm-3"></div>
          <div class="col-sm-9">
            <button type="submit" class="btn btn-primary pull-right preview-add-button">
                <span class="glyphicon glyphicon-plus"></span> Add Record
            </button>
          </div>
        </div>
                              
      </fieldset>
    </form> 
  </div>           
</div> <!-- / panel preview -->





