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
$post->idservices = isset($_GET['id']) ? $_GET['id'] : die('could not get the value');

//Get post

if($post->idservices){
    
    
    $result = $post->read_singleservice();
//Create array
    $product_arr = array(
    "idservices"=>$post->idservices,
    "servicename" =>  $post->servicename
    
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


