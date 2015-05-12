<?php
include("../config/connection.php");
$images_sequence = array();
  if(is_array($_FILES)) {
    foreach ($_FILES['image']['name'] as $name => $value)
    {
        if(is_uploaded_file($_FILES['image']['tmp_name'][$name])) 
        {
            $sourcePath = $_FILES['image']['tmp_name'][$name];
            $random_digit=rand(0000000,99999999);
            $image_name = $random_digit.$_FILES['image']['name'][$name];
            $targetPath = "../uploads/".$image_name;
            $images_sequence[] = $image_name . "|";
            if(move_uploaded_file($sourcePath,$targetPath)) 
            { 
            }
        }
    }
  }
  $sample_picture = "";
  for($i=0;$i<count($images_sequence);$i++)
  {
      $sample_picture .= $images_sequence[$i];
  }
  $query = "";
  $element_id = $_POST['element_id'];
  $name = $_POST['name_of_road'];
  $date_surveyed = $_POST['date'];
  $maintanance = $_POST['what_maintenance'];
  $width = "";$length = "";
  $condation = ""; $location = ""; $height = "";
  if(isset($_POST['width']))
        $width = $_POST['width'];
  if(isset($_POST['lenght']))
        $length = $_POST['lenght'];
  if(isset($_POST['condation']))
        $condation = $_POST['condation'];
  if(isset($_POST['location']))
        $location = $_POST['location'];
  if(isset($_POST['location']))
        $height = $_POST['height'];
        
  if($element_id == 1)
  {
      $n_lanes = $_POST['number_lanes'];
      $u_clearance = $_POST['under_clearance'];
      $t_bridge = $_POST['bridge'];
      $query = "INSERT INTO `bridges` VALUES (NULL, '$name', '$t_bridge', '$location','$width',
      '$length','$n_lanes', '$u_clearance', '$condation','$maintanance', '$date_surveyed','$sample_picture');";
  }
  else if($element_id == 2)
  {
      $p_t = $_POST['post_structure'];
      $purpose = $_POST['pupose'];
      $n_posts = $_POST['number_posts'];
      $diametet = $_POST['diameter'];
      $distance = $_POST['distance'];
      $query = "INSERT INTO `electricity_post` VALUES (NULL, '$name', '$p_t', '$purpose','$diametet',
      '$height', '$n_posts', '$distance', '$condation', 
      '$maintanance', '$sample_picture', '$date_surveyed');";
  }
  else if($element_id == 3)
  {
      $depth = $_POST['depth_pipes'];
      $n_pipes = $_POST['number_pipes'];
      $diameter = $_POST['diameter'];
      $purpose = $_POST['pupose'];
      $distance = $_POST['distance'];
      $query = "INSERT INTO `water_suply_pipes` VALUES (NULL, '$name', '$depth', '$distance',
       '$n_pipes', '$diameter', '$purpose', '$condation', '$maintanance', '$sample_picture', '$date_surveyed');";
  }
  else if($element_id == 4)
  {
      $t_s = $_POST['type_structure'];
      $purpose = $_POST['pupose'];
      $distance = $_POST['distance'];
      $query = "INSERT INTO `ads_posts` VALUES (NULL, '$name', '$t_s', '$purpose', '$width', '$height', 
      '$location', '$distance', '$maintanance', '$sample_picture', '$date_surveyed');";
  }
  
  //echo mysql_query($query) or die(mysql_error());
//  exit();
  
  if(mysql_query($query))
  {
     $message = "Successfuly posted";
     $data=array(1, $message);
     echo json_encode($data); 
  }
  else
  {
     $message = "Not Saved";
     $data=array(0, $message);
     echo json_encode($data); 
  }
?>
