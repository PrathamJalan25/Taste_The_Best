<?php

$connect=mysqli_connect("localhost","root","","taste_the_best") or die("server not connected");

if(isset($_COOKIE['user_name']))
{

	$x=$_REQUEST['x'];
	$y=$_REQUEST['y'];
	$z=$_REQUEST['z'];
	
	if($y==0)
	{
		$select12="select * from dishes where dish_id='$x'";
		
		$result12=mysqli_query($connect,$select12);
		
		if($row12=mysqli_fetch_array($result12))
		{
			$dish_name=$row12['dish_name'];
			$price=$row12['price'];
			$description=$row12['description'];
			$img=$row12['image'];
		}
		
		?>
		
		<html>
		
		<head>
				
		<title>EDIT DISH</title>
		
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
					<h1 style="text-align:center; color:#222; font-family:Geneva;">EDIT DISH</h1>
					<center><form method="post" enctype="multipart/form-data">
						<table cellpadding="10">
							<tr>
								<td colspan="2" style="text-align:center;"><img src="../images/<?php echo $img;?>" height="200" width="240" /></td>
							</tr>
							<tr>
								<td colspan="2" style="text-align:center;"><input type="file" name="img" /></td>
							</tr>
							<tr>
								<td style="text-align:left;"><label>DISH NAME:</label></td>
								<td style="text-align:right;"><input type="text" name="dish_name" value="<?php echo $dish_name;?>" style="width:100%;"></td>
							</tr>
							<tr>
								<td style="text-align:left;"><label>PRICE:</label></td>
								<td style="text-align:right;"><input type="tel" name="price" value="<?php echo $price;?>" style="width:100%;"></td>
							</tr>
							<tr>
								<td style="text-align:left;"><label>DESCRIPTION:</label></td>
								<td style="text-align:right;"><textarea name="description" cols="40" rows="5"><?php echo $description;?></textarea></td>
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
				$name=$_REQUEST['dish_name'];
				
				$dname=strtoupper($name);
				
				$dprice=$_REQUEST['price'];
				
				$desc=$_REQUEST['description'];
				
				$img_name=$_FILES['img']['name'];
				$img_temp_name=$_FILES['img']['tmp_name'];
				
				if(!empty($img_name))
				{
					if(move_uploaded_file($img_temp_name,"../images/dishes/".$img_name))
					{	
						?>
						<script>
							alert("Uploaded Successfully!");
						</script>
						<?php
						
						$upd3="update dishes set image='dishes/$img_name' where dish_id='$x'";
					
						$res3=mysqli_query($connect,$upd3);
					}
					else
					{
						?>
						<script>alert("Failed to upload!!\nPlease try again");</script>
						<?php
					}
				}
				
				if(empty($dname)||empty($dprice)||empty($desc))
				{
					?>
						<script>alert("Please fill all the fields!!");</script>
					<?php
				}
				else
				{
					$upd2="update dishes set dish_name='$dname',price='$dprice',description='$desc' where dish_id='$x'";
					
					$res2=mysqli_query($connect,$upd2);
					
					if($res2)
					{
						?>
							<script>
								window.location.href="view_dishes.php?x=<?php echo $z;?>";
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
		$del2="delete from dishes where dish_id='$x'";
	
		$res5=mysqli_query($connect,$del2);
		
		header("location:view_dishes.php?x=".$z);
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