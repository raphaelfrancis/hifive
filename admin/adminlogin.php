<?php 

//headers 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Methods, Authorization, X-Requested-With');

include_once './config/Database.php';
include_once './models/Post.php';

//Instantiate DB  & connect 

$database = new Database();
$db = $database->connect();


// Instatiate blog post object

$post = new Post($db);

$data = json_decode(file_get_contents("php://input"));


$post->username = $data->username;
$post->password = md5($data->password);
//echo json_encode(array('username' => '$post->username',"password"=>$post->password));
// //return true;

// Create post

if($qu=$post->login()){
   
    if($qu=="1")
    {
        echo json_encode(array('message' => 'success',"username"=>$post->username));
        return false;
    }
    else
    {
        echo json_encode(array('message' => '$qu'));
        return true;
    }
}else{
    echo json_encode(array('message' => 'Failed'));
    return true;
}