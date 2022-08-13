<?php
error_reporting(E_ERROR );
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="App\Templates\main.css?v=18">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/6d3c048c3c.js"></script>
    <title>Pokidky Database</title>
</head>

<header>


    <nav class="navbar navbar-expand-sm navbar-light " id='shapka'>
        <div class="container-fluid">
            <?php
            $path_to_file = '../counter.txt'; //будет зависеть от вашего желания и структуры ваших адресов сайта
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
            <div class='d-flex '>
                <h1> <i class="fa-solid fa-p" id='Kitty'></i>okidky Database</i></h1>

            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto" style='margin-left:20px; margin-top:10px'>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">
                            <h3>Home</h3>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="App\View\UserLogin.php">
                            <h3>Login</h3>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="App\View\UserOut.php">
                            <h3>LogOut</h3>
                        </a>
                    </li>



                    <li class="nav-item ">
                        <div class='form-group mt-2' style="min-width:150px">
                            <select class="form-select" aria-label="Default select example" id="role" name='role'>
                                <option selected value="no">Set Category</option>
                                <option value="War Criminal">War criminals</option>
                                <option value="Collaborant">Collaborants</option>
                                <option value="Public Person">Public Persons</option>
                            </select>
                        </div>
                    </li>
                </ul>

                <?php if (isset($_GET['username'])) { ?>
                    <div>
                        <!-- <?= addslashes(htmlspecialchars($_GET['username'])); ?> -->You are Logged
                    </div>
                <?php } ?>
                <div class='form-check' style="margin-right:20px">
                    <div class="form-check ">
                        <input class="form-check-input" type="radio" name="leng" id="leng" value="1">
                        <label class="form-check-label" for="">UKR</label>
                    </div>
                    <div class="form-check ">
                        <input class="form-check-input" type="radio" name="leng" id="leng" value="2">
                        <label class="form-check-label" for="">ENG</label>
                    </div>
                </div>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" name='search' id='search' aria-label="Search">
                    <button class="btn btn-success" type="submit" id="searchBtn" name='searchBtn'>Search</button>
                </form>
            </div>
        </div>
    </nav>

</header>

<body class='bg-light'>

    <div class='row'>

        <div class="d-flex flex-column flex-shrink-0 p-3 " style="width: 280px;" id='side'>

            <ul class="nav nav-pills flex-column mb-auto ">

                <li>
                    <div id="donate-button-container align-middle">
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
                </li>
                <li>
                    <div class='container m-2 align-middle'>
                        <a href="https://rarible.com/token/0xB66a603f4cFe17e3D27B87a8BfCaD319856518B8:110795776959316314362858015915848074665765050005296289235527530973959672561665?tab=owners" class='btn btn-success'>NFT_Token</a>
                    </div>
                </li>
                <li>
                    <div class='container m-2 align-middle'>
                        <a href="https://myrotvorets.center/" class='btn btn-success'>Миротворець</a>
                    </div>
                </li>
                <li>
                    <div class='container m-2 align-middle'>Etherium Wallet
                        <input type="text" value='0xf4f42ffdad47d9a08656e21218755f5f1a79b14c'>
                    </div>
                </li>
            </ul>

        </div>

        <div class='col-9 bg-light mt-2' id='msg'>
            <div class="container h-100 w-100 " id='main'>
                <div class="row" id='jar'>
                    <?php
                    foreach ($data as $pokidyok) { ?>
                        <div class="col-lg-4 content " id='contant'>

                            <div class="card w-100 h-100 mb-2" id='card'>

                                <p class="btn btn-card border-2" id='nameBtn'>
                                    <?php foreach ($category as $row) {
                                        if ($row['id'] == $pokidyok['category_id'])
                                            echo $row['name'];
                                    }  ?>
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

    <div class="fixed-bottom  w-75 mx-auto" id="pag_menu">
        <div class="navbar-inner">
            <div class="container m-2">
                <div class="pagination"></div>
            </div>
        </div>
    </div>



    <script src="App\Templates\pagination.js"></script>
    <script>
        $('#Kitty').click(function() {
            location.href = 'App/View/Login.php';
        })

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
            $('#pag_menu').css('display', 'none');
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
            $('#pag_menu').css('display', 'none');
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
            if (leng < 1) {
                alert('Please choose lenguage')
            }


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
            alert(cat);
            if (cat == 'no') {
                location.href = 'index.php';
            }
            var leng = [];
            $(".form-check-input:checked").each(function() {
                leng.push($(this).val());
                element = this;
            })
            // if (leng == 1) {
            url = 'App/Templates/CategoryUkr.php';
            // }

            // if (leng == 2) {
            //     url = 'App/Templates/CategoryEng.php';
            // }

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