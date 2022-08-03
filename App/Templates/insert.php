<?php

use App\Models\Pokidky;
include_once 'C:\xampp\htdocs\WarCriminalsDatabase\vendor\autoload.php';
$pokidky_eng = new Pokidky;
$pokidky = new Pokidky;
if (isset($_POST['pok_name'])) {

    $pokidky_eng->AddEng();
}

if (isset($_POST['name'])) {

    $pokidky->AddUkr();
}

?>