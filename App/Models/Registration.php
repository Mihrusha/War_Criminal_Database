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

            $name = $_POST['name'];
            $this->check_input($name);
            $password = $_POST["password"];
            $this->check_input($password);
            $hax= hash('md5',$password);
            //check if login or password empty
            $text = "login";
            $location = "Login.php";
            $massage = "error";
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
}
