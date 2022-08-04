<?php
use App\Models\Pokidky;
include_once 'C:\xampp\htdocs\WarCriminalsDatabase\vendor\autoload.php';
$pokidky_eng = new Pokidky;
$pokidky = new Pokidky;

if (isset($_POST['ukr_name'])) {

     $pokidky->editUkr();
   
}

if (isset($_POST['en_name'])) {

    $result = $pokidky_eng->editEng();
    var_dump($result);
}

?>