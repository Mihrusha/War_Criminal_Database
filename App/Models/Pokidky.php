<?php

namespace App\Models;

use App\Core\Database;

class Pokidky
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    function GetCategory()
    {
        $sql = "SELECT*FROM category ORDER by id DESC";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $category = $stmt->fetchAll();
        } else {
            $category = 0;
        }
        return $category;
    }



    public function GetAll()
    {
       

        $sql = "SELECT*FROM pokidky ORDER by id ASC";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $pokidky = $stmt->fetchAll();
        } else {
            $pokidky = 0;
        }

        return $pokidky;
    }

    function getOne()
    {
        $id = $this->db->conn->quote($_POST["id"]);
        $sql = "SELECT id, name,surname, description, photo,files FROM pokidky WHERE id=$id";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $item = $stmt->fetchAll();
        } else {
            $item = 0;
        }

        return $item;

        $conn = null;
    }
}
