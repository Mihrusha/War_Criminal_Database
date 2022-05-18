<?php

session_start();
include 'C:\xampp\htdocs\WarCriminalsDatabase\database_connection.php';
include_once 'Controlls\MainControl.php';

$main=new MainControll();

$main->ShowAll();


$main->LatestAricles();
 



