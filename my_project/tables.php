<?php
	
	$connect=mysqli_connect("localhost","root","","taste_the_best") or die("srever not connected");
	session_start();
	
	$s="select count(table_id) as cnt from tables";
	
	$r=mysqli_query($connect,$s);
	
	if($row=mysqli_fetch_array($r))
	{
		$cnt=$row['cnt'];
	}
	
?>

<html>

<head>

<title>tables</title>

<link rel="stylesheet" type="text/css" href="files/bootstrap-3.3.7/dist/css/bootstrap.min.css">

<script src="files/JQUERY.js"></script>

<script src="files/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>

<style>

td,th
{
	padding:30px;
}

.circle1
{
	background-color:#99FF00;
	color:#FF0000;
	padding:15px;
	border-radius:50%;
}

.circle2
{
	color:#99FF00;
	background-color:#FF0000;
	padding:15px;
	border-radius:50%;
}

.btn:active 
{
  background: #cecece;
  text-decoration: none;
}

</style>

</head>

<body style="background-color:#111;">

<?php
include('header.php');
?>

<div style="width:95%; height:150px; background-color:#999999; color:#000; margin:2.5%; padding:15px;"><h2 style="text-align:center; font-family:Georgia;">BOOK TABLE</h2><center><font face="Geneva" size="+2" color="#006600">Want to experience dine in! Book your table here!</font></center></div>

<div style="margin-bottom:2.5%;">
	<center><button type="button" class="btn">TODAY</button>
	<button type="button" class="btn">TOMORROW</button>
	<button type="button" class="btn">DAY AFTER</button></center>
</div>

<div style="margin-bottom:2.5%;">
	<center><table style="color:#FFFFFF;">
		<tr>
			<th style="text-align:center;">TIME SLOTS</th>
			<th colspan="<?php echo $cnt;?>" style="text-align:center;">TABLES</th>
		</tr>
		<?php 
		
			$date=date('Y-m-d');
			
			$s1="select * from time_slots";
			
			$r1=mysqli_query($connect,$s1);
			
			while($row1=mysqli_fetch_array($r1))
			{
				?>
				
				<tr>
					<td style="text-align:center;"><?php echo $row1['slot'];?></td>
					<?php 
						
						$s2="select * from tables";
	
						$r2=mysqli_query($connect,$s2);
						
						while($row2=mysqli_fetch_array($r2))
						{
							$s3="select * from table_bookings";
							
							$r3=mysqli_query($connect,$s3);
							
							if($row3=mysqli_fetch_array($r3))
							{
								
								if($row3['date']==$date&&$row3['slot_id']==$row1['slot_id']&&$row3['table_id']==$row2['table_id'])
								{
							
							?>
							
								<td style="text-align:center; font-weight:500;"><span class="circle2"><?php echo $row2['table_id'];?></span></td>
								
							<?php
								}
								else
								{
										?>
							
											<td style="text-align:center; font-weight:500;"><span class="circle1"><?php echo $row2['table_id'];?></span></td>
											
										<?php
								}
							}
						}
						
					?>
				</tr>
				
				<?php
			}
			
		?>
	</table></center>
</div>

<?php
include('footer.php');
?>

<script>
$('.btn').click(function(){
    if($(this).hasClass('active')){
        $(this).removeClass('active')
    } else {
        $(this).addClass('active')
    }
});
</script>

</body>

</html>