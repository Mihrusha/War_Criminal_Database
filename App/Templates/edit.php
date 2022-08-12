<?php
use App\Models\Pokidky;
use App\Models\Registration;

include_once 'C:\xampp\htdocs\WarCriminalsDatabase\vendor\autoload.php';
$pokidky_eng = new Pokidky;
$pokidky = new Pokidky;
$user = new Registration();

if (isset($_POST['ukr_name'])) {

     $pokidky->editUkr();
   
}

if (isset($_POST['en_name'])) {

    $result = $pokidky_eng->editEng();
    
}

if (isset($_POST['ban_id'])) {
    echo ($_POST['ban_id']);
     $user->Bann($_POST['ban_id']);
    
}

if (isset($_POST['unban_id'])) {
    echo ($_POST['unban_id']);
     $user->Bann($_POST['unban_id']);
    
}

?>