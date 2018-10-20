<?php
$ch = curl_init();
 // URL to be called i.e. end point to access resource. 
 // e.g. Get all records of a database table name "orders".
 curl_setopt($ch, CURLOPT_URL, "http://localhost/hifive/admin/read.php");
//return as output instead of printing it
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 //execute curl request
 $result = curl_exec($ch);
 //close curl connection
 curl_close($ch);
 //print result
 $arr = json_decode($result, true);
 print_r($arr["data"][0]["email"]);
 foreach($arr as $value)
 {
     foreach($value as $res)
     {
         echo $res["email"];
         echo $res["username"]."<br>";
     }
 }
 ?>