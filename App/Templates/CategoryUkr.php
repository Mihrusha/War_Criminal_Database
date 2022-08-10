<?php

use App\Models\Pokidky;

include_once "C:/xampp/htdocs/WarCriminalsDatabase/vendor/autoload.php";
$pokidky = new Pokidky;

if (isset($_POST['cat'])) {
    $item = $pokidky->get_from_category_Ukr($_POST['cat']);
}
// $item = $pokidky->get_from_category_Ukr('war_criminal');


$path_to_file = '../counter3.txt'; //будет зависеть от вашего желания и структуры ваших адресов сайта
$counter = @file_get_contents($path_to_file) + 1;
$write = @file_put_contents($path_to_file, $counter);
if ($write) {
    $info = '<br>';
}
echo '<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
<path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
<path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
</svg> : <span style="color:red;">' . $counter . '</span>' . $info;


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="main_styles.css">
</head>

<body>

    <div class="container lg w-100 align-middle">
        <div class='col-9' id='msg'>

            <section class="details-card">
                <div class="container h-100 w-100" id='main'>
                    <div class="row" id='jar'>
                        <?php
                        foreach ($item as $pokidyok) { ?>
                            <div class="col-lg-4 content " id='contant'>

                                <div class="card w-100 h-100 mb-2" id='card'>
                                    <p class="btn btn-card border-2" id='nameBtn'>
                                        <?php echo $_POST['cat'] ?>
                                    </p>

                                    <div class="card-body">
                                        <div class='container' id='picture_dom' style="width:100%; height:200px">
                                            <img class='img-fluid' id='picture' width="" src="App\photos/<?= $pokidyok['photo'] ?>">
                                        </div>

                                        <h5 class="card-title"><?= $pokidyok['surname'] ?> <?= $pokidyok['name'] ?></h5>
                                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                        <form method='post'>
                                            <input type='hidden' name='name' value='<?= $pokidyok['surname'] ?> ' />
                                            <!-- <input type='hidden' name='read' value='read' /> -->
                                            <button type="button" name='read' id='read' class="btn btn-card border-2 " value="<?= $pokidyok['id'] ?>">UKR</button>
                                            <button type="button" name='read_en' id='read_en' class="btn btn-card border-2 " value="<?= $pokidyok['id'] ?>">ENG</button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        <?php } ?>
                    </div>
                </div>

            </section>
        </div>
    </div>






    <script>
        $("[id='nameBtn']").mousemove(function() {
            $(this).css('background-color', 'red');
        })
        $("[id='nameBtn']").mouseout(function() {
            $(this).css('background-color', '#1ABC9C');
        })

        $("[id='read']").mousemove(function() {
            $(this).css('background-color', 'yellow');
            $(this).css('color', 'blue');

            $(this).siblings().css('background-color', '#1655d1');
            $(this).siblings().css('color', 'white');
        })
        $("[id='read']").mouseout(function() {
            $(this).css('background-color', '#1655d1');
            $(this).css('color', 'white');
            $(this).siblings().css('background-color', 'yellow');
            $(this).siblings().css('color', '#1655d1');
        })


        $("[id='read_en']").mousemove(function() {
            $(this).css('background-color', '#1655d1');
            $(this).css('color', 'white');
            $(this).siblings().css('background-color', 'yellow');
            $(this).siblings().css('color', '#1655d1');
        })
        $("[id='read_en']").mouseout(function() {
            $(this).css('background-color', 'yellow');
            $(this).css('color', 'blue');
            $(this).siblings().css('background-color', '#1655d1');
            $(this).siblings().css('color', 'white');
        })

        $("[id='read']").click(function() {
            var id = $(this).val();

            $.ajax({
                type: 'post',
                url: 'App/Templates/Article.php',
                data: {

                    id: id
                },
                success: function(result) {
                    $("#result").load('App/Templates/Article.php'),
                        $('#msg').html(result);

                }
            })

        })


        $("[id='read_en']").click(function() {
            var id = $(this).val();

            $.ajax({
                type: 'post',
                url: 'App/Templates/EngArticle.php',
                data: {

                    id: id
                },
                success: function(result) {
                    $("#result").load('App/Templates/EngArticle.php'),
                        $('#msg').html(result);

                }
            })

        })

        $("[id='searchBtn']").click(function() {
            var surname = $('#search').val();
            var leng = [];
            $(".form-check-input:checked").each(function() {
                leng.push($(this).val());
                element = this;
            })
            // var leng = $("[name='leng']").val();

            if (leng == 1) {
                url = 'App/Templates/Article.php';
            }

            if (leng == 2) {
                url = 'App/Templates/EngArticle.php';
            }


            $.ajax({
                type: 'post',
                url: url,
                data: {
                    by_name: 'by_name',
                    surname: surname
                },
                success: function(result) {
                    $("#result").load(url),
                        $('#msg').html(result);

                }

            })
            return false;
        })

        $('#role').change(function() {
            var cat = $('#role').val();
            var leng = [];
            $(".form-check-input:checked").each(function() {
                leng.push($(this).val());
                element = this;
            })
            if (leng == 1) {
                url = 'App/Templates/CategoryUkr.php';
            }

            if (leng == 2) {
                url = 'App/Templates/CategoryEng.php';
            }

            $.ajax({
                type: 'post',
                url: url,
                data: {
                    cat_name: 'cat_name',
                    cat: cat
                },
                success: function(result) {
                    $("#result").load(url),
                        $('#msg').html(result);

                }

            })
            return false;
        })
    </script>

</body>



</html>