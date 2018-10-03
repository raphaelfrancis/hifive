<?php 
class Post {
    //DB 

    public $conn;
    private $table = 'posts';
   

    //post properties

    public $id;
    public $category_id;
    public $category_name;
    public $title;
    public $body;
    public $author;
    public $created_at;
    public $username;
    public $password;
    private $table1 = 'subproducts';
    public $pid;
    public $subname;


    //constructor

    public function __construct($db){
        $this->conn = $db;
    }


    //Get posts

    public function read(){
        //Create query
        $query = 'SELECT 
               * from posts';

        // Prepare statement 

        $stmt = $this->conn->prepare($query);
        
        //Execute query

        $stmt->execute();
        
        return $stmt;
    }

    function read_single(){
 
        // query to read single record
        $query = "SELECT * FROM  $this->table WHERE id = $this->id";
     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
     
        // bind id of product to be updated
        $stmt->bindParam(1, $this->id);
     
        // execute query
        $stmt->execute();
     
        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        // set values to object properties
        $this->title = $row['title'];
        $this->body = $row['body'];
        $this->author = $row['author'];
        $this->category_id = $row['category_id'];
        
    }
    public function create(){
        //Create query

        $query = 'INSERT INTO ' . $this->table . ' 
        SET 
        title = :title,
        body = :body,
        author = :author,
        category_id = :category_id,
        username=:username,
        password=:password';
       



        //Prepare statement

        $stmt = $this->conn->prepare($query);

        //clean data

        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->body = htmlspecialchars(strip_tags($this->body));
        $this->author = htmlspecialchars(strip_tags($this->author));
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->password = htmlspecialchars(strip_tags($this->password));


        //Bind data


        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':body', $this->body);
        $stmt->bindParam(':author', $this->author);
        $stmt->bindParam(':category_id', $this->category_id);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $this->password);

        //Execute query

        if($stmt->execute()){
            
            $pid = $this->conn->lastInsertId();
            return $pid;
        }
        echo 'Connection  Error' . $e->getMessage();
        //print error message if it has errors

        printf("Error: %s.\n", $stmt->error);


        return false;
    }

    public function addlastid($pid,$subname)
    {
        
        $this->pid = $pid; 
        $this->subname = $subname; 
        $newquery = 'INSERT INTO ' .$this->table1. ' 
        SET 
        subname = :subname,
        pid = :pid';
        $stmt = $this->conn->prepare($newquery);
        $stmt->bindParam(':pid', $this->pid);
        $stmt->bindParam(':subname', $this->subname);
        $this->pid = htmlspecialchars(strip_tags($this->pid));
        $this->subname = htmlspecialchars(strip_tags($this->subname));
        if($stmt->execute()){
            return true;
        }
       
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
        id = :id';

        //Prepare statement

        $stmt = $this->conn->prepare($query);

        //clean data

        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->body = htmlspecialchars(strip_tags($this->body));
        $this->author = htmlspecialchars(strip_tags($this->author));
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));
        $this->id = htmlspecialchars(strip_tags($this->id));


        //Bind data


        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':body', $this->body);
        $stmt->bindParam(':author', $this->author);
        $stmt->bindParam(':category_id', $this->category_id);
        $stmt->bindParam(':id', $this->id);

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

        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

        //prepare statement

        $stmt = $this->conn->prepare($query);

        //clean data
        $this->id = htmlspecialchars(strip_tags($this->id));

        //Bind Data
        $stmt->bindParam(':id', $this->id);


         //Execute query

         if($stmt->execute()){
            return true;
        }
        echo 'Connection  Error' . $e->getMessage();
        //print error message if it has errors

        printf("Error: %s.\n", $stmt->error);


        return false;


    }

    public function readPaging($from_record_num, $records_per_page){
 
        // select query
        $query = "SELECT * from posts";
     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
     
        // bind variable values
        $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);
     
        // execute query
        $stmt->execute();
     
        // return values from database
        return $stmt;
    }
    public function count(){
        $query = "SELECT COUNT(*) as total_rows FROM " . $this->table . "";
     
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        return $row['total_rows'];
    }
    public function login()
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE username = :username and password=:password';

        //prepare statement

        $stmt = $this->conn->prepare($query);

        //clean data
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->password = htmlspecialchars(strip_tags($this->password));

        //Bind Data
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $this->password);


         //Execute query

         if($stmt->execute()){
            $no=$stmt->rowCount();
            if($no>0)
            {
            return $no;
            }
            else
            {
            return false;
            }
        }
        echo 'Connection  Error' . $e->getMessage();
        //print error message if it has errors

        printf("Error: %s.\n", $stmt->error);


        return false;
       
    
    }

    public function check()
    {
        $query = "SELECT * FROM  $this->table WHERE username =:username";
     
        // prepare query statement
        $stmt = $this->conn->prepare($query);
     
        // bind id of product to be updated
        $stmt->bindParam(':username', $this->username);
     
        if($stmt->execute())
        {
            $no = $stmt->rowCount();
            if($no>0)
            {
                return $no;
            }
            else
            {
                return false;
            }
        }
       


    }
}


?>