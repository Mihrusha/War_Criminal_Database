<?php


class Category
{
    public $id;
    public $name;
    public $description;
    public $category_id;
    public function __construct($id = null, $name = null, $description = null, $category_id = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->category_id = $category_id;
    }
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

    function get_all_category_page($conn,$page_num){
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

    // function delete($conn)
    // {
    //     $userid = $conn->quote($_POST["id"]);
    // $sql = "DELETE FROM pokidky WHERE id = $userid";
    // $stmt = $conn->prepare($sql);
    // //$stmt->execute([$userid]);
    // if($conn->query($sql)){
         
    //     header("Location: admin.php");
    // }
    // else{
    //     echo "Ошибка: " . $conn->error;
    // }
    // $conn= null;  
    // }

  
}
