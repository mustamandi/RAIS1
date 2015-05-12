<!DOCtype html>
<?php
   include('config/connection.php');
   $e_id = $_GET['element_id'];
   $table = $_GET['table'];
   
   // show all roads record

   
   $query = "SELECT * FROM $table ORDER BY date_surveyed desc";
   
   $run_query = mysql_query("$query") or die(mysql_error());
   $total = mysql_num_rows($run_query);
   // fetch records
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
          <h4>Road Records (<?= $total ?> Records)</h4>
    </div>
       <table class="table table-bordered table-hover">
           <tr>
               <th>#</th><th>Road Name</th><th>Date Surveyed</th><th colspan="3">Actions</th>
           </tr>
   <?php
   $counter = 0;
   while ($records = mysql_fetch_assoc($run_query)) {
          $counter ++;
          $r_name = mysql_fetch_array(mysql_query("select name from roads where id=".$records['r_id']."")) 
       ?>
           <tr>
               <td><?= $counter ?></td>
               <td><?= $r_name['name'] ?></td>
               <td><?= $records['date_surveyed']  ?></td>
               <td><a href="javascript:;" onclick="view_structure_details('<?= $records['id']?>','<?=$table?>')"><i class="fa fa-eye"></i></td>
               <td><a href="update.php?id=<?= $records['id'] ?>"><i class="fa fa-pencil-square-o"></i></a></td>
               <td><a href="delect.php?id=<?= $records['id'] ?>"><i class="fa fa-trash-o"></i></a></td>

           </tr>

       <?php
       
   }
   ?>
   </table>
   <?php
?>
  