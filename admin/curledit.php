<?php
$username = $_POST["username"];
$password = $_POST["password"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$age = $_POST["age"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$gender = $_POST["inlineRadioOptions"];
$address1 = $_POST["address1"];
$address2 = $_POST["address2"];
$location = $_POST["location"];
$sublocality = $_POST["sublocality"];
$landmark = $_POST["landmark"];
$city = $_POST["city"];
$district = $_POST["district"];
$state = $_POST["state"];
$idprofiles = $_POST["idprofiles"];

$data = array("username"=>"$username", "password" =>"$password", "phone"=>"$phone","created"=>date("Y-m-d"),"address1"=>"$address1","address2"=>"$address2","location"=>"$location","sublocality"=>"$sublocality","landmark"=>"$landmark","city"=>"$city","district"=>"$district","state"=>"$state","firstname"=>"$firstname","lastname"=>"$lastname","age"=>"$age","idprofiles"=>"$idprofiles","email"=>"$email","gender"=>"$gender");

//Option 1: Convert data array to json if you want to send data as json
$data = json_encode($data);

//Option 2: else send data as post array.
//$data = urldecode(http_build_query($data));
/****** curl code ****/
//init curl
$ch = curl_init();
// URL to be called
curl_setopt($ch, CURLOPT_URL, "http://localhost/hifive/admin/update.php");
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
//close curl connection
curl_close($ch);
//print result
if($result)
{
    header("location:listusers.php");
}


?>