<?php
		include 'requests\function.php';
        session_start();
		$namepage=$_SESSION['namepage'];
		$id=$_SESSION['textID'];
        deleteTable($connect, $namepage, $id);
		header('location:'.$namepage.'.php?id=1');
?>
