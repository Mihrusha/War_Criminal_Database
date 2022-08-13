<?php
include 'C:\xampp\htdocs\WarCriminalsDatabase\database_connection.php';
include_once 'C:\xampp\htdocs\WarCriminalsDatabase\Models\UserModel.php';
include_once 'C:\xampp\htdocs\WarCriminalsDatabase\Controlls\UserController.php';
$massage = new User;
$massages=$massage->get_all_massages($conn);
$control =new UserController;
$control->Delete_Comment();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
crossorigin="anonymous"></script>
</head>

<body>
<a href="admin.php">Mrazi Database</a>

<?php



    foreach ($massages as $elem) { ?>

        <div class="row d-flex justify-content-center mt-100 mb-100">
            <div class="col-lg-6">
                <div class="card">
                   
                    <div class="comment-widgets">
                        <!-- Comment Row -->

                        <div class="d-flex flex-row comment-row">
                            <div class="p-2"><img src="https://i.imgur.com/J6l19aF.jpg" alt="user" width="50" class="rounded-circle"></div>
                            <div class="comment-text w-100">
                                <h6 class="font-medium"><?= $elem['name'] ?></h6> <span class="m-b-15 d-block"><?= $elem['massage'] ?></span>
                                <div class="comment-footer"> 
                                    <span class="text-muted float-right"><hr><h6>Topic::</h6><?= $elem['pok_name'] ?></span>
                                    <form action='' method='post'>
                                                <input type='hidden' name='id' value='<?= $elem['id'] ?> ' />
                                                <input type="submit" class="btn btn-outline-danger border-2" value="Delete">
                                                
                                                </form>
                                     </div>
                            </div>
                        </div>
                    </div> <!-- Card -->
                </div>
            </div>
        </div>




    <?php } ?>



</div>

</body>

</html>

