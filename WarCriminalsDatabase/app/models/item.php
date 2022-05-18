<?php

class Item extends Model{

    var $name;

    public function get(){
        $sql="SELECT*FROM item";
        $stmt=self::$_connection->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS,'item');
        return $stmt->fetchAll();
    }
    
}

?>