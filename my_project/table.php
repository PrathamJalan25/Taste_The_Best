<?php
	
	$connect=mysqli_connect("localhost","root","","taste_the_best") or die("srever not connected");
	session_start();
	
?>

<html>

<head>

<title>tables</title>

<link rel="stylesheet" type="text/css" href="files/bootstrap-3.3.7/dist/css/bootstrap.min.css">

<script src="files/JQUERY.js"></script>

<script src="files/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>

<style>

.row
{
	margin:0 -0.5%px;
}

.card
{
	background-color:#99CC99;
	height:200px;
	width:24%;
	float:left;
	margin:0 0.5% 1%;
	color:#003366;
	font-size:24px;
	text-align:center;
	padding:88px;
}

.card:hover
{
	opacity:80%;
	background-color:#00FF66;
	color:#330099;
}

.card2
{
	background-color:#999999;
	height:200px;
	width:32.33%;
	float:left;
	margin:1% 0.5%;
	color:#003366;
	font-size:24px;
	text-align:center;
	padding:88px;
}

.card2:hover
{
	opacity:90%;
	background-color:#CCCCCC;
	color:#330099;
}

.card3
{
	background-color:#33CCCC;
	height:200px;
	width:49%;
	float:left;
	margin:1% 0.5% 0;
	color:#003366;
	font-size:24px;
	text-align:center;
	padding:88px;
}

.card3:hover
{
	opacity:90%;
	background-color:#33FFFF;
	color:#330099;
}

</style>

</head>

<body style="background-color:#111;">

<?php
include('header.php');
?>

<div style="width:95%; height:150px; background-color:#999999; color:#000; margin:2.5%; padding:15px; margin-bottom:0;"><h2 style="text-align:center; font-family:Georgia;">BOOK TABLE</h2><center><font face="Geneva" size="+2" color="#006600">Want to experience dine in! Book your table here!</font></center></div>

<div class="row" style="padding:50px;">
	<a href="book_table.php?x=1"><div class="card">TABLE NO. 1</div></a>
	<a href="book_table.php?x=2"><div class="card">TABLE NO. 2</div></a>
	<a href="book_table.php?x=3"><div class="card">TABLE NO. 3</div></a>
	<a href="book_table.php?x=4"><div class="card">TABLE NO. 4</div></a>
	<a href="book_table.php?x=5"><div class="card2">TABLE NO. 5</div></a>
	<a href="book_table.php?x=6"><div class="card2">TABLE NO. 6</div></a>
	<a href="book_table.php?x=7"><div class="card2">TABLE NO. 7</div></a>
	<a href="book_table.php?x=8"><div class="card3">TABLE NO. 8</div></a>
	<a href="book_table.php?x=9"><div class="card3">TABLE NO. 9</div></a>
</div>

<?php
include('footer.php');
?>

</body>

</html>