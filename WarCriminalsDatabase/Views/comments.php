<?php
 error_reporting(E_ERROR);
include 'C:\xampp\htdocs\WarCriminalsDatabase\database_connection.php';
include_once '../Controlls/UserController.php';
include 'C:\xampp\htdocs\WarCriminalsDatabase\Views\HeaderView2.php';
$value = $_POST['topic'];
$user = new User;
$user->TakeTestComment($conn, $value);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>Comment panel</title>

</head>

<body>
    <div class='row'>

    <h2>Write a comment and you will see comments</h2>
        <div class='col'>
            <!-- <a href="comments.php">Comments</a> -->

            <div class="box">
                <div class="d-flex justify-content-center " style="min-height: 20h;">


                    <form class="p-5 rounded shadow" method="POST" action="">
                        <h1 class="text-center display-4 pb-5">Comment</h1>
                        <div class="mb-3">
                            <label for="user_name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="user_name">
                        </div>
                        <div class="mb-3">
                            <label for="user_name" class="form-label">Avatar</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="avatar" id="inlineRadio1" value="avatar1.jpg">
                                <img src="/WarCriminalsDatabase/photos\avatar1.jpg"width="50"name="avatar">
                                <label class="form-check-label" for="inlineRadio1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="avatar" id="inlineRadio2" value="avatar2.png">
                                <img src="/WarCriminalsDatabase/photos\avatar2.png"width="50" height="50"name="avatar">
                                <label class="form-check-label" for="inlineRadio2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="avatar" id="inlineRadio2" value="avatar3.jpg">
                                <img src="/WarCriminalsDatabase/photos\avatar3.jpg"width="50" height="50"name="avatar">
                                <label class="form-check-label" for="inlineRadio2">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="avatar" id="inlineRadio2" value="avatar4.jpg">
                                <img src="/WarCriminalsDatabase/photos\avatar4.jpg"width="50" height="50"name="avatar">
                                <label class="form-check-label" for="inlineRadio2">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="avatar" id="inlineRadio2" value="avatar5.jpg">
                                <img src="/WarCriminalsDatabase/photos\avatar5.jpg"width="50" height="50"name="avatar">
                                <label class="form-check-label" for="inlineRadio2">5</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="avatar" id="inlineRadio2" value="avatar6.jpg">
                                <img src="/WarCriminalsDatabase/photos\avatar6.jpg"width="50" height="50"name="avatar">
                                <label class="form-check-label" for="inlineRadio2">6</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="textarea" class="form-label">Massage</label>
                            <textarea type="text" class="form-control" name="massage" id="massage"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="topic" class="form-label">Topic(name of pokidyok)</label>
                            <input type="text" class="form-control" name="topic" value="<?= $value ?>">
                        </div>
                        <input type="submit" name='submit' id='Reg' class="btn btn-success border-2" value="Comment">
                        <a href="../index.php" class="btn btn-primary">Back</a>

                    </form>
                </div>
            </div>

        </div>
        <div class='col'>

            <div>
                <?php

                $massage = new UserController;
                $massage->Get_Comments_by_Name($value); ?>
            </div>

        </div>
    </div>
</body>

</html>