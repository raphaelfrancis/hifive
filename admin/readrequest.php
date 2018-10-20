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

//Blog post query
$result = $post->readrequest();
//Get row count

$num = $result->rowCount();

//Check if any posts
if($num > 0 ){
    // Post array

    $post_arr = array();
    $post_arr['data'] =  array();
    while($row = $result->fetch(PDO::FETCH_ASSOC))
    {
            $post_item = array("service_location"=>$row["service_location"],
            "usermessage"=>$row["usermessage"],
            "username"=>$row["username"],
            "servicedate"=>$row["servicedate"],
            "username"=>$row["username"]);
        array_push($post_arr['data'], $post_item);
    }
   print_r($post_arr['data']);
   exit();
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