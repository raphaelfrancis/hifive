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
$post->id = isset($_GET['id']) ? $_GET['id'] : die('could not get the value');

//Get post

if($post->id){
    
    
    $result = $post->read_single();
//Create array

    $product_arr = array(
    "idprofiles"=>$post->idprofiles,
    "username" =>  $post->username,
    "password"=> $post->password,
    "email"=>$post->email,
    "firstname"=>$post->firstname,
    "lastname"=>$post->lastname,
    "age"=>$post->age,
    "gender"=>$post->gender,
    "address1"=>$post->address1,
    "address2"=>$post->address2,
    "phone"=>$post->phone,
    "sublocality"=>$post->sublocality,
    "location"=>$post->location,
    "landmark"=>$post->landmark,
    "district"=>$post->district,
    "state"=>$post->state,
    "city"=>$post->city,
    "status"=>$post->status,
    "created"=>$post->created
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


