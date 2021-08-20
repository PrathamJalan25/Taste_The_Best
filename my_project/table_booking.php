<?php 

	$connect=mysqli_connect("localhost","root","","taste_the_best") or die("srever not connected");
	session_start();
	
	$date=$_REQUEST['dt'];

?>

<html>

<head>

<title>tables</title>

<link rel="stylesheet" type="text/css" href="files/bootstrap-3.3.7/dist/css/bootstrap.min.css">

<script src="files/JQUERY.js"></script>

<script src="files/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>

<style>

td
{
	padding:10px;
}

th
{
	padding:10px;
	color:#FFFFFF;
}

</style>

</head>

<body style="background-color:#111;">

<?php
include('header.php');
?>

<div style="width:95%; height:150px; background-color:#999999; color:#000; margin:2.5%; padding:15px;"><h2 style="text-align:center; font-family:Georgia;">BOOK TABLE</h2><center><font face="Geneva" size="+2" color="#006600">You will surely have a great dining experience!</font></center></div>

<div>

<?php
		
		if(isset($_REQUEST['confirm']))
		{
			$name=$_REQUEST['name'];
			$user_name=$_REQUEST['user_name'];
			$mobile=$_REQUEST['mobile'];
			$email=$_REQUEST['email'];
			
			if(isset($_REQUEST['save']))
			{
			
				$upd="update users set name='$name',mobile_no='$mobile' where user_name='$user_name'";
				
				$res=mysqli_query($connect,$upd);
				
				if($res)
				{
					$_SESSION['uname']=$name;
					$_SESSION['mobile']=$mobile;
					
					?>
					<script>
					alert("Details Saved");
					</script>
					<?php
				}
				else
				{
					echo mysqli_error($connect);
				}
				
			}
			
			$len=strlen($_REQUEST['tid']);
	
			if($len==0)
			{
				?>
				<script>
					alert("Please select a table for booking!");
					window.history.back();
				</script>
				<?php
			}
			else
			{
				for($i=0;$i<$len;$i=$i+2)
				{
					$table_id=$_REQUEST['tid'][$i];
					$slot_id=$_REQUEST['sid'][$i];
						
					$ins2="insert into table_bookings(date,name,mobile,email_id,user_name,table_id,slot_id) values ('$date','$name','$mobile','$email','$user_name','$table_id','$slot_id')";
				
					$res2=mysqli_query($connect,$ins2);
				
				}
			}
				
			if($res2)
			{
				?>
				<script>window.location.href="table_success.php";</script>
				<?php
			}
			else
			{
				echo mysqli_error($connect);
			}
		}
		
	?>

<center>

<h1 style="color:#CCFF00;">DETAILS</h1>

<form method="post">

<table cellpadding="20">

<tr>
	<th>NAME</th>
	<td><input class="form-control" type="text" value="<?php echo $_SESSION['uname']; ?>" name="name"></td>
</tr>

<tr>
	<th>USER NAME</th>
	<td><input class="form-control" type="text" value="<?php echo $_SESSION['user_name']; ?>" name="user_name" readonly=""></td>
</tr>

<tr>
	<th>MOBILE NUMBER</th>
	<td><input class="form-control" type="tel" value="<?php echo $_SESSION['mobile']; ?>" name="mobile"></td>
</tr>

<tr>
	<th>E-MAIL</th>
	<td><input class="form-control" type="email" value="<?php echo $_SESSION['email']; ?>" name="email" readonly=""></td>
</tr>

</table>

<br>

<input type="checkbox" value="save" name="save">&nbsp;&nbsp;<label style="color:#FFFFFF;">Save details for further bookings...</label><br>
<button type="submit" class="btn btn-default btn-success" name="confirm" style="margin:10px;">CONFIRM BOOKING</button>

</form>

</center>

</div>

<?php
include('footer.php');
?>

</body>

</html>