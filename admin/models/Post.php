<?php 
date_default_timezone_set('Asia/Kolkata');

class Post {
    //DB 

    public $conn;
    public $id;
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
    public $currentpassword;
    public $newpassword;
    public $retypenewpassword;
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
    private $table3 = 'worker_categories';
    public $category_id;
    public $idworker_category;
    public $category_created;
    public $categoryid;
    private $table4 = 'worker_locations';
    public $idworker_location;
    public $placeid; 
    private $table5 = 'worker_services';
    public $idprofile;
    public $idworkservice;
    public $serviceid; 
    //public $servicename;
    public $adminusername;
    private $table6 = 'categories';
    public $idcategory;
    public $categoryname;
    public $applicationid="123456";
    public $updatedcategory;
    private $table7 = 'services';
    public $idservices;
    public $servicename;
    public $createdservice;
    public $catid;
    public $table8 = 'service_requests';
    public $idservice_request;
    public $userid;
    public $service;
    public $service_location;
    public $payment_status;
    public $amount;
    public $servicedate;
    //public $created;
    public $usermessage;
    public $service_location_address;
    public $worker_status;
    public $servicetime;
    public $is_email;
    public $workerid;
   
   
    
   


    
   
   

    

    //constructor

    public function __construct($db){
        $this->conn = $db;
    }


    //Get posts

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
        $this->age = htmlspecialchars(strip_tags($this->age));
        $this->created = htmlspecialchars(strip_tags($this->created));
        

        $stmt->bindParam(':idprofile_detail', $this->idprofile_detail);
        $stmt->bindParam(':profileid', $this->profileid);
        $stmt->bindParam(':firstname', $this->firstname);
        $stmt->bindParam(':lastname', $this->lastname);
        $stmt->bindParam(':gender', $this->gender);
        $stmt->bindParam(':age', $this->age);
        $stmt->bindParam(':created', $this->created);
        
        

        

        if($stmt->execute()){
           
            return true;
        }



       
    }

    public function addworkercategory($lastid,$idworker_category)
    {
        $this->idworker_category = $idworker_category;
        $this->profileid = $lastid; 
        

        $query4 = 'INSERT INTO ' . $this->table3 . '
        SET 
        idworker_category =:idworker_category,
        profileid = :profileid,
        categoryid = :categoryid';

        $stmt = $this->conn->prepare($query4);

        $this->idworker_category = htmlspecialchars(strip_tags($idworker_category));
        $this->profileid = htmlspecialchars(strip_tags($this->profileid));
        $this->categoryid = htmlspecialchars(strip_tags($this->categoryid));
        

        $stmt->bindParam(':idworker_category', $this->idworker_category);
        $stmt->bindParam(':profileid', $this->profileid);
        $stmt->bindParam(':categoryid', $this->categoryid);
        
        if($stmt->execute()){
           
            return true;
        }


    }

    public function addworkerlocations($lastid,$idworker_location)
    {
        $this->profileid = $lastid;
        $this->idworker_location = $idworker_location; 
        $query4 = 'INSERT INTO ' . $this->table4 . '
        SET 
        idworker_location =:idworker_location,
        profileid = :profileid,
        placeid = :placeid';

        $stmt = $this->conn->prepare($query4);

        $this->idworker_location = htmlspecialchars(strip_tags($idworker_location));
        $this->profileid = htmlspecialchars(strip_tags($this->profileid));
        $this->placeid = htmlspecialchars(strip_tags($this->placeid));
        

        $stmt->bindParam(':idworker_location', $this->idworker_category);
        $stmt->bindParam(':profileid', $this->profileid);
        $stmt->bindParam(':placeid', $this->placeid);
        
        if($stmt->execute()){
           
            return true;
        }
        
    }

    public function addworkerservices($lastid,$idworker_services)
    {
        $this->idprofile = $lastid;
        $this->idworkservice = $idworker_services; 
        // echo $this->idprofile;
        // echo $this->idworkservice;
        // exit();


        $query5 = 'INSERT INTO ' . $this->table5 . '
        SET 
        idworkservice =:idworkservice,
        idprofile = :idprofile,
        categoryid = :categoryid,
        serviceid = :serviceid,
        servicename = :servicename';

        $stmt = $this->conn->prepare($query5);
        
        $this->idworkservice = htmlspecialchars(strip_tags($this->idworkservice));
        $this->idprofile = htmlspecialchars(strip_tags($this->idprofile));
        $this->categoryid = htmlspecialchars(strip_tags($this->categoryid));
        $this->serviceid = htmlspecialchars(strip_tags($this->serviceid));
        $this->servicename = htmlspecialchars(strip_tags($this->servicename));

        //$this->categoryid = htmlspecialchars(strip_tags($this->categoryid));
        //$this->serviceid = htmlspecialchars(strip_tags($this->serviceid));

        
        $stmt->bindParam(':idworkservice', $this->idworkservice);
        $stmt->bindParam(':idprofile', $this->idprofile);
        $stmt->bindParam(':categoryid', $this->categoryid);
        $stmt->bindParam(':serviceid', $this->serviceid);
        $stmt->bindParam(':servicename', $this->servicename);
        //$stmt->bindParam(':categoryid', $this->categoryid);
        //$stmt->bindParam(':serviceid', $this->serviceid);

        
        if($stmt->execute()){
           
            return true;
        }



    }

    public function delete(){
        //delete query

        $query = 'DELETE FROM ' . $this->table . ' WHERE idprofiles = :idprofiles';

        //prepare statement

        $stmt = $this->conn->prepare($query);

        //clean data
        $this->idprofiles = htmlspecialchars(strip_tags($this->idprofiles));

        //Bind Data
        $stmt->bindParam(':idprofiles', $this->idprofiles);


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
    
        //Update query
        public function update(){
            //Update query
             
            $query = 'UPDATE ' . $this->table . '
            SET 
            username = :username,
            password = :password,
            email = :email,
            phone = :phone,
            updated = :updated 
            WHERE 
            idprofiles = :idprofiles';
    
            //Prepare statement
            
            $stmt = $this->conn->prepare($query);
    
            //clean data
    
            $this->username = htmlspecialchars(strip_tags($this->username));
            $this->password = htmlspecialchars(strip_tags($this->password));
            $this->email = htmlspecialchars(strip_tags($this->email));
            $this->phone = htmlspecialchars(strip_tags($this->phone));
            $this->idprofiles = htmlspecialchars(strip_tags($this->idprofiles));
            $this->updated = htmlspecialchars(strip_tags($this->updated));
    
    
            //Bind data
    
    
            $stmt->bindParam(':username', $this->username);
            $stmt->bindParam(':password', $this->password);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':phone', $this->phone);
            $stmt->bindParam(':idprofiles', $this->idprofiles);
            $stmt->bindParam(':updated', $this->updated);
    
            //Execute query
    
            if($stmt->execute()){
              return $this->idprofiles;
            }
            echo 'Connection  Error' . $e->getMessage();
            //print error message if it has errors
    
            printf("Error: %s.\n", $stmt->error);
    
    
            return false;
        }
        public function updateaddress($result)
        {
            $this->profileid = $result;
            $updatequery = 'UPDATE ' . $this->table1. '
            SET 
            address1 = :address1,
            address2 = :address2,
            location = :location,
            sublocality = :sublocality,
            landmark = :landmark,
            city = :city,
            district = :district,
            state = :state,
            updated = :updated
            WHERE 
            profileid = :profileid';
    
            //Prepare statement
    
            $stmt = $this->conn->prepare($updatequery);
    
            //clean data
    
            $this->address1 = htmlspecialchars(strip_tags($this->address1));
            $this->address2 = htmlspecialchars(strip_tags($this->address2));
            $this->location = htmlspecialchars(strip_tags($this->location));
            $this->sublocality = htmlspecialchars(strip_tags($this->sublocality));
            $this->landmark = htmlspecialchars(strip_tags($this->landmark));
            $this->city = htmlspecialchars(strip_tags($this->city));
            $this->district = htmlspecialchars(strip_tags($this->district));
            $this->state = htmlspecialchars(strip_tags($this->state));
            $this->profileid = htmlspecialchars(strip_tags($this->profileid));
            $this->updated = htmlspecialchars(strip_tags($this->updated));

    
    
            //Bind data
    
    
            $stmt->bindParam(':address1', $this->address1);
            $stmt->bindParam(':address2', $this->address2);
            $stmt->bindParam(':location', $this->location);
            $stmt->bindParam(':sublocality', $this->sublocality);
            $stmt->bindParam(':landmark', $this->landmark);
            $stmt->bindParam(':city', $this->city);
            $stmt->bindParam(':district', $this->district);
            $stmt->bindParam(':state', $this->state);
            $stmt->bindParam(':profileid', $this->profileid);
            $stmt->bindParam(':updated', $this->updated);
    
            //Execute query
    
            if($stmt->execute()){
              return $this->profileid;
                
            }
            echo 'Connection  Error' . $e->getMessage();
            //print error message if it has errors
    
            printf("Error: %s.\n", $stmt->error);
    
    
            return false;


        }
        public function updateprofile($idprofile)
        {

            $this->profileid = $idprofile;
            $updatequery = 'UPDATE ' . $this->table2. '
            SET 
            firstname = :firstname,
            lastname = :lastname,
            gender = :gender,
            age = :age,
            updated = :updated
            WHERE 
            profileid = :profileid';
    
            //Prepare statement
    
            $stmt = $this->conn->prepare($updatequery);
    
            //clean data
    
            $this->firstname = htmlspecialchars(strip_tags($this->firstname));
            $this->lastname = htmlspecialchars(strip_tags($this->lastname));
            $this->gender = htmlspecialchars(strip_tags($this->gender));
            $this->age = htmlspecialchars(strip_tags($this->age));
            $this->updated = htmlspecialchars(strip_tags($this->updated));
            $this->profileid = htmlspecialchars(strip_tags($this->profileid));
           
    
    
            //Bind data
    
    
            $stmt->bindParam(':firstname', $this->firstname);
            $stmt->bindParam(':lastname', $this->lastname);
            $stmt->bindParam(':gender', $this->gender);
            $stmt->bindParam(':age', $this->age);
            $stmt->bindParam(':updated', $this->updated);
            $stmt->bindParam(':profileid', $this->profileid);
    
            //Execute query
    
            if($stmt->execute()){

              return  $stmt;
                
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
        $this->type="A";
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

         if($stmt->execute()){
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
       
    }
    public function read(){
        //Create query
        $query4 = 'SELECT username,password, 
    email,
        phone,address1,address2,location,sublocality,landmark,city,district,state,profileid
    FROM 
        profiles
    INNER  JOIN
        profile_address  ON profiles.idprofiles = profile_address.profileid 
    ORDER BY email DESC';

        // Prepare statement 

        $stmt = $this->conn->prepare($query4);

        //Bind ID 
        
        // $stmt->bindParam(':idprofiles', $this->idprofiles);
        // $stmt->bindParam(':username', $this->username);
        // $stmt->bindParam(':email', $this->email);
        // $stmt->bindParam(':phone', $this->phone);
        // $stmt->bindParam(':idprofile_address', $this->idprofile_address);
        // $stmt->bindParam(':profileid', $this->profileid);
        // $stmt->bindParam(':address1', $this->address1);


        //Execute query
        $stmt->execute();
        
        return $stmt;
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

    public function read_single()
    {
        //Create query
              
            // query to read single record
            $readsinglequery = 'SELECT *
            FROM 
                profiles
            INNER  JOIN
                profile_address  ON profiles.idprofiles = profile_address.profileid INNER JOIN profile_details on profiles.idprofiles =profile_details.profileid
                WHERE idprofiles = "'.$this->id.'" ';
         
         $stmt = $this->conn->prepare($readsinglequery);
            // prepare query statement
            $stmt->bindParam(':profileid', $this->id);
           
            // bind id of product to be updated
         
            // execute query
           if($stmt->execute())
           {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            // set values to object properties
            $this->idprofiles = $row['idprofiles'];
            $this->username = $row['username'];
            $this->password = $row['password'];
            $this->firstname = $row['firstname'];
            $this->lastname = $row['lastname'];
            $this->age = $row['age'];
            $this->email = $row['email'];
            $this->address1 = $row['address1'];
            $this->address2 = $row['address2'];
            $this->phone = $row['phone'];
            $this->gender = $row['gender'];
            $this->location = $row['location'];
            $this->sublocality = $row['sublocality'];
            $this->landmark = $row['landmark'];
            $this->city = $row['city'];
            $this->district = $row['district'];
            $this->state = $row['state'];
            $this->created  = $row["created"];
            $this->status  = $row["status"];
            return true;
           }
            
        
    }

    public function searchuser()
    {
        $username = "$this->username%";
        
        $readsinglequery = 'SELECT *
            FROM 
                profiles
            INNER  JOIN
                profile_address  ON profiles.idprofiles = profile_address.profileid
                INNER JOIN profile_details ON profile_address.profileid = profile_details.profileid
                INNER JOIN worker_categories ON  profile_details.profileid = worker_categories.profileid
                WHERE username LIKE "'.$username.'"';
         
            $stmt = $this->conn->prepare($readsinglequery);
            // prepare query statement
            $stmt->bindParam(':username', $this->username);
           
            // bind id of product to be updated
         
            // execute query
           if($stmt->execute())
           {
            return $stmt;
           }
    }

    public function checkcurrentpassword()
    {
        $this->type = "A";
        $checkquery = "SELECT * FROM  $this->table WHERE username =:username and password =:password and type=:type";
     
        // prepare query statement
        $stmt = $this->conn->prepare($checkquery);
     
        // bind id of product to be updated
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':type', $this->type);
        
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

    public function changeadminpassword()
    {
       
        if($this->newpassword=="$this->retypenewpassword")
        {
            $this->type = "A";
            $this->password = $this->newpassword;
            $updatepassword = 'UPDATE ' . $this->table . '
            SET 
            password = :password
            WHERE 
            username = :username and 
            type = :type';
        }
        $stmt = $this->conn->prepare($updatepassword);
                $stmt->bindParam(':username', $this->username);
                $stmt->bindParam(':password', $this->password);
                $stmt->bindParam(':type', $this->type);
        if($stmt->execute())
        {
            return true;
        }
    }

    public function addcategory()
    { 
        $insertcategory = 'INSERT INTO ' . $this->table6 . '
        SET 
        applicationid = :applicationid,
        idcategory = :idcategory,
        categoryname = :categoryname,
        created = :created';
        $stmt = $this->conn->prepare($insertcategory);
         
         
        //clean data
        $this->applicationid = htmlspecialchars(strip_tags($this->applicationid));
        $this->idcategory = htmlspecialchars(strip_tags($this->idcategory));
        $this->categoryname = htmlspecialchars(strip_tags($this->categoryname));
        $this->created = htmlspecialchars(strip_tags($this->created));

        $stmt->bindParam(':applicationid', $this->applicationid);
        $stmt->bindParam(':idcategory', $this->idcategory);
        $stmt->bindParam(':categoryname', $this->categoryname);
        $stmt->bindParam(':created', $this->created);

        if($stmt->execute()){
           
            return $this->idcategory;
        }
        echo 'Connection  Error' . $e->getMessage();
        //print error message if it has errors

        printf("Error: %s.\n", $stmt->error);


        return false;

    }
    public function readcategory()
    {
       

            //Create query
            $readcategory = 'SELECT * FROM categories';
    
            // Prepare statement 
    
            $stmt = $this->conn->prepare($readcategory);
    
            //Bind ID 
            
            // $stmt->bindParam(':idprofiles', $this->idprofiles);
            // $stmt->bindParam(':username', $this->username);
            // $stmt->bindParam(':email', $this->email);
            // $stmt->bindParam(':phone', $this->phone);
            // $stmt->bindParam(':idprofile_address', $this->idprofile_address);
            // $stmt->bindParam(':profileid', $this->profileid);
            // $stmt->bindParam(':address1', $this->address1);
    
    
            //Execute query
           if($stmt->execute())
            {
            return $stmt;
            }
            error_log("row => " . json_encode($row));
            // Set properties
    
            // if($row){
            //     $this->title = $row['title'];
            //     $this->body = $row['body'];
            //     $this->author = $row['author'];
            //     $this->category_id = $row['category_id'];
            // }
            // else{
            //     return false;
            // }
    }
    
    //Create query
    // query to read single record
    public function read_singlecategory()
    {
        
            $readsinglequery = 'SELECT *
            FROM 
            categories
            WHERE idcategory = "'.$this->id.'" ';
            $stmt = $this->conn->prepare($readsinglequery);
            // prepare query statement
            $stmt->bindParam(':profileid', $this->id);
           
            // bind id of product to be updated
         
            // execute query
           if($stmt->execute())
           {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            // set values to object properties
            $this->idcategory = $row['idcategory'];
            $this->categoryname = $row['categoryname'];
            return true;
           }
    }
    public function updatecategory()
    {
            $this->updatedcategory = date('Y-m-d H:i:s');
            $this->updated = $this->updatedcategory;
            $updatecategory = 'UPDATE ' . $this->table6. '
            SET 
            categoryname = :categoryname,
            updated = :updated 
            WHERE 
            idcategory = :idcategory';
    
            //Prepare statement
    
            $stmt = $this->conn->prepare($updatecategory);
    
            //clean data
    
            $this->categoryname = htmlspecialchars(strip_tags($this->categoryname));
            $this->idcategory = htmlspecialchars(strip_tags($this->idcategory));
            $this->updated = htmlspecialchars(strip_tags($this->updated));

           
    
    
            //Bind data
    
    
            $stmt->bindParam(':categoryname', $this->categoryname);
            $stmt->bindParam(':idcategory', $this->idcategory);
            $stmt->bindParam(':updated', $this->updated);
    
            //Execute query
    
            if($stmt->execute()){

              return  $stmt;
                
            }
            echo 'Connection  Error' . $e->getMessage();
            //print error message if it has errors
    
            printf("Error: %s.\n", $stmt->error);
    
    
            return false;

    }
    public function deletecategory(){
        //delete query
        
        $deletecategory = 'DELETE FROM ' . $this->table6 . ' WHERE idcategory = :idcategory';

        //prepare statement

        $stmt = $this->conn->prepare($deletecategory);

        //clean data
        $this->idcategory = htmlspecialchars(strip_tags($this->idcategory));

        //Bind Data
        $stmt->bindParam(':idcategory', $this->idcategory);


         //Execute query

         if($stmt->execute()){
            return true;
        }
        echo 'Connection  Error' . $e->getMessage();
        //print error message if it has errors

        printf("Error: %s.\n", $stmt->error);


        return false;


    }
    public function addservices()
    {
        $categoryid = $this->catid;
        $insertservice = 'INSERT INTO ' . $this->table7 . '
        SET 
        idservices = :idservices,
        servicename = :servicename,
        categoryid = :categoryid,
        created = :created';
        $stmt = $this->conn->prepare($insertservice);
         
         
        //clean data
        $this->idservices = htmlspecialchars(strip_tags($this->idservices));
        $this->servicename = htmlspecialchars(strip_tags($this->servicename));
        $this->categoryid = htmlspecialchars(strip_tags($this->categoryid));
        $this->created = htmlspecialchars(strip_tags($this->created));

        $stmt->bindParam(':idservices', $this->idservices);
        $stmt->bindParam(':servicename', $this->servicename);
        $stmt->bindParam(':categoryid', $this->categoryid);
        $stmt->bindParam(':created', $this->created);

        if($stmt->execute()){
           
            return true;
        }
        echo 'Connection  Error' . $e->getMessage();
        //print error message if it has errors

        printf("Error: %s.\n", $stmt->error);


        return false;

    }
    public function getservices()
    {
       
        $getservices = 'SELECT idservices,servicename,categoryid,created from ' . $this->table7 . '  where categoryid = "'.$this->categoryid.'"';

        // Prepare statement 

        $stmt = $this->conn->prepare($getservices);
        $this->categoryid = htmlspecialchars(strip_tags($this->categoryid));

        $stmt->bindParam(':categoryid', $this->categoryid);
         
        
        $stmt->execute();
        
        return $stmt;
    }

    public function read_singleservice()
    {
            
            $readsingleservice = 'SELECT *
            FROM 
            services
            WHERE idservices = "'.$this->idservices.'" ';
            $stmt = $this->conn->prepare($readsingleservice);
            // prepare query statement
            $stmt->bindParam(':idservices', $this->idservices);
           
            // bind id of product to be updated
         
            // execute query
           if($stmt->execute())
           {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            // set values to object properties
            $this->idservices = $row['idservices'];
            $this->servicename = $row['servicename'];
            return true;
           }

    }
    public function updateservices()
    {
        $this->updated = date('Y-m-d H:i:s');
        
            // $this->updated = $this->updateservices;
            $updateservices = 'UPDATE ' . $this->table7. '
            SET 
            servicename = :servicename,
            updated = :updated 
            WHERE 
            idservices = :idservices';
    
            //Prepare statement
    
            $stmt = $this->conn->prepare($updateservices);
    
            //clean data
            $this->idservices = htmlspecialchars(strip_tags($this->idservices));
            $this->servicename = htmlspecialchars(strip_tags($this->servicename));
            $this->updated = htmlspecialchars(strip_tags($this->updated));

           
    
    
            //Bind data
    
            $stmt->bindParam(':idservices', $this->idservices);
            $stmt->bindParam(':servicename', $this->servicename);
            $stmt->bindParam(':updated', $this->updated);
    
            //Execute query
             
            if($stmt->execute()){

              return true;

            }
            echo 'Connection  Error' . $e->getMessage();
            //print error message if it has errors
    
            printf("Error: %s.\n", $stmt->error);
            return false;
    }

    public function deleteservices(){
        //delete query
        
        $deleteservices = 'DELETE FROM ' . $this->table7 . ' WHERE idservices = :idservices';

        //prepare statement

        $stmt = $this->conn->prepare($deleteservices);

        //clean data
        $this->idservices = htmlspecialchars(strip_tags($this->idservices));

        //Bind Data
        $stmt->bindParam(':idservices', $this->idservices);


         //Execute query

         if($stmt->execute()){
            return true;
        }
        echo 'Connection  Error' . $e->getMessage();
        //print error message if it has errors

        printf("Error: %s.\n", $stmt->error);


        return false;


    }
    public function checkservices()
    {
        $checkservice = 'SELECT *
        FROM 
        services
        WHERE servicename = "'.$this->servicename.'" ';
        $stmt = $this->conn->prepare($checkservice);
        // prepare query statement
        $stmt->bindParam(':servicename', $this->servicename);
       
        // bind id of product to be updated
        // execute query
       if($stmt->execute())
       {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
       
        // set values to object properties
        $this->idservices = $row['idservices'];
        $this->servicename = $row['servicename'];
        return $this->servicename;
       }

    }
    public function addservicerequest()
    {
        
        
        $servicequery = 'INSERT INTO ' . $this->table8. '
        SET 
        idservice_request = :idservice_request,
        userid = :userid,
        service = :service,
        categoryid = :categoryid,
        usermessage = :usermessage,
        service_location = :service_location,
        payment_status = :payment_status,
        amount = :amount,
        servicedate = :servicedate,
        created = :created,
        createdby = :createdby';


        //Prepare statement

        $stmt = $this->conn->prepare($servicequery);

        //clean data

        $this->idservice_request = htmlspecialchars(strip_tags($this->idservice_request));
        $this->userid = htmlspecialchars(strip_tags($this->userid));
        $this->service = htmlspecialchars(strip_tags($this->service));
        $this->categoryid = htmlspecialchars(strip_tags($this->categoryid));
        $this->usermessage = htmlspecialchars(strip_tags($this->usermessage));
        $this->service_location = htmlspecialchars(strip_tags($this->service_location));
        $this->payment_status = htmlspecialchars(strip_tags($this->payment_status));
        $this->amount = htmlspecialchars(strip_tags($this->amount));
        $this->servicedate = htmlspecialchars(strip_tags($this->servicedate));
        $this->created = htmlspecialchars(strip_tags($this->created));
        $this->createdby = htmlspecialchars(strip_tags($this->createdby));

        // $this->service_location_address = htmlspecialchars(strip_tags($this->service_location_address));
        // $this->payment_type = htmlspecialchars(strip_tags($this->payment_type));
        // $this->amount = htmlspecialchars(strip_tags($this->amount));
        // $this->servicedate = htmlspecialchars(strip_tags($this->servicedate));
        // $this->servicetime = htmlspecialchars(strip_tags($this->servicetime));
        // $this->created = htmlspecialchars(strip_tags($this->created));

        


        //Bind data


        $stmt->bindParam(':idservice_request', $this->idservice_request);
        $stmt->bindParam(':userid', $this->userid);
        $stmt->bindParam(':service', $this->service);
        $stmt->bindParam(':categoryid', $this->categoryid);
        $stmt->bindParam(':usermessage', $this->usermessage);
        $stmt->bindParam(':service_location', $this->service_location);
        $stmt->bindParam(':payment_status',$this->payment_status);
        $stmt->bindParam(':amount', $this->amount);
        $stmt->bindParam(':servicedate', $this->servicedate);
        $stmt->bindParam(':created', $this->created);
        $stmt->bindParam(':createdby', $this->createdby);
        // $stmt->bindParam(':usermessage', $this->usermessage);
        // $stmt->bindParam(':service_location', $this->service_location);
        // $stmt->bindParam(':service_location_address', $this->service_location_address);
        //$stmt->bindParam(':payment_type',$this->payment_type);
        // $stmt->bindParam(':amount', $this->amount);
        // $stmt->bindParam(':servicedate', $this->servicedate);
        // $stmt->bindParam(':servicetime', $this->servicetime);
        // $stmt->bindParam(':created', $this->created);
       

       

        //Execute query

        if($stmt->execute())
        {
           
            return true;
        }
        echo 'Connection  Error' . $e->getMessage();
        //print error message if it has errors

        printf("Error: %s.\n", $stmt->error);


        return false;

    }
    public function readrequest()
    {
        $readservicerequest = "select * from service_requests inner join categories on service_requests.categoryid = categories.idcategory INNER join services on service_requests.service=services.idservices INNER JOIN profiles on service_requests.userid = profiles.idprofiles inner join profile_details on service_requests.userid = profile_details.profileid";
        $stmt = $this->conn->prepare( $readservicerequest);
        if($stmt->execute())
        {
        return $stmt;
        }
        error_log("row => " . json_encode($row));
       
    }
	 public function deleteservicerequest(){
        //delete query
        
        $deleteservices = 'DELETE FROM ' . $this->table8 . ' WHERE idservice_request = :idservice_request';

        //prepare statement

        $stmt = $this->conn->prepare($deleteservices);

        //clean data
        $this->idservice_request = htmlspecialchars(strip_tags($this->idservice_request));

        //Bind Data
        $stmt->bindParam(':idservice_request', $this->idservice_request);


         //Execute query

         if($stmt->execute()){
            return true;
        }
        echo 'Connection  Error' . $e->getMessage();
        //print error message if it has errors

        printf("Error: %s.\n", $stmt->error);


        return false;


    }
	
	public function read_singlerequest()
	{
		
		$readsinglerequest = 'SELECT *
            FROM 
                service_requests
           
                WHERE idservice_request = "'.$this->idservice_request.'" ';
         
         $stmt = $this->conn->prepare($readsinglerequest);
            // prepare query statement
            $stmt->bindParam(':idservice_request', $this->idservice_request);
           
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
	public function updateservicerequest()
	{
		$this->updated = date('Y-m-d H:i:s');
        
            // $this->updated = $this->updateservices;
            $updateservicerequest = 'UPDATE ' . $this->table8. '
            SET 
            workerid = :workerid,
            usermessage = :usermessage,
			service_location = :service_location,
            servicedate = :servicedate,
            worker_status = :worker_status,
            is_email = :is_email,
            updated = :updated 
            WHERE 
            idservice_request = :idservice_request';
    
            //Prepare statement
    
            $stmt = $this->conn->prepare($updateservicerequest);
    
            //clean data
            $this->idservice_request = htmlspecialchars(strip_tags($this->idservice_request));
            $this->workerid =  htmlspecialchars(strip_tags($this->workerid));
			$this->usermessage = htmlspecialchars(strip_tags($this->usermessage));
			$this->service_location = htmlspecialchars(strip_tags($this->service_location));
            $this->servicedate = htmlspecialchars(strip_tags($this->servicedate));
            $this->worker_status = htmlspecialchars(strip_tags($this->worker_status));
            $this->is_email = htmlspecialchars(strip_tags($this->is_email));
			$this->updated = htmlspecialchars(strip_tags($this->updated));
			
            $stmt->bindParam(':idservice_request', $this->idservice_request);
            $stmt->bindParam(':workerid', $this->workerid);
			$stmt->bindParam(':usermessage', $this->usermessage);
			$stmt->bindParam(':service_location', $this->service_location);
            $stmt->bindParam(':servicedate', $this->servicedate);
            $stmt->bindParam(':worker_status', $this->worker_status);
            $stmt->bindParam(':is_email', $this->is_email);
			$stmt->bindParam(':updated', $this->updated);
			
			
			 if($stmt->execute()){

              return true;

            }
            echo 'Connection  Error' . $e->getMessage();
            //print error message if it has errors
    
            printf("Error: %s.\n", $stmt->error);
            return false;
		
		
	}
    public function getworker()
    {
        $selectworker = "select firstname,idprofiles from profiles INNER JOIN profile_details on profiles.idprofiles = profile_details.profileid where type = 'W'";
        $stmt = $this->conn->prepare($selectworker);
        if($stmt->execute())
        {
        return $stmt;
        }
        error_log("row => " . json_encode($row));
       
    }

}


?>