<?php 


class Post {
    //DB 

    public $conn;
    private $table = 'profiles';

    //post properties

    public $idprofiles;
    public $type;
    public $username;
    public $password;
    

    //constructor

    public function __construct($db)
    {
        $this->conn = $db;
    }


    //Get posts
   
    public function login()
    {
        $this->type="U";
        $query = 'SELECT * FROM ' . $this->table . ' WHERE username = :username and password=:password and type=:type';

        //prepare statement

        $stmt = $this->conn->prepare($query);

        //clean data
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->type = htmlspecialchars(strip_tags($this->type));

        //Bind Data
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':type', $this->type);


         //Execute query

         if($stmt->execute())
         {
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
       
    }//login function ends

 
}//class ends


?>