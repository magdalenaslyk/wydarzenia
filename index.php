<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
</head>

<body bgcolor="Silver">
<div align="left">
    <style>
        h1 {
            font-size: 120%;
        }
    </style>
    <?php
    session_start();

    if (isset($_SESSION['log'])==true)
    {
        print "<h1> Witaj ".$_SESSION['imie']." na swoim koncie.</h1>";
    }

    if (isset($_SESSION['log'])==true)
    {

        echo "<br><a href='dodaj.php'>Dodawanie wydarzenia</a>
		<br><br>
		<a href='zmien.php'>Zmiana wydarzenia</a>
		<br><br>
		<a href='usun.php'>Usuwanie wydarzenia</a>
		<br><br>
		<a href='wyloguj.php'>Wyloguj</a>
		<br><br>";
    }
    else
    {
        echo "<a href='logowanie.html'>Zaloguj się</a> <br><br>";
        echo "<a href='rejestracja.html'>Zarejestruj się</a> <br><br>";
    }


    ?>
</div>
<center>
    <style>
        body {

            background-image: url(tlo.jpg);
            background-size: cover;

        }


        h2   {
            color: royalblue;
            font-fantasy: Trattatello;
            font-style: oblique;
            font-size: 320%;
        }
        h3   {
            color: royalblue;
            font-fantasy: arial;
            font-style: oblique;
            font-size: 150%;
        }

    </style>

    <h2>Zobacz jakie wydarzenia są w Twojej okolicy</h2>
    <img src="">
    <h3>Wydarzenia:</h3>

    <?php
    include("config.php");
    $polaczenie = mysqli_connect($host, $user, $password);
    mysqli_query($polaczenie, "SET CHARSET UTF-8");
    mysqli_select_db($polaczenie, $database);
    $wynik = mysqli_query($polaczenie, "SELECT * FROM user,wpis WHERE user.id=wpis. id_user");
    mysqli_close($polaczenie);


    print "<table border='0' width='800'>";
    print "<tr><td align='left'>";
    while ($rek = mysqli_fetch_array($wynik))
    {
        print "<br>";
        print $rek["imie"];
        print' ';
        print $rek["nazwisko"];
        print' dodał/ła wydarzenie: ';
        print "<br><br>";
        print $rek["wpis"];
        print' ';
        print "<br><br>";
        print "<img src='".$rek["images"]."' height='200'width='200'/>";
        print "<br><br>";
        print 'Data dodania: ';
        print $rek["data"];
        print "<br><hr>";
    }

    print "</table>";

    ?>

</center>

</body>

</html>

