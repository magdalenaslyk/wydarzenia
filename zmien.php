<html>
<head lang="pl">
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
	  $iduser=$_SESSION['id_user'];
	 
	 
			include("config.php");
			$polaczenie = mysqli_connect($host, $user, $password);
			mysqli_query($polaczenie, "SET CHARSET UTF-8");
			mysqli_select_db($polaczenie, $database);
			$wynik = mysqli_query($polaczenie, "SELECT * FROM user, wpis WHERE user.id=wpis. id_user AND wpis.id_user='$iduser'");
			mysqli_close($polaczenie);		
	  	    print "<h2>Twoje posty:</h2>";
			print "<table border='0' width='800'>";
			print "<tr><td align='left'>";
			while ($rek = mysqli_fetch_array($wynik)) 
			{
				print "<br>";
				print $rek["imie"]; 
				print' '; 
				print $rek["nazwisko"]; 
				print' dodał/ła: ';
				print "<br><br>";
				print $rek["wpis"];
				print' ';
				print "<br><br>";
				print "<img src='".$rek["images"]."' height='200'width='200'/>";		 
			    print "<br><br>";
			    print 'Data dodania: ';
				print $rek["data"];
				print '<br><a href="zmien2.php?id='.$rek['id'].'">Zmień post</a>';
				print "<br><hr>";
			}
			print "</table>";

  ?>
	<a href="index.php">Strona główna</a><br><br>
	<a href="wyloguj.php">Wyloguj się</a><br><br>
	</center>
</body>
</html>