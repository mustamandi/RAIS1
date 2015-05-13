<?php
include('../config/connection.php');
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
  // clean posted data
  function clean($str)
  {
  		$str = @trim($str);
  		if(get_magic_quotes_gpc())
  		{
  			$str=stripcslashes($str);
  		}
  		return mysql_real_escape_string($str);
  }
  $query = "";
  $element_id = $_POST['element_id'];    
  $date_surveyed =  clean($_POST['date']);
  $maintanance =    clean($_POST['maintenance']);
  $picture = 		$sample_picture;
  $name =	        "";
  $condition = 		""; 
  $location = 		""; 
  $p_source    =    "";

  if(isset($_POST['roads']))
  		$name = clean($_POST['roads']);       
  if(isset($_POST['condition']))
        $condition = clean($_POST['condition']);
  if(isset($_POST['location']))
        $location = clean($_POST['location']);    				
  if(isset($_POST['power']))
  		$p_source = clean($_POST['power']);        		
  	
// insert data into tables
  	if($element_id == 1)
  	{
  		$sign_exist = clean($_POST['road_sign']);
  		$distance = clean($_POST['distance']);
  		$sign_needed = clean($_POST['sign']);
  		$station = clean($_POST['station']); 
  		// query
  		$query = "INSERT INTO `traffic_signs` VALUES (NULL, '$name', '$sign_exist', '$location','$station',
                      '$distance','$condition', '$sign_needed','$picture','$maintanance', '$date_surveyed');";
  	}
  	if($element_id == 2)
  	{
  		$type_of_pav = clean($_POST['type_pavement']);
  		$p_mark_needed  = clean($_POST['p_marking_needed']);
  		// query
  		$query = "INSERT INTO `pavement_marking` VALUES (NULL, '$name', '$type_of_pav','$location',
                      '$condition', '$p_mark_needed','$maintanance','$picture','$date_surveyed');";

  	}
  	if($element_id == 3)
  	{
  		$no_street_l = clean($_POST['number_light']);
  		$type_street = clean($_POST['type_street']);
  		$no_street_inst = clean($_POST['install_light']);	
  		// query
  		$query = "INSERT INTO `street_lighting` VALUES (NULL, '$name', '$no_street_l', '$type_street',
                      '$p_source','$condition', '$no_street_inst','$maintanance','$picture','$date_surveyed');";
  	}
  	if($element_id == 4)
  	{
  		$intersection_id = clean($_POST['intersection_id']);
  		$type_tra_sig = clean($_POST['type_signal']);
  		$direction = clean($_POST['direction']);
  		// query
  		$query = "INSERT INTO `traffic_signals` VALUES (NULL, '$intersection_id','$type_tra_sig','$p_source', '$condition','$direction',
                       '$maintanance','$picture','$date_surveyed');";
  	}
    //echo mysql_query($query) or die(mysql_error());
//    exit();
	if(mysql_query($query))
	  {
	      $message = "Successfuly posted";
	      $data=array(1, $message);
	      echo json_encode($data); 
       // echo "string";
	  	
	  }
	 else
	  {
	      $message = "Not Saved";
	      $data=array(0, $message);
	      echo json_encode($data); 
       //echo "error".mysql_error();
	  	
	  }





