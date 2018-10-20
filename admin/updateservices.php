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

$post->servicename = $data->servicename;
$post->idservices = $data->idservices;


if($checkservicename = $post->checkservices())
{
    if($checkservicename=="$post->servicename")
    {
        echo json_encode(array('message' =>'Existing Servicename'));
        return true;
    }
    
}
else
    {
        $update = $post->updateservices();
        echo json_encode(array('message' =>'Updated Successfully'));
        return true;
    }


?>

