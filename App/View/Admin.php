<?php

use App\Models\Pokidky;

include_once 'C:\xampp\htdocs\WarCriminalsDatabase\vendor\autoload.php';
$pokidky = new Pokidky;
$data = $pokidky->GetAll();
$data_eng = $pokidky->GetEng();
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
    <title>Admin Panel</title>
</head>

<body>


    <div class='container' id='display'>
        <header>
            <nav class="navbar navbar-light bg-light justify-content-between">
                <a class="navbar-brand" href="/WarCriminalsDatabase/index.php">Home</a>

                <button class="navbar-brand" href="" id='UkrPanel'>Ukranian Panel</button>
                <button class="navbar-brand" href="" id='EngPanel'>English Panel</button>
                <button class="navbar-brand" href="" id='Add_Bastard'>Add Bastard</button>
                <button class="navbar-brand" href="" id='Add_Pokidyok'>Add Pokidyok</button>
                <form class="form">
                    <div class='row'>
                        <div class='col'>
                            <select class="form-select" aria-label="Default select example" id="role" name='role'>
                                <option selected value="no">Set Category</option>
                                <option value="Admin">War criminals</option>
                                <option value="User">Collaborants</option>
                                <option value="User">Public Persons</option>
                            </select>
                        </div>
                        <div class='col'>
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        </div>
                        <div class='col'>
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </div>
                    </div>
                </form>
            </nav>
        </header>

        <div class='container' id='UkrTable' style="display: none;">
            <table class="table table-bordered">
                <thead>
                    <tr>UKRAINIEN
                        <th scope="col">id</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Name</th>
                        <th scope="col">Surname</th>
                        <th scope="col">Description</th>
                        <th scope="col">Category</th>
                        <th scope="col">Files</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <?php foreach ($data as $row) : ?>
                    <tbody>
                        <tr>
                            <th scope="row"><?= $row['id'] ?></th>
                            <td><?= $row['photo'] ?></td>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['surname'] ?></td>
                            <td><?= $row['description'] ?></td>
                            <td><?= $row['category_id'] ?></td>
                            <td><?= $row['files'] ?></td>
                            <td>
                                <div class='container'>
                                    <button class='btn btn-danger m-2'>DELETE</button>
                                    <button class='btn btn-success m-2'>EDIT</button>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                <?php endforeach ?>
            </table>
        </div>


        <div class='container' id='EngTable' style="display: none;">
            <table class="table table-bordered">
                <thead>
                    <tr>ENGLISH
                        <th scope="col">id</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Name</th>
                        <th scope="col">Surname</th>
                        <th scope="col">Description</th>
                        <th scope="col">Category</th>
                        <th scope="col">Files</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <?php foreach ($data_eng as $row) : ?>
                    <tbody>
                        <tr>
                            <th scope="row"><?= $row['id'] ?></th>
                            <td><?= $row['photo'] ?></td>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['surname'] ?></td>
                            <td><?= $row['description'] ?></td>
                            <td><?= $row['category_id'] ?></td>
                            <td><?= $row['files'] ?></td>
                            <td>
                                <div class='container'>
                                    <button class='btn btn-danger m-2'>DELETE</button>
                                    <button class='btn btn-success m-2'>EDIT</button>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                <?php endforeach ?>
            </table>
        </div>
    </div>

    <?= include_once "adminModals.php" ?>
    <script>
        $('#UkrPanel').click(function() {

            $('#UkrTable').css('display', 'block');
            $('#EngTable').css('display', 'none');
        })

        $('#EngPanel').click(function() {

            $('#EngTable').css('display', 'block');
            $('#UkrTable').css('display', 'none');
        })

        $('#Add_Bastard').click(function() {
            $('#addEng').modal('show');
        })

        $('#Add_Pokidyok').click(function() {
            $('#addUkr').modal('show');
        })

        $('#saveEng').click(function() {

            let pok_name = $('#pok_name').val();
            let pok_surname = $('#pok_surname').val();
            let category_id = $('#category_id').val();
            let description = $('#description').val();
            let photo = $('#photo').val();
            let files = $('#files').val();
            console.log(pok_name);

            $.ajax({
                type: 'post',
                url: '../Templates/insert.php',
                data: {
                    pok_name: pok_name,
                    pok_surname: pok_surname,
                    category_id: category_id,
                    description: description,
                    photo: photo,
                    files: files
                },
                success: function() {
                    alert("Send sexfully")
                }
            })
        })

        $('#saveUkr').click(function() {

            let name = $('#name').val();
            let surname = $('#surname').val();
            let category_id = $('#category_id_ukr').val();
            let description = $('#description_ukr').val();
            let photo = $('#photo_ukr').val();
            let files = $('#files_ukr').val();

            // console.log(name);
            // console.log(surname);
            // console.log(category_id);
            // console.log(description);
            // console.log(photo);
            // console.log(files);
            $.ajax({
                type: 'post',
                url: '../Templates/insert.php',
                data: {
                    name: name,
                    surname: surname,
                    category_id: category_id,
                    description: description,
                    photo: photo,
                    files: files
                },
                success: function() {
                    alert("Send sexfully")
                }
            })
        })
    </script>
</body>

</html>