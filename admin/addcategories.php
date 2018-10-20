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
$post->idcategory = str_shuffle($string); 
$post->created = date("Y-m-d h:i:sa");
$post->categoryname = $data->categoryname;
if($result = $post->addcategory())
{
    if($result)
    {
        echo json_encode(array('message' => 'category Added Successfully'));
        return true;
    }
    else{
        echo json_encode(array('message' => 'Post Not Created'));
        return false;
    }
     
}
else{
    echo json_encode(array('message' => 'Post Not Created'));
    return false;
}
?>