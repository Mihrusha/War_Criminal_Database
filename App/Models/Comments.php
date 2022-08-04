<?php

namespace App\Models;

use App\Core\Database;

class Comments
{
    private $db;
    public $id;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function AddComment($name,$massage,$pok_id,$avatar)
    {
        $name = $this->db->conn->quote($name);
        $massage = $this->db->conn->quote($massage);
        $pok_id = $this->db->conn->quote($pok_id);
        $avatar = $this->db->conn->quote($avatar);
    
        $sql = "INSERT INTO massages (name, massage,pok_id,avatar) VALUES ($name, $massage,$pok_id,$avatar)";
        $stmt = $this->db->conn->prepare($sql);

        $stmt->execute();
    }

   public  function getMassage($id)
    {
        
        $sql = "SELECT name, massage, pok_id, avatar FROM  massages
        WHERE pok_id = '$id'";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $massages = $stmt->fetchAll();
        } else {
            $massages = 0;
        }
        return $massages;

        var_dump($massages);
    }

    public  function getAll()
    {
        
        $sql = "SELECT id,name, massage, pok_id, avatar FROM  massages";
      
        $stmt = $this->db->conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $massages = $stmt->fetchAll();
        } else {
            $massages = 0;
        }
        return $massages;
    }
}
