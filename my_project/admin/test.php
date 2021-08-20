<?php

$connect=mysqli_connect("localhost","root","","taste_the_best") or die("server not connected");

$count=0;
	
	$s="select count(order_id) as cnt from orders where status='pending'";
	
	$r=mysqli_query($connect,$s);
	
	while($row0=mysqli_fetch_array($r))
	{
		$count=$row0['cnt'];
	}
	
?>
<!doctype html>
<html lang="en">
<head>

<title>Untitled Document</title>



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
        
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.7/css/fixedHeader.bootstrap.min.css">

<script src="https://code.jquery.com/jquery-3.5.1.js" charset="utf-8"></script>

<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" charset="utf-8"></script>

<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap.min.js" charset="utf-8"></script>

<script src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js" charset="utf-8"></script>

<link rel="stylesheet" href="s.css">


</head>

<body>

 <input type="checkbox" id="check">
    <!--header area start-->
    <header>
      <label for="check">
        <i class="fas fa-bars" id="sidebar_btn"></i>
      </label>
      <div class="left_area">
        <h3>TASTE THE BEST</h3>
      </div>
      <div class="right_area">
        <a href="logout.php" class="logout_btn">Logout</a>
      </div>
    </header>

 <div class="mobile_nav">
      <div class="nav_bar">
        <img src="images/admin.png" class="mobile_profile_image" alt="">
        <i class="fa fa-bars nav_btn"></i>
      </div>
      <div class="mobile_nav_items">
        <a href="dashboard.php"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
        <a href="categories.php"><i class="fas fa-cogs"></i><span>Menu</span></a>
        <a href="today_orders.php?x=0"><i class="fas fa-table"></i><span>View orders</span>&nbsp;&nbsp;<span class="badge" style="background-color:#FF0000; border-radius:30%; padding:5px;"><?php echo $count;?></span></a>
        <a href="customers.php"><i class="fas fa-th"></i><span>View Customers</span></a>
        <a href="#"><i class="fas fa-info-circle"></i><span>About</span></a>
        <a href="view_admin.php"><i class="fas fa-sliders-h"></i><span>View Admin</span></a>
      </div>
    </div>
    <!--mobile navigation bar end-->
    <!--sidebar start-->
    <div class="sidebar">
      <div class="profile_info">
        <img src="images/admin.png" class="profile_image" alt="">
        <h4>Admin</h4>
      </div>
      <a href="dashboard.php"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
      <a href="categories.php"><i class="fas fa-cogs"></i><span>Menu</span></a>
      <a href="today_orders.php?x=0"><i class="fas fa-table"></i><span>View Orders</span>&nbsp;&nbsp;<span class="badge" style="background-color:#FF0000; border-radius:30%; padding:5px;"><?php echo $count;?></span></a>
      <a href="customers.php"><i class="fas fa-th"></i><span>View Customers</span></a>
      <a href="#"><i class="fas fa-info-circle"></i><span>About</span></a>
      <a href="view_admin.php"><i class="fas fa-sliders-h"></i><span>View Admin</span></a>
    </div>
	
	<div class="content">
	</div>

 <script type="text/javascript">
    $(document).ready(function(){
      $('.nav_btn').click(function(){
        $('.mobile_nav_items').toggleClass('active');
      });
    });
    </script>
	
</body>
</html>
