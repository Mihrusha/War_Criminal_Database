<?php

class Controller{
    protected function model($model){
      if(file_exists('app/models/' . $model . '.php')){
        require_once 'app/models/' . $model . '.php';
        return new $model();
      }else
        return null;
    }
    
    protected function view($name, $data = []){
      if(file_exists('app/views/'.$name.'.php')){
        include('app/views/'.$name.'.php');
      } else {
        echo "ERROR: View $view not found!";
      }
    }
  }

?>
