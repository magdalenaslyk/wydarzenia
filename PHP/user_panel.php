<?php
include "Class/User.php";
include "Class/DBConnection.php";
include "Class/ToGo.php";

$user = new User();
if(!empty($_SESSION['id'])){
    $uid = $_SESSION['id'];

}
if ($user->getSession()===FALSE) {
    header("location:login.php");
}
if (isset($_GET['q'])) {
    $user->logout();
    header("location:login.php");
}
$user->setID($uid);
$userInfo = $user->getUserInfo();
?>
    <div class="container-fluid hero-container-pages">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="text-light display-1">Witaj w panelu użytkownika</h1>
            </div>
        </div>
    </div>
    <div class="container pt-5">
        <div class="row">
            <div class="col-lg-10">
                <h2>Witaj <?php print $userInfo['imie'];?></h2>
            </div>
            <div class="col-lg-2">
                <a href="<?php print SITE_URL; ?>user_panel.php?q=logout" class="float-right btn btn-danger btn-sm">LOGOUT</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <?php
                $ad = new Togo();
                $ad->setIdUser($user->getId());
                $event = $ad->getUserToGo();
                if(empty($event)){
                    echo
                        "
                        <p>Nie bierzesz udziału w żadnym wydarzeniu! Wstyd!</p>
                        <a class='d-block' href=".SITE_URL."index.php>Dołącz</a></br>
                        <a class='d-block' href=".SITE_URL."addEvent.php?id_user=". $userInfo['id'] .">Stwórz</a></br>";
                }
                foreach ($event as $row){
                    echo "<p><strong>Wydarzenie: </strong>". $row['tytul']."</p>";

                }

                ?>
            </div>
        </div>
    </div>
