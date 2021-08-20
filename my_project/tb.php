<?php
	
	$connect=mysqli_connect("localhost","root","","taste_the_best") or die("srever not connected");
	session_start();

	if(!isset($_SESSION['user_name']))
	{
		?>
			<script>
			alert("Please login to continue");
			window.history.back();
			</script>
		<?php
	}

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

.circle
{
	background-color:#CCCCCC; 
	color:#FFFFFF; 
	border-radius:50%; 
	height:40px; 
	width:40px; 
	outline:none; 
	border:none;
}

.circle2
{
	background-color:#666699; 
	color:#FFFFFF; 
	border-radius:50%; 
	height:40px; 
	width:40px; 
	outline:none; 
	border:none;
}

.circle3
{
	background-color:#666666; 
	color:#FFFFFF; 
	border-radius:50%; 
	height:40px; 
	width:40px; 
	outline:none; 
	border:none;
}

.circle1
{
	background-color:green; 
	color:#FFFFFF; 
	border-radius:50%; 
	height:40px; 
	width:40px; 
	outline:none; 
	border:none;
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

<center><form method="post">
<button type="submit" name="today" class="btn"><?php echo date('d-m-Y');?></button>&nbsp;&nbsp;
<button type="submit" name="tomorrow" class="btn"><?php echo date('d-m-Y',strtotime('+1 day'));?></button>&nbsp;&nbsp;
<button type="submit" name="day_after" class="btn"><?php echo date('d-m-Y',strtotime('+2 day'));?></button>
</form></center>
<div style="margin-bottom:2.5%;">
	<center><table style="color:#FFFFFF;">
		<tr>
			<th style="text-align:center;">TIME SLOTS</th>
			<th colspan="<?php echo $cnt;?>" style="text-align:center;">TABLES</th>
		</tr>
		<?php 
		
			if(isset($_REQUEST['today']))
			{
				$date=date('Y-m-d');
			}
			else if(isset($_REQUEST['tomorrow']))
			{
				$date=date('Y-m-d',strtotime('+1 day'));
			}
			else if(isset($_REQUEST['day_after']))
			{
				$date=date('Y-m-d',strtotime('+2 day'));
			}
			else
			{
				$date=date('Y-m-d');
			}
			
			$s1="select * from time_slots";
			
			$r1=mysqli_query($connect,$s1);
			
			$in=0;
			
			while($row1=mysqli_fetch_array($r1))
			{
				?>
				
				<tr>
					<td style="text-align:center;"><?php echo $row1['slot'];?><input type="hidden" class="slot_id" name="slot_id" value="<?php echo $row1['slot_id'];?>" style="color:black;"></td>
					<?php 
					
						$slot=$row1['slot'];
						
						for($i=1;$i<=$cnt;$i++)
						{
							$s2="select * from table_bookings tb , time_slots ts where ts.slot_id=tb.slot_id and ts.slot='$slot' and tb.date='$date' and tb.table_id=$i";
						
							$r2=mysqli_query($connect,$s2);
							
							if($row2=mysqli_fetch_array($r2))
							{
								
									?>
										<td><button style="color:#FFFFFF; background-color:#FF0000; border-radius:50%; height:40px; width:40px;" disabled="disabled" class="bt"> <?php echo $row2['table_id'];?></button></td>
									<?php
								
							}
							else
							{
								$s3="select * from tables where table_id='$i'";
								
								$r3=mysqli_query($connect,$s3);
								
								if($row2=mysqli_fetch_array($r3))
								{
									if($row2['capacity']=='2')
									{
									?>
										<td><button class="bt circle"><?php echo $i; ?></button><input style="color:#000000;" class="in" type="hidden" value="<?php echo $in; ?>"></td>
									<?php
									}
									else if($row2['capacity']=='4')
									{
									?>
										<td><button class="bt circle2"><?php echo $i; ?></button><input style="color:#000000;" class="in" type="hidden" value="<?php echo $in; ?>"></td>
									<?php
									}
									else
									{
									?>
										<td><button class="bt circle3"><?php echo $i; ?></button><input style="color:#000000;" class="in" type="hidden" value="<?php echo $in; ?>"></td>
									<?php
									}
								}
								
								$in++;
							}
						
						}
						
					?>
					</tr>
					<?php
				}
				?>
	</table></center>
	
	<center><button class="btn-success btn" type="submit" name="submit">PROCEED TO BOOK</button></center>

<form method="post">
	<input type="hidden" id="date" name="date" value="<?php echo $date;?>">
</form>

</div>

<?php
include('footer.php');
?>

<script>

var ind=[];
var tid=[];
var sid=[];
var i=0,z;

$('.bt').click(function(){
	var x=$(this).text();
	var y=$(this).closest('tr').find('.slot_id').val();
	var w=$(this).closest('td').find('.in').val();
	if($(this).hasClass('circle'))
	{
		$(this).removeClass('circle');
		$(this).addClass('circle1');
		var x=$(this).text();
		var y=$(this).closest('tr').find('.slot_id').val();
		tid[i]=x;
		sid[i]=y;
		ind[i]=w;
		i++;
		z=$('#date').val();
	}
	else if($(this).hasClass('circle2'))
	{
		$(this).removeClass('circle2');
		$(this).addClass('circle1');
		var x=$(this).text();
		var y=$(this).closest('tr').find('.slot_id').val();
		tid[i]=x;
		sid[i]=y;
		ind[i]=w;
		i++;
		z=$('#date').val();
	}
	else if($(this).hasClass('circle3'))
	{
		$(this).removeClass('circle3');
		$(this).addClass('circle1');
		var x=$(this).text();
		var y=$(this).closest('tr').find('.slot_id').val();
		tid[i]=x;
		sid[i]=y;
		ind[i]=w;
		i++;
		z=$('#date').val();
	}
	else
	{
		if(x>=1&&x<=4)
		{
			$(this).removeClass('circle1');
			$(this).addClass('circle');
		}
		else if(x>=5&&x<=7)
		{
			$(this).removeClass('circle1');
			$(this).addClass('circle2');
		}
		else if(x>=8&&x<=9)
		{
			$(this).removeClass('circle1');
			$(this).addClass('circle3');
		}
		var p=ind.indexOf(w);
		ind.splice(p,1);
		sid.splice(p,1);
		tid.splice(p,1);
	}
});

$('.btn-success').click(function(){
	window.location.href="table_booking.php?sid="+sid+"&tid="+tid+"&dt="+z;
})

</script>

</body>

</html>