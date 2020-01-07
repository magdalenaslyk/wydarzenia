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
</style>
<center>

    <?php
    session_start();

    if ((isset($_SESSION['log'])==true ))
    {
        print "<br><br><br><br><h1> Witaj ".$_SESSION['imie']." dodaj komentarz do wydarzenia :)</h1>";
    }
    ?>
    <form action="dodajkomentarz2.php" method="POST" enctype="multipart/form-data"><br><br><br><br>
        <h2>Treść komentarza:</h2><br><textarea name="komentarz" id="komentarz" cols="90" rows="30" required></textarea><br><br>




        <input type="submit" value="Dodaj komentarz">
    </form><br>


    <a href="index.php">Wróc na główną stronę</a>




</center>
</body>

</html>