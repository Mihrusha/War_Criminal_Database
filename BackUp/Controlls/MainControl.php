<?php
include_once 'Controlls\ItemsController.php';
include_once('C:\xampp\htdocs\WarCriminalsDatabase\Models\ItemsModel.php');
include_once('C:\xampp\htdocs\WarCriminalsDatabase\Models\CategoryModel.php');

class MainControll
{


    public function __construct()
    {
        
    }

     public function ShowAll()
    {
        // Подключаем вид
        require('Views\HeaderView.php');
        return true;
    }

     public function ReturnMain()
    {
        require('index.php');

        return true;
    }

    
    //  public function Test()
    // {
     
    //     $items=new ItemsController();
       
    //     $items->Test($_POST['Search']);
    // }

    public function LatestAricles()
    {
        $items=new ItemsController();
       
        $items->Latest_Items();

     
    }

    // public function Search()
    // {
    //     $person = new ItemsController();
    //     $person->Search_By_Name($_POST['Search']); 
    // }

}

?>