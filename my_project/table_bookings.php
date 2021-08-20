<?php
	
	$connect=mysqli_connect("localhost","root","","taste_the_best") or die("srever not connected");
	session_start();
	$user_name=$_SESSION['user_name'];
	
?>

<html>

<head>

<title>my table bookings</title>

<link rel="stylesheet" type="text/css" href="files/bootstrap-3.3.7/dist/css/bootstrap.min.css">

<script src="files/JQUERY.js"></script>

<script src="files/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>

<style>

td,th
{
	text-align:center;
	padding:15px;
	font-size:18px;
	border:solid 2px #666666;
}

tr
{
	border:solid 2px #666666;
}

</style>

</head>

<body style="background-color:#111;">

<?php
include('header.php');
?>

<div style="width:95%; height:150px; background-color:#999999; color:#000; margin:2.5%; padding:15px;"><h2 style="text-align:center; font-family:Georgia;">MY BOOKINGS</h2><center><font face="Geneva" size="+2" color="#006600">Here are your table bookings!</font></center></div>

<div style="width:95%; margin:2.5%; ">

<table style="width:100%; border:solid 2px #000; background-color:#CCCCCC;">

	<tr>
		<th>DATE</th>
		<th>TIME</th>
		<th>TABLE NUMBER</th>
		<th>NAME</th>
		<th>MOBILE NUMBER</th>
		<th>EMAIL ID</th>
	</tr>

<?php

	$select="select * from table_bookings tb , time_slots ts where ts.slot_id=tb.slot_id and tb.user_name='$user_name' order by date desc";
	
	$result=mysqli_query($connect,$select);	
	
	while($row=mysqli_fetch_array($result))
	{

?>
	

	<tr>
		<td><?php echo $row['date']; ?></td>
		<td><?php echo $row['slot']; ?></td>
		<td><?php echo $row['table_id']; ?></td>
		<td><?php echo $row['name']; ?></td>
		<td><?php echo $row['mobile']; ?></td>
		<td><?php echo $row['email_id']; ?></td>
	</tr>
	
<?php
	}
?>

</table>
<br><br>

</div>

<?php
include('footer.php');
?>

</body>

<script>

$(".more").click(function(){
	$(this).closest('.orders').find('.display').toggle(1000);
})



</script>

</html>