<?php
include 'C:\xampp\htdocs\WarCriminalsDatabase\database_connection.php';
include_once 'C:\xampp\htdocs\WarCriminalsDatabase\Models\UserModel.php';
include_once 'C:\xampp\htdocs\WarCriminalsDatabase\Controlls\UserController.php';
$user = new User;
$users = $user->Get_Users($conn);
// $control =new UserController;
// $control->Delete_Comment();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Document</title>
    <a href="admin.php">Mrazi Database</a>
</head>

<body>

    <h1>Users </h1>


    <div>

        <?php

        $i = 0;
        if ($users == 0) { ?>
            empty
        <?php
        } else { ?>


            <table class="table table-bordered shadow  table-hover ">
                <thead class="thead-dark">
                    <tr class='table-primary'>
                        <th scope="col">#</th>

                        <th scope="col">Name</th>

                        <th scope="col">IsBanned</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    foreach ($users as $row) {
                        $i++;
                    ?>
                        <tr class=''>
                            <td class='Number_col'>
                                <?= $i ?>
                            </td>


                            <td>
                                <?= $row['name'] ?>
                            </td>

                            <td>

                                <p class='Descr_col'><?= $row['IsBanned'] ?></p>
                            </td>



                            <td class='Action_col'>

                                <form action='' method='post'>
                                    <input type='hidden' name='id' value='<?= $row['id'] ?> ' />
                                    <input type="submit" class="btn btn-outline-danger border-2" value="Delete">
                                    <input type='hidden' name='id' value='<?= $row['id'] ?>' />
                                    <a class="btn btn-outline-success border-2" id='Edit' href="Views\Edit_User.php">Edit</a>
                                </form>

                            </td>

                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        <?php } ?>



    </div>

</body>
</body>

</html>