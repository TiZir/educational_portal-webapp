<?php include 'configs\config.php'; ?>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="regent\styleregent.css">
	<script src="regent\jsregent.js"></script>
	<title>Форма регистрации/авторизации</title>
</head>
<link rel="icon" href="icon.png">
<body>
	<form action="ent.php" class="forma" method="post">
		<h1>Форма регистрации/авторизации</h1>
		<div class="group">
			<label for="nameEnt"><font>Имя пользователя</font></label>
			<input type="text" placeholder="Ваш логин" name="nameEnt" required >
		</div>
		<div class="group">
			<label for="passEnt"><font>Пароль</font></label>
			<input type="text" placeholder="Ваш пароль" name="passEnt" required >
		</div>
		<div class="group">
			<center><button type="submit" >Вход</button></center>
		</div>
	</form>
	<form action="reg.php" method="post">
		<center><button  type="button" onclick="openForm()">Регистрация</button></center>
		
			<div class="form-popup" id="myForm">
				<h1>Регистрация</h1>
				
				<label for="name"><font>Имя пользователя</font></label>
				<input type="text" placeholder="Ваш логин" name="name" required>
				<br><br>
				<label for="email"><font>E-mail</font></label>
				<input type="text" placeholder="Ваш E-mail" name="email" required>
				<br><br>
				<label for="pass"><font>Пароль</font></label>
				<input type="text" placeholder="Ваш пароль" name="pass" required>
				<br><br>
				<button type="submit">Зарегистрироваться</button>
				<button type="button" onclick="closeForm()">Закрыть</button>
			</div>
	</form>
</body>
</html>