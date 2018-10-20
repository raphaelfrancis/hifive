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
$data = json_decode(file_get_contents("php://input"));

$post->categoryid = isset($_GET['catid']) ? $_GET['catid'] : die('could not get the value');

//Blog post query
$result = $post->getservices();
//Get row count

$num = $result->rowCount();

//Check if any posts
if($num > 0 ){
    // Post array

    $post_arr = array();
    $post_arr['data'] =  array();
    while($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        
            $post_item = array(
            'idservices'=>$row["idservices"],
            'servicename' =>$row["servicename"],
            'categoryid' =>$row["categoryid"],
            'created'=>$row["created"]
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