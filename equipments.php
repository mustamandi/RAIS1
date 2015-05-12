<!DOCtype>
<?php
	$id = $_GET['element_id'];
	include("config/connection.php");
    if(isset($id))
    {
    	// check for eliasing name
    	if($id == 1)
    	{
    		$table_name ="traffic_sings";
    		$traffic_sings_table_query = mysql_query(" SELECT * FROM $table_name ");
    	}
    	if($id == 2)
    	{
    		$table_name ="pavement_marking";
    		$pavement_marking_table_query = mysql_query(" SELECT * FROM $table_name ");
    	}
    	if($id == 3)
    	{
    		$table_name ="street_lighting";
    		$street_lighting_table_query = mysql_query(" SELECT * FROM $table_name ");
    	}
    	if($id == 4)
    	{
    		$table_name ="traffic_signal";
    		$traffic_signal_table_query = mysql_query(" SELECT * FROM $table_name ");
    	}
    	if($id == 5)
    	{
    		$table_name ="bridges";
    		$bridges_table_query = mysql_query(" SELECT * FROM $table_name ");
    	}
    	if($id == 6)
    	{
    		$table_name ="electricity_post";
    		$electricity_post_table_query = mysql_query(" SELECT * FROM $table_name ");
    	}
    	if($id == 7)
    	{
    		$table_name ="water_suply_pips";
    		$water_suply_pips_table_query = mysql_query(" SELECT * FROM $table_name ");
    	}
    	if($id == 8)
    	{
    		$table_name ="advertisement_boards";
    		$advertisement_boards_table_query = mysql_query(" SELECT * FROM $table_name ");
    	}

    	
    	

    }

?>