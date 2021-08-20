<?php

$connect=mysqli_connect("localhost","root","","taste_the_best") or die("server not connected");

if(isset($_COOKIE['user_name']))
{

?>

	<html>
	
	<head>
			
	<title>ADD TABLE</title>
	
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
				<h1 style="text-align:center; color:#222; font-family:Geneva;">ADD TABLE</h1>
				<center><form method="post">
					<table cellpadding="10">
						<tr>
							<td style="text-align:left;"><label>TABLE CAPACITY:</label></td>
							<td style="text-align:right;"><input type="tel" name="cap"></td>
						</tr>
						<tr>
							<td colspan="2" style="text-align:center;"><button type="submit" name="submit" class="add">ADD TABLE</button></td>
						</tr>
					</table>
				</form></center>
			</div>
		</div>
		<?php
		
		if(isset($_REQUEST['submit']))
		{
			$cap=$_REQUEST['cap'];
			
			if(!empty($cap))
			{
				$ins="insert into tables(capacity) value ('$cap')";
				
				$res1=mysqli_query($connect,$ins);
				
				if($res1)
				{
					header("location:view_tables.php");
				}
			}
			else
			{
				?>
					<script>alert("Table capacity cannot be empty!!");</script>
				<?php
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