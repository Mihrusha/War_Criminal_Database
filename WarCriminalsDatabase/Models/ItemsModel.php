<?php


class Item
{
    public $id;
    public $name;
    public $description;
    public $category_id;
    public $start;
    public $perPage;
    public $page_counter;
    public $next;
    public $previous;
    public $paginations;
    public $page_first_result;
    public  $pagLink = "";  


    public function __construct($id = null, $name = null, $description = null, $category_id = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->category_id = $category_id;
    }
    function get_all_pokidky($conn)
    {



        $sql = "SELECT*FROM pokidky ORDER by id ASC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $pokidky = $stmt->fetchAll();
        } else {
            $pokidky = 0;
        }

        return $pokidky;
    }


    function pugination($conn)
    {
        $this->start = 1;
        $this->perPage = 8;
        $this->page_counter = 1;
        $this->next = $this->page_counter + 1;
        $this->previous = $this->page_counter - 1;
       

        if (isset($_GET['start'])) {
            $this->start = $_GET['start'];
            //$this->offset = $this->start* $this->perPage = 8;
            //  $this->page_counter =  $_GET['start'];
             $this->page_first_result = $this->start * $this->perPage;
            // $this->next = $this->page_counter + 1;
            // $this->previous = $this->page_counter - 1;
        }
        else {
            $this->start = 1;
        }

        $count_query = "SELECT * FROM pokidky ORDER by id ASC";
        $query = $conn->prepare($count_query);
        $query->execute();
        $count = $query->rowCount();
        // calculate the pagination number by dividing total number of rows with per page.
        $this->paginations = ceil($count / $this->perPage);
        return  $this->paginations;
    }

    function get_all_pokidky_pagination($conn)
    {
       $this->pugination($conn);

        $sql = "SELECT * FROM pokidky ORDER by id ASC LIMIT $this->start, $this->perPage";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $pokidky = $stmt->fetchAll();
        } else {
            $pokidky = 0;
        }
        
        return $pokidky;
    }

    function get_one($conn)
    {
        $name = $conn->quote($_POST["name"]);
        $sql = "SELECT name, description, photo FROM pokidky WHERE name=$name";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $item = $stmt->fetchAll();
        } else {
            $item = 0;
        }

        return $item;

        //return $row['description'] . "\t";

        $conn = null;
    }

    function get_one_new($conn,$method)
    {
        $name = $conn->quote($method);
        $sql = "SELECT name, description, photo FROM pokidky WHERE name=$name";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $item = $stmt->fetchAll();
        } else {
            $item = 0;
        }

        return $item;

        //return $row['description'] . "\t";

        $conn = null;
    }


    function get_from_category($conn,$method)
    {
        $name = $conn->quote($method);
        $sql = "SELECT pokidky.name,pokidky.photo,pokidky.description FROM pokidky,category WHERE pokidky.category_id=category.id AND category.name=$name";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $item = $stmt->fetchAll();
        } else {
            $item = 0;
        }

        return $item;

        //return $row['description'] . "\t";

        $conn = null;
    }

    function delete($conn)
    {
        $userid = $conn->quote($_POST["id"]);
        $sql = "DELETE FROM pokidky WHERE id = $userid";
        $stmt = $conn->prepare($sql);
        $stmt->execute();


        $conn = null;
    }

    function Add($conn)
    {
        if ($_POST["name"] != null) {
            $name = $conn->quote($_POST["name"]);
            $photo = $conn->quote($_POST["photo"]);
            $description = $conn->quote($_POST["description"]);
            $category_id = $conn->quote($_POST["category_id"]);
            $sql = "INSERT INTO pokidky (name, description, category_id,photo) VALUES ($name, $description, $category_id,$photo)";
            $stmt = $conn->prepare($sql);
            if ($sql != null) {
                $stmt->execute();
            }


            $conn = null;
        }
    }

    function Edit($conn)
    {

        $name = $conn->quote($_POST["name"]);
        $photo = $conn->quote($_POST["photo"]);
        $description = $conn->quote($_POST["description"]);
        $category_id = $conn->quote($_POST["category_id"]);
        $sql = "UPDATE  pokidky SET pokidky.name=$name, pokidky.description=$description, pokidky.category_id=$category_id,
        pokidky.photo=$photo 
        WHERE pokidky.name like $name";
        $stmt = $conn->prepare($sql);
        $stmt->execute();


        $conn = null;
    }
}
