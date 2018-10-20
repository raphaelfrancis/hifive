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


$post->categoryname = $data->categoryname;
$post->idcategory = $data->idcategory;
$post->categoryupdated = date("Y-m-d h:i:sa");

// Update post

if($result = $post->updatecategory()){
    
    if($result)
    {
        echo json_encode(array('message' => 'Category Updated Successfully'));
        return true;
    }
    
    
   
}else{
    echo json_encode(array('message' => 'Post Not Updated'));
    return true;
}