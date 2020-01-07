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
  $login = $_POST['login'];
	$haslo = $_POST['haslo'];
	include("config.php");
	$polaczenie = mysqli_connect($host, $user, $password);
	mysqli_query($polaczenie, "SET CHARSET UTF-8");
	mysqli_select_db($polaczenie, $database);
	$wynik = mysqli_query($polaczenie, "SELECT * FROM user WHERE login='$login'");
	$wynik2 = mysqli_query($polaczenie, "SELECT * FROM delete_user WHERE login='$login'");
	mysqli_close($polaczenie);
	$rek = mysqli_fetch_array($wynik);
	$pass = $rek['haslo'];
	
	
	
		if (md5($haslo)==$pass)  
		{
		$_SESSION['log'] = true;
		$_SESSION['imie']= $rek['imie'];
		$_SESSION['nazwisko']= $rek['nazwisko'];
		$_SESSION['mail']= $rek['mail'];
		$_SESSION['id_user']= $rek['id'];
		header('location: index.php');
		}
		else 
		{
			echo "<br><br>Niepoprawna nazwa użytkownika lub hasło :(</br><br>";
			echo "<a href='logowanie.html'>Przejdź do logowania</a><br><br>";
			echo "<a href='index.php'>Przejdź do strony głównej</a>";
		}
	

?>
</center>
</body>

</html>