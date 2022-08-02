<?php
 include 'C:\xampp\htdocs\WarCriminalsDatabase\database_connection.php';
include_once 'C:\xampp\htdocs\WarCriminalsDatabase\Controlls\UserController.php';
include_once 'C:\xampp\htdocs\WarCriminalsDatabase\Controlls\ItemsController.php';
// include_once 'C:\xampp\htdocs\WarCriminalsDatabase\Controlls\ItemsModel.php';
include_once 'Views\HeaderView.php';
$items = new Item();
$item=$items->get_one_new($conn,$_POST['name']);

$path_to_file = 'counter2.txt';//будет зависеть от вашего желания и структуры ваших адресов сайта

$counter = @file_get_contents($path_to_file) +1;

$write = @file_put_contents($path_to_file, $counter);

if($write) { $info = '<br>'; }

echo '<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
<path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
<path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
</svg> : <span style="color:red;">'.$counter.'</span>' . $info;

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="new_window.css">
</head>

<body>

    <a href=""></a>
    
        <?php

        foreach ($item as $row) { ?>

 <div class="container-xxl border border-success w-100">
                <div class="row">
                    <div class="col-md-3 mt-2 ">
                        <img class='img-left ' width="" src="photos/<?= $row['photo'] ?> ">
                    </div>
                    <div class="col-md-9">
                        <div>
                            <h3><?= $row['surname'] ?><?= $row['name'] ?></h3>
                        </div>
                        <div class='about text-justify'>
                            <p class='text-justify'><?= $row['description'] ?></p>
                        </div>
                        <div>

                            <p><a href="files/<?= $row['files'] ?>" download>Download Files</a>
                        </div>
                        <div class='col'>
                            <a href="index.php" class="btn btn-primary">Back</a>
                        </div>
                        <div class='col  mt-3'>
                            <a href="Views\comments.php" class="btn btn-success mb-2">Comments</a>
                        </div>
                    </div>
                </div>
            
</div>
           

        <?php } ?>



</body>


<script src="code.js"></script>

</html>