<?php
	session_start();
	include("config.php");
	$polaczenie = mysqli_connect($host, $user, $password);
	mysqli_query($polaczenie, "SET CHARSET UTF-8");
	mysqli_select_db($polaczenie, $database);
	$id = $_SESSION['id_wpisu'];
	$wpis = $_POST['wpis'];
	$typ=$_POST['typ'];
    $rodzaj=$_POST['rodzaj'];
    $date=$_POST['time'];
    $tytul=$_POST['tytul'];
	
	$filename = $_FILES["cover"]["name"];
    $tmpname = $_FILES["cover"]["tmp_name"];
    $folder="image/".$filename;
    move_uploaded_file($tmpname,$folder);
	
	
    mysqli_query($polaczenie, "UPDATE wpis SET data=NOW(), wpis='$wpis', images='$folder',typ='$typ',rodzaj='$rodzaj',time='$date',tytul='$tytul' WHERE id='$id'");
    mysqli_close($polaczenie);
	header('location: zmien.php');  
 ?>