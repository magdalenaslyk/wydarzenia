<?php
error_reporting(0);
?>

<html>
<body>

<form action="" method="POST" enctype="multipart/form-data">
	
    <input type="file" name="cover" value=""/>
	<input type="submit" name="submit" value="Dodaj"/><br><br>
</form>
	



<?php
session_start();
include("config.php");


$filename = $_FILES["cover"]["name"];
$tmpname = $_FILES["cover"]["tmp_name"];
$folder="image/".$filename;
move_uploaded_file($tmpname,$folder);
echo "<img src='$folder' heigh='100' width='100'/>";
?>


</body>
</html>