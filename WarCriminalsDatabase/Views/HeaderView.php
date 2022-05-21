<?php
require_once 'C:\xampp\htdocs\WarCriminalsDatabase\Controlls\ItemsController.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mrazi Database</title>
    <!-- bootstrap -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Views\header.css">

</head>

<body>

    <!-- <img src="photos/strem.jpg">  -->



    <div class='header'>

        <nav class="navbar navbar-expand-lg navbar-light bg-light ">
            <h1> Pokidky Database</h1>
            <div class="container-fluid">
                <a class="navbar-brand" href="#"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">
                                <h3>Home</h3>
                            </a>

                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="Views\LoginView.php">
                                <h3>Login</h3>
                            </a>
                        </li>

                        <li class="nav-item">
                            <form class="d-flex" method='POST'>
                                <input type='hidden' name='New' value='New' />
                                <a class="nav-link" href='Views\NewUser_View.php' name='New' value='New'>
                                    <h3>New User</h3>
                                </a>
                            </form>

                        </li>


                        <li>
                            <form class="d-flex" method='post' action="new_window.php">

                                <input class="form-control me-2" type="text" name='name' placeholder="name" aria-label="name">
                                <input type="submit" class="btn btn-outline-success" type="submit" name='Search' value="Search">
                            </form>
                        </li>

                        <li>
                            <p class=space>
                                
                            </p>
                        </li>
                        <li class="nav-item">
                        <form class="d-flex" method='post'  action="Views\Collaborant.php" >
                            <select class="custom-select custom-select-lg mb-3 ml-3 pl-6" name="Subject" onchange="this.form.submit()">
                                <option selected>Categories</option>
                                <option value="Collaborant">Collaborant</option>
                                <option value="Public Person ">Public Person</option>
                                <option value="War Criminal">War Criminal</option>
                            </select>
                            </form>
                        </li>

                    </ul>

                </div>
            </div>
        </nav>
    </div>

</body>


</html>