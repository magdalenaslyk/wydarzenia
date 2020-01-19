<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
</head>

<body>
<div align="middle">
    <style>
        h1 {
            color: black;
            font-family: cursive;
            font-size: 120%;
        }
    </style>
    <?php
    session_start();

    if (isset($_SESSION['log'])==true)
    {
        print "<h1> Witaj ".$_SESSION['imie']." na swoim koncie :)</h1>";
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
        print "<h1>Aby dodawać wydarzenia musisz się zalogować lub zarejestrować</h1>";
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
        h1 {
            color: black;
            font-family: cursive;
            font-size: 100%;

        }

        h2   {
            color: black;
            font-family: cursive;
            font-fantasy: Trattatello;
            font-style: oblique;
            font-size: 320%;
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

    <h2>Zobacz jakie wydarzenia są w Twojej okolicy</h2>
    <img src="">


    <?php
    include("config.php");
    $polaczenie = mysqli_connect($host, $user, $password);
    mysqli_query($polaczenie, "SET CHARSET UTF-8");
    mysqli_select_db($polaczenie, $database);
    $wynik = mysqli_query($polaczenie, "SELECT * FROM user,wpis WHERE user.id=wpis. id_user");
    mysqli_close($polaczenie);


    print "<table border='0' width='800'>";
    print "<table background=''>";
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
        print "<br>";


        if (isset($_SESSION['log'])==true)
        {
            echo "<a href='\wydarzenia/dodajkomentarz.php?a=del&amp;id={$rek["id_wpis_w"]};id_user={$rek["id"]}'>Dodaj komentarz</a>";

        }
        else
        {
            print "";
        }

        print "<br><hr>";
    }
    print "</table>";

    ?>

</center>

</body>

</html>

