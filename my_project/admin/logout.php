<?php 

setcookie('user_name',"",time()-10,"/");

header("location:index.php");

?>