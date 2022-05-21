<?php
 error_reporting(E_ERROR);
include_once './Controlls\UserController.php';
include 'C:\xampp\htdocs\WarCriminalsDatabase\database_connection.php';




$path_to_file = 'counter.txt'; //будет зависеть от вашего желания и структуры ваших адресов сайта

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
    <link rel="stylesheet" href="Views\main_styles.css">
</head>

<body>


    <div class='row'>
        <div class='col-md-2 '>
            <div class='container'>

                <div class='container p-2'>
                    <p>
                        For Work propositions
                        or give materials for site
                        <hr>
                        
                        <hr>
                        email:melkorphp@gmail.com

                    </p>
                </div>

                <div id="donate-button-container">
                    <div id="donate-button"></div>
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
                <div class='container p-2'>Etherium Wallet
                    <input type="text" value='0xf4f42ffdad47d9a08656e21218755f5f1a79b14c'>
                </div>
                <div class='container p-2'>
                    <a href="https://rarible.com/token/0xB66a603f4cFe17e3D27B87a8BfCaD319856518B8:110795776959316314362858015915848074665765050005296289235527530973959672561665?tab=owners">NFT_Token</a>

                </div>

                <div class='container p-2'>
                    <a href="https://myrotvorets.center/">Миротворець.Частину інфи беру звідси</a>
                </div>
            </div>


        </div>


        <div class='col-md-10'>
            <section class="details-card">
                <div class="container">

                    <div class="row">
                        <?php
                        foreach ($pokidky as $pokidyok) { ?>
                            <div class="col-md-3">
                                <div class="card-content">
                                    <p class="btn btn-card border-2"><?php foreach ($category as $row) {
                                                                            if ($row['id'] == $pokidyok['category_id'])
                                                                                echo $row['name'];
                                                                        }  ?></p>
                                    <div class="card-img">
                                        <img class='picture' width="" src="photos/<?= $pokidyok['photo'] ?>">

                                    </div>
                                    <div class="card-desc">
                                        <h3> <?= $pokidyok['surname'] ?><?= $pokidyok['name'] ?></h3>
                                        <!-- <?php $rest = substr("{$pokidyok['description']}", 0, 25) ?>
                                        <?php echo "<p>{$rest}</p>" ?> -->


                                        <form action='new_window.php' method='post'>
                                            <input type='hidden' name='name' value='<?= $pokidyok['surname'] ?> ' />
                                            <!-- <input type='hidden' name='read' value='read' /> -->
                                            <input type="submit" name='read' id='Read' class="btn btn-card border-2" value="READ">

                                        </form>



                                    </div>

                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class='inner'>
                        <?php

                        // $items = new ItemsController();
                        // $items->Read($_POST['read']);
                        // $items->Search_Name($_POST['Search']);

                        // $items->Search_by_Category($_POST['Subject']);

                        // $user = new UserController();
                        // $user->TakeComment($_POST['Comment']);


                        ?>
                    </div>


            </section>
        </div>
        <div class='comtainer justify-content-center m-4'>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <!-- <li class="page-item" <?php if ($start <= 1) {
                                                    echo 'disabled';
                                                } ?>><a class="page-link" href="<?php if ($start >= 1) {
                                                    echo '#';
                                                } else {
                                                    echo "?pagination=" . ($start - 1);
                                                } ?>">Previous</a></li> -->
                    <li class="page-item"><a class="page-link" href="?start=0">1</a></li>
                    <li class="page-item" <?php if ($start >= 1) {
                                                echo 'disabled';
                                            } ?>><a class="page-link" href="<?php if ($start >= 1) {
                                                    echo '#';
                                                } else {
                                                    echo "?start=" . ($start + 1);
                                                } ?>">2</a></li>
                    <a class="page-link" href="<?php if ($start >= 1) {
                                                    echo '#';
                                                } else {
                                                    echo "?start=" . ($start + 2);
                                                } ?>">3</a></li>

                    <!-- <li class="page-item"><a class="page-link" href="?pagination=<?php echo $paginations; ?>">Last</a></li> -->

                </ul>
            </nav>

        </div>






</body>



</html>