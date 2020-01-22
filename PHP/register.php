<?php
include "Class/DBConnection.php";
include "Class/ImgUpload.php";
include "Class/User.php";
$user = new User();

if ($user->getSession()===TRUE) {
    header("location:index.php");
}
$status = '';

$errors = array();
//If our form has been submitted.
if(isset($_POST['submit'])){
    extract($_POST);
    //Get the values of our form fields.
    $uimie = isset($uimie) ? $uimie : null;
    $unazwisko = isset($unazwisko) ? $unazwisko : null;
    $ulogin = isset($ulogin) ? $ulogin : null;
    $uemail = isset($uemail) ? $uemail : null;
    $uhaslo = isset($uhaslo) ? $uhaslo : null;


    if(strlen(trim($uimie)) === 0){
        $errors[] = "You must enter your imie!";
    }
    if(strlen(trim($unazwisko)) === 0){
        $errors[] = "You must enter your nazwisko!";
    }
    if(!filter_var($uemail, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "That is not a valid email address!";
    }
    if(strlen(trim($ulogin)) === 0){
        $errors[] = "You must enter your login";
    }
    if(strlen(trim($uhaslo)) === 0){
        $errors[] = "You must enter your password!";
    }

    //If our $errors array is empty, we can assume that everything went fine.
    if(empty($errors)){
        //insert data into database.
        $user->setImie($uimie);
        $user->setNazwisko($unazwisko);
        $user->setEmail($uemail);
        $user->setLogin($ulogin);
        $user->setHaslo($uhaslo);
        $register = $user->userRegistration();
        if ($register) {
            $status = "<div class='alert alert-success' style='text-align:center'>Registration successful <a href='".SITE_URL."index.php'>Click here</a> to login</div>";
        } else {
            $status = "<div class='alert alert-danger' style='text-align:center'>Registration failed. Email or Username already exits please try again.</div>";
        }
    }
}

?>
<div class="container-fluid hero-container-pages">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="text-light display-1">Zarejestruj się</h1>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center mt-5">
            <h2>Zarejestruj się do naszego serwisu</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12"><?php echo $status; ?></div>
    </div>
    <div class="row">
        <div class="col-lg-12"><ul><?php
                foreach ($errors as $value) {
                    echo '<li style="color: red; font-size: 13px;">'.$value.'</li>' ;
                }
                ?></ul></div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <form action="" method="post" name="reg" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="imie">Imię</label>
                    <input type="text" name="uimie" class="form-control" placeholder="Imię"></input>
                </div>
                <div class="form-group">
                    <label for="imie">Nazwisko</label>
                    <input type="text" name="unazwisko" class="form-control" placeholder="Nazwisko"></input>
                </div>
                <div class="form-group">
                    <label for="imie">Adres email</label>
                    <input type="email" name="uemail" class="form-control" placeholder="Adres email"></input>
                </div>
                <div class="form-group">
                    <label for="imie">Login w serwisie</label>
                    <input type="text" name="ulogin" class="form-control" placeholder="Twój login w serwisie"></input>
                </div>
                <div class="form-group">
                    <label for="imie">Twoje hasło</label>
                    <input type="password" name="uhaslo" class="form-control" placeholder="Hasło"></input>
                </div>

                <button type="submit" name="submit" class="float-right btn btn-primary">Zarejestruj</button>
                <a href="<?php print SITE_URL; ?>login.php">Zarejestrowany? To co tu robisz? Zaloguj się!</a><br>
                <a href="<?php print SITE_URL; ?>index.php">Przejdź na stronę gółwną</a>
            </form>
        </div>
    </div>
</div>

