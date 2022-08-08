<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="App\Templates\main.css?v=1">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/6d3c048c3c.js"></script>
    <title>Pokidky Database</title>
</head>

<header>
    <div class="container lg w-100 align-middle">
        <nav class="navbar navbar-light bg-light justify-content-between">


            <a class="navbar-brand" href="index.php">Home</a>

            <a class="navbar-brand" href="App\View\Login.php">Login</a>

            <form class="form">


                <div class='row'>

                    <div class='col'>
                        <select class="form-select" aria-label="Default select example" id="role" name='role'>
                            <option selected value="no">Set Category</option>
                            <option value="War criminals">War criminals</option>
                            <option value="Collaborants">Collaborants</option>
                            <option value="Public Persons">Public Persons</option>
                        </select>
                    </div>
                    <div class='col'>
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" name='search' id='search' aria-label="Search">
                    </div>
                    <div class='col'>
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="searchBtn" name='searchBtn'>Search</button>
                    </div>
                    <div class='col'>
                        <div class='form-group'>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="leng" id="leng" value="1">
                                <label class="form-check-label" for="">UKR</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="leng" id="leng" value="2">
                                <label class="form-check-label" for="">ENG</label>
                            </div>
                        </div>
                    </div>


                </div>
            </form>
        </nav>

    </div>

</header>

<body>

    <div class='row'>
        <div class='col-2'>
            <div class='container '>
                <div id="donate-button-container ">
                    <div class="container p-3" id="donate-button">
                        <script src="https://www.paypalobjects.com/donate/sdk/donate-sdk.js" charset="UTF-8"></script>
                        <script>
                            PayPal.Donation.Button({
                                env: 'production',
                                hosted_button_id: 'NLEX7GM2GMNZC',
                                image: {
                                    src: 'https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif',
                                    alt: 'Donate with PayPal button',
                                    title: 'PayPal - The safer, easier way to pay online!',
                                }
                            }).render('#donate-button');
                        </script>
                    </div>
                </div>
                <div class='container p-3'>Etherium Wallet
                    <input type="text" value='0xf4f42ffdad47d9a08656e21218755f5f1a79b14c'>
                </div>
                <div class='container p-3'>
                    <a href="https://rarible.com/token/0xB66a603f4cFe17e3D27B87a8BfCaD319856518B8:110795776959316314362858015915848074665765050005296289235527530973959672561665?tab=owners">NFT_Token</a>
                </div>
                <div class='container p-3'>
                    <a href="https://myrotvorets.center/">Миротворець.Частину інфи беру звідси</a>
                </div>
            </div>
        </div>

        <div class='col-md-10' id='msg'>
            <section class="details-card">
                <div class="container">
                    <div class="row" id='jar'>
                        <?php
                        foreach ($data as $pokidyok) { ?>
                            <div class="col-md-3 content">
                                <div class="card-content">
                                    <p class="btn btn-card border-2" id='nameBtn'>
                                        <?php foreach ($category as $row) {
                                            if ($row['id'] == $pokidyok['category_id'])
                                                echo $row['name'];
                                        }  ?>
                                    </p>


                                    <div class="card-img">
                                        <img class='picture' width="" src="App\photos/<?= $pokidyok['photo'] ?>">

                                    </div>
                                    <div class="card-desc">
                                        <h3> <?= $pokidyok['surname'] ?> <?= $pokidyok['name'] ?></h3>
                                        <!-- <?php $rest = substr("{$pokidyok['description']}", 0, 25) ?>
                                        <?php echo "<p>{$rest}</p>" ?> -->
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

            </section>
        </div>
    </div>

    <p id='result'></p>


    <footer>
        <div class="container">
            <footer class="py-3 my-4">
                <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                    <li class="nav-item"><a href="index.php" class="nav-link px-2 text-muted">Home</a></li>
                </ul>
                <p class="text-center text-muted">
                    For Work propositions
                    or give materials for site
                </p>
                <p class="text-center text-muted"> email:melkorphp@gmail.com</p>
                <hr>
            </footer>
        </div>

    </footer>

    <div class="fixed-bottom  w-75 mx-auto">
        <div class="navbar-inner">
            <div class="container m-2">
                <div class="pagination"></div>
            </div>
        </div>
    </div>





    <script src="App\Templates\pagination.js"></script>
    <script>
        $("[id='nameBtn']").mousemove(function() {
            $(this).css('background-color', 'red');
        })
        $("[id='nameBtn']").mouseout(function() {
            $(this).css('background-color', '#1ABC9C');
        })

        $("[id='read']").mousemove(function() {
            $(this).css('background-color', 'yellow');
        })
        $("[id='read']").mouseout(function() {
            $(this).css('background-color', '#1655d1');
        })


        $("[id='read_en']").mousemove(function() {
            $(this).css('background-color', 'black');
            $(this).css('color', 'white');
        })
        $("[id='read_en']").mouseout(function() {
            $(this).css('background-color', 'red');
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
                url = 'App/Templates/EngArticle.php';
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