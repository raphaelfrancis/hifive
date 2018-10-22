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
$post->workerid = isset($_GET['id']) ? $_GET['id'] : die('could not get the value');
echo $post->workerid;
exit();
//Get post

if($post->read_singlerequest()){
    
    
    $result = $post->read_singlerequest();
//Create array
    $product_arr = array(
    "idservice_request"=>$post->idservice_request,
    "usermessage" =>  $post->usermessage,
	"service_location"=> $post->service_location,
	"service_status"=> $post->service_status,
    "servicedate"=>$post->servicedate,
    "worker_status"=>$post->worker_status,
    "is_email"=>$post->is_email,
    
);
//Json output

    if(count($product_arr) > 0){
        echo json_encode($product_arr);
        return true;
    }
    else{
        print_r(array("Message" => "No data to display"));
    }
}


