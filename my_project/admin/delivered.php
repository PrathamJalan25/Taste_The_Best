<?php

$connect=mysqli_connect("localhost","root","","taste_the_best") or die("server not connected");

$y=$_REQUEST['y'];

$x=$_REQUEST['x'];

$update="update orders set status='delivered' where order_id=$y";

$res=mysqli_query($connect,$update);

if($res)
{
	header("location:today_orders.php?x=".$x);
}
?>