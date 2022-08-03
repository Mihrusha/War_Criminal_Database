<?php

use App\Models\Registration;

include_once 'C:\xampp\htdocs\WarCriminalsDatabase\vendor\autoload.php';
$registration = new Registration;
$registration->Login();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/6d3c048c3c.js"></script>
    <title>Login</title>
</head>

<body>

    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <form class="p-5 rounded shadow" style="max-width: 30rem; width: 100%" method="POST" action="">


            <h1 class="text-center display-4 pb-5">LOGIN</h1>
            <?php if (isset($_GET['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= htmlspecialchars($_GET['error']); ?>
                </div>
            <?php } ?>

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <!-- //<input type='hidden' name='name' value='<?= $model['name'] ?> ' /> -->
                <input type="text" class="form-control" name="name">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <!-- <input type='hidden' name='password' value='<?= $model['password'] ?> ' /> -->
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <button type="submit" name='Add' class="btn btn-primary">
                Login</button>
            <a href="/WarCriminalsDatabase/index.php" class="btn btn-success">Back</a>
        </form>

</body>

</html>