<?php 
date_default_timezone_set('Asia/Kolkata');

class Post {
    //DB 

    public $conn;
    private $table = 'profiles';

    //post properties

    public $idprofiles;
    public $type;
    public $username;
    public $password;
    public $email;
    public $phone;
    public $paymenttype;
    public $status;
    public $deleted;
    public $created;
    public $createdby;
    public $updated;
    public $updatedby;
    private $table1 = 'profile_address';
    public $idprofile_address;
    public $profileid;
    public $address1;
    public $address2;
    public $location;
    public $sublocality;
    public $city;
    public $landmark;
    public $district;
    public $state;
    private $table2 = 'profile_details';
    public $idprofile_detail;
    public $firstname;
    public $lastname;
    public $gender;
    public $age;
   
   

    

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
        idprofiles = :idprofiles,
        type=:type,
        username=:username,
        password=:password,
        email = :email,
        phone = :phone,
        created = :created';


        //Prepare statement

        $stmt = $this->conn->prepare($query);

        //clean data

        $this->idprofiles = htmlspecialchars(strip_tags($this->idprofiles));
        $this->type = htmlspecialchars(strip_tags($this->type));
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->phone = htmlspecialchars(strip_tags($this->phone));
        $this->created = htmlspecialchars(strip_tags($this->created));

        


        //Bind data


        $stmt->bindParam(':idprofiles', $this->idprofiles);
        $stmt->bindParam(':type', $this->type);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':phone', $this->phone);
        $stmt->bindParam(':created', $this->created);
       

       

        //Execute query

        if($stmt->execute()){
           
            return $this->idprofiles;
        }
        echo 'Connection  Error' . $e->getMessage();
        //print error message if it has errors

        printf("Error: %s.\n", $stmt->error);


        return false;
    }

    public function addprofileaddress($lastid,$idprofile_address)
    {
        $query1 = 'INSERT INTO ' . $this->table1 . '
        SET 
        idprofile_address = :idprofile_address,
        profileid = :profileid,
        address1 = :address1,
        address2 = :address2,
        location = :location,
        sublocality = :sublocality,
        landmark = :landmark,
        city = :city,
        district = :district,
        state = :state';

        $stmt = $this->conn->prepare($query1);

        $this->idprofile_address = htmlspecialchars(strip_tags($idprofile_address));
        $this->profileid = htmlspecialchars(strip_tags($lastid));
        $this->address1 = htmlspecialchars(strip_tags($this->address1));
        $this->address2 = htmlspecialchars(strip_tags($this->address2));
        $this->location = htmlspecialchars(strip_tags($this->location));
        $this->sublocality = htmlspecialchars(strip_tags($this->sublocality));
        $this->landmark = htmlspecialchars(strip_tags($this->landmark));
        $this->city = htmlspecialchars(strip_tags($this->city));
        $this->district = htmlspecialchars(strip_tags($this->district));
        $this->state = htmlspecialchars(strip_tags($this->state));
        

        $stmt->bindParam(':idprofile_address', $this->idprofile_address);
        $stmt->bindParam(':profileid', $this->profileid);
        $stmt->bindParam(':address1', $this->address1);
        $stmt->bindParam(':address2', $this->address2);
        $stmt->bindParam(':location', $this->location);
        $stmt->bindParam(':sublocality', $this->sublocality);
        $stmt->bindParam(':landmark', $this->landmark);
        $stmt->bindParam(':city', $this->city);
        $stmt->bindParam(':district', $this->district);
        $stmt->bindParam(':state', $this->state);
        
        if($stmt->execute()){
           
            return true;
        }
        echo 'Connection  Error' . $e->getMessage();
        //print error message if it has errors

        printf("Error: %s.\n", $stmt->error);


        return false;
       

    }
    public function addprofiledetails($lastid,$idprofile_detail)
    {
        $this->idprofile_detail = $idprofile_detail;
        $this->profileid = $lastid; 
       
        $query2 = 'INSERT INTO ' . $this->table2 . '
        SET 
        idprofile_detail = :idprofile_detail,
        profileid = :profileid,
        firstname = :firstname,
        lastname = :lastname,
        gender = :gender,
        age = :age,
        created = :created';

        $stmt = $this->conn->prepare($query2);

        $this->idprofile_detail = htmlspecialchars(strip_tags($idprofile_detail));
        $this->profileid = htmlspecialchars(strip_tags($lastid));
        $this->firstname = htmlspecialchars(strip_tags($this->firstname));
        $this->lastname = htmlspecialchars(strip_tags($this->lastname));
        $this->gender = htmlspecialchars(strip_tags($this->gender));
        $this->created = htmlspecialchars(strip_tags($this->created));
        $this->age = htmlspecialchars(strip_tags($this->age));

        $stmt->bindParam(':idprofile_detail', $this->idprofile_detail);
        $stmt->bindParam(':profileid', $this->profileid);
        $stmt->bindParam(':firstname', $this->firstname);
        $stmt->bindParam(':lastname', $this->lastname);
        $stmt->bindParam(':gender', $this->gender);
        $stmt->bindParam(':created', $this->created);
        $stmt->bindParam(':age', $this->age);
        

        

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
    public function check()
    {
        $query3 = "SELECT * FROM  $this->table WHERE username =:username";
     
        // prepare query statement
        $stmt = $this->conn->prepare($query3);
     
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


}


?>