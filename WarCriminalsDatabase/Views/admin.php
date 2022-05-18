<?php
session_start();

# If the admin is logged in
if (
    isset($_SESSION['user_id']) &&
    isset($_SESSION['user_name'])

) {
    
    include_once('C:\xampp\htdocs\WarCriminalsDatabase\Controlls\ItemsController.php');
    $controller = new ItemsController();
    $controller->start();
    $controller->delete();

?>



<?php } else {
    header("Location: Views\LoginView.php");
    exit;
} ?>