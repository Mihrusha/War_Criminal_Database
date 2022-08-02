<?php

use App\Models\Comments;

include_once 'C:\xampp\htdocs\WarCriminalsDatabase\vendor\autoload.php';
$comment = new Comments;
$result;
if (isset($_POST['insert'])) {

     $name = $_POST['name'];
     $massage = $_POST['massage'];
     $id = $_POST['pok_id'];
    $comment->id = $_POST['pok_id'];
    $avatar = $_POST['avatar'];
    //echo $comment->id;
 

     $comment->AddComment($_POST['name'], $_POST['massage'], $_POST['pok_id'],$_POST['avatar']);
}

$result = $comment->getMassage( $comment->id);
?>

<div class='col'>
    <div class='container' id='getComment' name='getComment'>
        <?php foreach ($result as $elem) { ?>
            <div class="row d-flex justify-content-center mt-100 mb-100">
                <div class="col-lg-6 m-2">
                    <div class="card">
                        <div class="comment-widgets">
                            <!-- Comment Row -->

                            <div class="d-flex flex-row comment-row">
                                <div class="p-2"><img src="App/photos/<?= $elem['avatar'] ?>" alt="user" width="90" class="rounded-circle"></div>
                                <div class="comment-text w-100">
                                    <h6 class="font-medium"><?= $elem['name'] ?></h6> <span class="m-b-15 d-block"><?= $elem['massage'] ?></span>
                                    <!-- <div class="comment-footer">
                                           
                                        </div> -->
                                </div>
                            </div>
                        </div> <!-- Card -->
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>