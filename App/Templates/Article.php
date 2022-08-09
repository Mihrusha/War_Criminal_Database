<?php

use App\Models\Comments;
use App\Models\Pokidky;

include_once "C:/xampp/htdocs/WarCriminalsDatabase/vendor/autoload.php";

$pokidky = new Pokidky;
$one;
$comment = new Comments;

$one = $pokidky->getOne();
if (isset($_POST['id'])) {
   
    $answer = $comment->getMassage($_POST['id']);
}

if (isset($_POST['by_name'])) {
    $one = $pokidky->getOneName();
}

// if(isset($_POST['pok_id'])){
//     $answer = $comment->getMassage($_POST['pok_id']);
// }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="App\Templates\article.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/6d3c048c3c.js"></script>
    <?php foreach ($one as $row) : ?>
        <title><?php echo $row['name'] . ' ' . $row['surname']  ?></title>
</head>

<body>
    <div class='container' id='article_unit'>
        <div class="container-xxl border border-success w-100 " id='article_top'>
            <div class="row ">
                <div class="col-md-3 mt-2 ">
                    <img class='img-left ' width="" src="App/photos/<?= $row['photo'] ?> ">
                </div> 
                <div class="col-md-9">
                    <div>
                        <h3><?= $row['name'] ?> <?= $row['surname'] ?></h3>
                    </div>
                    <div class='about text-justify'>
                        <p class='text-justify'><?= $row['description'] ?></p>
                    </div>
                    <div>

                        <p><a href="files/<?= $row['files'] ?>" download>Download Files</a>
                    </div>
                    <div class='col'>
                        <a href="/WarCriminalsDatabase/index.php" class="btn btn-success m-2">Back</a>
                    </div>

                </div>
            </div>
        </div>

        <div class='row'>
            <div class='col'>
                <div class='container mt-5' id='sendComment' name='sendComment'>
                    <form>
                        <div class="mb-3">
                            <label for="Name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="user_name" name='user_name' aria-describedby="Name">
                            <input type="hidden" name='pok_id' id='pok_id' value="<?= $row['id'] ?>">
                        </div>
                        <label for="user_name" class="form-label">Avatar</label>
                        <div class="container">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="avatar" id="avatar" value="avatar1.jpg">
                                <img src="/WarCriminalsDatabase/App/photos\avatar1.jpg" width="50" name="avatar">
                                <label class="form-check-label" for="inlineRadio1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="avatar" id="avatar" value="avatar2.png">
                                <img src="/WarCriminalsDatabase/App/photos\avatar2.png" width="50" height="50" name="avatar">
                                <label class="form-check-label" for="inlineRadio2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="avatar" id="avatar" value="avatar3.jpg">
                                <img src="/WarCriminalsDatabase/App/photos\avatar3.jpg" width="50" height="50" name="avatar">
                                <label class="form-check-label" for="inlineRadio2">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="avatar" id="avatar" value="avatar4.jpg">
                                <img src="/WarCriminalsDatabase/App/photos\avatar4.jpg" width="50" height="50" name="avatar">
                                <label class="form-check-label" for="inlineRadio2">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="avatar" id="avatar" value="avatar5.jpg">
                                <img src="/WarCriminalsDatabase/App/photos\avatar5.jpg" width="50" height="50" name="avatar">
                                <label class="form-check-label" for="inlineRadio2">5</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="avatar" id="avatar" value="avatar6.jpg">
                                <img src="/WarCriminalsDatabase/App/photos\avatar6.jpg" width="50" height="50" name="avatar">
                                <label class="form-check-label" for="inlineRadio2">6</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="massage" class="form-label">Massage</label>
                            <textarea type="text" class="form-control" id="massage" name='massage'></textarea>
                        </div>

                        <button type="button" class="btn btn-primary" id="sendComment" name='sendComment'>Submit</button>
                    </form>
                </div>
            </div>

            <div class='col mt-5' id='result'>
                <div class='container' id='getComment' name='getComment'>
                    <?php foreach ($answer as $elem) { ?>
                        <div class="row d-flex justify-content-center mt-100 mb-100">
                            <div class="col-lg-6 m-2">
                                <div class="card">
                                    <div class="comment-widgets">
                                        <!-- Comment Row -->

                                        <div class="d-flex flex-row comment-row">
                                            <div class="p-2"><img src="App\photos\<?= $elem['avatar'] ?>" alt="user" width="90" class="rounded-circle"></div>
                                            <div class="comment-text w-100">
                                                <h6 class="font-medium"><?= $elem['name'] ?></h6> <span class="m-b-15 d-block"><?= $elem['massage'] ?></span>
                                                <!-- <div class="comment-footer">
                                           
                                        </div> -->
                                            </div>
                                        </div>
                                    </div> <!-- Card -->
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>


    <!-- <div id='result'></div>
    <div id='msg'></div> -->

    <script>
        $(document).ready(function() {

            $(".btn-primary").click(function() {
                name = $("#user_name").val();
                massage = $("#massage").val();
                pok_id = $("#pok_id").val();
                var avatar
                $(".form-check-input:checked").each(function() {
                    avatar = ($(this).val());
                    element = this;
                });


                $.ajax({
                    type: 'post',
                    url: 'App/Templates/comments.php',
                    data: {
                        massage: massage,
                        name: name,
                        pok_id: pok_id,
                        insert: 'insert',
                        avatar: avatar
                    },
                    success: function(answer) {
                        // $('#result').load('App/Templates/test.php'),
                        $('#result').html(answer)
                    }

                })

            })

        })
    </script>
</body>
<?php endforeach ?>

</html>