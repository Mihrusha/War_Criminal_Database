<?php {

    include_once('C:\xampp\htdocs\WarCriminalsDatabase\Models\LoginModel.php');
}

class LoginController
{

    public $l_model;

    public function __construct()
    {
        $this->l_model = new Login();
    }

    public function Validation()
    {


        if (
            isset($_POST['name']) &&
            isset($_POST['password'])
        ) {


            
            # Validation helper function
            include 'C:\xampp\htdocs\WarCriminalsDatabase\validation_func.php';

            /** 
	   Get data from POST request 
	   and store them in var
             **/
            $name = $_POST['name'];
            $password = $_POST['password'];
            $this->l_model->SearchAdmin($name,$password);

        } else 
         {
            header("Views\LoginView.php");
         }
    
    }
}
