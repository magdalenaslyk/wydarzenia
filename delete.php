<?php
	include("config.php");
	$polaczenie = mysqli_connect($host, $user, $password);
	mysqli_query($polaczenie, "SET CHARSET UTF-8");
	mysqli_select_db($polaczenie, $database);
	$id = $_GET['id'];

    $wynik = mysqli_query($polaczenie, "DELETE FROM wpis WHERE id=$id");
    mysqli_close($polaczenie);
	header('location: usun.php');  
 ?>
