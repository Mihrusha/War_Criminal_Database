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
    <title>Document</title>
</head>

<body>

</body>

</html>

<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <form class="p-5 rounded shadow" style="max-width: 30rem; width: 100%" method="POST" action="">


        <h1 class="text-center display-4 pb-5">EDIT</h1>
        <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger" role="alert">
                <?= addslashes(htmlspecialchars($_GET['error'])); ?>
            </div>
        <?php } ?>

        <div class="form-group">
            <label for="first-name" class="col-form-label"> Name:</label>
            <input type="text" name="name_ukr" id="name_ukr" class="form-control" value="" maxlength="50">
        </div>

        <div class="form-group">
            <label for="first-name" class="col-form-label"> Surname:</label>
            <input type="text" name="surname_ukr" id="surname_ukr" class="form-control" value="" maxlength="50">
        </div>

        <div class="form-group">
            <label for="first-name" class="col-form-label"> Description:</label>
            <textarea rows="" cols="" type="text" name="descr_ukr" id="descr_ukr" class="description" value=""></textarea>
        </div>
        <div class="form-group">
            <label for="first-name" class="col-form-label"> Category_id:</label>
            <input type="text" name="cat_id_ukr" id="cat_id_ukr" class="form-control" value="" maxlength="50">
        </div>
        <div class="form-group">
            <label for="first-name" class="col-form-label"> photo:</label>
            <input type="text" name="pho_ukr" id="pho_ukr" class="form-control" value="" maxlength="50">
        </div>
        <div class="form-group">
            <label for="first-name" class="col-form-label"> files:</label>
            <input type="text" name="file_ukr" id="file_ukr" class="form-control" value="" maxlength="50">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" id='updateUkr' name='updateUkr'>Зберегти зміни</button>
            <a href="Admin.php" class="btn btn-success">Back</a>
        </div>

    </form>
</div>



