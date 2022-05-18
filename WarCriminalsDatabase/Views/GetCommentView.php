<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <?php

    foreach ($massages as $elem) { ?>

        <div class="row d-flex justify-content-center mt-100 mb-100">
            <div class="col-lg-6">
                <div class="card">
                   
                    <div class="comment-widgets">
                        <!-- Comment Row -->

                        <div class="d-flex flex-row comment-row">
                            <div class="p-2"><img src="/WarCriminalsDatabase/photos\<?= $elem['avatar'] ?>" alt="user" width="90" class="rounded-circle"></div>
                            <div class="comment-text w-100">
                                <h6 class="font-medium"><?= $elem['name'] ?></h6> <span class="m-b-15 d-block"><?= $elem['massage'] ?></span>
                                <div class="comment-footer"> 
                                    <span class="text-muted float-right"><hr><h6>Topic::</h6><?= $elem['pok_name'] ?></span>
                                     <!-- <button type="button" class="btn btn-cyan btn-sm">Edit</button>
                                      <button type="button" class="btn btn-success btn-sm">Publish</button> 
                                      <button type="button" class="btn btn-danger btn-sm">Delete</button> -->
                                     </div>
                            </div>
                        </div>
                    </div> <!-- Card -->
                </div>
            </div>
        </div>




    <?php } ?>
</body>

</html>