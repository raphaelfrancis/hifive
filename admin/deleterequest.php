<?php 

//headers 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
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


// Delete post

if($post->deleteservicerequest()){
    echo json_encode(array('message' => 'Data Deleted Successfully'));
}else{
    echo json_encode(array('message' => 'Service Not Deleted'));
}