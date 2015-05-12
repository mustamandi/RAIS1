<!DOCTYPE html>
<html>
<head>
    <?php include("includes/head.php") ?>
</head>
<body>
    <div class="col-md-12">
        <div class="row">
            <?php include("includes/header.php") ?>
          <div class="page-header">
              <center><h1>Road Asset Inventory System</h1></center>
          </div>
        
        <div class="col-md-6">
          <form class="form-horizontal">

            <div class="form-group">
              <label for="inputEmail3" class="col-sm-4 control-label">Name of Road</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="name_of_road" placeholder="Name of Road">
              </div>
            </div>
            
            
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-4 control-label">Type</label>
              <div class="col-sm-8">
                <select name="type" class="form-control">
                  <option value="1">Road Type</option>
                  <option value="1">Road Type</option>
                </select>
              </div>
            </div>
            
            
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-4 control-label">Number of Lanes</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="number_of_lanes" placeholder="Number of Lanes">
              </div>
            </div>

            <div class="form-group">
              <label for="inputEmail3" class="col-sm-4 control-label">Width</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="width" placeholder="Width">
              </div>
            </div>

            <div class="form-group">
              <label for="inputEmail3" class="col-sm-4 control-label">Lenght</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="lenght" placeholder="Lenght">
              </div>
            </div>

            <div class="form-group">
              <label for="inputEmail3" class="col-sm-4 control-label">Pavement Condition</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="pavement_condition" placeholder="Pavement Condition">
              </div>
            </div>

            <div class="form-group">
              <label for="inputEmail3" class="col-sm-4 control-label">Property Of</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="property_of" placeholder="Property Of">
              </div>
            </div>

            <div class="form-group">
              <label for="inputEmail3" class="col-sm-4 control-label">Sample Picture</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="sample_picture" placeholder="Sample Picture">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-4 control-label">What Maintainence</label>
              <div class="col-sm-8">
                <textarea name="what_maintenance" class =  "form-control" rows="10"></textarea>
              </div>
            </div>

            <div class="form-group">
              <label for="inputEmail3" class="col-sm-4 control-label">Date Surveyed</label>
              <div class="col-sm-8">
                <div class='input-group date' id='datetimepicker11'>
                  <input type='text' class="form-control" />
                  <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar">
                      </span>
                  </span>
                </div>
              </div>
            </div>

            
            <div class="form-group">
              <div class=" col-sm-8 custom">
                <button type="submit" class="btn btn-primary custom  form-control">Sign in</button>
              </div>
            </div>
        </form>
        </div><!--  end of col-md-6 -->
        
        </div>

  </div>
    <?php include('includes/footer.php') ?>
</body>
</html>