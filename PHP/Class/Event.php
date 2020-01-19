<?php
//include "DBConnection.php";
//include "ImgUpload.php";
class Event
{
    protected $db;
    private $_id;
    private $_id_user;
    private $_wpis;
    private $_data;
    private $_zdjecie;
    private $_path_zdjecia;
    private $_typ;
    private $_rodzaj;
    private $_tytul;


    public function setID($id) {
        $this->_id = $id;
    }
    public function setIDuser($id_user) {
        $this-> _id_user = $id_user;
    }
    public function setWpis($wpis) {
        $this-> _wpis = $wpis;
    }
    public function setData($data) {
        $this-> _data = $data;
    }
    public function setZdjecie($zdjecie) {
        $this->_zdjecie = $zdjecie;
    }
    public function setPath_zdjecia($path_zdjecia) {
    $this->_path_zdjecia = $path_zdjecia;
    }
    public function setTyp($typ) {
        $this->_typ = $typ;
    }
    public function setRodzaj($rodzaj) {
        $this->_rodzaj = $rodzaj;
    }
    public function setTytul($tytul) {
        $this->_tytul = $tytul;
    }


    public function __construct() {
        $this->db = new DBConnection();
        $this->db = $this->db->returnConnection();
    }


    public function getEventInfo(){
        $query = "SELECT * FROM wpis WHERE id_wpis_w = '".$this->_id."'";
        $result = $this->db->query($query) or die($this->db->error);
        $count_row = $result->num_rows;
        if ($count_row == 1) {
            $event_data = $result->fetch_array(MYSQLI_ASSOC);
            return $event_data;
        }else{
            return false;
        }
    }

    // Add Event Method
    public function addEvent()
    {
        $img_uploader = new ImgUpload();
        $path_zdjecia = $img_uploader->UploadImage($this->_tytul, "../img/");
        if (strlen($path_zdjecia) > 1) {
            $this->_path_zdjecia = $path_zdjecia;
        } else {
            return false;
        }



        $query = 'INSERT INTO wpis SET 
            id_wpis_w="' . $this->_id . '",
            id_user="' . $this->_id_user . '",
            wpis="' . $this->_wpis . '",
            data="' . $this->_data . '",
            path_zdjecia="' . $this->_path_zdjecia . '",   
            typ="' . $this->_typ . '",
            rodzaj="' . $this->_rodzaj . '",
            tytul="' . $this->_tytul . '"';
        $result = $this->db->query($query) or die($this->db->error);
        return true;
    }

    // Edit Event Method
    public function editAnimal()
    {
        $query = 'UPDATE wois SET 
            id_wpis_w="' . $this->_id . '",
            id_user="' . $this->_id_user . '",
            wpis="' . $this->_wpis . '",
            data="' . $this->_data . '",
            path_zdjecia="' . $this->_path_zdjecia .'",   
            typ="' . $this->_typ . '",
            rodzaj="' . $this->_rodzaj . '",
            tytul="' . $this->_tytul . '"
            WHERE id="'. $this->_id .'"';
        $result = $this->db->query($query) or die($this->db->error);
        echo "adam";
        return true;
    }
}
?>