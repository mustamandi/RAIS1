<!DOCTYPE html>
<?php
include('config/connection.php');
$id = $_GET['element_id'];
if(isset($id))
{
	if($id == 1)
	{
		$query = mysql_query("SELECT * FROM traffic_signs order by date_surveyed desc");
		if($query)
		{
			?>
			<table class="table table-bordered table-hover">
				<tr>
					<th>#</th><th>Exist Traffic Signs</th><th>Location of Sign</th><th>Distance From the Road Edge</th>
					<th>Condtion</th><th>Sign Needed</th><th>Date Surveyed</th><th colspan="3">More Action</th>
				</tr>
			<?php
			      $counter =0;
			while ($records = mysql_fetch_array($query)) {
				   $counter++;
				?>
					<tr>
						<td><?= $counter ?></td>
						<td><?= $records['exist_traffic_sign'] ?></td>
						<td><?= $records['location'] ?></td>
						<td><?= $records['d_from_road_edge'] ?></td>
						<td><?= $records['condition'] ?></td>
						<td><?= $records['signs_needed'] ?></td>
						<td><?= $records['date_surveyed'] ?></td>
						<td><a href="javascript:;" onclick="view_road_elements_report('<?= $records['id']?>')"><i class="fa fa-eye"></i></td>
			   			<td><a href="update.php?id=<?= $records['id'] ?>"><i class="fa fa-pencil-square-o"></i></a></td>
			   			<td><a href="delect.php?id=<?= $records['id'] ?>"><i class="fa fa-trash-o"></i></a></td>
					</tr>
				<?php
			}
		}
	}
	if($id == 2)
	{
		$query = mysql_query("SELECT * FROM traffic_signs order by id desc");
		if($query)
		{
			?>
			<table class="table table-bordered table-hover">
				<tr>
					<th>#</th><th>Type of Pavement Marking</th><th>Location of pavement Marking</th><th>Pavement Marking Needed</th>
					 <th>Date Surveyed</th><th colspan="3">More Action</th>
				</tr>
			<?php
			      $counter =0;
			while ($records = mysql_fetch_array($query)) {
				   $counter++;
				?>
					<tr>
						<td><?= $counter ?></td>
						<td><?= $records['type_of_pav_marking'] ?></td>
						<td><?= $records['location'] ?></td>
						<td><?= $records['pavement_m_needed'] ?></td>
						<td><?= $records['date_surveyed'] ?></td>
						<td><a href="javascript:;" onclick="view_road_details('<?= $records['id']?>')"><i class="fa fa-eye"></i></td>
			   			<td><a href="update.php?id=<?= $records['id'] ?>"><i class="fa fa-pencil-square-o"></i></a></td>
			   			<td><a href="delect.php?id=<?= $records['id'] ?>"><i class="fa fa-trash-o"></i></a></td>
					</tr>
				<?php
			}
		}
	}
	if($id == 3)
	{
		$query = mysql_query("SELECT * FROM street_lighting order by id desc");
		if($query)
		{
			?>
			<table class="table table-bordered table-hover">
				<tr>
					<th>#</th><th>No of Street light in every 100m</th><th>Type of street Lighting</th><th>Source Of Power</th><th>No Of Street light Need to be installed</th>
					 <th>Date Surveyed</th><th colspan="3">More </th>
				</tr>
			<?php
			      $counter =0;
			while ($records = mysql_fetch_array($query)) {
				   $counter++;
				?>
					<tr>
						<td><?= $counter ?></td>
						<td><?= $records['no_of_street_in_100m'] ?></td>
						<td><?= $records['type'] ?></td>
						<td><?= $records['source_of_power'] ?></td>
						<td><?= $records['no_of_streetl_need_installed'] ?></td>
						<td><?= $records['date_surveyed'] ?></td>
						<td><a href="javascript:;" onclick="view_road_details('<?= $records['id']?>')"><i class="fa fa-eye"></i></td>
			   			<td><a href="update.php?id=<?= $records['id'] ?>"><i class="fa fa-pencil-square-o"></i></a></td>
			   			<td><a href="delect.php?id=<?= $records['id'] ?>"><i class="fa fa-trash-o"></i></a></td>
					</tr>
				<?php
			}
		}
	}
	if($id == 4)
	{
		$query = mysql_query("SELECT * FROM traffic_signals order by id desc");
		if($query)
		{
			?>
			<table class="table table-bordered table-hover">
				<tr>
					<th>#</th><th>Type of Traffic Signal</th><th>Source Of Power</th><th>Directions the traffic signal Need to Installed</th>
					 <th>Date Surveyed</th><th colspan="3">More </th>
				</tr>
			<?php
			      $counter =0;
			while ($records = mysql_fetch_array($query)) {
				   $counter++;
				?>
					<tr>
						<td><?= $counter ?></td>
						<td><?= $records['type'] ?></td>
						<td><?= $records['source_of_power'] ?></td>
						<td><?= $records['direction_of_signal_tb_installed'] ?></td>
						<td><?= $records['date_surveyed'] ?></td>
						<td><a href="javascript:;" onclick="view_road_details('<?= $records['id']?>')"><i class="fa fa-eye"></i></td>
			   			<td><a href="update.php?id=<?= $records['id'] ?>"><i class="fa fa-pencil-square-o"></i></a></td>
			   			<td><a href="delect.php?id=<?= $records['id'] ?>"><i class="fa fa-trash-o"></i></a></td>
					</tr>
				<?php
			}
		}
	}
}


?>