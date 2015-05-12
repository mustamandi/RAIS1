<?php
include("config/connection.php");

  $r_id = $_GET['r_id'];
  $q = mysql_query("select * from roads where id=$r_id");
  $row = mysql_fetch_array($q);
  $distract = mysql_query("select * from distracts where id = ".$row['district_id']."");
  $distract_name = mysql_fetch_array($distract);
  
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
    <tr>
        <td style="font-weight: bold;">Name:</td>
        <td><?=$row['name']?></td>
    </tr>
    <tr>
        <td style="font-weight: bold;">Location:</td>
        <td><?=$row['location']?></td>
    </tr>
    <tr>
        <td style="font-weight: bold;">Road Type:</td>
        <td><?=$row['r_type']?></td>
    </tr>
    <tr>
        <td style="font-weight: bold;">Distract:</td>
        <td><?=$distract_name['d_name']?></td>
    </tr>
    <tr>
        <td style="font-weight: bold;">Number Of Lans:</td>
        <td><?=$row['No_of_lans']?></td>
    </tr>
    <tr>
        <td style="font-weight: bold;">Length:</td>
        <td><?=$row['length']?></td>
    </tr>
    <tr>
        <td style="font-weight: bold;">Wdith:</td>
        <td><?=$row['width']?></td>
    </tr>
    <tr>
        <td style="font-weight: bold;">Pavement Type:</td>
        <td><?=$row['pave_type']?></td>
    </tr>
    <tr>
        <td style="font-weight: bold;">Date Surveyed:</td>
        <td><?=$row['date_surveyed']?></td>
    </tr>
    <tr>
        <td style="font-weight: bold;">What Maintenance Required:</td>
        <td><?=$row['maintenance_req']?></td>
    </tr>
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
</div>
<script type="text/javascript">
function goback()
  {
    $("#addnew").html("<img src='assets/img/103.gif' class='loader-img'/>").load('roads.php');
    $("#all").html("<img src='assets/img/103.gif' class='loader-img'/>").load('show_all_roads.php');
  }
</script>

