<?php

$connect=mysqli_connect("localhost","root","","taste_the_best") or die("server not connected");

if(isset($_COOKIE['user_name']))
{
	$x=$_REQUEST['x'];
	$y=$_REQUEST['y'];
	
	if($y==0)
	{
		$select11="select * from categories where id='$x'";
		
		$result11=mysqli_query($connect,$select11);
		
		if($row11=mysqli_fetch_array($result11))
		{
			$cname=$row11['name'];
		}
		
		?>
		
		<html>
		
		<head>
				
		<title>EDIT CATEGORY</title>
		
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
					<h1 style="text-align:center; color:#222; font-family:Geneva;">EDIT CATEGORY</h1>
					<center><form method="post">
						<table cellpadding="10">
							<tr>
								<td style="text-align:left;"><label>CATEGORY NAME:</label></td>
								<td style="text-align:right;"><input type="text" name="cat_name" value="<?php echo $cname;?>"></td>
							</tr>
							<tr>
								<td colspan="2" style="text-align:center;"><button type="submit" name="submit" class="edit">EDIT CATEGORY</button></td>
							</tr>
						</table>
					</form></center>
				</div>
			</div>
			<?php
			
			if(isset($_REQUEST['submit']))
			{
				$name=$_REQUEST['cat_name'];
				
				$cat_name=strtoupper($name);
				
				if(!empty($cat_name))
				{
					$upd2="update categories set name='$cat_name' where id='$x'";
					
					$res2=mysqli_query($connect,$upd2);
					
					if($res2)
					{
						header("location:categories.php");
					}
				}
				else
				{
					?>
						<script>alert("Category cannot be empty!!");</script>
					<?php
				}
			}
			
			?>
		
		</body>
		
		</html>
	<?php
	}
	
	if($y==1)
	{
		$del="delete from categories where id='$x'";
	
		$res3=mysqli_query($connect,$del);
		
		header("location:categories.php");
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