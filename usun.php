<html>
<head lang="pl">
	<meta charset="utf-8">
</head>
<body>
<style>
body {
	
	background-image: url(tlo.jpg);
	background-size: cover;
	}
    h1 {
    color: black;
    font-family: cursive;
    font-size: 100%;

    }
    h2{
        font-family: cursive;
    }
    h3   {
    color: black;
    font-family: cursive;
    font-fantasy: arial;
    font-style: oblique;
    font-size: 150%;
    text-decoration: underline;
    }
</style>
  <center>
  <?php
	  session_start();
	  $iduser=$_SESSION['id_user'];
			include("config.php");
			$polaczenie = mysqli_connect($host, $user, $password);
			mysqli_query($polaczenie, "SET CHARSET UTF-8");
			mysqli_select_db($polaczenie, $database);
			$wynik = mysqli_query($polaczenie, "SELECT * FROM user, wpis WHERE user.id=wpis. id_user AND wpis.id_user='$iduser'");
			mysqli_close($polaczenie);		
	  	    print "<h2>Twoje wydarzenia:</h2>";
			print "<table border='0' width='800'>";
			print "<tr><td align='left'>";
			while ($rek = mysqli_fetch_array($wynik)) 
			{
                print "<h3>".$rek["tytul"]."</h3>";
                print "<h1>Miejsce: ".$rek["typ"]."</h1>";
                print "<h1>Rodzaj: ".$rek["rodzaj"]."</h1>";
                print "<h1>Data: ".$rek["time"]."</h1>";
                print "<h1>Dodane przez: ".$rek["imie"]." ".$rek["nazwisko"]."</h1>";
                print "<br>";
                print $rek["wpis"];
                print' ';
                print "<br><br>";
                print "<img src='".$rek["images"]."' height='200'width='200'/>";
                print "<br><br>";
                print 'Data dodania: ';
                print $rek["data"];
				print '<br><a href="delete.php?id='.$rek['id'].'">Usuń wydarzenie</a>';
				print "<br><hr>";
			}
			print "</table>";

  ?>
	<a href="index.php">Strona główna</a><br><br>
	<a href="wyloguj.php">Wyloguj się</a><br><br>
	</center>
</body>
</html>