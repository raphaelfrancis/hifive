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
$result = $post->read();
//Get row count

$num = $result->rowCount();
//Check if any posts
if($num > 0 ){
    // Post array

    $post_arr = array();
    $post_arr['data'] =  array();
    while($row = $result->fetch(PDO::FETCH_ASSOC))
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
            'location'=>$location,
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