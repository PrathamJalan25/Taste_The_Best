<?php
	
	$connect=mysqli_connect("localhost","root","","taste_the_best") or die("srever not connected");
	session_start();
	$a=$_REQUEST['x'];
	$c=$_REQUEST['y'];
	$b="select * from dishes where id=$a";
	
	$res1=mysqli_query($connect,$b);
?>

<html>
<head>

<title>Untitled Document</title>

<link rel="stylesheet" type="text/css" href="files/bootstrap-3.3.7/dist/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="food_list.css">

<script src="files/JQUERY.js"></script>

<script src="files/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>

</head>

<body style="background-color:#111;">
<?php
include('header.php');
?>

<br>

<div class="row" style="font-size:28px; color:#33FFFF; text-align:center; margin-top:20px; margin-bottom:10px;"><?php echo $c; ?></div>

<div class="row" style="margin-bottom:20px;">
	<?php
	while($row1=mysqli_fetch_array($res1))
	{
		
	?>
	<div class="col-md-3" align="center" style="margin:10px 0;">
	    <div class="flip-box">
		  <div class="flip-box-inner">
			<div class="flip-box-front">
			  <img src="images/<?php echo $row1['image']; ?>" style="width:300px; height:300px; border-radius:20px;">
			</div>
			<div class="flip-box-back">
			  <h2>Description</h2>
			  <p><?php echo $row1['description']; ?></p>
			</div>
		  </div>
	 	</div>
		<div style="color:#FFFF66; padding:5px; font-size:16px; margin-top:5px;"><?php echo $row1['dish_name']; ?></div>
		<div style="color:#00FF66; padding:5px; font-size:16px;"><i class="fa fa-rupee"></i>&nbsp;&nbsp;<?php echo $row1['price']; ?></div>
		<div style="padding:5px;"><a href="buy_now.php?x=<?php echo $row1['dish_id'];?> "><button class="btn btn-primary" style="border-radius:0; width:100px;">buy now</button></a>&nbsp;<a href="cart.php?x=<?php echo $row1['dish_id'];?> "><button class="btn btn-warning" style="border-radius:0; width:100px;">add to cart</button></a></div>
	</div>
	<?php
	}
	?>
</div>


<br><br><br>

<?php
include('footer.php');
?>
</body>
</html>

