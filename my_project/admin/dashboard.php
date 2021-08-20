<?php

$connect=mysqli_connect("localhost","root","","taste_the_best") or die("server not connected");

if(isset($_COOKIE['user_name']))
{
	
	$user_name=$_COOKIE['user_name'];
	
	$today_order=0;
	
	$today_sales=0;
	
	$total_orders=0;
	
	$total_sales=0;
	
	$customers=0;
	
	$categories=0;
	
	$dishes=0;
	
	$date=date("Y-m-d");
	
	$select="select count(date) as cnt1 from orders where date='$date'";
	
	$result=mysqli_query($connect,$select);
		
	while($row=mysqli_fetch_array($result))
	{
		$today_order=$row['cnt1'];
	}
	
	$select1="select sum(total) as cnt2 from orders where date='$date'";
	
	$result1=mysqli_query($connect,$select1);
		
	while($row1=mysqli_fetch_array($result1))
	{
		$today_sales=$row1['cnt2'];
	}
	
	if(empty($today_sales))
	{
		$today_sales=0;
	}
	
	$select2="select count(date) as cnt3 from orders";
	
	$result2=mysqli_query($connect,$select2);
		
	while($row2=mysqli_fetch_array($result2))
	{
		$total_orders=$row2['cnt3'];
	}
	
	$select3="select sum(total) as cnt4 from orders";
	
	$result3=mysqli_query($connect,$select3);
		
	while($row3=mysqli_fetch_array($result3))
	{
		$total_sales=$row3['cnt4'];
	}
	
	$select4="select count(user_id) as cnt5 from users";
	
	$result4=mysqli_query($connect,$select4);
		
	while($row4=mysqli_fetch_array($result4))
	{
		$customers=$row4['cnt5'];
	}
	
	$select5="select count(id) as cnt6 from categories";
	
	$result5=mysqli_query($connect,$select5);
		
	while($row5=mysqli_fetch_array($result5))
	{
		$categories=$row5['cnt6'];
	}
	
	$select6="select count(dish_id) as cnt7 from dishes";
	
	$result6=mysqli_query($connect,$select6);
		
	while($row6=mysqli_fetch_array($result6))
	{
		$dishes=$row6['cnt7'];
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

<html>

<head>
        
<title>Dashboard</title>

<link rel="stylesheet" href="style.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>

<style>

.dashboard-components
{
	background-color:#999999;
	height:200px;
	width:90%;
	text-align:center;
	margin:5%;
	opacity:0.8;
	padding:2%;
	box-shadow:5px 5px 5px #222;
}

.dashboard-components:hover
{
	box-shadow:5px 5px 5px #cccccc;
}

.row
{
	width:100%;
}

.col-md-4
{
	width:33.33%;
	float:left;
}

.col-md-3
{
	width:25%;
	float:left;
}

.dashboard-components a
{
	color:#CCFFFF;
	text-decoration:none;
}

.dashboard-components a:hover
{
	color:#CCFF00;
	font-size:20px;
}

.dashboard-components h2
{
	text-align:center; 
	color:#FFFF00; 
	font-family:Geneva;
}

.dashboard-components h1
{
	text-align:center; 
	color:#FFFFFF; 
	font-family:Geneva;
	font-size:48px;
}

</style>
 
</head>

<body>

   <?php 
   	include("side_menu.php");
   ?>
    
    <div class="content">
	
		<h1 style="text-align:center; color:#FFFFFF; font-family:Geneva;">DASHBOARD</h1>
		
    	<div class="row">
			<div class="col-md-3">
				<div class="dashboard-components">			
					<h2>TODAY'S ORDERS</h2>
					<h1><?php echo $today_order; ?></h1>
					<a href="today_orders.php?x=1">View</a>
				</div>
			</div>
			<div class="col-md-3">
				<div class="dashboard-components">
					<h2>TODAY'S SALES</h2>
					<h1><?php echo $today_sales; ?></h1>
					<a href="today_orders.php?x=1">View</a>
				</div>
			</div>
			<div class="col-md-3">
				<div class="dashboard-components">
					<h2>TOTAL ORDERS</h2>
					<h1><?php echo $total_orders; ?></h1>
					<a href="today_orders.php?x=0">View</a>
				</div>
			</div>
			<div class="col-md-3">
				<div class="dashboard-components">
					<h2>TOTAL SALES</h2>
					<h1><?php echo $total_sales; ?></h1>
					<a href="today_orders.php?x=0">View</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="dashboard-components">
					<h2>TOTAL CUSTOMERS</h2>
					<h1><?php echo $customers; ?></h1>
					<a href="customers.php">View</a>
				</div>
			</div>
			<div class="col-md-4">
				<div class="dashboard-components">
					<h2>TOTAL CATEGORIES</h2>
					<h1><?php echo $categories; ?></h1>
					<a href="categories.php">View</a>
				</div>
			</div>
			<div class="col-md-4">
				<div class="dashboard-components">
					<h2>TOTAL DISHES</h2>
					<h1><?php echo $dishes; ?></h1>
					<a href="view_dishes?x=0">View</a>
				</div>
			</div>
		</div>
    </div>

</body>

</html>
