<html>
<head>
<meta charset="UTF-8">

</head>

<body>
<style>
body {
	
	background-image: url(tlo.jpg);
	background-size: cover;
	
	}
</style>
<center>

<?php
	session_start();
	$id = $_GET['id'];
	$_SESSION['id_wpisu']=$id;
	echo "Zedytuj swój post ".$_SESSION['imie']."!<br><br>";

?>
	<form action="update.php" method="POST" enctype="multipart/form-data">
	<br><br><textarea name="wpis" id="wpis" cols="50" rows="10" required></textarea><br><br>
	<input type="file" name="cover" value=""/><br><br>
	<input type="submit" value="Edytuj post">
	</form>
	<br>
	<a href="index.php">Wróc na główną stronę</a>


</center>
</body>

</html>