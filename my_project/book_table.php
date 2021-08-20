<?php
	
	$connect=mysqli_connect("localhost","root","","taste_the_best") or die("srever not connected");
	session_start();
	$x=$_REQUEST['x'];
	
	if(!isset($_SESSION['user_name']))
	{
	?>
		<script>
		alert("Please login to continue");
		window.history.back();
		</script>
	<?php
	}
	else
	{
	
		$user_name=$_SESSION['user_name'];
	
		$s1="select * from tables where table_id='$x'";
		
		$r1=mysqli_query($connect,$s1);
		
		if($row=mysqli_fetch_array($r1))
		{
			$cap=$row['capacity'];
			$status=$row['status'];
		} 
		
		if($status=='booked')
		{
			?>
			<script>
				alert("Table already booked! Try for another table!");
				window.history.back();
			</script>
			<?php
		}
		else
		{
		
		?>
		
		<html>
		
		<head>
		
		<title>book table</title>
		
		<link rel="stylesheet" type="text/css" href="files/bootstrap-3.3.7/dist/css/bootstrap.min.css">
		
		<script src="files/JQUERY.js"></script>
		
		<script src="files/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
		
		<style>
		.button 
		{
			background-color: #4CAF50; 
			border: none;
			color: white;
			padding: 16px 32px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 4px 2px;
			transition-duration: 0.4s;
			cursor: pointer;
		}
		
		.button2 
		{
			background-color: white; 
			color:#666666; 
			border: 2px solid yellow;
		}
		
		.button2:hover 
		{
			background-color:#FFFF33;
			color:#009900;
		}
		</style>
		
		</head>
		
		<body style="background-color:#111;">
		
		<?php
		include('header.php');
		?>
		
		<div style="width:95%; height:150px; background-color:#999999; color:#000; margin:2.5%; padding:15px;"><h2 style="text-align:center; font-family:Georgia;">BOOK TABLE</h2><center><font face="Geneva" size="+2" color="#006600">Want to experience dine in! Book your table here!</font></center></div>
		
		<div style="width:95%; margin:2.5%; ">
			<h1 style="text-align:center; color:#fff; font-weight:900;">TABLE DESCRIPTION</h1>
			<h3 style="text-align:center; color:grey;">Table no. <?php echo $x; ?> for <?php echo $cap; ?> people</h3>
			<br>
			<form method="post">
		
				<center><label>DATE FOR BOOKING</label>
				<input type="date" name="bdate"></center><br><br>
				<center><label>TIME FOR BOOKING</label>
				<input type="time" name="btime"></center><br><br>
				<center><button type="submit" class="button button2" name="submit">CONFIRM TABLE BOOKING</button></center>
			</form>
			<?php 
			
			if(isset($_REQUEST['submit']))
			{
				/*$date=date('Y-m-d');*/
				/*$time=date('H:i:s');*/
				$bdate=$_REQUEST['bdate'];
				$btime=$_REQUEST['btime'];
				$s2="select * from table_bookings";
				$r4=mysqli_query($connect,$s2);
				while($row1=mysqli_fetch_array($r4))
				{
					if($row1['table_id']==$x&&$row1['date']==$bdate&&$row['booked_time']==$btime)
					{
						?>
							<script>
								alert("This time is already");
							</script>
						<?php
					}
				}
				$i1="insert into table_bookings(table_id,user_name,date,booked_time) values ('$x','$user_name','$bdate','$btime')";
				$r2=mysqli_query($connect,$i1);
				if($r2)
				{
					$u1="update tables set status='booked' where table_id='$x'";
					$r3=mysqli_query($connect,$u1);
					if($r3)
					{
						?>
						<script>
							alert("table booked successfully!");
							window.location.href="home.php";
						</script>
						<?php
					}
					else
					{
						echo mysqli_error($connect);
					}
				}
				else
				{
					echo mysqli_error($connect);
				}
			}
			
			?>
		</div>
		
		<?php
		include('footer.php');
		?>
		
		</body>
		
		</html>
	<?php 
	}
}
?>