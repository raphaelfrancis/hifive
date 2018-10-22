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
$post->userid = $data->userid;
$post->workerid = $data->workerid;
$post->servicedate = $data->servicedate;
$post->service_location = $data->service_location;
$post->usermessage = $data->usermessage;
$post->worker_status = $data->worker_status;

// Update post

if($result = $post->updateservicerequest()){
    
    if($result)
    {
        echo json_encode(array('message' => 'service request updated successfully'));
        return true;
    }
    
}else{
    echo json_encode(array('message' => 'Failed to  update Service Request'));
    return true;
}