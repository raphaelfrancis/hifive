<?php
session_start();
$workerid = $_POST["workerid"];
$idservice_request = $_POST["idservice_request"];
$usermessage = $_POST["usermessage"];
$servicedate = $_POST["servicedate"];
$servicetime = $_POST["servicetime"];
$service_location = $_POST["service_location"];
$worker_status = $_POST["worker_status"];
$is_email = $_POST["is_email"];
$amount = $_POST["amount"];
$service_status = $_POST["service_status"];

$editservicedata = array("idservice_request"=>$idservice_request,"workerid"=>$workerid,"amount"=>$amount,"servicedate"=>"$servicedate", "servicetime"=>"$servicetime","service_status"=>"$service_status","service_location" =>"$service_location","usermessage"=>"$usermessage","worker_status"=>$worker_status, "is_email"=>'$is_email');

//Option 1: Convert data array to json if you want to send data as json
$data = json_encode($editservicedata);

//Option 2: else send data as post array.
//$data = urldecode(http_build_query($data));
/****** curl code ****/
//init curl
$ch = curl_init();
// URL to be called
curl_setopt($ch, CURLOPT_URL, "http://localhost/hifive/admin/updateservicerequest.php");
//set post TRUE to do a regular HTTP POST
curl_setopt($ch, CURLOPT_POST, 1);
//set http headers - if you are sending as json data (i.e. option 1) else comment this 
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
//send post data
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
//return as output instead of printing it
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//execute curl request
$result = curl_exec($ch);
$success = json_decode($result);
print_r($success);
//close curl connection
curl_close($ch);
//print result
if($result)
{
    print_r($success);
}


?>