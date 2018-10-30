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


$post->username = $data->username;
$post->password = md5($data->password);
$post->firstname = $data->firstname;
$post->lastname = $data->lastname;
$post->gender = $data->gender;
$post->email = $data->email;
$post->phone = $data->phone;
$post->address1 = $data->address1;
$post->address2 = $data->address2;
$post->location = $data->location;
$post->sublocality = $data->sublocality;
$post->landmark = $data->landmark;
$post->city = $data->city;
$post->district = $data->district;
$post->state = $data->state;
$post->age = $data->age;
$post->idprofiles = $data->idprofiles;
$post->updated = date("Y-m-d h:i:sa");

// Update post

if($result = $post->update()){
    if($result)
    {
     $newresult =  $post->updateaddress($result);
     
     if($newresult)
     {
        $resultprofile = $post->updateprofile($newresult);
        if($resultprofile)
        {
            echo json_encode(array('message' =>'Successfully Updated'));
            return true;
        }
     }
     else
     {
         echo "Failed to Update";
     }
    }
    
    
   
}else{
    echo json_encode(array('message' => 'Post Not Updated'));
    return true;
}