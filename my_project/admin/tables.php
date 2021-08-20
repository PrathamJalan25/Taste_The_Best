<?php

$connect=mysqli_connect("localhost","root","","taste_the_best") or die("server not connected");

if(isset($_COOKIE['user_name']))
{
	
	
		$sel="select * from table_bookings tb, time_slots ts where tb.slot_id=ts.slot_id";
					
		$res=mysqli_query($connect,$sel);
	
}
else
{
	?>
	<script>
		alert("COOKIE EXPIRED!");
		window.location.href="index.php";
	</script>
	<?php	
}

?>

<html>

<head>
        
<title>TABLES</title>

<link rel="stylesheet" href="admin_style.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
        
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.7/css/fixedHeader.bootstrap.min.css">

<script src="https://code.jquery.com/jquery-3.5.1.js" charset="utf-8"></script>

<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" charset="utf-8"></script>

<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap.min.js" charset="utf-8"></script>

<script src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js" charset="utf-8"></script>

<style>

header
{
	padding-top:30px;
}

</style>

</head>

<body>

   <?php 
   	include("side_menu.php");
   ?>
   
   <div class="content" style="background:none;">
		<h1 style="text-align:center; color:#222; font-family:Geneva;">TABLE BOOKINGS</h1>
		
		<table id="example" class="table table-striped table-bordered" style="width:100%">
		<thead>
			<tr>
				<th>SR. NO.</th>
				<th>TABLE NO.</th>
				<th>TIME SLOT</th>
				<th>USER NAME</th>
				<th>DATE</th>
				<th>MOBILE NUMBER</th>
			</tr>
		</thead>
		<tbody>
		
		<?php
		
		$a=1;
		
		while($row=mysqli_fetch_array($res))
		{
			?>
					<tr>
						<td><?php echo $a; ?></td>
						<td><?php echo $row['table_id']; ?></td>
						<td><?php echo $row['slot']; ?></td>
						<td><?php echo $row['user_name']; ?></td>
						<td><?php echo $row['date']; ?></td>
						<td><?php echo $row['mobile']; ?></td>
					</tr>
					
				<?php
				
				$a++;
		}
		
		?>
		
		</tbody>
		<tfoot>
			<tr>
				<th>SR. NO.</th>
				<th>TABLE NO.</th>
				<th>TIME SLOT</th>
				<th>USER NAME</th>
				<th>DATE</th>
				<th>MOBILE NUMBER</th>
			</tr>
		</tfoot>
		</table>
		
		<center><a href="view_tables.php"><button type="button" class="btn btn-lg btn-success">VIEW TABLES</button></a></center>
		
		</div>
	
	<script>
		$(document).ready(function() {
		var table = $('#example').DataTable( {
			fixedHeader: true
		} );
		} );
	</script>

</body>

</html>