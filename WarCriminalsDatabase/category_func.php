<?php



// Get All categories
function get_all_category($conn){
    $sql="SELECT*FROM category ORDER by id DESC";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
if ($stmt->rowCount()>0){
    $category=$stmt->fetchAll();
}else {
    $category=0;
}
return $category;
}
