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
    public $userid;
    public $workerid;

    //constructor

    public function __construct($db)
    {
        $this->conn = $db;
    }


    //Get posts
   
    public function login()
    {
        $this->type="W";
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
            return $stmt;
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

    public function read_singlerequest()
	{
		
		$readsinglerequest = 'SELECT *
            FROM 
                service_requests
           
                WHERE userid = "'.$this->workerid.'" ';
         
         $stmt = $this->conn->prepare($readsinglerequest);
            // prepare query statement
            $stmt->bindParam(':userid', $this->userid);
           
            // bind id of product to be updated
         
            // execute query
           if($stmt->execute())
           {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            // set values to object properties
            $this->idservice_request = $row['idservice_request'];
            $this->usermessage = $row['usermessage'];
            $this->service_location = $row['service_location'];
            $this->service_status = $row['service_status'];
            $this->servicedate = $row['servicedate'];
            $this->worker_status = $row['worker_status'];
            $this->is_email = $row['is_email'];
            return true;
           }
		
		
	}

 
}//class ends


?>