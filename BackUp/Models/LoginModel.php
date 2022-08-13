<?php




class Login
{

    

    public function SearchAdmin($name,$password)
    {
        
        include 'C:\xampp\htdocs\WarCriminalsDatabase\database_connection.php';
            # simple form validation

            $text = "name";
            $location = "Views\LoginView.php";
            $massage = "error";
            is_empty($name, $text, $location, $massage, "");

            $text = "password";
            $location = "Views\LoginView.php";
            $massage = "error";
            is_empty($password, $text, $location, $massage, "");

            // search for name
            $sql = "SELECT*FROM admin
             WHERE name=?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$name]);

            if ($stmt->rowCount() === 1)
             {

                $user = $stmt->fetch();

                $user_id = $user['id'];
                $user_name = $user['name'];
                $user_password = $user['password'];

                if ($name === $user_name) {
                    if (password_verify($password, $user_password)) {
                        $_SESSION['user_id'] = $user_id;
                        $_SESSION['user_name'] = $user_name;
                        ob_start();
                        $new_url = 'admin.php';
                        header('Location: ' . $new_url);
                        ob_end_flush();
                    }
                } else 
                {
                    $em = "Incorect Username or password";
                    header("Views\LoginView.php?error=$em");
                }
            } 
            else
             {
                $em = "Incorect Username or password";
                header("Views\LoginView.php?error=$em");
             }
    

        
            
       
    }
}       

