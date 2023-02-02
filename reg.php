<?php
include 'configs\config.php';
$name = filter_var(trim($_POST['name']),FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST['email']),FILTER_SANITIZE_STRING);
	if (mb_strlen($email)<5 || mb_strlen($email)>100)
	{
	  echo "Недопустимая длина логина";
	  exit;
	}
	else if (mb_strlen($name)<3 || mb_strlen($name)>50)
	{
	  echo "Недопустимая длина имени";
	  exit;
	}
	  else if (mb_strlen($pass)<3 || mb_strlen($pass)>32)
	{
		echo "Недопустимая длина пароля(от 8 до 30 символов)";
		exit;
	}
	$query="INSERT INTO `users` ( `name`, `pass`, `email`) VALUES ('$name', '$pass', '$email');" ;
	mysqli_query($connect, $query);
	$connect->close();
	header('location:index.php' );
 ?>