<?php
include('../config/connection.php');

// upload images
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
  // post date
  $road_id=$location=$condition=$property_of=$width=$length=$height ="";
  $p_type=$parking_name=$capacity=$date_surveyed=$maintenance ="";
  $size_of_curbe=$depth=$bus_stop_name=$distance=$element_type=$shoulder_type=$name="";
    $sample_picture = $sample_picture;
    
  if(isset($_POST['roads_id']))
        $road_id = $_POST['roads_id'];
  if(isset($_POST['location']))
        $location = $_POST['location'];
  if(isset($_POST['condition']))
        $condition = $_POST['condition'];
  if(isset($_POST['property']))
        $property_of = $_POST['property'];
  if(isset($_POST['width']))
        $width       		  = $_POST['width'];
  if(isset($_POST['length']))
        $length      		  = $_POST['length'];
  if(isset($_POST['height']))
        $height      		  = $_POST['height'];
  if(isset($_POST['type']))
        $p_type 	   		  = $_POST['type'];
  if(isset($_POST['parking']))
        $parking_name 	  = $_POST['parking'];
  if(isset($_POST['capacity']))
        $capacity     	  = $_POST['capacity'];
  if(isset($_POST['date']))
        $date_surveyed 	  = $_POST['date'];
  if(isset($_POST['maintenance']))
        $maintenance   	  = $_POST['maintenance'];
  if(isset($_POST['size_of_curbe']))
        $size_of_curbe  	= $_POST['size_of_curbe'];
  if(isset($_POST['depth']))
        $depth          	= $_POST['depth'];
  if(isset($_POST['bus_stop_name']))
        $bus_stop_name    = $_POST['bus_stop_name'];
  if(isset($_POST['distance']))
        $distance         = $_POST['distance'];
  if(isset($_POST['element_type']))
        $element_type     = $_POST['element_type'];
  if(isset($_POST['name']))
        $name             = $_POST['name'];
  if(isset($_POST['shoulder_type']))
        $shoulder_type             = $_POST['shoulder_type'];

  if(mysql_query("INSERT INTO `road_elements` VALUES (NULL, '$road_id', '$element_type', '$name','$p_type', '$width', '$length','$height','$size_of_curbe', '$location', '$condition', '$property_of', '$date_surveyed', '$shoulder_type', '$depth','$distance','$capacity','$maintenance','$sample_picture');"))
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