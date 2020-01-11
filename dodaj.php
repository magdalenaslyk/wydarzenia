<?php
error_reporting(0);
?>
<html>
<head lang="pl-PL">
<meta charset="UTF-8">

</head>

<body>
<style>
body {
	
	background-image: url(tlowpis.jpg);
	background-size: cover;
	}
	h1 {
        color: black;
        font-family: cursive;
        font-size: 190%;
   }
    h2 {
        color: black;
        font-family: cursive;
    }
    h3 {
        color: black;
        font-family: cursive;
        font-size: 120%;
    }
</style>
<center>

<?php
	session_start();
	
	if ((isset($_SESSION['log'])==true )) 
	{
	 print "<br><br><br><br><h1> Witaj ".$_SESSION['imie']." zaproś innych na wydarzenie :)</h1><br>";
	}
?>
	<form action="dodaj2.php" method="POST" enctype="multipart/form-data">
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

	
	<input type="submit" value="Dodaj wydarzenie">
	</form>
	
	
	<a href="index.php">Strona główna</a>

	


</center>
</body>

</html>