<!DOCtype html>
<?php
  include('config/connection.php');
  // git element id 
  $e_id = $_GET['element_id'];
  ?>
   <style>
   .show_message_alert{
      text-align: center;
  border-bottom: 3px solid #B3ADAD;
  width: 97%;
  margin-left: -1px;
  background: #f9f9f9;
  position: absolute;
  z-index: 200000;
/*   display: none; */
/*  background-color: rgb(92, 184, 92); */
   }
   
   </style>
   <?php
       if(isset($_GET['after_insert']) && $_GET['after_insert']=='1')
       {
   ?>
   <div class="alert alert-success show_message_alert">
   <h4>Sucssesfuly inserted!</h4>
    </div>
    <?php
       }
     ?>
  <div class="alert" style="text-align: center; border-bottom:3px solid #B3ADAD;width: 100%; margin-left: -1px; background:#f9f9f9;">
          <button class="btn btn-default pull-right">Export to Excel</button>
          <h4>Road Records ( Records)</h4>
    </div>
   <?php
  if(isset($e_id))
  {
      $query = mysql_query("SELECT * FROM road_elements WHERE element_type = ".$e_id);
      // fetch records
      ?>
      <table class="table table-bordered table-hover">
          <?php
       if($e_id == 1)
       {
         ?> 
            <tr>
               <th>#</th><th>Parking Name</th><th>Location</th><th>Width</th><th>Length</th><th>Type</th><th colspan ="3">Action</th>
            </tr>
         <?php
       }
       elseif ($e_id == 2) {
         ?> 
            <tr>
               <th>#</th><th>Location</th><th>Condtion</th><th>Width</th><th>Length</th><th>Property of</th><th colspan ="3">Action</th>
            </tr>
         <?php
       }
       elseif ($e_id == 3) {
         ?> 
            <tr>
               <th>#</th><th>Location</th><th>Condtion</th><th>Size of Sigle Curbe</th><th>Length</th><th>Date Surveyed</th><th colspan ="3">Action</th>
            </tr>
         <?php
       }
       elseif ($e_id == 4) {
         ?> 
            <tr>
               <th>#</th><th>Location</th><th>Condtion</th><th>Width</th><th>Type</th><th>Length</th><th>Date Surveyed</th><th colspan ="3">Action</th>
            </tr>
         <?php
       }
       elseif ($e_id == 5) {
         ?> 
            <tr>
               <th>#</th><th>Location</th><th>Condtion</th><th>Width</th><th>Length</th><th>Depth</th><th>Date Surveyed</th><th colspan ="3">Action</th>
            </tr>
         <?php
       }
       elseif ($e_id == 6) {
         ?> 
            <tr>
               <th>#</th><th>Name</th><th>Desttance From Bust Station</th><th>Location</th><th>Condition</th><th>Date Surveyed</th><th colspan ="3">Action</th>
            </tr>
         <?php
       }
       elseif ($e_id == 7) {
         ?> 
            <tr>
               <th>#</th><th>Location</th><th>Condition</th><th>Length</th><th>Width</th><th>Height</th><th>Date Surveyed</th><th colspan ="3">Action</th>
            </tr>
         <?php
       }
      ?>
          
      <?php
      
      $counter = 0;
      while ($records = mysql_fetch_array($query)) {
          $counter++;
          ?>
            <tr>
              <?php
                if($e_id == 1)
                {
                  ?>
                  <td><?= $counter ?></td>
                  <td><?= $records['name'] ?></td><td><?= $records['condition'] ?></td><td><?= $records['width'] ?></td><td><?= $records['length'] ?></td><td><?=  $records['type']?></td>
                  <td><a href="javascript:;" onclick="view_road_elements_report('<?= $records['id']?>','<?= $e_id ?>')"><i class="fa fa-eye"></i></td>
                  <td><a href="update.php?id=<?= $records['id'] ?>"><i class="fa fa-pencil-square-o"></i></a></td>
                  <td><a href="delete.php?id=<?= $records['id'] ?>"><i class="fa fa-trash-o"></i></a></td>
                 <?php
                }
                elseif ($e_id == 2) {
                  ?>
                  <td><?= $counter ?></td>
                  <td><?= $records['location'] ?></td><td><?= $records['condition'] ?></td><td><?= $records['width'] ?></td><td><?= $records['length'] ?></td><td><?= $records['property_of'] ?></td>
                  <td><a href="javascript:;" onclick="view_road_elements_report('<?= $records['id']?>','<?= $e_id ?>')"><i class="fa fa-eye"></i></td>
                  <td><a href="update.php?id=<?= $records['id'] ?>"><i class="fa fa-pencil-square-o"></i></a></td>
                  <td><a href="delete.php?id=<?= $records['id'] ?>"><i class="fa fa-trash-o"></i></a></td>
                 <?php 
                }
                elseif ($e_id == 3) {
                  ?>
                  <td><?= $counter ?></td>
                  <td><?= $records['location'] ?></td><td><?= $records['condition'] ?></td><td><?= $records['size_of_curbe'] ?></td><td><?= $records['length'] ?></td><td><?= $records['s_date'] ?></td>
                  <td><a href="javascript:;" onclick="view_road_elements_report('<?= $records['id']?>','<?= $e_id ?>')"><i class="fa fa-eye"></i></td>
                  <td><a href="update.php?id=<?= $records['id'] ?>"><i class="fa fa-pencil-square-o"></i></a></td>
                  <td><a href="delete.php?id=<?= $records['id'] ?>"><i class="fa fa-trash-o"></i></a></td>
                 <?php 
                }
                elseif ($e_id == 4) {
                  ?>
                  <td><?= $counter ?></td>
                  <td><?= $records['location'] ?></td><td><?= $records['condition'] ?></td><td><?= $records['width'] ?></td><td><?= $records['type'] ?></td><td><?= $records['length'] ?></td><td><?= $records['s_date'] ?></td>
                  <td><a href="javascript:;" onclick="view_road_elements_report('<?= $records['id']?>','<?= $e_id ?>')"><i class="fa fa-eye"></i></td>
                  <td><a href="update.php?id=<?= $records['id'] ?>"><i class="fa fa-pencil-square-o"></i></a></td>
                  <td><a href="delete.php?id=<?= $records['id'] ?>"><i class="fa fa-trash-o"></i></a></td>
                 <?php 
                }
                elseif ($e_id == 5) {
                  ?>
                  <td><?= $counter ?></td>
                  <td><?= $records['location'] ?></td><td><?= $records['condition'] ?></td><td><?= $records['width'] ?></td><td><?= $records['length'] ?></td><td><?= $records['depth'] ?></td><td><?= $records['s_date'] ?></td>
                  <td><a href="javascript:;" onclick="view_road_elements_report('<?= $records['id']?>','<?= $e_id ?>')"><i class="fa fa-eye"></i></td>
                  <td><a href="update.php?id=<?= $records['id'] ?>"><i class="fa fa-pencil-square-o"></i></a></td>
                  <td><a href="delete.php?id=<?= $records['id'] ?>"><i class="fa fa-trash-o"></i></a></td>
                 <?php 
                }
                elseif ($e_id == 6) {
                  ?>
                  <td><?= $counter ?></td>
                  <td><?= $records['name'] ?></td><td><?= $records['d_from_bus_stop'] ?></td><td><?= $records['locatiion'] ?></td><td><?= $records['condition'] ?></td><td><?= $records['s_date'] ?></td>
                  <td><a href="javascript:;" onclick="view_road_elements_report('<?= $records['id']?>','<?= $e_id ?>')"><i class="fa fa-eye"></i></td>
                  <td><a href="update.php?id=<?= $records['id'] ?>"><i class="fa fa-pencil-square-o"></i></a></td>
                  <td><a href="delete.php?id=<?= $records['id'] ?>"><i class="fa fa-trash-o"></i></a></td>
                 <?php 
                }
                elseif ($e_id == 7) {
                  ?>
                  <td><?= $counter ?></td>
                  <td><?= $records['location'] ?></td><td><?= $records['condition'] ?></td><td><?= $records['length'] ?></td><td><?= $records['width'] ?></td><th><?= $records['height'] ?></th><td><?= $records['s_date'] ?></td>
                  <td><a href="javascript:;" onclick="view_road_elements_report('<?= $records['id']?>','<?= $e_id ?>')"><i class="fa fa-eye"></i></td>
                  <td><a href="update.php?id=<?= $records['id'] ?>"><i class="fa fa-pencil-square-o"></i></a></td>
                  <td><a href="delete.php?id=<?= $records['id'] ?>"><i class="fa fa-trash-o"></i></a></td>
                 <?php 
                }
                ?>
                
            </tr>
         <?php
       }
       ?>
      </table>
      <?php
  }

?>