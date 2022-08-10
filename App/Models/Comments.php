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
        $name=$this->check_input($name);
        $name = $this->db->conn->quote($name);
        $massage=$this->check_input($massage);
        $massage = $this->db->conn->quote($massage);
        $pok_id=$this->check_input($pok_id);
        $pok_id = $this->db->conn->quote($pok_id);
        $avatar=$this->check_input($avatar);
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

    function delete_comment($conn)
    {
        $userid = $conn->quote($_POST["id"]);
        $sql = "DELETE FROM massages WHERE id = $userid";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $conn = null;
    }

    public function check_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
}
