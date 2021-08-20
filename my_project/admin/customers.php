<?php

$connect=mysqli_connect("localhost","root","","taste_the_best") or die("server not connected");

if(isset($_COOKIE['user_name']))
{

	?>
	
	<html>
	
	<head>
			
	<title>TODAY ORDERS</title>
	
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
			<h1 style="text-align:center; color:#FFFFFF; font-family:Geneva;">CUSTOMERS</h1>
			
			<table id="example" class="table table-striped table-bordered" style="width:100%">
			<thead>
				<tr>
					<th>SR. NO.</th>
					<th>NAME</th>
					<th>USER NAME</th>
					<th>DATE OF BIRTH</th>
					<th>DATE OF JOINING</th>
					<th>GENDER</th>
					<th>MOBILE NUMBER</th>
					<th>EMAIL ID</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				
				$select8="select * from users";
				
				$result8=mysqli_query($connect,$select8);
			
				$a=1;
			
				while($row8=mysqli_fetch_array($result8))
				{
					?>
						
						<tr>
							<td><?php echo $a; ?></td>
							<td><?php echo $row8['name']; ?></td>
							<td><?php echo $row8['user_name']; ?></td>
							<td><?php echo $row8['dob']; ?></td>
							<td><?php echo $row8['date_of_joining']; ?></td>
							<td><?php echo $row8['gender']; ?></td>
							<td><?php echo $row8['mobile_no']; ?></td>
							<td><?php echo $row8['email_id']; ?></td>
						</tr>
						
					<?php
					
					$a++;
				}
			
			?>
			</tbody>
			<tfoot>
				<tr>
					<th>SR. NO.</th>
					<th>NAME</th>
					<th>USER NAME</th>
					<th>DATE OF BIRTH</th>
					<th>DATE OF JOINING</th>
					<th>GENDER</th>
					<th>MOBILE NUMBER</th>
					<th>EMAIL ID</th>
				</tr>
			</tfoot>
			</table>
			
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
	
	<?php
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