<?php
$data = array("username" =>'mick', "password" =>'qwerty', "email" =>'mick123@gmail.com',"phone"=>'9876543210',"created"=>date("Y-m-d"),"address1"=>'ollur',"address2"=>'Thrissur',"location"=>'Pallikulam',"sublocality"=>'Ariyangadi',"landmark"=>'AdamBazar',"city"=>'Thrissur',"city"=>'Thrissur',"district"=>'Thrissur',"state"=>'kerala',"firstname"=>'firstname',"lastname"=>'lastname',"gender"=>'M',"age"=>'30',"categoryid"=>'123',"placeid"=>'126126');
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
print_r($result);
?>