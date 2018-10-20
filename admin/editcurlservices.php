<?php
session_start();
$servicename = $_POST["servicename"];
$idservices = $_POST["idservices"];
$newdata = array("servicename"=>$servicename,"idservices"=>$idservices);
$data = json_encode($newdata);
        $ch = curl_init();
        // URL to be called
        curl_setopt($ch, CURLOPT_URL, "http://localhost/hifive/admin/updateservices.php");
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
        $categoryresult = json_decode($result);
        $updateresult = $categoryresult->message;
        if($categoryresult)
        {
            header("location:viewservices.php?result = $updateresult");
        }
        //close curl connection
        curl_close($ch);
        
        
       
?>