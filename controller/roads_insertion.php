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
  $name = $_POST['name_of_road'];
  $distract = $_POST['distract'];
  $type = $_POST['type'];
  $p_type="";
  if(isset($_POST['paved_roads_type']))
        $p_type = $_POST['paved_roads_type'];
  $number_lanes = $_POST['number_lanes'];
  $width = $_POST['width'];
  $length = $_POST['length'];
  $location = $_POST['location'];
  $property_of = $_POST['property_of'];
  $p_condation = $_POST['p_condation'];
  $maintanance = $_POST['what_maintenance'];
  $date_surveyed = $_POST['date_surveyed'];
  
  if(mysql_query("INSERT INTO `roads` VALUES (NULL, '$name', '$type', '$number_lanes', '$width', '$length', '$p_type', '$location', '$maintanance', '$distract', '$date_surveyed', '$sample_picture');"))
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
