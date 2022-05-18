<?php {

    include_once('C:\xampp\htdocs\WarCriminalsDatabase\Models\ItemsModel.php');
    include_once('C:\xampp\htdocs\WarCriminalsDatabase\Models\CategoryModel.php');
}

class ItemsController
{

    public $i_model;
    public $c_model;
    public function __construct()
    {
        $this->i_model = new Item();
        $this->c_model = new Category();
    }
    public function start()
    {
        include 'C:\xampp\htdocs\WarCriminalsDatabase\database_connection.php';
      //  include "category_func.php";
        //$category = get_all_category($conn);
        if (!isset($_GET['items'])) {
            $pokidky = $this->i_model->get_all_pokidky($conn);
            $category = $this->c_model->get_all_category($conn);
            include 'C:\xampp\htdocs\WarCriminalsDatabase\Views\ItemsView.php';
        }

        
    }

    public function delete()
    {
        include 'C:\xampp\htdocs\WarCriminalsDatabase\database_connection.php';
        if (isset($_POST["id"])) {
            $pokidky = $this->i_model->delete($conn);
           
        }
    }


    public function AddItem()
    {
        include 'C:\xampp\htdocs\WarCriminalsDatabase\database_connection.php';
        if (isset($_POST) && !empty($_POST)) {
            $pokidky = $this->i_model->Add($conn);
            
        }

        
    }

    //test open new window;
    public function Test($method)
    {
        include 'C:\xampp\htdocs\WarCriminalsDatabase\database_connection.php';
        if (isset($method)) {
            // $item = $this->i_model->search_one($conn);
            echo '<script type="text/javascript">';
            echo ' window.location = "test.php"';  //not showing an alert box.
            echo '</script>';
            
        }
    }

    public function Read($method)
    {
        include 'C:\xampp\htdocs\WarCriminalsDatabase\database_connection.php';
        if (isset($method)) {
            $item = $this->i_model->get_one($conn);
            include 'new_window.php';
            
        }

    }

    // public function ReadOne()
    // {include 'C:\xampp\htdocs\WarCriminalsDatabase\database_connection.php';
    //     $item = $this->i_model->get_one($conn);
       
    // }

    public function Edit()
    {
        include 'C:\xampp\htdocs\WarCriminalsDatabase\database_connection.php';
        if (isset($_POST)) {
            $pokidky = $this->i_model->Edit($conn);
            
        }

        
    }


    public function Latest_Items()
    {include 'C:\xampp\htdocs\WarCriminalsDatabase\database_connection.php';
       
         $paginations=$this->i_model->paginations;
        // $page_counter=$this->i_model->page_counter;
        $start=$this->i_model->start;
        $perPage=$this->i_model->perPage;
        $pagLink=$this->i_model->pagLink;
       // $previous = $this->i_model->previous;
       
        //  include "category_func.php";
          //$category = get_all_category($conn);
          if (!isset($_GET['items'])) {
                $paginations-$this->i_model->pugination($conn);
              $pokidky = $this->i_model->get_all_pokidky_pagination($conn);
              $category = $this->c_model->get_all_category($conn);
              include 'Views\MainPageView.php';
          }
        
    }

    public function Search_Name($method)
    {
        include 'C:\xampp\htdocs\WarCriminalsDatabase\database_connection.php';
        if (isset($method)) {
            $item = $this->i_model->get_one($conn);
            // $item=$this->i_model->get_from_category($conn);
            include 'new_window.php';
            
        }

    }

    public function Search_by_Category($method)
    {
        include 'C:\xampp\htdocs\WarCriminalsDatabase\database_connection.php';
        if (isset($method)) {
           
             $item=$this->i_model->get_from_category($conn,$method);
            include 'C:\xampp\htdocs\WarCriminalsDatabase\Views\Collaborant.php';
            
        }

    }

}
 

 