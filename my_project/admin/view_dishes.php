<?php

$connect=mysqli_connect("localhost","root","","taste_the_best") or die("server not connected");

if(isset($_COOKIE['user_name']))
{

	$x=$_REQUEST['x'];
	
	if($x>0)
	{
		$select13="select * from categories where id='$x'";
					
		$result13=mysqli_query($connect,$select13);
		
		if($row13=mysqli_fetch_array($result13))
		{
			$cname=$row13['name'];
		}
	}
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
		<h1 style="text-align:center; color:#222; font-family:Geneva;">DISHES</h1>
		
		<?php
			
			if($x>0)
			{
			?>
				<h2 style="text-align:center; color:#222; font-family:Geneva;"><?php echo $cname; ?></h2>
			<?php
			}
			?>
		
		<table id="example" class="table table-striped table-bordered" style="width:100%">
		<thead>
			<tr>
				<th>SR. NO.</th>
				<th>IMAGE</th>
				<th>DISH NAME</th>
				<th>PRICE</th>
				<th>DESCRIPTION</th>
				<th>ACTIONS</th>
			</tr>
		</thead>
		<tbody>
		<?php 
			
			if($x==0)
			{
				$select12="select * from dishes order by dish_id desc";
			}
			else
			{
				$select12="select * from dishes where id='$x' order by dish_id desc";
			}
			
			
			$result12=mysqli_query($connect,$select12);
		
			$a=1;
		
			while($row12=mysqli_fetch_array($result12))
			{	
				?>
					
					<tr>
						<td><?php echo $a; ?></td>
						<td><img src="../images/<?php echo $row12['image']; ?>" height="100" width="80"></td>
						<td><?php echo $row12['dish_name']; ?></td>
						<td><?php echo $row12['price']; ?></td>
						<td><?php echo $row12['description']; ?></td>
						<td><a href="edit_dishes.php?x=<?php echo $row12['dish_id'];?>&y=0&z=<?php echo $x; ?>"><i class="fas fa-edit">Edit</i></a>&nbsp;&nbsp;<a href="edit_dishes.php?x=<?php echo $row12['dish_id'];?>&y=1&z=<?php echo $x; ?>"><i class="fas fa-trash">Delete</i></a></td>
					</tr>
					
				<?php
				
				$a++;
			}
		
		?>
		</tbody>
		<tfoot>
			<tr>
				<th>SR. NO.</th>
				<th>IMAGE</th>
				<th>DISH NAME</th>
				<th>PRICE</th>
				<th>DESCRIPTION</th>
				<th>ACTIONS</th>
			</tr>
		</tfoot>
		</table>
		
		<?php
			
			if($x>0)
			{
			?>
				<div>
					<center><a href="add_dishes.php?x=<?php echo $x; ?>"><button type="button" class="btn btn-lg btn-success">ADD DISH</button></a></center>
				</div>
			<?php
			}
			?>
		
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