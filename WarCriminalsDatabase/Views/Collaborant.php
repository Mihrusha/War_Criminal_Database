<?php 
include_once("..\Controlls\ItemsController.php");
include_once("..\Models\ItemsModel.php");
include 'C:\xampp\htdocs\WarCriminalsDatabase\database_connection.php';
 $value=$_POST['Subject'];
// echo $value;
$items=new Item();
$item=$items->get_from_category($conn,$value);
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
    
</head>

<body>

<div class='card-img'>
<a href="../index.php" class="btn btn-primary">Back</a>
        <?php

        foreach ($item as $row) { ?>
            <div class="container border border-success ">
                <div class="row">
                    <div class="col-md-4">
                        <img class='picture' width="" src="../photos/<?= $row['photo'] ?>">
                    </div>
                    <div class="col-md-6">
                        <div>
                            <h3><?= $row['name'] ?></h3>
                        </div>
                        <div>
                            <h4><?= $row['description'] ?></h4>
                        </div>
                        
                    </div>
                </div>

            </div>
        <?php } ?>
       
    </div>


</body>

</html>