<html>
<head>
<meta charset="UTF-8">

</head>

<body>
<style>
body {
	
	background-image: url(tlowpis.jpg);
	background-size: cover;
	}
    h2 {
        color: black;
        font-family: cursive;
        font-size: 190%;
    }
</style>
<center>

<?php
	session_start();
	$id = $_GET['id'];
	$_SESSION['id_wpisu']=$id;
	print"<br><br><br><br><h2>Zedytuj swoje wydarzenie ".$_SESSION['imie']."</h2><br>";

?>
	<form action="update.php" method="POST" enctype="multipart/form-data">
        <h3>Tytuł:</h3><textarea name="tytul" cols="80" rows="1" required></textarea>
        <label for="typ"><h3>Wybierz miejsce wydarzenia:</h3></label>
        <select type="enum" name="typ">
            <option value="morze">Morze</option>
            <option value="gory">Góry</option>
            <option value="jezioro">Jezioro</option>
        </select><br>
        <label for="rodzaj"><h3>Wybierz rodzaj wydarzenia:</h3></label>
        <select type="enum" name="rodzaj">
            <option value="aktywnie">Aktywnie</option>
            <option value="wypoczynek">Wypoczynek</option>
        </select><br>
        <label for="date"><h3>Podaj datę:</h3></label>
        <input type="date" name="time">

        <h3>Treść wydarzenia:</h3><textarea name="wpis" id="wpis" cols="90" rows="20" required></textarea><br><br>

        Zdjęcie:<input type="file" name="cover" value=""/><br><br>

        <input type="submit" value="Edytuj post">
	</form>
    <a href="zmien.php">Moje wydarzenia</a><br><br>
	<a href="index.php">Strona główna</a>


</center>
</body>

</html>