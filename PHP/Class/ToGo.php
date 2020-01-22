<?php

class ToGo
{
    protected $db;
    private $_id;
    private $_id_event;
    private $_id_user;


    public function getDb()
    {
        return $this->db;
    }
    public function setDb($db)
    {
        $this->db = $db;
    }
    public function getId()
    {
        return $this->_id;
    }

    public function setId($id)
    {
        $this->_id = $id;
    }

    public function getIdEvent()
    {
        return $this->_id_event;
    }

    public function setIdEvent($id_event)
    {
        $this->_id_event = $id_event;
    }

    public function getIdUser()
    {
        return $this->_id_user;
    }

    public function setIdUser($id_user)
    {
        $this->_id_user = $id_user;
    }

    public function __construct()
    {
        $this->db = new DBConnection();
        $this->db = $this->db->returnConnection();
    }

    public function newTogo(){
        $usr = new User();
        if($usr->getSession()){
            $query = "SELECT id, id_event, id_user FROM togo WHERE id_event = ".$this->_id_event;
            $result = $this->db->query($query) or die($this->db->error);
            $count_row = $result->num_rows;
            if($count_row == 0) {
                $query = 'INSERT INTO togo SET 
                id_event="'.$this->_id_event.'",
                id_user="'.$this->_id_user.'",';
                $result = $this->db->query($query) or die($this->db->error);
                $this->setId($this->db->insert_id);
                return true;
            } else {
                return false;
            }
        }else {
            return false;
        }
    }

    public function getUserToGo(){
        $query = "SELECT * FROM togo WHERE id_user = ".$this->getIdUser();
        $result = $this->db->query($query) or die($this->db->error);
        $count_row = $result->num_rows;
        $ret = [];
        for($i = 0; $i < $count_row; $i++)
        {
            $data = $result->fetch_array(MYSQLI_ASSOC);
            array_push($ret, $data);
        }
        return $ret;
    }




}