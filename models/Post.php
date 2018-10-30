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
    public $email;
    public $phone;
    public $created;
    public $deleted;
    public $idservice_request;
    public $deleted_status;
    public $amount;
    public $usermessage;
    public $payment_status;
    public $payment_type;
    public $servicedate;
    public $worker_status;
    public $is_email;
    public $updated;
    public $updatedby;
    public $service_status;
    public $servicetime;
    private $table1 = 'profile_address';
    private $table2 = 'profile_details';
    private $table3 = 'service_requests';

    //constructor

    public function __construct($db)
    {
        $this->conn = $db;
    }


    //Get posts
   
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
		$this->deleted_status = "0";
		$readsinglerequest = 'SELECT *
            FROM 
                service_requests
                WHERE workerid = "'.$this->workerid.'" and deleted_status= "'.$this->deleted_status.'" ';
         
         $stmt = $this->conn->prepare($readsinglerequest);
            // prepare query statement
            $stmt->bindParam(':workerid', $this->workerid);
           
            // bind id of product to be updated
         
            // execute query
           if($stmt->execute())
           {
            return $stmt;
           }
		
		
    }
    public function updateservicerequest()
	{
		$this->updated = date('Y-m-d H:i:s');
        $this->updatedby = $this->workerid;
            // $this->updated = $this->updateservices;
            $updateservicerequest = 'UPDATE ' . $this->table3. '
            SET 
            workerid =:workerid,
            usermessage =:usermessage,
            service_location =:service_location,
            amount =:amount,
            servicedate =:servicedate,
            servicetime =:servicetime,
            service_status =:service_status,
            worker_status =:worker_status,
            is_email =:is_email,
            updated =:updated, 
            updatedby =:updatedby
            WHERE 
            idservice_request =:idservice_request and  workerid =:workerid';
    
            //Prepare statement
    
            $stmt = $this->conn->prepare($updateservicerequest);
    
            //clean data
            $this->idservice_request = htmlspecialchars(strip_tags($this->idservice_request));
            $this->workerid =  htmlspecialchars(strip_tags($this->workerid));
			$this->usermessage = htmlspecialchars(strip_tags($this->usermessage));
            $this->service_location = htmlspecialchars(strip_tags($this->service_location));
            $this->amount = htmlspecialchars(strip_tags($this->amount));
            $this->servicedate = htmlspecialchars(strip_tags($this->servicedate));
            $this->servicetime = htmlspecialchars(strip_tags($this->servicetime));
            $this->service_status = htmlspecialchars(strip_tags($this->service_status));
            $this->worker_status = htmlspecialchars(strip_tags($this->worker_status));
            $this->is_email = htmlspecialchars(strip_tags($this->is_email));
            $this->updated = htmlspecialchars(strip_tags($this->updated));
            $this->updatedby = htmlspecialchars(strip_tags($this->updatedby));
			
            $stmt->bindParam(':idservice_request', $this->idservice_request);
            $stmt->bindParam(':workerid', $this->workerid);
			$stmt->bindParam(':usermessage', $this->usermessage);
            $stmt->bindParam(':service_location', $this->service_location);
            $stmt->bindParam(':amount', $this->amount);
            $stmt->bindParam(':servicedate', $this->servicedate);
            $stmt->bindParam(':servicetime', $this->servicetime);
            $stmt->bindParam(':service_status', $this->service_status);
            $stmt->bindParam(':worker_status', $this->worker_status);
            $stmt->bindParam(':is_email', $this->is_email);
            $stmt->bindParam(':updated', $this->updated);
            $stmt->bindParam(':updatedby', $this->updatedby);
			
			
			 if($stmt->execute()){

              return true;

            }
            echo 'Connection  Error' . $e->getMessage();
            //print error message if it has errors
    
            printf("Error: %s.\n", $stmt->error);
            return false;
		
		
    }
    public function checkworkerpassword()
    {
        $this->type = "W";
        $checkquery = "SELECT * FROM  $this->table WHERE username =:username and password =:password and type=:type";
     
        // prepare query statement
        $stmt = $this->conn->prepare($checkquery);
     
        // bind id of product to be updated
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $this->password);
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
    public function updateworkerpassword()
    {
       
        if($this->newpassword=="$this->retypenewpassword")
        {
            $this->type = "W";
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
    public function addservicerequest()
    {
        $servicequery = 'INSERT INTO ' . $this->table3. '
        SET 
        idservice_request = :idservice_request,
        userid = :userid,
        workerid = :workerid,
        service = :service,
        categoryid = :categoryid,
        usermessage = :usermessage,
        service_location = :service_location,
        payment_type = :payment_type,
        payment_status = :payment_status,
        amount = :amount,
        servicedate = :servicedate,
        servicetime = :servicetime,
        created = :created,
        createdby = :createdby';


        //Prepare statement

        $stmt = $this->conn->prepare($servicequery);

        //clean data
       
        $this->idservice_request = htmlspecialchars(strip_tags($this->idservice_request));
        $this->workerid = htmlspecialchars(strip_tags($this->workerid));
        $this->userid = htmlspecialchars(strip_tags($this->userid));
        $this->service = htmlspecialchars(strip_tags($this->service));
        $this->categoryid = htmlspecialchars(strip_tags($this->categoryid));
        $this->usermessage = htmlspecialchars(strip_tags($this->usermessage));
        $this->service_location = htmlspecialchars(strip_tags($this->service_location));
        $this->payment_type = htmlspecialchars(strip_tags($this->payment_type));
        $this->payment_status = htmlspecialchars(strip_tags($this->payment_status));
        $this->amount = htmlspecialchars(strip_tags($this->amount));
        $this->servicedate = htmlspecialchars(strip_tags($this->servicedate));
        $this->servicetime = htmlspecialchars(strip_tags($this->servicetime));
       
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
        $stmt->bindParam(':workerid', $this->workerid);
        $stmt->bindParam(':service', $this->service);
        $stmt->bindParam(':categoryid', $this->categoryid);
        $stmt->bindParam(':usermessage', $this->usermessage);
        $stmt->bindParam(':service_location', $this->service_location);
        $stmt->bindParam(':payment_type',$this->payment_type);
        $stmt->bindParam(':payment_status',$this->payment_status);
       
        $stmt->bindParam(':amount', $this->amount);
        $stmt->bindParam(':servicedate', $this->servicedate);
        $stmt->bindParam(':servicetime', $this->servicetime);
        
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
    
    public function get_userservicerequest()
    {
        $this->deleted_status=0;
		$readsinglerequest = 'SELECT  servicename,email,phone,payment_type,address1,address2,location,amount,firstname,lastname,username,usermessage,idservice_request,workerid,service_location,servicedate,servicetime,service_status,payment_status,worker_status,is_email  from service_requests   inner join profiles on service_requests.userid=profiles.idprofiles inner join profile_address on service_requests.userid = profile_address.profileid  inner join profile_details on service_requests.userid = profile_details.profileid inner join services on service_requests.service = services.idservices where idservice_request = :idservice_request and deleted_status = :deleted_status';
         
         $stmt = $this->conn->prepare($readsinglerequest);
            // prepare query statement
            $stmt->bindParam(':idservice_request', $this->idservice_request);
            $stmt->bindParam(':deleted_status', $this->deleted_status);
            $this->idservice_request = htmlspecialchars(strip_tags($this->idservice_request));
            $this->deleted_status = htmlspecialchars(strip_tags($this->deleted_status));
           
            // bind id of product to be updated
         
            // execute query
            if($stmt->execute())
            {
            return $stmt;
            }

    }



 
}//class ends


?>