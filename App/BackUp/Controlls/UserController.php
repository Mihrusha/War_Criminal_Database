<?php 


    include_once('C:\xampp\htdocs\WarCriminalsDatabase\Models\UserModel.php');
  

class UserController

{

    public $u_model;

    public function __construct()
    {
        $this->u_model = new User();
        
    }

    public function Add_User($method)
    {
        
        include 'C:\xampp\htdocs\WarCriminalsDatabase\database_connection.php';
        if (isset($method) && !empty($method)) {
            $user = $this->u_model->Add($conn);
          
        }

        
    }

    public function Get_All_Users()
    {
        include 'C:\xampp\htdocs\WarCriminalsDatabase\database_connection.php';
        $users = $this->u_model->Get_Users($conn);
    }

    public function Edit()
    {
        include 'C:\xampp\htdocs\WarCriminalsDatabase\database_connection.php';
        if (isset($_POST)) {
            $user = $this->u_model->Edit($conn);
            
        }

        
    }

    public function TakeComment($method,$value)
    {
        include 'C:\xampp\htdocs\WarCriminalsDatabase\database_connection.php';
        if (isset($method) && !empty($method)) {
            $user = $this->u_model->TakeTestComment($conn,$value);
          
            // ?>
            <!-- // <script type="text/javascript"> -->
            <!-- //   window.location.replace('new_window.php'); -->
            <!-- // </script>//<? 

        }
    }
    public function StartReg($method)
    {
        
        include 'C:\xampp\htdocs\WarCriminalsDatabase\database_connection.php';
        if (isset($method) && !empty($method)) 
         {
            
             ?>
             <script type="text/javascript">
               window.location.replace('Views/NewUser_View.php');
             </script>
         

       <?php }
    }

    public function Comment($name)
    {
        include 'C:\xampp\htdocs\WarCriminalsDatabase\database_connection.php';
        $user = $this->u_model->usernameCheck($conn,$name);
    }

    public function GetComments()
    {
        include 'C:\xampp\htdocs\WarCriminalsDatabase\database_connection.php';
      //  include "category_func.php";
        //$category = get_all_category($conn);
        if (!isset($_GET['items'])) {
            $massages = $this->u_model->get_all_massages($conn);
          
            include './Views\GetCommentView.php';
        }

        
    }

    public function Delete_Comment()
    {
        include 'C:\xampp\htdocs\WarCriminalsDatabase\database_connection.php';
        if (isset($_POST["id"])) {
            $pokidky = $this->u_model->delete_comment($conn);
           
        }
    }


    public function Get_Comments_by_Name($name)
    {
        include 'C:\xampp\htdocs\WarCriminalsDatabase\database_connection.php';
      //  include "category_func.php";
        //$category = get_all_category($conn);
        if (!isset($_GET['items'])) {
            $massages = $this->u_model->get_massages_by_name($conn,$name);
          
            include 'C:\xampp\htdocs\WarCriminalsDatabase\Views\GetCommentView.php';
        }

        
    }

    // public function GetCommentsByName()
    // {
    //     include 'C:\xampp\htdocs\WarCriminalsDatabase\database_connection.php';
    //   //  include "category_func.php";
    //     //$category = get_all_category($conn);
    //     if (!isset($_GET['items'])) {
    //         $massages = $this->u_model->get_massages_by_name($conn,$name);
          
    //         include './Views\GetCommentView.php';
    //     }

        
    // }

}?>
