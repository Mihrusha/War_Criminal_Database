<?php

namespace App\Models;

use App\Core\Database;

class Comments
{
    private $db;
    public $id;
    private $user;

    public function __construct()
    {
        $this->db = new Database;
        $this->user = new Registration;
    }

    public function AddComment($name,$massage,$pok_id,$avatar)
    {

        $name=$this->check_input($name);
        $name = $this->db->conn->quote($name);
        

         if($name==''||$massage==''||$avatar==''){
            echo 'Need data';
            die;
           }

       else if($this->IsBanned($name)>0){
        echo 'You are banned';
        die; 
       }
    


       else if($this->LoginCheck($name)<1){
        echo 'New User';
        die;
       }

     
       
    //    if($this->IsBanned($name)==0){
        $massage=$this->check_input($massage);
        $massage = $this->db->conn->quote($massage);
        $pok_id=$this->check_input($pok_id);
        $pok_id = $this->db->conn->quote($pok_id);
        $avatar = $this->db->conn->quote($avatar);
        $sql = "INSERT INTO massages (name, massage,pok_id,avatar) VALUES ($name, $massage,$pok_id,$avatar)";
        $stmt = $this->db->conn->prepare($sql);
       
        $stmt->execute();
    //    }
    }

    public function IsBanned($name)
    {
        //  $name=$this->check_input($name);
        //  $name = $this->db->conn->quote($name);
        $stmt = $this->db->conn->prepare("SELECT name FROM users WHERE users.name = $name AND users.IsBanned = 1");
      
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $massages = $stmt->fetchAll();
        } else {
            $massages = 0;
            
        }
        return $massages;
    }

    public function LoginCheck($name)
    {
       
        $stmt = $this->db->conn->prepare("SELECT name FROM users WHERE name = $name");
       
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            
            return 1;
        } else {
            //echo "non existant";
            return 0;
        }
    }

   public  function getMassage($id)
    {
        // $id=$this->check_input($id);
        // $id=$this->db->conn->quote($id);
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

    function delete_comment()
    {
        $userid = $this->db->conn->quote($_POST["delete_com"]);
        $sql = "DELETE FROM massages WHERE id = $userid";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->execute();

        $this->db->conn= null;
    }

    public function check_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
}
