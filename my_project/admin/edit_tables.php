<?php

$connect=mysqli_connect("localhost","root","","taste_the_best") or die("server not connected");

if(isset($_COOKIE['user_name']))
{

	$x=$_REQUEST['x'];
	$y=$_REQUEST['y'];
	
	if($y==0)
	{
		$select12="select * from tables where table_id='$x'";
		
		$result12=mysqli_query($connect,$select12);
		
		if($row12=mysqli_fetch_array($result12))
		{
			$table_id=$row12['table_id'];
			$cap=$row12['capacity'];
		}
		
		?>
		
		<html>
		
		<head>
				
		<title>EDIT TABLES</title>
		
		<link rel="stylesheet" href="style.css">
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
				
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
		
		<style>
		
		.edit
		{
			border-radius:10px;
			width:60%;
			height:30px;
			background:#333399;
			color:#fff;
			border:none;
		}
		
		.edit:hover
		{
			border-radius:10px;
			width:80%;
			height:40px;
			background:#333399;
			color:#fff;
			transition:0.3s;
			transition-property:width,height;
			border:none;
		}
		
		</style>
		
		</head>
		
		<body>
		
		   <?php 
			include("side_menu.php");
		   ?>
		   
			<div class="content">	
				<div class="card">	
					<h1 style="text-align:center; color:#222; font-family:Geneva;">EDIT TABLE</h1>
					<center><form method="post" enctype="multipart/form-data">
						<table cellpadding="10">
							<tr>
								<td style="text-align:left;"><label>TABLE NUMBER:</label></td>
								<td style="text-align:right;"><input type="text" name="table_id" value="<?php echo $table_id;?>" style="width:100%;" readonly=""></td>
							</tr>
							<tr>
								<td style="text-align:left;"><label>CAPACITY:</label></td>
								<td style="text-align:right;"><input type="tel" name="cap" value="<?php echo $cap;?>" style="width:100%;"></td>
							</tr>
							<tr>
								<td colspan="2" style="text-align:center;"><button type="submit" name="submit" class="edit">EDIT DISH</button></td>
							</tr>
						</table>
					</form></center>
				</div>
			</div>
			<?php
			
			if(isset($_REQUEST['submit']))
			{
				$name=$_REQUEST['table_id'];
				
				$cap=$_REQUEST['cap'];
				
				if(empty($cap))
				{
					?>
						<script>alert("Please fill all the fields!!");</script>
					<?php
				}
				else
				{
					$upd2="update tables set capacity='$cap' where table_id='$table_id'";
					
					$res2=mysqli_query($connect,$upd2);
					
					if($res2)
					{
						?>
							<script>
								window.location.href="view_tables.php";
							</script>
						<?php
					}
					else
					{
						echo mysqli_error($connect);
					}
				}
			}
			

			?>
		
		</body>
		
		</html>
	<?php
	}
	
	if($y==1)
	{
		$del2="delete from tables where table_id='$x'";
	
		$res5=mysqli_query($connect,$del2);
		
		if($res5)
		{
			header("location:view_tables.php");
		}
		else
		{
			echo mysqli_error($connect);
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