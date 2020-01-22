<?php
include "Class/User.php";
include "Class/DBConnection.php";
include "Class/ToGo.php";
include "Class/Event.php";

$user = new User();
$event_info = new Event();
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
<div class="col-lg-12">
    <?php
    $ad = new Togo();
    $ad->setIdUser($user->getId());
    $event = $ad->getUserToGo();
    if(empty($event)){
        echo  $userInfo['imie'] ."! Nie bierzesz udziału w żadnym wydarzeniu! Wstyd!";

    }
    else {

        echo "Wydarzenia, w których bierzesz udział: ";
    foreach ($event as $row){
        $event_info ->setID($row['id_event']);
        $ev = $event_info->getEventInfo();

        echo "<p><strong>Wydarzenie: </strong>". $ev['tytul']."</p>";

    }}

    ?>
</div>

