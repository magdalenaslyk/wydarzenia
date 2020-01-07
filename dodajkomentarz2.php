<?php
session_start();
$komentarz=$_POST['komentarz'];
$id_user=$_SESSION['id_user'];

//$filename = $_FILES["cover"]["name"];
//$tmpname = $_FILES["cover"]["tmp_name"];
//$folder="image/".$filename;
//move_uploaded_file($tmpname,$folder);



include("config.php");
$polaczenie = mysqli_connect($host, $user, $password);;


mysqli_select_db($polaczenie, $database);
mysqli_query($polaczenie, "INSERT INTO komentarze SET id_user='$id_user', komentarz='$komentarz' ");



header('location: index.php');
?>
