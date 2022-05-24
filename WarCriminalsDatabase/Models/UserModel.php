<?php


class User


{

    public $id;
    public $name;
    public $password;
    public $email;
    public $avatar;

    public function __construct($id = null, $name = null, $password = null, $email = null, $avatar = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->password = $password;
        $this->email = $email;
        $this->avatar = $avatar;
    }


    public  function Add($conn)
    {

        if (empty($_POST["name"])) {
            $errMsg = "Error! You didn't enter the Name.";
            echo $errMsg;
        }

        if (empty($_POST["password"])) {
            $errMsg = "Error! You didn't enter the Password.";
            echo $errMsg;
        }
        if (empty($_POST["email"])) {
            $errMsg = "Error! You didn't enter the Email.";
            echo $errMsg;
        }

        if ($this->usernameCheck($conn, $_POST["name"]) == 1) {
            echo "already exist";
        } else if(!empty($_POST["name"]) && !empty($_POST["password"]) && !empty($_POST["email"]) && ($this->usernameCheck($conn, $_POST["name"]) == 0)) {
            $name = $conn->quote($_POST["name"]);
            $password = $conn->quote($_POST["password"]);
            $email = $conn->quote($_POST["email"]);
            
            // $button = $conn->quote($_POST["reg"]);
            $sql = "INSERT INTO users (name, password, email) VALUES ($name, $password, $email)";
            $stmt = $conn->prepare($sql);

            $stmt->execute();
            echo "New records created successfully";
            $conn = null;


           
        }
    }


    public function Get_Users($conn)
    {
        

            $sql = "SELECT*FROM users ORDER by id ASC";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $users = $stmt->fetchAll();
            } else {
                $users = 0;
            }
    
            return $users;
        
    }

    function Edit($conn)
    {

        $name = $conn->quote($_POST["name"]);
       
        $IsBanned = $conn->quote($_POST["IsBanned"]);
        $sql = "UPDATE  users SET users.IsBanned=$IsBanned
        
        WHERE users.name like $name";
        $stmt = $conn->prepare($sql);
        $stmt->execute();


        $conn = null;
    }

    

    public function TakeComment($conn)
    {
        if (empty($_POST["user_name"])) {
            $errMsg = "Error! You didn't enter the Name.";
            echo $errMsg;
        }

        if (empty($_POST["massage"])) {
            $errMsg = "Error! You didn't enter the massage.";
            echo $errMsg;
        }
       
        if ($this->usernameCheck($conn, $_POST["user_name"]) == 0) {
            echo "not exist";
        } 
         if($_POST["user_name"]!=null && $_POST["massage"]!=null && $this->usernameCheck($conn, $_POST["user_name"]) >= 1)
         {
            $name = $conn->quote($_POST["user_name"]);
            $massage = $conn->quote($_POST["massage"]);
         
        
            $sql = "INSERT INTO massages (name, massage) VALUES ($name, $massage)";
            $stmt = $conn->prepare($sql);

            $stmt->execute();
            echo "New records created successfully";
            // $conn = null;

        }
     
    }

    public function TakeTestComment($conn,$method)
    {
        if (empty($_POST["user_name"])) {
            $errMsg = "Please enter name.";
            echo $errMsg;
        }

        if (empty($_POST["massage"])) {
            $errMsg = "Please enter massage.";
            echo $errMsg;
        }
       
        if ($this->usernameCheck($conn, $_POST["user_name"]) == 0) {
            echo "You must be registrated user";
        } 
         if($_POST["user_name"]!=null && $_POST["massage"]!=null && $this->usernameCheck($conn, $_POST["user_name"]) >= 1
         && $this->IsBanned($conn, $_POST["user_name"]) >= 1)
         {
            $name = $conn->quote($_POST["user_name"]);
            $massage = $conn->quote($_POST["massage"]);
            $avatar=$conn->quote($_POST["avatar"]);
           
            $method=$conn->quote($_POST["topic"]);
        
            $sql = "INSERT INTO massages (name,massage,pok_name,avatar) VALUES ($name,$massage,$method,$avatar)";
            $stmt = $conn->prepare($sql);

            $stmt->execute();
            echo "New records created successfully";
            // $conn = null;

        }
     
    }


    public function usernameCheck($conn, $name)
    {

        $stmt = $conn->prepare("SELECT name FROM users WHERE name = :name");
        $stmt->bindParam(':name', $name);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // echo "exists!";
            return 1;
        } else {
            //echo "non existant";
            return 0;
        }
    }

    public function IsBanned($conn, $name)
    {

        $stmt = $conn->prepare("SELECT name FROM users WHERE name = :name AND IsBanned=FALSE");
        $stmt->bindParam(':name', $name);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // echo "not banned!";
            return 1;
        } else {
            echo " You are banned";
            return 0;
        }
    }


    function get_all_massages($conn)
    {
        $sql = "SELECT*FROM massages ORDER by id ASC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $massages = $stmt->fetchAll();
        } else {
            $massages = 0;
        }
        return $massages;
    }

    function get_massages_by_name($conn,$name)
    {
        
        $sql = "SELECT name, massage, pok_name, avatar FROM  massages
        WHERE pok_name LIKE '$name'";
        $stmt = $conn->prepare($sql);
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





}
