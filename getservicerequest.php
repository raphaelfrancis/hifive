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
$post->workerid = isset($_GET['id']) ? $_GET['id'] : die('could not get the value');

//Get post

if($post->read_singlerequest()){
    
    
    $result = $post->read_singlerequest();
    $post_arr = array();
//Create array
while($row = $result->fetch(PDO::FETCH_ASSOC))
{
        $post_item = array(
        'idservice_request'=>$row["idservice_request"],
        'service'=>$row["service"],
        'usermessage' =>$row["usermessage"],
        'service_location'=>$row["service_location"],
        'servicedate'=>$row["servicedate"],
        'service_status'=>$row["service_status"],
        'servicetime'=>$row["servicetime"]);
         array_push($post_arr, $post_item);
}
//Json output

    if(count($row)>0)
    {
       
        echo json_encode($post_arr);
        return true;
    }
    else{
        print_r(array("Message" => "No data to display"));
    }
}


?>