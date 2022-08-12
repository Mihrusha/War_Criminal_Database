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


            $this->db->conn= null;
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


            $this->db->conn= null;
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
        $id =$this->check_input($_POST["id"]);
        $id = $this->db->conn->quote($id);
        $sql = "SELECT id, name,surname, description, photo,files FROM pokidky WHERE id=$id";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $item = $stmt->fetchAll();
        } else {
            $item = 0;
        }

        return $item;
        $this->db->conn= null;
    }

    function LastUkr()
    {
        
        $sql = "SELECT max('id') FROM pokidky";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $item = $stmt->fetchAll();
        } else {
            $item = 0;
        }

        return $item;
        $this->db->conn= null;
    }

    function LastEng()
    {
        $sql = "SELECT max('id') FROM pokidky_eng";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $item = $stmt->fetchAll();
        } else {
            $item = 0;
        }

        return $item;
        $this->db->conn= null;
    }

    function getOneName()
    {
        $surname =$this->check_input($_POST["surname"]);
        $surname = $this->db->conn->quote($surname);
        
        $sql = "SELECT id, name,surname, description, photo,files FROM pokidky WHERE surname=$surname";
        $stmt = $this->db->conn->prepare($sql);
      
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $item = $stmt->fetchAll();
        } else {
            $item = 0;
        }

        return $item;

        $this->db->conn= null;
    }

    function getOneNameEng()
    {
        $surname =$this->check_input($_POST["surname"]);
        $surname = $this->db->conn->quote($surname);
        
        $sql = "SELECT id, name,surname, description, photo,files FROM pokidky_eng WHERE surname=$surname";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $item = $stmt->fetchAll();
        } else {
            $item = 0;
        }

        return $item;

        $this->db->conn= null;
    }


    function getOneEng()
    {
        $id =$this->check_input($_POST["id"]);
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

        $this->db->conn= null;
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


        $this->db->conn= null;
    }

    function deleteEng()
    {
        $userid = $this->db->conn->quote($_POST["delete_en"]);
        $sql = "DELETE FROM pokidky_eng WHERE id = $userid";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->execute();


        $this->db->conn= null;
    }

    function GetbySurname($method)
    {
        $name = $this->db->conn->quote($method);
        $sql = "SELECT surname,name, description, photo,files FROM pokidky WHERE surname = $name ";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $item = $stmt->fetchAll();
        } else {
            $item = 0;
        }

        return $item;
    }


    function get_from_category_Ukr($method)
    {
        // $name = $this->db->conn->quote($method);
        $sql = "SELECT pokidky.id,pokidky.surname,pokidky.name,pokidky.photo,pokidky.description FROM pokidky,category WHERE pokidky.category_id=category.id AND category.name='$method'";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $item = $stmt->fetchAll();
        } else {
            $item = 0;
        }

        return $item;

        //return $row['description'] . "\t";

        $this->db->conn= null;
    }

    function get_from_category_Eng($method)
    {
        // $name = $this->db->conn->quote($method);
        $sql = "SELECT pokidky_eng.id,pokidky_eng.surname,pokidky_eng.name,pokidky_eng.photo,pokidky_eng.description FROM pokidky_eng,category WHERE pokidky_eng.category_id=category.id AND category.name='$method'";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $item = $stmt->fetchAll();
        } else {
            $item = 0;
        }

        return $item;

        //return $row['description'] . "\t";

        $this->db->conn= null;
    }

    public function check_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

}
