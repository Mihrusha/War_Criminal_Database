<?php
// error_reporting(E_ERROR);
include_once './Controlls\UserController.php';
include 'C:\xampp\htdocs\WarCriminalsDatabase\database_connection.php';



?>

<!-- <!DOCTYPE html> -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Views\main_styles.css">
</head>

<body>


    <div class='row'>
        <div class='col-md-2'>

        </div>


        <div class='col-md-10'>
            <section class="details-card">
                <div class="container">

                    <div class="row">
                        <?php
                        foreach ($pokidky as $pokidyok) { ?>
                            <div class="col-md-3">
                                <div class="card-content">
                                    <div class="card-img">
                                        <img class='picture' width="" src="photos/<?= $pokidyok['photo'] ?>">
                                        <span>
                                            <h4> <?php foreach ($category as $row) {
                                                        if ($row['id'] == $pokidyok['category_id'])
                                                            echo $row['name'];
                                                    }  ?>
                                            </h4>
                                        </span>
                                    </div>
                                    <div class="card-desc">
                                        <h3> <?= $pokidyok['name'] ?></h3>
                                        <?php $rest = substr("{$pokidyok['description']}", 0, 30) ?>
                                        <?php echo "<p>{$rest}</p>" ?>


                                        <form action='' method='post'>
                                            <input type='hidden' name='name' value='<?= $pokidyok['name'] ?> ' />
                                            <!-- <input type='hidden' name='read' value='read' /> -->
                                            <input type="submit" name='read' id='Read' class="btn btn-card border-2" value="READ">

                                        </form>



                                    </div>

                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class='inner'>
                        <?php

                        $items = new ItemsController();
                        $items->Read($_POST['read']);
                        $items->Search_Name($_POST['Search']);
                        
                        // $items->Search_by_Category($_POST['Subject']);

                        $user = new UserController();
                        // $user->TakeComment($_POST['Comment']);


                        ?>
                    </div>


            </section>
        </div>
        
        <nav aria-label="Page navigation example">
        <ul class="pagination">
        <li class="page-item"<?php if($start <= $paginations){ echo 'disabled'; } ?>><a class="page-link" href="<?php if($start <= $paginations){ echo '#'; } else { echo "?start=".($start-1); } ?>">Previous</a></li>
        <li class="page-item" ><a class="page-link" href="?start=0">1</a></li>
         <li class="page-item"><a class="page-link" href="#">2</a></li>
         <li class="page-item"><a class="page-link" href="?pagination=<?php echo $paginations; ?>">Last</a></li>
        <li class="page-item"<?php if($start >= 1){ echo 'disabled'; } ?>><a class="page-link" href="<?php if($start >= 1){ echo '#'; } else { echo "?start=".($start + 1); } ?>">Next</a></li>
        </ul>
        </nav>



<!-- 
        <ul class="pagination">
    <li><a href="?start=1">First</a></li>
    <li class="<?php if($start <= $paginations){ echo 'disabled'; } ?>">
        <a href="<?php if($start <= $paginations){ echo '#'; } else { echo "?start=".($start-1); } ?>">Prev</a>
    </li>
    <li class="<?php if($start >= 1){ echo 'disabled'; } ?>">
        <a href="<?php if($start >= 1){ echo '#'; } else { echo "?start=".($start + 1); } ?>">Next</a>
    </li>
    <li><a href="?pagination=<?php echo $paginations; ?>">Last</a></li>
</ul> -->
    </div>
    </div>
    <!-- new window -->


</body>



</html>