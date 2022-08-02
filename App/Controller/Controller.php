<?php

namespace App\Controller;

use App\Models\Comments;
use App\Models\Pokidky;

use App\View\View;

class Controller
{
    private $view;
    private $pokidky;
    private $comment;
    public function __construct()
    {
        $this->view = new View;
        $this->pokidky = new Pokidky;
        $this->comment = new Comments;
    }

    public function Main()
    {
        
        $data = $this->pokidky->GetAll();
        $category = $this->pokidky->GetCategory();

         $this->view->Main($data,$category);
    }

    // public function Comment()
    // {
    //     if(!empty($_POST['name'])&&(!empty($_POST['massage']))){
    //     $name = $_POST['name'];
    //     $massage = $_POST['massage'];
    //     $pok_id = $_POST['pok_id'];
    //     $data = $this->comment->AddComment($name,$massage,$pok_id);
    //     $answer =$this->comment->getMassage($pok_id);
    //         $this->view->ShowComment($answer);
    //     }
        
    //     if(isset($_POST['pok_id'])){
    //         $answer =$this->comment->getMassage($_POST['pok_id']);
    //         $this->view->ShowComment($answer);
    //     }
        
    //     $answer = $this->comment->getMassage($pok_id);
    //     $this->view->ShowComment($answer);
    // }

    public function Change()
    {

        $answer = $this->comment->getMassage($_POST['pok_id']);
        $this->view->ShowComment($answer);
    }
}
