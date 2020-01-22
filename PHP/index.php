<?php

include "Class/Filter.php";
include "Class/Comment.php";
include "Class/DBConnection.php";
include "Class/User.php";
include "Class/ToGo.php";
$filter = new Filter();
$comment = new Comment();
$event_display = $filter->getAllEvents();
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
    <div class="container-fluid hero-container">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="light-text">Wyszukiwarka wydarzeń z całej Polski</h1>
                <p>Teraz możesz dołącz do wydarzeń w całej Polsce lub stworzyć swój własny event!</p>
                <a class="main-btn" href="<?php echo SITE_URL;?>user_panel.php">Dodaj jakieś wydarzenie</a><br>
                <a class="main-btn" href="<?php echo SITE_URL;?>user_panel.php">Dołącz do innych</a>
            </div>
            <div class="col-lg-4"></div>
        </div>
    </div>

        <div class="row">
            <?php

            if($event_display=="empty"){
                echo "
                    <div class='col-lg-12'>
                        <div class='row  text-center'>
                        <div class='alert alert-danger'>
                            Nie masz żadnych wydarzeń
                        </div>

                        </div>
                    </div>
                    
                    ";
            }
            else {
                foreach ($event_display as $row) {
                    $comment_filtr = $row['id_wpis_w'];
                    //echo $comment_filtr;
                    $comment->setFilter($comment_filtr);
                    $comment_display= $comment->getAllComments($comment_filtr);
                    $t = substr($row['tytul'], 0, 200);
                    echo '
                            <div class="col-lg-4 card-animal">
                            <div class="row" style="flex-direction:column;padding:15px;">
                                <p class="text-center"><img src="../' . $row['path_zdjecia'] . '"></p>
                                <p>Tytuł: ' . $row['tytul'] . '</p>
                                <p>Rodzaj: ' . $row['rodzaj'] . '</p>
                                <p>Typ: ' . $row['typ'] . '</p>
                                <p>Data: ' . $row['data'] . '</p>
                                <p>Opis: ' . $row['wpis'] . '</p>';

                    if ($comment_display == "empty") {
                        echo "
                                        <div class=\'col-lg-12\'>
                                            <div class=\'row  text-center\'>
                                            <div class=\'alert alert-danger\'>
                                                Jeszcze nie ma komentarza
                                            </div>
                    
                                            </div>
                                        </div>
                                        
                                        ";
                    } else {
                        //echo $comment_display['komentarz'];

                        foreach ( $comment_display as $value) {
                            $user_filtr = $value['id_user'];
                            $user ->setFilter($user_filtr);
                            $user_display = $user->getAllUser($user_filtr);
                            foreach ($user_display as $mag){
                                echo $mag['login'];
                            }
                            echo ' napisał:  ' . $value['komentarz'].' <br>';
                        };
                    };
                    echo " <a href='addComment.php?id_wpis='" . $row['id_wpis_w'] . "'&id_user=' ". $userInfo['id'] ." '\>Dodaj komentarz</a>";

                $ad = new Togo();
                $ad->setIdUser($user->getId());
                $ad->setIdEvent($row['id_wpis_w']);
                $event = $ad->getUserToGo();

                    if($event[0]['id_event']==$row['id_wpis_w'] && $event[0]['id_user']==$userInfo['id']){
                    echo "<br>Bierzesz już udział w tym wydarzeniu";
                }
                else{
                      echo '   <br><a href=\'addTogo.php?id_wpis=' . $row["id_wpis_w"] . '&id_user=' . $userInfo["id"] . '\'>Dołącz do wydarzenia </a>
                                <p>_____________________________________________________________</p>
                            </div> 
                        </div>';
                    }}
                }

            ?>