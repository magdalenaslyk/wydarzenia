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
    $id_wpisu=$_GET['id'];
    $id_user=$_GET['id_user'];

    if(isset($_POST['submit'])){
        extract($_POST);
        $komentarz= isset($komentarz);
        $polaczenie = mysqli_connect($host, $user, $password);
        mysqli_select_db($polaczenie, wydarzenia);
        mysqli_query($polaczenie, "INSERT INTO komentarze SET id_user='$id_user',id_wpis='$id_wpisu', komentarz='$komentarz' ");
        header('location: index.php');
    };
    if ((isset($_SESSION['log'])==true ))
    {
        print "<br><br><br><br><h1> Witaj ".$_SESSION['imie']." dodaj komentarz do wydarzenia :)</h1>";
    }


    ?>
    <form action="dodajkomentarz.php" method="POST" ><br><br><br><br>
        <h2>Treść komentarza:</h2><br>
        <textarea name="komentarz" id="komentarz" cols="90" rows="30" required></textarea><br><br>

        <button type=\"submit\" name=\"submit\" >Dodaj komentarz</button>
    </form><br>


    <a href="index.php">Strona główna</a>




</center>
</body>

</html>