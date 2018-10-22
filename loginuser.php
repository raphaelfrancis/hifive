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



// Create post

if($qu=$post->login()){
   
    $num = $qu->rowCount();
    if($num>0)
    {
        $post_arr = array();
        $post_arr['data']= array();
        while($row = $qu->fetch(PDO::FETCH_ASSOC))
        {
            $post_item = array("idprofiles"=>$row["idprofiles"],"username"=>$row["username"],"type"=>$row["type"],'message'=>"success");
            array_push($post_arr['data'],$post_item);
        }
        echo json_encode($post_arr);
        return true;
    }
    // if($qu=="1")
    // {
    //     echo json_encode(array('message' => 'success',"username"=>$post->username));
    //     return false;
    // }
    // else
    // {
    //     echo json_encode(array('message' => '$qu'));
    //     return true;
    // }
}else{
    echo json_encode(array('message' => 'Failed'));
    return true;
}