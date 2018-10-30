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
$post->password = md5($data->currentpassword);
$post->newpassword = md5($data->newpassword);
$post->retypenewpassword = md5($data->retypenewpassword);

// Create post

if($result=$post->checkworkerpassword())
   {
       echo $result;
        if($result=="1")
        {
           
            $changepassword = $post->updateworkerpassword();
            if($changepassword)
            {
                
                echo json_encode(array('message' =>'success'));
                return true;
            }
            else
            {
                echo json_encode(array('message' =>'Please enter correct password'));
                return true;
            }
        }
       
   }
else
   {
        echo json_encode(array('message' => 'invalid username or password'));
        return false;
   }
?>