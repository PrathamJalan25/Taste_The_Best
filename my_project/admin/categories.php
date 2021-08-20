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
			<h1 style="text-align:center; color:#222; font-family:Geneva;">MENU CATEGORIES</h1>
			
			<table id="example" class="table table-striped table-bordered" style="width:100%">
			<thead>
				<tr>
					<th>SR. NO.</th>
					<th>CATEGORY NAME</th>
					<th>NUMBER OF DISHES</th>
					<th>ACTIONS</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				
				$select9="select * from categories";
				
				$result9=mysqli_query($connect,$select9);
			
				$a=1;
			
				while($row9=mysqli_fetch_array($result9))
				{
					$id=$row9['id'];
					
					$select10="select count(id) as cnt from dishes where id='$id'";
					
					$result10=mysqli_query($connect,$select10);
					
					$no_dishes=0;
					
					while($row10=mysqli_fetch_array($result10))
					{
						$no_dishes=$row10['cnt'];
					}
					
					?>
						
						<tr>
							<td><?php echo $a; ?></td>
							<td><?php echo $row9['name']; ?></td>
							<td><?php echo $no_dishes; ?></td>
							<td><a href="view_dishes?x=<?php echo $id;?>"><i class="fas fa-eye">View</i></a>&nbsp;&nbsp;<a href="edit_category.php?x=<?php echo $id;?>&y=0"><i class="fas fa-edit">Edit</i></a>&nbsp;&nbsp;<a href="edit_category.php?x=<?php echo $id;?>&y=1"><i class="fas fa-trash">Delete</i></a></td>
						</tr>
						
					<?php
					
					$a++;
				}
			
			?>
			</tbody>
			<tfoot>
				<tr>
					<th>SR. NO.</th>
					<th>CATEGORY NAME</th>
					<th>NUMBER OF DISHES</th>
					<th>ACTIONS</th>
				</tr>
			</tfoot>
			</table>
			
			<div>
				<center><a href="add_category.php"><button type="button" class="btn btn-lg btn-success">ADD CATEGORY</button></a></center>
			</div>
			
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