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
$post->userid = isset($_GET['id']) ? $_GET['id'] : die('could not get the value');

//Get post

if($post->$result = $post->readuserbyworker()){
    
    
    
//Create array
    $product_arr = array(
    "idprofiles"=>$post->idprofiles,
    "phone"=>$post->phone,
    "address1"=>$post->address1,
    "address2" => $post->address2,
	"location"=> $post->location,
	"sublocality"=> $post->sublocality,
    "landmark"=>$post->landmark,
    "city"=>$post->city,
    "district"=>$post->district,
    "state"=>$post->state,
    "firstname"=>$post->firstname,
    "lastname"=>$post->lastname
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


?>