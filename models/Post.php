<?php 


class Post {
    //DB 

    public $conn;
    private $table = 'categories';

    //post properties

    public $idcategory;
    public $applicationid;
    public $categoryname;
    public $othercategory;
    public $parentcategory;
    public $type;
    public $status;
    public $created;
    public $createdby;
    public $update;
    public $updatedby;
    

    //constructor

    public function __construct($db){
        $this->conn = $db;
    }


    //Get posts

    public function read(){
        //Create query
        $query = 'SELECT 
                    c.name as category_name,
                    p.idpost,
                    p.category_id,
                    p.title,
                    p.body,
                    p.author,
                    p.created_at
                FROM 
                    '. $this->table .' p
                LEFT  JOIN
                    categories c ON p.category_id = c.id 
                ORDER BY
                p.created_at DESC';

        // Prepare statement 

        $stmt = $this->conn->prepare($query);
        
        //Execute query

        $stmt->execute();
        
        return $stmt;
    }

    public function read_single(){
        //Create query
        $query = 'SELECT 
                    c.name as category_name,
                    p.idpost,
                    p.category_id,
                    p.title,
                    p.body,
                    p.author,
                    p.created_at
                FROM 
                    '. $this->table .' p
                LEFT  JOIN
                    categories c ON p.category_id = c.id 
                WHERE 
                    p.idpost  = ?
                LIMIT 0, 1';

        // Prepare statement 

        $stmt = $this->conn->prepare($query);

        //Bind ID 
        
        $stmt->bindParam(4, $this->idpost);

        //Execute query
        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);


        error_log("row => " . json_encode($row));
        // Set properties

        if($row){
            $this->title = $row['title'];
            $this->body = $row['body'];
            $this->author = $row['author'];
            $this->category_id = $row['category_id'];
        }
        else{
            return false;
        }

       
    }


    public function create(){
        //Create query

        $query = 'INSERT INTO ' . $this->table . '
        SET 
        idcategory = :idcategory,
        applicationid = :applicationid,
        categoryname = :categoryname';


        //Prepare statement

        $stmt = $this->conn->prepare($query);

        //clean data

        $this->idcategory = htmlspecialchars(strip_tags($this->idcategory));
        $this->applicationid = htmlspecialchars(strip_tags($this->applicationid));
        $this->categoryname = htmlspecialchars(strip_tags($this->categoryname));
        


        //Bind data


        $stmt->bindParam(':idcategory', $this->idcategory);
        $stmt->bindParam(':applicationid', $this->applicationid);
        $stmt->bindParam(':categoryname', $this->categoryname);
       

        //Execute query

        if($stmt->execute()){
            return true;
        }
        echo 'Connection  Error' . $e->getMessage();
        //print error message if it has errors

        printf("Error: %s.\n", $stmt->error);


        return false;
    }

    //Update post
    public function update(){
        //Update query

        $query = 'UPDATE ' . $this->table . '
        SET 
        title = :title,
        body = :body,
        author = :author,
        category_id = :category_id 
        WHERE 
        idpost = :idpost';

        //Prepare statement

        $stmt = $this->conn->prepare($query);

        //clean data

        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->body = htmlspecialchars(strip_tags($this->body));
        $this->author = htmlspecialchars(strip_tags($this->author));
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));
        $this->idpost = htmlspecialchars(strip_tags($this->idpost));


        //Bind data


        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':body', $this->body);
        $stmt->bindParam(':author', $this->author);
        $stmt->bindParam(':category_id', $this->category_id);
        $stmt->bindParam(':idpost', $this->idpost);

        //Execute query

        if($stmt->execute()){
            return true;
        }
        echo 'Connection  Error' . $e->getMessage();
        //print error message if it has errors

        printf("Error: %s.\n", $stmt->error);


        return false;
    }


    //Delete Post

    public function delete(){
        //delete query

        $query = 'DELETE FROM ' . $this->table . ' WHERE idpost = :idpost';

        //prepare statement

        $stmt = $this->conn->prepare($query);

        //clean data
        $this->idpost = htmlspecialchars(strip_tags($this->idpost));

        //Bind Data
        $stmt->bindParam(':idpost', $this->idpost);


         //Execute query

         if($stmt->execute()){
            return true;
        }
        echo 'Connection  Error' . $e->getMessage();
        //print error message if it has errors

        printf("Error: %s.\n", $stmt->error);


        return false;


    }
}


?>