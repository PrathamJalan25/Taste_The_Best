<?php

$connect=mysqli_connect("localhost","root","","taste_the_best") or die("server not connected");



if(isset($_REQUEST['login']))
{
	$user_name=$_REQUEST['user_name'];
	
	$password=$_REQUEST['password'];
			
	$sel="select * from admin where user_name='$user_name' and password='$password'";
	
	$res=mysqli_query($connect,$sel);
	
	if($row=mysqli_fetch_array($res))
	{
		setcookie('user_name',$row['user_name'],time()+900,"/");
		header("location:dashboard.php");
	}
	else
	{
		echo "Invalid User name or Password!";
		echo "Please try again!";
	}
}


?>

<html>

<head>

<title>Admin page</title>

<style>

table
{
	background-color:#000000;
	border:5px solid black;
	border-radius:25px;
	background:rgba(0,0,0,0.7);
}

.type
{
	width:300px;
	height::32px;
	border:0;
	outline:0;
	background:transparent;
	border-bottom:3px solid white;
	color:white;
	font-size:25px;
}

input::-webkit-input-placeholder
{
	font-size:20px;
	line-height:3;
	color:white;
}

.login
{
	width:200px;
	background-color:orange;
	height:35px;
}

body
{
	background-image:url(images/bg.jpg);
	background-repeat:no-repeat;
	background-size:100% 100%;
	background-attachment:fixed;
}

</style>

</head>

<body>

<br><br>

<form method="post">

<table width="37%" border="0" cellspacing="40" cellpadding="10" align="center">
	<tr>
		<td align="center"><img src="images/admin.png" width="50%" style="border-radius:50%;"/></td>
	</tr>
	<tr>
		<td align="center"><input type="text" placeholder="Enter username" class="type" name="user_name"/></td>
	</tr>
	<tr>
		<td align="center"><input type="password" placeholder="Enter password" class="type" name="password"/></td>
	</tr>
	<tr>
		<td align="center"><button class="login" id="login" type="submit" name="login">login</button></td>
	</tr>
</table>

</form>

</body>

</html>
