<?php
include "Class/Event.php";
include "Class/DBConnection.php";
include "Class/Comment.php";

$comment = new Comment();


$status = '';
@$id_user = $_GET['id_user'];
@$id_wpis = $_GET['id_wpis'];
$errors = array();
//If our form has been submitted.
//echo $id_user;
//echo $id_wpis;
if(isset($_POST['submit'])){
    extract($_POST);
    //Get the values of our form fields.
    $ucomment = isset($ucomment) ? $ucomment : null;

    if(strlen(trim($ucomment)) === 0){
        $errors[] = "You must enter comment!";
    }
    //If our $errors array is empty, we can assume that everything went fine.
    if(empty($errors)){
        //insert data into database.
        $comment->setComment($ucomment);
        $comment->setIdUser($id_user);
        $comment->setIdWpis($id_wpis);

        $addComment = $comment->addComment();
        if ($addComment) {
            $status = "<div class='alert alert-success' style='text-align:center'>Komentarz dodany pomyślnie <a href='".SITE_URL."index.php'>Kliknij tutaj</a> żeby zobaczyć</div>";
        } else {
            $status = "<div class='alert alert-danger' style='text-align:center'>Dodawanie nieudane. Spróbuj ponownie.</div>";
        }
    }
}

?>
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center mt-5">
            <h2>Dodawanie komentarza</h2>
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
            <form action="" method="post" name="add" enctype="multipart/form-data">
                <div class="form-group">
                   <textarea name="ucomment" rows="10" cols="30" class="form-control"></textarea>
                </div>
                <br>
                    <button type="submit" name="submit" class="float-right btn btn-primary">Dodaj komentarz</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
