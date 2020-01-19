
<?php
//include "DBConnection.php";

class Filter
{
//do filtracji
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

    public function setIDuser($id_user)
    {
        $this->_id_user = $id_user;
    }

    public function setWpis($wpis)
    {
        $this->_wpis = $wpis;
    }

    public function setData($data)
    {
        $this->_data = $data;
    }

    public function setPathzdjecia($path_zdjecia)
    {
        $this->_path_zdjecia = $path_zdjecia;
    }

    public function setTyp($typ)
    {
        $this->_typ = $typ;
    }

    public function setRodzaj($rodzaj)
    {
        $this->_rodzaj = $rodzaj;
    }

    public function setZdjecie($zdjecie)
    {
        $this->_zdjecie = $zdjecie;
    }

    public function setTytul($tytul)
    {
        $this->_tytul = $tytul;
    }

//obiekt do łaczenia z bazą danych
    public function __construct()
    {
        $this->db = new DBConnection();
        $this->db = $this->db->returnConnection();
    }
    public function getEventsAmmount() {
        $query = "SELECT * FROM wpis";
        $result = $this->db->query($query) or die($this->db->error);
        $animal_data = [];
        if($rows_counter = $result){
            $row_cnt = $rows_counter->num_rows;
        }
        return $row_cnt;
    }
    public function getAllEvents() {
        $query = "SELECT * FROM wpis";
        $result = $this->db->query($query) or die($this->db->error);
        $animal_data = [];
        while($content = $result->fetch_array(MYSQLI_ASSOC)){
            $animal_data[] = $content;
        }
        return $animal_data;
    }
//filtracja po statusie
    public function getAllinMountain()
    {
        $query = "SELECT * FROM wpis WHERE typ = 'gory'";
        $result = $this->db->query($query) or die($this->db->error);
        while($row = $result->fetch_array(MYSQLI_ASSOC))
        {
            $rows[] = $row;
        }
        if (!isset($rows)){
            $error_event = "empty";
            return $error_event;
        }
        else{
            return $rows;
        }

    }

    public function getAllInLake()
    {
        $query = "SELECT * FROM wpis WHERE typ = 'jezioro'";
        $result = $this->db->query($query) or die($this->db->error);
        while($row = $result->fetch_array(MYSQLI_ASSOC))
        {
            $rowt[] = $row;
        }

        return $rowt;
    }

    public function getAllInSea()
    {
        $query = "SELECT * FROM wpis WHERE typ = 'morze'";
        $result = $this->db->query($query) or die($this->db->error);
        while($row = $result->fetch_array(MYSQLI_ASSOC))
        {
            $rowz[] = $row;
        }
        return $rowz;
    }

    public function getAllActive()
    {
        $query = "SELECT * FROM zwierzeta WHERE rodzaj = 'aktywnie'";
        $result = $this->db->query($query) or die($this->db->error);
        while($row = $result->fetch_array(MYSQLI_ASSOC))
        {
            $rowi[] = $row;
        }
        return $rowi;
    }
    public function getAllRepose()
    {
        $query = "SELECT * FROM zwierzeta WHERE rodzaj = 'wypoczynek'";
        $result = $this->db->query($query) or die($this->db->error);
        while($row = $result->fetch_array(MYSQLI_ASSOC))
        {
            $rowc[] = $row;
        }
        return $rowc;
    }
}
?>


