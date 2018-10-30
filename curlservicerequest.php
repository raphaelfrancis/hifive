<?php
$workerid = $_POST["workerid"];
$userid = $_POST["userid"];
$catid = $_POST["catid"];
$usermessage = $_POST["usermessage"];
$service = $_POST["servicename"];
$location = $_POST["location"];
$address = $_POST["address"];
$amount = $_POST["amount"];
$servicedate = $_POST["servicedate"];
$servicetime = $_POST["servicetime"];
$payment_type = $_POST["payment_type"];


$servicerequestdata = array("workerid"=>$workerid,"userid"=>"$userid","categoryid"=>"$catid","service"=>$service, "usermessage" =>"$usermessage", "service_location" =>"$location","payment_type"=>"$payment_type","amount"=>"$amount","servicedate"=>"$servicedate","servicetime"=>$servicetime,"createdby"=>$userid);

//Option 1: Convert data array to json if you want to send data as json
$data = json_encode($servicerequestdata);
print_r($data);
//Option 2: else send data as post array.
//$data = urldecode(http_build_query($data));
/****** curl code ****/
//init curl
$ch = curl_init();
// URL to be called
curl_setopt($ch, CURLOPT_URL, "http://localhost/hifive/addservicerequest.php");
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
echo $result;
exit();
//close curl connection
curl_close($ch);
//print result
// print_r($result);
if(isset($result))
{
    header("location:listrequest.php");
}
?>