<?php 

//headers 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Methods, Authorization, X-Requested-With');

include_once './config/Database.php';
include_once './models/Post.php';

//Instantiate DB  & connect 

$database = new Database();
$db = $database->connect();


// Instatiate blog post object

$post = new Post($db);

$data = json_decode(file_get_contents("php://input"));

$post->idservice_request = $data->idservice_request;
$post->workerid = $data->workerid;
$post->amount = $data->amount;
$post->servicedate = $data->servicedate;
$post->servicetime = $data->servicetime;
$post->service_status = $data->service_status;
$post->service_location = $data->service_location;
$post->usermessage = $data->usermessage;
$post->worker_status = $data->worker_status;
$post->is_email = $data->is_email;

// Update post

if($result = $post->updateservicerequest()){
    
    if($result=="1")
    {
        echo json_encode(array('message' => 'service request updated successfully'));
        return true;
    }
    
}else{
    echo json_encode(array('message' => 'Failed to  update Service Request'));
    return true;
}