<?php


session_start();

if (
    isset($_POST['name']) &&
    isset($_POST['password'])
) 
{


    include "database_connection.php";
    # Validation helper function
    include "validation_func.php";

    /** 
	   Get data from POST request 
	   and store them in var
     **/

    $name = $_POST['name'];
    $password = $_POST['password'];

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

    if ($stmt->rowCount() === 1) {
        
        $user=$stmt->fetch();

        $user_id=$user['id'];
        $user_name=$user['name'];
        $user_password=$user['password'];

        if($name===$user_name)
        {
            if(password_verify($password,$user_password))
            {
                $_SESSION['user_id'] = $user_id;
    			$_SESSION['user_name'] = $user_name;
                header("Location:admin.php");

            }

            if( $password!=$user_password)
            {
                echo"Wrong Password";
            }

        }   

       
            
        
    }
       
    

} 

else {
    header("./Views\LoginView.php");
}