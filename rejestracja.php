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
  	$imie = $_POST['imie'];
	$nazwisko = $_POST['nazwisko'];
	$mail = $_POST['mail'];
	$login = $_POST['login'];
	$haslo = $_POST['haslo'];
	$haslo2 = $_POST['haslo2'];
	include("config.php");
	$polaczenie = mysqli_connect($host, $user, $password);
	mysqli_query($polaczenie, "SET CHARSET UTF-8");
	mysqli_select_db($polaczenie, $database);
	if (mysqli_num_rows(mysqli_query($polaczenie, "SELECT login FROM user WHERE login = '".$login."'")) == 0)
		{
			if ($haslo == $haslo2)
				{
					$haslo=md5($haslo);
					mysqli_query($polaczenie, "INSERT INTO user (imie,nazwisko,mail, login, haslo) 
					VALUES ('$imie','$nazwisko','$mail','$login','$haslo')");
					echo "Konto zostało utworzone!<br><br>";
					echo "<a href='logowanie.html'> Zalogu się</a><br><br>";
					echo "<a href='index.php'>Przejdź do strony głównej</a>";
				}
			else 
				{
					echo "Hasła nie są takie same<br><br>";
					echo "<a href='rejestracja.html'>Przejdź do rejestracji</a><br><br>";
					echo "<a href='index.php'>Przejdź do strony głównej</a>";
				}
		}
   else 
		{
			echo "Podany login jest już zajęty <br><br>";
			echo "<a href='rejestracja.html'>Przejdź do rejestracji</a><br><br>";
			echo "<a href='index.php'>Przejdź do strony głównej</a>";
		}

?>
</center>
</body>
</html>		
