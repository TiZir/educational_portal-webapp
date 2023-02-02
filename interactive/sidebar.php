<div>
    <?php
		$txt = getPageName($connect, $namepage);
		foreach ($txt as $item) {
		   echo "<a id='a_sidebar' href=\"$namepage.php?id=$item[3]\">$item[2]</a><br><br>";
		}
		if(isset($_POST['add_item'])) {
			$_SESSION['textID'] = $_GET['id'];
		}
    ?>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <button type="submit" id="sidebar_buttons" name="add_item" onclick="openForm2()">Добавить статью</button>
</div>