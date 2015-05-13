<!DOCTYPE html>
<?php
include('config/connection.php');
include('includes/head.php');

  $id = $_GET['id'];
  $e_id = $_GET['element_id'];
  $q = mysql_query("select * from road_elements where id=$id");
  $row = mysql_fetch_array($q);
  //echo $row['road_id']; exit();
  $road = mysql_query("select * from roads where id =".$row['road_id']);
  $road_name = mysql_fetch_array($road);
   
  
?>

<div class="col-md-12" style="background:#f9f9f9;">
        <div class="alert" style="text-align: center; border-bottom:3px solid #B3ADAD;width: 103%; margin-left: -14px;">
          <button class="btn btn-default pull-left" onclick="goback();" >Back</button>
          <button class="btn btn-default pull-right" onclick="PrintElem('road_details_print');">Print</button>
          <h4>Details of <?=$row['name']?></h4>

        </div>
        <div id="road_details_print">
        <div class="col-md-6" style="border-right: 1px solid #E5E2E2";>
<table class="table"> 
	<?php 
	 if($e_id == 1)
	 {
	 	?>
	 		<tr>
		        <td style="font-weight: bold;">Road Name</td>
		        <td><?=$road_name['name']?></td>
			</tr>
			<tr>
				<td style="font-weight: bold;">Name of Parking</td>
				<td><?= $row['name'] ?></td>
			</tr>
			<tr>
				<td style="font-weight: bold;">Type</td>
				<td><?= $row['type'] ?></td>
			</tr>
			<tr>
		        <td style="font-weight: bold;">Height:</td>
		        <td><?=$row['height']?></td>
		    </tr>
		    <tr>
		        <td style="font-weight: bold;">Width:</td>
		        <td><?=$row['width']?></td>
		    </tr>
		    <tr>
		        <td style="font-weight: bold;">Capacity: No of Passenger cars:</td>
		        <td><?=$row['capacity']?></td>
		    </tr>
		    <tr>
		        <td style="font-weight: bold;">Location:</td>
		        <td><?=$row['location']?></td>
		    </tr>
		    <tr>
		        <td style="font-weight: bold;">Condtion:</td>
		        <td><?=$row['condition']?></td>
		    </tr>
		    
		    <tr>
		        <td style="font-weight: bold;">Property of:</td>
		        <td><?=$row['property_of']?></td>
		    </tr>
		   
		    <tr>
		        <td style="font-weight: bold;">Date Surveyed:</td>
		        <td><?=$row['s_date']?></td>
		    </tr>
		    <tr>
		        <td style="font-weight: bold;">What Maintenance Required:</td>
		        <table>
		        	<tr>
		        		<td><?=$row['maintenance']?></td>
		        	</tr>
		        </table>
		        
		    </tr>
	 	<?php

	 }
	 if($e_id == 2)
	 {
	 	?>
	 		<tr>
		        <td style="font-weight: bold;">Road Name</td>
		        <td><?=$road_name['name']?></td>
			</tr>
		    <tr>
		        <td style="font-weight: bold;">Width:</td>
		        <td><?=$row['width']?></td>
		    </tr>
		    <tr>
		        <td style="font-weight: bold;">Length:</td>
		        <td><?=$row['length']?></td>
		    </tr>
		    <tr>
		        <td style="font-weight: bold;">Location:</td>
		        <td><?=$row['location']?></td>
		    </tr>
		    <tr>
		        <td style="font-weight: bold;">Condtion:</td>
		        <td><?=$row['condition']?></td>
		    </tr>
		    
		    <tr>
		        <td style="font-weight: bold;">Property of:</td>
		        <td><?=$row['property_of']?></td>
		    </tr>
		   
		    <tr>
		        <td style="font-weight: bold;">Date Surveyed:</td>
		        <td><?=$row['s_date']?></td>
		    </tr>
		    <tr>
		        <td style="font-weight: bold;">What Maintenance Required:</td>
		        <table>
		        	<tr>
		        		<td><?=$row['maintenance']?></td>
		        	</tr>
		        </table>
		        
		    </tr>
	 	<?php

	 }
	 if($e_id == 3)
	 {
	 	?>
	 		<tr>
		        <td style="font-weight: bold;">Road Name</td>
		        <td><?=$road_name['name']?></td>
			</tr>
		    <tr>
		        <td style="font-weight: bold;">Length:</td>
		        <td><?=$row['length']?></td>
		    </tr>
		    <tr>
		        <td style="font-weight: bold;">Size of Single Curb:</td>
		        <td><?=$row['size_of_curbe']?></td>
		    </tr>
		    <tr>
		        <td style="font-weight: bold;">Location:</td>
		        <td><?=$row['location']?></td>
		    </tr>
		    <tr>
		        <td style="font-weight: bold;">Condtion:</td>
		        <td><?=$row['condition']?></td>
		    </tr>
		    
		    <tr>
		        <td style="font-weight: bold;">Property of:</td>
		        <td><?=$row['property_of']?></td>
		    </tr>
		   
		    <tr>
		        <td style="font-weight: bold;">Date Surveyed:</td>
		        <td><?=$row['s_date']?></td>
		    </tr>
		    <tr>
		        <td style="font-weight: bold;">What Maintenance Required:</td>
		        <table>
		        	<tr>
		        		<td><?=$row['maintenance']?></td>
		        	</tr>
		        </table>
		        
		    </tr>
	 	<?php

	 }
	 if($e_id == 4)
	 {
	 	?>
	 		<tr>
		        <td style="font-weight: bold;">Road Name</td>
		        <td><?=$road_name['name']?></td>
			</tr>
			<tr>
		        <td style="font-weight: bold;">Shoulder type:</td>
		        <td><?=$row['shoulder_type']?></td>
		    </tr>
		    <tr>
		        <td style="font-weight: bold;">Length:</td>
		        <td><?=$row['length']?></td>
		    </tr>
		    <tr>
		        <td style="font-weight: bold;">Location:</td>
		        <td><?=$row['location']?></td>
		    </tr>
		    <tr>
		        <td style="font-weight: bold;">Condtion:</td>
		        <td><?=$row['condition']?></td>
		    </tr>
		    
		    <tr>
		        <td style="font-weight: bold;">Property of:</td>
		        <td><?=$row['property_of']?></td>
		    </tr>
		   
		    <tr>
		        <td style="font-weight: bold;">Date Surveyed:</td>
		        <td><?=$row['s_date']?></td>
		    </tr>
		    <tr>
		        <td style="font-weight: bold;">What Maintenance Required:</td>
		        <table>
		        	<tr>
		        		<td><?=$row['maintenance']?></td>
		        	</tr>
		        </table>
		        
		    </tr>
	 	<?php

	 }
	 if($e_id == 5)
	 {
	 	?>
	 		<tr>
		        <td style="font-weight: bold;">Road Name</td>
		        <td><?=$road_name['name']?></td>
			</tr>
			<tr>
		        <td style="font-weight: bold;">Depth:</td>
		        <td><?=$row['depth']?></td>
		    </tr>
		    <tr>
		        <td style="font-weight: bold;">Length:</td>
		        <td><?=$row['length']?></td>
		    </tr>
		    <tr>
		        <td style="font-weight: bold;">Width:</td>
		        <td><?=$row['width']?></td>
		    </tr>
		    <tr>
		        <td style="font-weight: bold;">Location:</td>
		        <td><?=$row['location']?></td>
		    </tr>
		    <tr>
		        <td style="font-weight: bold;">Condtion:</td>
		        <td><?=$row['condition']?></td>
		    </tr>
		    
		    <tr>
		        <td style="font-weight: bold;">Property of:</td>
		        <td><?=$row['property_of']?></td>
		    </tr>
		   
		    <tr>
		        <td style="font-weight: bold;">Date Surveyed:</td>
		        <td><?=$row['s_date']?></td>
		    </tr>
		    <tr>
		        <td style="font-weight: bold;">What Maintenance Required:</td>
		        <table>
		        	<tr>
		        		<td><?=$row['maintenance']?></td>
		        	</tr>
		        </table>
		        
		    </tr>
	 	<?php

	 }
	 if($e_id == 6)
	 {
	 	?>
	 		<tr>
		        <td style="font-weight: bold;">Road Name</td>
		        <td><?=$road_name['name']?></td>
			</tr>
			<tr>
		        <td style="font-weight: bold;">Name of Bust Stop:</td>
		        <td><?=$row['name']?></td>
		    </tr>
		    <tr>
		        <td style="font-weight: bold;">Distance From Bust Station:</td>
		        <td><?=$row['d_from_bus_stop']?></td>
		    </tr>
		    <tr>
		        <td style="font-weight: bold;">Location:</td>
		        <td><?=$row['location']?></td>
		    </tr>
		    <tr>
		        <td style="font-weight: bold;">Condtion:</td>
		        <td><?=$row['condition']?></td>
		    </tr>
		    
		    <tr>
		        <td style="font-weight: bold;">Property of:</td>
		        <td><?=$row['property_of']?></td>
		    </tr>
		   
		    <tr>
		        <td style="font-weight: bold;">Date Surveyed:</td>
		        <td><?=$row['s_date']?></td>
		    </tr>
		    <tr>
		        <td style="font-weight: bold;">What Maintenance Required:</td>
		        <table>
		        	<tr>
		        		<td><?=$row['maintenance']?></td>
		        	</tr>
		        </table>
		        
		    </tr>
	 	<?php

	 }
	 if($e_id == 7)
	 {
	 	?>
	 		<tr>
		        <td style="font-weight: bold;">Road Name</td>
		        <td><?=$road_name['name']?></td>
			</tr>
			<tr>
		        <td style="font-weight: bold;">Height:</td>
		        <td><?=$row['height']?></td>
		    </tr>
		    <tr>
		        <td style="font-weight: bold;">Width:</td>
		        <td><?=$row['width']?></td>
		    </tr>
		     <tr>
		        <td style="font-weight: bold;">Length:</td>
		        <td><?=$row['length']?></td>
		    </tr>
		    <tr>
		        <td style="font-weight: bold;">Location:</td>
		        <td><?=$row['location']?></td>
		    </tr>
		    <tr>
		        <td style="font-weight: bold;">Condtion:</td>
		        <td><?=$row['condition']?></td>
		    </tr>
		    
		    <tr>
		        <td style="font-weight: bold;">Property of:</td>
		        <td><?=$row['property_of']?></td>
		    </tr>
		   
		    <tr>
		        <td style="font-weight: bold;">Date Surveyed:</td>
		        <td><?=$row['s_date']?></td>
		    </tr>
		    <tr>
		        <td style="font-weight: bold;">What Maintenance Required:</td>
		        <table>
		        	<tr>
		        		<td><?=$row['maintenance']?></td>
		        	</tr>
		        </table>
		        
		    </tr>
	 	<?php

	 }
	?>
    
</table>
</div> <!-- end of left section -->



<div class="col-md-6">
<?php
    $images = array();
  $images = explode("|", $row['image']);
  for($i=0;$i<count($images)-1;$i++)
  {
      ?>
          <a href="#" data-toggle="modal" data-target=".pop-up-1">
          <img src="uploads/<?=$images[$i]?>" width="270" class="img-responsive img-rounded center-block" alt="" style="border: 1px double #E5E2E2;">
          </a>
          <hr> 
          <!--  Modal content for the mixer image example -->
            <div class="modal fade pop-up-1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel-1" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel-1">Mixer Board</h4>
                  </div>
                  <div class="modal-body">
                  <img src="uploads/<?=$images[$i]?>" class="img-responsive img-rounded center-block" alt="">
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal mixer image -->
          <br/>
      <?php
      
  }
?>
</div>