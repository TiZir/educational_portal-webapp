<?php
include 'requests\function.php';
include "interactive\head.php";
$namepage = "postget";
session_start();{
    $_SESSION['namepage'] = $namepage;
    $_SESSION['textID'] = $_GET['id'];
}


if(isset($_POST['edit'])) {
    $_SESSION['textID'] = $_GET['id'];
}

if(isset($_POST['dele'])) {
    deleteTable($connect, $namepage, $_GET['id']);
    $_GET['id'] =1;
}
?>

<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>POST и GET запросы.</title>
	
</head>
<br>
<body>
<div class="form-popup" id="myForm2">
		
		<?php
			session_write_close();
			session_start();{
			$namepage = $_SESSION['namepage'];
			$baseID = nextTextID($connect, $namepage);
			}
			$txt = textFromTable($connect, $namepage, $baseID);
			if(isset($_POST['add'])) {
				if($_POST["baseName"] == ""){
					echo "<script>alert('Введите название статьи')</script>";
				}
				else{
					insetTable($connect, $namepage, $_POST["baseName"],$baseID, $_POST["CKtext"]);
				}
			}
		?>
		<form method="post">
			<div class="div_sections">
				<p class="pcss" align="center">Добавление статьи</p>
				<button type="submit"  name="add">Добавить</button>
				<button type="button" onclick="closeForm2()">Закрыть</button>
				<nobr>Название статьи:</nobr>
				<input type="text" id="baseName"  autocomplete="off" name="baseName">
				<textarea name="CKtext" id="editor1" cols="125" rows="30"><?php foreach ($txt as $masN) {echo $masN[4];} ?></textarea>
				<script type="text/javascript">
					CKEDITOR.replace( 'editor1' );
				</script>
				</br>
			</div>
		</form>
</div>

<br>

<table border="0">
	<tr>
		<td>
			<div id="sidebar">
				<?php include("interactive/sidebar.php"); ?>
			</div>
		</td>
		<td>
			<form class="forma" action="delarticles.php" method="post">
				<div >
					</br>
					<?php
					$txt = textFromTable($connect, $namepage, $_GET['id']);
					foreach ($txt as $masN) {
						echo html_entity_decode($masN[4]);
					}
					?>
					
					</br>
					<button type="button"  name="edit" onclick="openForm3()">Редактировать</button>
					<button type="submit"  onclick="return confirm('Вы точно хотите удалить статью?');" >Удалить Статью</button>
				</div>
			</form>
		</td>
	</tr>
</table>

<div class="form-popup" id="myForm3">
	<?php
			$namepage = $_SESSION['namepage'];
			$baseID = $_SESSION['textID'];
		$txt = textFromTable($connect, $namepage, $baseID);
		if(isset($_POST['upd'])) {
			if ($_POST["baseName"] == ""){
				echo "<script>alert('Введите название статьи')</script>";
			}
			else {
				updateTable($connect, $namepage, $_POST["baseName"], $baseID, $_POST["CKtext"]);
				header("Refresh: 0");
			}
		}
	?>
	<form method="post">
		<p align="center" class="pcss">Редактирование статьи "<?php foreach ($txt as $masN) {echo $masN[2];}?>"</p>
		<div>
			<button type="submit" name="upd">Обновить</button>
			<button type="button" onclick="closeForm3()">Закрыть</button>
			<nobr>Название статьи:</nobr>
			<input type="text" autocomplete="off" id="baseName" name="baseName" value="<?php echo $masN[2]; ?>">
			<div>
				<textarea name="CKtext" id="editor2" cols="125" rows="30"><?php foreach ($txt as $masN) {echo $masN[4];} ?></textarea>
				<script type="text/javascript">
					CKEDITOR.replace( 'editor2' );
				</script>
				</br>

			</div>
		</div>
	</form>
</div>

</body>
<script>
	if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
	}
</script>
</html>
