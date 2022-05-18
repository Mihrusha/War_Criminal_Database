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
        } else {
            $name = $conn->quote($_POST["name"]);
            $password = $conn->quote($_POST["password"]);
            $email = $conn->quote($_POST["email"]);
            $avatar = $conn->quote($_POST["avatar"]);
            // $button = $conn->quote($_POST["reg"]);
            $sql = "INSERT INTO users (name, password, email,avatar) VALUES ($name, $password, $email,$avatar)";
            $stmt = $conn->prepare($sql);

            $stmt->execute();
            echo "New records created successfully";
            $conn = null;


           
        }
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
            echo "exists!";
            return 1;
        } else {
            echo "non existant";
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
        WHERE pok_name = '$name'";
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
