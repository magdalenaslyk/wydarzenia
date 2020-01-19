<?php
include "Class/Event.php";
include "Class/DBConnection.php";
include "Class/ImgUpload.php";
$event = new Event();
//if ($user->getSession()===TRUE) {
//header("location:home.php");
//}
$status = '';
@$id_user = $_GET['id_user'];
$errors = array();
//If our form has been submitted.
if(isset($_POST['submit'])){
    extract($_POST);
    //Get the values of our form fields.
    $utytul = isset($utytul) ? $utytul : null;
    $urodzaj = isset($urodzaj) ? $urodzaj : null;
    $utyp = isset($utyp) ? $utyp: null;
    $uwpis = isset($uwpis) ? $uwpis : null;
    $udata= isset($udata) ? $udata: null;

    if(strlen(trim($utytul)) === 0){
        $errors[] = "You must enter tittle!";
    }
    if(strlen(trim($urodzaj)) === 0){
        $errors[] = "You must enter rodzaj!";
    }
    if(strlen(trim($utyp)) === 0){
        $errors[] = "You must enter type!";
    }
    if(strlen(trim($uwpis)) === 0){
        $errors[] = "You must enter description!";
    }

    if(strlen(trim($udata)) === 0){
        $errors[] = "You must enter date!";
    }

    //If our $errors array is empty, we can assume that everything went fine.
    if(empty($errors)){
        //insert data into database.
        $event->setTytul($utytul);
        $event->setRodzaj($urodzaj);
        $event->setTyp($utyp);
        $event->setWpis($uwpis);
        $event->setData($udata);
        $event->setIDuser($id_user);

        $addEvent = $event->addEvent();
        if ($addEvent) {
            $status = "<div class='alert alert-success' style='text-align:center'>Wpis dodany pomyślnie <a href='".SITE_URL."index.php'>Kliknij tutaj</a> żeby zobaczyć</div>";
        } else {
            $status = "<div class='alert alert-danger' style='text-align:center'>Dodawanie nieudane. Spróbuj ponownie.</div>";
        }
    }
}

?>
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center mt-5">
            <h2>Dodawanie wydarzenia do bazy danych</h2>
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
                    <label for="tytul">Tytuł</label>
                    <input type="text" class="form-control" name="utytul" id="tytul"></input>
                </div>
                <div class="form-group">
                    Rodzaj: <select name="urodzaj" class="form-control" >
                        <option value="aktywnie">Aktywnie</option>
                        <option value="wypoczynek">Wypoczynek</option>
                    </select>
                </div>
                <div class="form-group">
                    Typ: <select name="utyp" class="form-control" >
                        <option value="morze">Morze</option>
                        <option value="gory">Góry</option>
                        <option value="jezioro">Jezioro</option>
                    </select>
                </div>
                <div class="form-group">
                    Data: <input type="date" name="udata" class="form-control"></input><br>
                </div>
                <div class="form-group">
                    Opis: <textarea name="uwpis" rows="10" cols="30" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    Zdjęcie: <input type="file" name="uzdjecie" id="fileToUpload" class="form-contro-file"></input>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="float-right btn btn-primary">Dodaj Wpis</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
