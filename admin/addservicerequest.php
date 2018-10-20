<?php 

//headers 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Methods, Authorization, X-Requested-With');

include_once './config/Database.php';
include_once './models/Post.php';
date_default_timezone_set('Asia/Kolkata');
//Instantiate DB  & connect 

$database = new Database();
$db = $database->connect();


// Instatiate blog post object

$post = new Post($db);
$data = json_decode(file_get_contents("php://input"));
$string = "0123456789";
$post->idservice_request = str_shuffle($string);
$post->userid = $data->userid; 
$post->service = $data->service;
$post->service_location = $data->service_location;
$post->payment_status = "1";
$post->amount = $data->amount;
$post->servicedate = $data->servicedate;
$post->categoryid = $data->categoryid;
$post->usermessage = $data->usermessage;
//$post->created = $data->created;
$post->createdby = $data->createdby;


//$post->type = $data->type;




if($lastid = $post->addservicerequest())
{
   
    echo json_encode(array('message' => 'Inserted Successfully'));
}
else{
    echo json_encode(array('message' => 'Post Not Created'));
}
?>