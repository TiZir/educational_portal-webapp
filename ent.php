<?php
include 'configs\config.php';
$nameEnt= filter_var(trim($_POST['nameEnt']),FILTER_SANITIZE_STRING);
$passEnt= filter_var(trim($_POST['passEnt']),FILTER_SANITIZE_STRING);

$result=mysqli_query($connect,"SELECT * FROM `users` WHERE `name`='$nameEnt' AND `pass`='$passEnt'") ;
$user=$result->fetch_assoc();
if (empty($user)) {
	$connect->close();
	header('location:index.php' );
	exit();
}

setcookie("user", $user['name'], time()+3600,"/");   
$connect->close();
header('location:main.php' );
?>