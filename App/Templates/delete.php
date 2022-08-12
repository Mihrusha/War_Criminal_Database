<?php

use App\Models\Comments;
use App\Models\Pokidky;
include_once 'C:\xampp\htdocs\WarCriminalsDatabase\vendor\autoload.php';
$pokidky_eng = new Pokidky;
$pokidky = new Pokidky;
$comment = new Comments;

if (isset($_POST['delete_id'])) {

    $pokidky->deleteUkr();
  
}

if (isset($_POST['delete_en'])) {

    $pokidky_eng->deleteEng();
  
}

if (isset($_POST['delete_com'])) {
    
    $comment->delete_comment();
  
}


?>