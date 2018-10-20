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
 
//$post->type = $data->type;
$post->username = $data->username;
// $post->email = $data->email;
// $post->phone = $data->phone;


//$post->idworkservice = $data->idworkservice;
//$post->idprofile = $data->idprofile;
//$post->categoryid = $data->categoryid;
//$post->idworkservice= $data->idworkservice;
$search = $post->searchuser();
$num = $search->rowCount();
if($num > 0 ){
    // Post array

    $post_arr = array();
    $post_arr['data'] =  array();
    while($row = $search->fetch(PDO::FETCH_ASSOC))
    {
           
            extract($row);
            $post_item = array(
            'profileid'=>$profileid,
            'username' => $username,
            'password' => $password,
            'email' => $email,
            'phone' => $phone,
            'address1'=>$address1,
            'address2'=>$address2,
            'sublocality'=>$sublocality,
            'landmark'=>$landmark,
            'city'=>$city,
            'district'=>$district,
            'state'=>$state
        );
        array_push($post_arr['data'], $post_item);
    }

    //Json output

    echo json_encode($post_arr);
    return true;
} else {
    //No posts
    echo json_encode(
        array('message' => ' No records')
    );
}




?>