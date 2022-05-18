<?php

include_once 'C:\xampp\htdocs\WarCriminalsDatabase\Controlls\UserController.php';
include_once 'C:\xampp\htdocs\WarCriminalsDatabase\Controlls\ItemsController.php';

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

    <div class='card-img'>
        <?php

        foreach ($item as $row) { ?>

            <div class="container border border-success ">
                <div class="row">
                    <div class="col-md-4">
                        <img class='picture' width="" src="photos/<?= $row['photo'] ?>">
                    </div>
                    <div class="col-md-6">
                        <div>
                            <h3><?= $row['name'] ?></h3>
                        </div>
                        <div>
                            <h4><?= $row['description'] ?></h4>
                        </div>
                        <div>
                           
                            <p><a href="files/<?= $row['files'] ?>" download>Download Files</a>
                        </div>
                        <div class='col'>
                            <a href="index.php" class="btn btn-primary">Back</a>
                        </div>
                        <div class='col  mt-3'>
                            <a href="Views\comments.php" class="btn btn-success">Comments</a>
                        </div>
                    </div>
                </div>
            </div>

    </div>
<?php } ?>
<div class='row'>

</div>
</div>

</body>

<footer>

</footer>
<script src="code.js"></script>

</html>