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
$workerresult = $post->getworker();
//Get row count

$num = $workerresult->rowCount();

//Check if any posts
if($num >0){
    // Post array

    $post_arr = array();
    $post_arr['data'] =  array();
    while($row = $workerresult->fetch(PDO::FETCH_ASSOC))
    {
            $post_item = array(
            'idprofiles'=>$row["idprofiles"],
            "firstname"=>$row["firstname"]);
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