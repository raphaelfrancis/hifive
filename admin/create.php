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
$post->idprofiles = str_shuffle($string); 
//$post->type = $data->type;
$post->username = $data->username;
$post->password = md5($data->password);
$post->email = $data->email;
$post->phone = $data->phone;
$post->status = "1";
$post->created = date("Y-m-d h:i:sa");

$post->address1 = $data->address1;
$post->address2 = $data->address2;
$post->location = $data->location;
$post->sublocality = $data->sublocality;
$post->landmark = $data->landmark;
$post->city = $data->city;
$post->district = $data->district;
$post->state = $data->state;
$post->firstname = $data->firstname;
$post->lastname = $data->lastname;
$post->gender = $data->gender;
$post->age = $data->age;

$post->category_created = date("Y-m-d h:i:sa");
$post->categoryid = $data->categoryid;
$post->placeid = $data->placeid;
// $post->servicename = $data->servicename;
// $post->serviceid = $data->serviceid;

//$post->idworkservice = $data->idworkservice;
//$post->idprofile = $data->idprofile;
$post->categoryid = $data->categoryid;
//$post->idworkservice= $data->idworkservice;
$post->type = $data->type;



if($lastid = $post->create())
{
    if($lastid)
    {
    $string1 = "0123456789";
    $string2 = "9735486120";
    $string3 = "5432167890";
    $idprofile_address	 = str_shuffle($string1);
    $idprofile_detail = str_shuffle($string1);
    $idworker_category = str_shuffle($string1);
    $idworker_location = str_shuffle($string1);
    $idworker_services = str_shuffle($string3);
    // $idworkservice = str_shuffle($string3);
    $newresult = $post->addprofiledetails($lastid,$idprofile_detail);
    if($newresult)
    {
    $result = $post->addprofileaddress($lastid,$idprofile_address);
    if($result)
    {
    $workercategory = $post->addworkercategory($lastid,$idworker_category);
    if($workercategory)
    {
    $addworkerlocations = $post->addworkerlocations($lastid,$idworker_location);
    echo json_encode(array('message' => 'Post Created'));
     return true;   
    if($addworkerlocations)
    {
        // $addworkerservices = $post->addworkerservices($lastid,$idworker_services);
        // 
    }
    }
    }
    }
    }
    //return true; 
}else{
    echo json_encode(array('message' => 'Post Not Created'));
}
?>