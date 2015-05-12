<?php include('config/connection.php');?>
<!DOCTYPE html>
<html>
<head>

    <?php 
        include("includes/head.php");
     ?>

</head>
<body>
    <div class="col-md-12">
        <div class="row">
            <?php include("includes/header.php") ?>
        
        </div> <!-- end of row -->
        <div class="col-md-3 custom">
            
          <div class="nav-side-menu">
            <div class="menu-list">
              <ul id="menu-content" class="menu-content collapse out">
                <li class="collapsed active">
                  
                  <a href="#"><i class="fa fa-road fa-lg"></i> ROADS <span class="arrow"></span></a>

                </li>
                <ul class="sub-menu">
                   <li onclick="road()">Roads<span class="label label-success">200</span></li>
                    <?php
                    $query = mysql_query("select * from element_type");
                    while($row = mysql_fetch_assoc($query))
                    {
                      $id = $row['id'];
                      ?>
                          <li  onclick="show_form('<?= $id ?>');" class=""><a href="javascript:void(0);"><?=$row['type_name']?></a><span class="label label-success">200</span></li>
                     <?php
                    }
                   ?>
                   <li onclick="load_int_form()">Intersection<span class="label label-success">200</span></li>
                </ul> <!-- end of ul roads -->
                

                <li class="collapsed active">
                  <a href="#"><i class="fa fa-road fa-lg"></i> EQUIPMENTS <span class="arrow"></span></a>

                </li>
                <ul class="sub-menu">
                    <?php
                    $equip = mysql_query("select * from equipments");
                    while($row_2 = mysql_fetch_assoc($equip))
                    {
                      ?>
                          <li  onclick="show_eqi_form('<?=$row_2['id']?>');" class=""><a href="javascript:void(0);"><?=$row_2['equipment_type']?></a><span class="label label-success">200 </span></li>
                     <?php
                    }
                   ?>
                </ul> <!-- end of ul equipments -->
                
                <li class="collapsed active">
                  <a href="#"><i class="fa fa-road fa-lg"></i> STRUCTURES <span class="arrow"></span></a>

                </li>
                <ul class="sub-menu">
                    <?php
                    $equip = mysql_query("select * from structures");
                    while($row_2 = mysql_fetch_assoc($equip))
                    {
                      ?>
                          <li  onclick="show_structures_form('<?=$row_2['id']?>','<?=$row_2['table_name']?>');" class=""><a href="javascript:void(0);"><?=$row_2['name']?></a><span class="label label-success">200</span> </li>
                     <?php
                    }
                   ?>
                </ul> <!-- end of ul structures -->
                


            </ul>
     </div>
</div>
        </div> <!-- end of col-md-4 -->
        <div class="col-md-9 pull-right">
        <div class="page-header">
          <h1><small>Roads</small></h1>
        </div>
                
                <div data-example-id="togglable-tabs" role="tabpanel" class="bs-example bs-example-tabs">
    <ul role="tablist" class="nav nav-tabs" id="myTab">
      <li id="all_menu" role="presentation" class="active"><a aria-expanded="false" aria-controls="all" data-toggle="tab" role="tab" id="all-tab" href="#all">All Records</a></li>
      <li id="add_menu" role="presentation" ><a aria-controls="addnew" data-toggle="tab" id="addnew-tab" role="tab" href="#addnew" aria-expanded="true"><span class="glyphicon glyphicon-plus"></span>Add New Record</a></li>
      
    </ul>
    <div class="tab-content" id="myTabContent">
      <div aria-labelledby="all-tab" id="all" class="tab-pane fade active in" role="tabpanel">
        <p> All data.</p>
        
      </div>
      <div aria-labelledby="addnew-tab" id="addnew" class="tab-pane fade " role="tabpanel">
       
        <!-- form data -->

      </div> <!-- end of addnew id -->
      
    </div>
  </div>
        </div><!--  end of col-md-8 -->
    </div>

    <?php include('includes/footer.php') ?>
</body>
</html>