<?php

class Model{

    protected static $_connection = null;

    public function __construct()
    {
        if(self::$_connection==null){
# server name
$host = "localhost";
# user name
$user = "root";
# password
$pass = "";

# database name
$db_name = "war_criminals";

self::$_connection=new PDO("mysql:host=$host;dbname=$db_name", 
$user, $pass);
        }
    }


/**
// creating database connection 
// useing The PHP Data Objects (PDO)
// **/
// try {
//     $conn = new PDO("mysql:host=$sName;dbname=$db_name", 
//                     $uName, $pass);
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// }catch(PDOException $e){
//   echo "Connection failed : ". $e->getMessage();
// }

}


?>