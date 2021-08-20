<html>

<head>

<title>side bar</title>

<link rel="stylesheet" type="text/css" href="files/bootstrap-3.3.7/dist/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="b.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>

</head>

<body>

<div class="wrapper">
	<div class="header">
		<div class="header-menu">
			<div class="title">TASTE THE BEST</div>
			<div class="sidebar-btn">
				<i class="fas fa-bars"></i>
			</div>
			<ul>
				<li><a href="#"><i class="fas fa-search"></i></a></li>
				<li><a href="#"><i class="fas fa-bell"></i></a></li>
				<li><a href="#"><i class="fas fa-power-off"></i></a></li>
			</ul>
		</div>
	</div>
	<div class="sidebar">
		<div class="sidebar-menu">
			<center class="profile">
				<img src="images/admin.png">
				<p>ADMIN</p>
			</center>
			<li class="items">
				<a href="#" class="menu-btn">
					<i class="fas fa-desktop"></i><span>Dashboard</span>
				</a>
			</li>
			<li class="items" id="profile">
				<a href="#" class="menu-btn">
					<i class="fas fa-user-circle"></i><span>Menu<i class="fas fa-chevron-down drop-down"></i></span>
				</a>
				<div class="sub-menu">
					<a href="#"><i class="fas fa-image"></i><span>name</span></a>
				</div>
			</li>
			<li class="items">
				<a href="#" class="menu-btn">
					<i class="fas fa-desktop"></i><span>View Orders</span>
				</a>
			</li>
			<li class="items">
				<a href="#" class="menu-btn">
					<i class="fas fa-desktop"></i><span>View Customers</span>
				</a>
			</li>
			<li class="items">
				<a href="#" class="menu-btn">
					<i class="fas fa-desktop"></i><span>About</span>
				</a>
			</li>
			<li class="items">
				<a href="#" class="menu-btn">
					<i class="fas fa-desktop"></i><span>Settings</span>
				</a>
			</li>
		</div>
	</div>
	<div class="main-container"></div>
</div>

<script type="text/javascript">
        $(document).ready(function(){
            $(".sidebar-btn").click(function(){
                $(".wrapper").toggleClass("collapse");
            });
        });
        </script>

</body>

</html>