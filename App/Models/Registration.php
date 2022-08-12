<?php

namespace App\Models;

use App\Core\Database;

class Registration
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }




    public function Login()
    {
        session_start();

        if (
            isset($_POST['name']) &&
            isset($_POST['password'])
        ) {

            $text = "login";
            $location = "Login.php";
            $massage = "error";

            if (!preg_match("/^[a-zA-Z0-9_]*$/", $_POST['name'])) {
                $errormassage = "The  wrong data in name ";
                header("Location: $location?$massage=$errormassage&''");
                exit;
            }

            if (!preg_match("/^[a-zA-Z0-9_]*$/", $_POST['password'])) {
                $errormassage = "The  wrong data in password ";
                header("Location: $location?$massage=$errormassage&''");
                exit;
            }



            $name = $_POST['name'];
            $name = $this->check_input($name);

            $password = $_POST["password"];
            $password = $this->check_input($password);
            $hax = hash('md5', $password);
            //check if login or password empty

            $this->isEmpty($name, $text, $location, $massage, "");


            $text = "password";
            $location = "Login.php";
            $massage = "error";
            $this->isEmpty($password, $text, $location, $massage, "");

            $sql = "SELECT*FROM admin
            WHERE name=?";
            $stmt = $this->db->conn->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':password', $password);
            $stmt->execute([$name]);

            if ($stmt->rowCount() === 1) {

                $user = $stmt->fetch();

                $user_id = $user['id'];
                $user_name = $user['name'];

                $user_password = $user['password'];

                if ($name === $user_name) {
                    if ($hax === $user_password) {
                        $_SESSION['user_id'] = $user_id;
                        $_SESSION['user_name'] = $user_name;

                        echo '<script> 
                        window.location="admin.php";
                        </script>';
                    }

                    if ($hax != $user_password) {
                        $errormassage =  "Wrong Password";
                        header("Location: $location?$massage=$errormassage&''");

                        die;
                    }
                }
                if ($name != $user_name) {
                    $errormassage =  "Wrong login";
                    header("Location: $location?$massage=$errormassage&''");
                }
            }
        } else {

            header('Login.php');
        }
    }


    public function UserRegistration()
    {
        $location = 'UserLogin.php';
        $massage = "error";

        if (!preg_match("/^[a-zA-Z0-9_]*$/", $_POST['name'])) {
            $errormassage = "The  wrong data in name ";
            header("Location: $location?$massage=$errormassage&''");
            exit;
        }

        if (!preg_match("/^[a-zA-Z0-9_]*$/", $_POST['password'])) {
            $errormassage = "The  wrong data in password ";
            header("Location: $location?$massage=$errormassage&''");
            exit;
        }

        if ($this->LoginCheck($_POST["name"]) >= 1) {
            $errormassage = "This login already registrated ";
            header("Location: $location?$massage=$errormassage&''");

            die;
        }

        $name = $_POST["name"];
        $password = $_POST["password"];
        // $email = $this->conn->quote($_POST["email"]);
        $this->check_input($name);
        $this->check_input($password);

        $hash_pass = hash('md5', $password);

        $sql = "INSERT INTO users (name, password) VALUES ('$name', '$hash_pass')";
        $stmt = $this->db->conn->prepare($sql);
        if ($sql != null) {
            $stmt->execute();
            $errormassage = "Thanks for registration ";
            header("Location: $location?$massage=$errormassage&''");
        }
    }

    public function UserLogin()
    {
        session_start();

        if (
            isset($_POST['name']) &&
            isset($_POST['password'])
        ) {
            $text = "login";
            $location = "UserLogin.php";
            $massage = "error";

            if (!preg_match("/^[a-zA-Z0-9_]*$/", $_POST['name'])) {
                $errormassage = "The  wrong data in name ";
                header("Location: $location?$massage=$errormassage&''");
                exit;
            }

            if (!preg_match("/^[a-zA-Z0-9_]*$/", $_POST['password'])) {
                $errormassage = "The  wrong data in password ";
                header("Location: $location?$massage=$errormassage&''");
                exit;
            }

            $name = $_POST['name'];
            $name = $this->check_input($name);

            $password = $_POST["password"];
            $password = $this->check_input($password);
            $hax = hash('md5', $password);
            //check if login or password empty

            $this->isEmpty($name, $text, $location, $massage, "");


            $text = "password";
            $location = "UserLogin.php";
            $massage = "error";
            $this->isEmpty($password, $text, $location, $massage, "");

            $sql = "SELECT*FROM users
            WHERE name=?";
            $stmt = $this->db->conn->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':password', $password);
            $stmt->execute([$name]);

            if ($stmt->rowCount() === 1) {

                $user = $stmt->fetch();

                $user_id = $user['id'];
                $user_name = $user['name'];

                $user_password = $user['password'];

                if ($name === $user_name) {
                    if ($hax === $user_password) {
                        $_SESSION['user_id'] = $user_id;
                        $_SESSION['user_name'] = $user_name;
                        header("Location: /WarCriminalsDatabase/index.php?username=$user_name&''");
                        echo '<script> 
                        window.location="C:/xampp/htdocs/WarCriminalsDatabase/index.php";
                        </script>';
                    }

                    if ($hax != $user_password) {
                        $errormassage =  "Wrong Password";
                        header("Location: $location?$massage=$errormassage&''");

                        die;
                    }
                }
                if ($name != $user_name) {
                    $errormassage =  "Wrong login";
                    header("Location: $location?$massage=$errormassage&''");
                }
            }
        } else {

            header('UserLogin.php');
        }
    }

    function isEmpty($var, $text, $location, $massage, $data)
    {
        if (empty($var)) {
            # Error message
            $errormassage = "The " . $text . " is required";
            header("Location: $location?$massage=$errormassage&$data");
            exit;
        }
        return 0;
    }


    public function check_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function LoginCheck($name)
    {
        $name = $this->check_input($name);

        $stmt = $this->db->conn->prepare("SELECT name FROM users WHERE name = :name");
        $parem = ['name' => $name];
        $stmt->execute($parem);

        if ($stmt->rowCount() > 0) {
            echo "exists!";
            return 1;
        } else {
            //echo "non existant";
            return 0;
        }
    }

    public function GetUsers()
    {
        $sql = "SELECT id,name,email,IsBanned FROM users";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $persons = $stmt->fetchAll();
        } else {
            $persons = 0;
        }
        return $persons;
    }

    public function Bann($data)
    {



        $ban_id = $this->db->conn->quote($data);
        $id = $this->db->conn->quote($_POST["id"]);
        
        $sql = "UPDATE  users SET isBanned=$ban_id      
        WHERE id = $id";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->execute();
    }
}
