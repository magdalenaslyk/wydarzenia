<?php
	session_start();
	$wpis=$_POST['wpis'];
	$id_user=$_SESSION['id_user'];
	
$filename = $_FILES["cover"]["name"];
$tmpname = $_FILES["cover"]["tmp_name"];
$folder="image/".$filename;
move_uploaded_file($tmpname,$folder);


	
	include("config.php");
	$polaczenie = mysqli_connect($host, $user, $password);;
	
	
	mysqli_select_db($polaczenie, $database);
	mysqli_query($polaczenie, "INSERT INTO wpis SET id_user='$id_user', wpis='$wpis', data=NOW(), images='$folder' ");

	

	header('location: index.php');
?>