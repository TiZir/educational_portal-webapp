<html lang="ru">
<head>
	<meta charset="UTF-8">
	<link rel="icon" href="icon.png">
	<link rel="stylesheet" href="main/stylemain.css">
	<script src="regent/jsregent.js"></script>
	<script src="ckeditor/ckeditor.js"></script>
</head>
<body>
	<header>
	  <font color="#223e47">Пользователь: <?php echo($_COOKIE['user']) ?></font>
	  <br>
	  <a href="exit.php">Выход</a> </p>
	  <ul id="navbar">
	  <li><a href="main.php?id=1">Главная</a></li>
      <li><a href="dom.php?id=1">Документ DOM</a></li>
      <li><a href="postget.php?id=1">POST и GET запросы</a></li>
      <li><a href="js.php?id=1">JS/Динамические стили</a></li>
      <li><a href="canvas.php?id=1">Тег <СANVAS></a></li>
    </ul>
	</header>
</body>
</html>