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


    function AddEng()
    {
        if (!empty($_POST["pok_surname"])) {
            $surname = $this->db->conn->quote($_POST["pok_surname"]);
            $name = $this->db->conn->quote($_POST["pok_name"]);
            $photo = $this->db->conn->quote($_POST["photo"]);
            $description = $this->db->conn->quote($_POST["description"]);
            $category_id = $this->db->conn->quote($_POST["category_id"]);
            $files = $this->db->conn->quote($_POST["files"]);
            $sql = "INSERT INTO pokidky_eng (surname,name, description, category_id,photo,files) VALUES ($surname,$name, $description, $category_id,$photo,$files)";
            $stmt = $this->db->conn->prepare($sql);
            if ($sql != null) {
                $stmt->execute();
            }


            $conn = null;
        }
    }

    function AddUkr()
    {
        if (!empty($_POST["surname"])) {
            $surname = $this->db->conn->quote($_POST["surname"]);
            $name = $this->db->conn->quote($_POST["name"]);
            $photo = $this->db->conn->quote($_POST["photo"]);
            $description = $this->db->conn->quote($_POST["description"]);
            $category_id = $this->db->conn->quote($_POST["category_id"]);
            $files = $this->db->conn->quote($_POST["files"]);
            $sql = "INSERT INTO pokidky (surname,name, description, category_id,photo,files) VALUES ($surname,$name, $description, $category_id,$photo,$files)";
            $stmt = $this->db->conn->prepare($sql);
            if ($sql != null) {
                $stmt->execute();
            }


            $conn = null;
        }
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

    public function GetEng()
    {
        $sql = "SELECT*FROM pokidky_eng ORDER by id ASC";
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

    function getOneEng()
    {
        $id = $this->db->conn->quote($_POST["id"]);
        $sql = "SELECT id, name,surname, description, photo,files FROM pokidky_eng WHERE id=$id";
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


    function editUkr()
    {
        if (!empty($_POST["ukr_surname"])) {
        $id = $this->db->conn->quote($_POST["ukr_id"]);
        $surname = $this->db->conn->quote($_POST["ukr_surname"]);
        $name = $this->db->conn->quote($_POST["ukr_name"]);
        $photo = $this->db->conn->quote($_POST["ukr_photo"]);
        $description = $this->db->conn->quote($_POST["ukr_description"]);
        $category_id = $this->db->conn->quote($_POST["ukr_category_id"]);
        $files = $this->db->conn->quote($_POST["ukr_files"]);
        $sql = "UPDATE  pokidky SET pokidky.surname=$surname,pokidky.name=$name, pokidky.description=$description, pokidky.category_id=$category_id,
        pokidky.photo=$photo,pokidky.files=$files 
        WHERE pokidky.id = $id";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->execute();
        }

        
    }

    function editEng()
    {
        if (!empty($_POST["en_surname"])) {
        $id = $this->db->conn->quote($_POST["en_id"]);
        $surname = $this->db->conn->quote($_POST["en_surname"]);
        $name = $this->db->conn->quote($_POST["en_name"]);
        $photo = $this->db->conn->quote($_POST["en_photo"]);
        $description = $this->db->conn->quote($_POST["en_description"]);
        $category_id = $this->db->conn->quote($_POST["en_category_id"]);
        $files = $this->db->conn->quote($_POST["en_files"]);
        $sql = "UPDATE  pokidky_eng SET pokidky_eng.surname=$surname,pokidky_eng.name=$name, pokidky_eng.description=$description, pokidky_eng.category_id=$category_id,
        pokidky_eng.photo=$photo,pokidky_eng.files=$files 
        WHERE pokidky_eng.id = $id";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->execute();
        }

        
    }

    function deleteUkr()
    {
        $userid = $this->db->conn->quote($_POST["delete_id"]);
        $sql = "DELETE FROM pokidky WHERE id = $userid";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->execute();


        $conn = null;
    }

    function deleteEng()
    {
        $userid = $this->db->conn->quote($_POST["delete_en"]);
        $sql = "DELETE FROM pokidky_eng WHERE id = $userid";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->execute();


        $conn = null;
    }
}
