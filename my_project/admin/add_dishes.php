<?php

$connect=mysqli_connect("localhost","root","","taste_the_best") or die("server not connected");

if(isset($_COOKIE['user_name']))
{

	$x=$_REQUEST['x'];
	
	?>
	
	<html>
	
	<head>
			
	<title>ADD DISHES</title>
	
	<link rel="stylesheet" href="style.css">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
			
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
	
	<style>
	
	.add
	{
		border-radius:10px;
		width:60%;
		height:30px;
		background:#333399;
		color:#fff;
		border:none;
	}
	
	.add:hover
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
				<h1 style="text-align:center; color:#222; font-family:Geneva;">ADD DISH</h1>
				<center><form method="post" enctype="multipart/form-data">
					<table cellpadding="10">
						<tr>
							<td style="text-align:left;"><label>DISH NAME:</label></td>
							<td style="text-align:right;"><input type="text" name="dish_name"></td>
						</tr>
						<tr>
							<td style="text-align:left;"><label>PRICE:</label></td>
							<td style="text-align:right;"><input type="tel" name="price"></td>
						</tr>
						<tr>
							<td style="text-align:left;"><label>DESCRIPTION:</label></td>
							<td style="text-align:right;"><input type="text" name="des"></td>
						</tr>
						<tr>
							<td style="text-align:left;"><label>IMAGE</label></td>
							<td style="text-align:right;"><input type="file" name="image"></td>
						</tr>
						<tr>
							<td colspan="2" style="text-align:center;"><button type="submit" name="submit" class="add">ADD DISH</button></td>
						</tr>
					</table>
				</form></center>
			</div>
		</div>
		<?php
		
		if(isset($_REQUEST['submit']))
		{
			$name=$_REQUEST['dish_name'];
			
			$dish_name=strtoupper($name);
			
			$price=$_REQUEST['price'];
			
			$des=$_REQUEST['des'];
			
			$img_name=$_FILES['image']['name'];
			$img_temp_name=$_FILES['image']['tmp_name'];
			
			if(move_uploaded_file($img_temp_name,"../images/dishes/".$img_name))
			{	
				?>
				<script>
					alert("Uploaded Successfully!");
				</script>
				<?php
			}
			else
			{
				?>
				<script>alert("Failed to upload!!\nPlease try again");</script>
				<?php
			}
			
			if(empty($dish_name)||empty($price)||empty($des))
			{
				?>
					<script>alert("Category cannot be empty!!");</script>
				<?php
			}
			else
			{
				$img="dishes/".$img_name;
				$ins2="insert into dishes(id,dish_name,image,price,description) value ('$x','$dish_name','$img','$price','$des')";
				
				$res4=mysqli_query($connect,$ins2);
				
				if($res2)
				{
					header("location:view_dishes.php?x=".$x);
				}
			}
		}
		
		?>
	
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