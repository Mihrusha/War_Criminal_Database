<?php

use App\Models\Pokidky;

include_once "C:/xampp/htdocs/WarCriminalsDatabase/vendor/autoload.php";
$pokidky = new Pokidky;

if (isset($_POST['cat'])) {
    $item = $pokidky->get_from_category_Ukr($_POST['cat']);
}
// $item = $pokidky->get_from_category_Ukr('war_criminal');




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="App\Templates\main.css?v=10">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="main_styles.css">
</head>

<body>

    
           
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