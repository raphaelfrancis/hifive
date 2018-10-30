<?php 

//headers 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once './config/Database.php';
include_once './models/Post.php';

//Instantiate DB  & connect 

$database = new Database();
$db = $database->connect();

// Instatiate blog post object

$post = new Post($db);


// Get ID
$post->idservice_request = isset($_GET['id']) ? $_GET['id'] : die('could not get the value');

//Get post

if($result = $post->get_userservicerequest()){
    
   
    
    $post_arr = array();
   
//Create array
while($row = $result->fetch(PDO::FETCH_ASSOC))
{
        $post_item = array(
        'servicename'=>$row["servicename"],
        'email'=>$row["email"],
        'phone'=>$row["phone"],
        'payment_type'=>$row["payment_type"],
        'address1'=>$row["address1"],
        'address2'=>$row["address2"],
        'location'=>$row["location"],
        'amount'=>$row["amount"],
        'firstname'=>$row["firstname"],
        'lastname'=>$row["lastname"],
        'username'=>$row["username"],
        'usermessage' =>$row["usermessage"],
        'idservice_request'=>$row["idservice_request"],
        'workerid'=>$row["workerid"],
        'service_location'=>$row["service_location"],
        'servicedate'=>$row["servicedate"],
        'servicetime'=>$row["servicetime"],
        'service_status'=>$row["service_status"],
        'payment_status'=>$row["payment_status"],
        'amount'=>$row["amount"],
        'worker_status'=>$row["worker_status"],
        'is_email'=>$row["is_email"]);
         array_push($post_arr, $post_item);
}
//Json output

    if(count($row) > 0){
        echo json_encode($post_arr);
        return true;
    }
    else{
        print_r(array("Message" => "No data to display"));
    }
}


?>