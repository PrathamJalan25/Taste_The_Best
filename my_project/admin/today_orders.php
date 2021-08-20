<?php

$connect=mysqli_connect("localhost","root","","taste_the_best") or die("server not connected");

if(isset($_COOKIE['user_name']))
{

	$x=$_REQUEST['x'];
	
	if($x==0)
	{
		$select7="select * from orders order by order_id desc";
	}
	else if($x==1)
	{
		$date=date("Y-m-d");
	
		$select7="select * from orders where date='$date' order by order_id desc";
	}
	
	$result7=mysqli_query($connect,$select7);
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
		<h1 style="text-align:center; color:#222; font-family:Geneva;">ORDERS</h1>
		
		<table id="example" class="table table-striped table-bordered" style="width:100%">
		<thead>
			<tr>
				<th>SR. NO.</th>
				<th>DATE</th>
				<th>USER NAME</th>
				<th>IMAGE</th>
				<th>DISH NAME</th>
				<th>PRICE</th>
				<th>QUANTITY</th>
				<th>TOTAL</th>
				<th>STATUS</th>
			</tr>
		</thead>
		<tbody>
		<?php 
		
			$a=1;
		
			while($row7=mysqli_fetch_array($result7))
			{
				?>
					
					<tr>
						<td><?php echo $a; ?></td>
						<td><?php echo $row7['date']; ?></td>
						<td><?php echo $row7['user_name']; ?></td>
						<td><img src="../images/<?php echo $row7['image']; ?>" height="100" width="80"></td>
						<td><?php echo $row7['dish_name']; ?></td>
						<td><?php echo $row7['price']; ?></td>
						<td><?php echo $row7['quantity']; ?></td>
						<td><?php echo $row7['total']; ?></td>
						<?php
							
							if($row7['status']=="pending")
							{
								?>
								<td style="color:#FF0000;"><?php echo $row7['status']; ?>
								<br><br>
								<a href="delivered.php?y=<?php echo $row7['order_id'];?>&x=<?php echo $x;?>"><button type="submit" name="submit" class="btn btn-xs btn-primary">DELIVER NOW</button></a></td>
								<?php
								
							}
							else
							{
								?>
								<td style="color:#00FF00;"><?php echo $row7['status']; ?></td>
								<?php
							}
							
						?>
								
						
					</tr>
					
				<?php
				
				$a++;
			}
		
		?>
		</tbody>
		<tfoot>
			<tr>
				<th>SR. NO.</th>
				<th>DATE</th>
				<th>USER NAME</th>
				<th>IMAGE</th>
				<th>DISH NAME</th>
				<th>PRICE</th>
				<th>QUANTITY</th>
				<th>TOTAL</th>
				<th>STATUS</th>
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