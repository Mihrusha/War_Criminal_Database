<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<table class="table table-bordered shadow">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
    <tbody>
        <?php
        $i = 0;
        
        foreach ($data['items'] as $item) 
        {
            $i++;

            echo "<tr>";
            echo'<td><?= $i ?></td>';
         
            echo "<td>$item->name</td>";
            echo "</tr>";

        } ?>
    </tbody>
</table>
</body>

</html>