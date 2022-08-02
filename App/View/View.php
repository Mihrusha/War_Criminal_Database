<?php

namespace App\View;

class View
{
    public function Main($data=null,$category=null){
        include_once "App\Templates\Main.php";
    }

    public function ShowComment($data=null){
        include_once "C:/xampp//htdocs/WarCriminalsDatabase/App/Templates/change.php";
    }
}
