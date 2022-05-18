


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mrazi Database</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
    crossorigin="anonymous"></script>

    <link rel="stylesheet" href="Views\styles.css">
</head>



<body>
    <h1>Pokidky Database</h1>


    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <a class="navbar-brand" href="admin.php">Admin</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php"><h5>Home</h5></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="log_out.php"><h5>LogOut</h5></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Views\Add_ItemView.php"><h5>Add Pokydyok</h5></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="delete_comments.php"><h5>Comments</h5></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="edit_users.php"><h5>Edit Users</h5></a>
                        </li>

                        <li>
                            <form class="d-flex">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-success" type="submit">Search</button>
                            </form>
                        </li>
                    </ul>
                </div>

        </nav>
        <?php

        $i = 0;
        if ($pokidky == 0) { ?>
            empty
        <?php
             } else 

             { ?>

                    <h4>All Mrazi</h4>
                <table class="table table-bordered shadow  table-hover ">
                    <thead class="thead-dark">
                        <tr class='table-primary'>
                            <th scope="col">#</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Category</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                         <tbody>
                          <?php
                          
                                foreach ($pokidky as $pokidyok)
                                    {
                                        $i++;
                                        ?>
                                        <tr class =''>
                                            <td class='Number_col'>
                                                <?= $i ?>
                                            </td>
                                            <td class='Photo_col'>
                                            <img width="100" src="photos/<?= $pokidyok['photo'] ?>">
                                            </td>

                                             <td>
                                                <?= $pokidyok['name'] ?>
                                            </td>

                                             <td>
                                                 
                                                <p class='Descr_col'><?= $pokidyok['description'] ?></p> 
                                            </td>

                                            <td class='Category_col'>
                                                 <?php 
                                                         foreach($category as $row)
                                                         {
                                                             if($row['id']==$pokidyok['category_id'])
                                                             echo $row['name'] ;
                                                         }   
                                                        //echo $pokidyok['id'];
                                                                  
                                                ?>
                                            </td>

                                            <td class='Action_col'>
                                                
                                                <form action='' method='post'>
                                                <input type='hidden' name='id' value='<?= $pokidyok['id'] ?> ' />
                                                <input type="submit" class="btn btn-outline-danger border-2" value="Delete">
                                                <input type='hidden' name='id' value='<?= $pokidyok['id'] ?>'/>
                                                <a class="btn btn-outline-success border-2" id='Edit' href="Views\Edit_ItemView.php">Edit</a>
                                                </form>

                                                
                                                
                                                 
                                                    
                                            </td>

                                        </tr>
                              <?php } ?>     
                    
                        </tbody>
                </table>
        <?php } ?>


        
    </div>

</body>

</html>