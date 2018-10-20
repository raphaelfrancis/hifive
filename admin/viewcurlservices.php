<?php
session_start();
$catid = $_POST["catid"];
$newdata = array("categoryid"=>$catid);
$data = json_encode($newdata);

        $ch = curl_init();
        // URL to be called
        curl_setopt($ch, CURLOPT_URL, "http://localhost/hifive/admin/getservices.php?catid=$catid");
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
        //close curl connection
        curl_close($ch);
       
        
        $arraycount = array();
        foreach($categoryresult as $value)
        {
            foreach($value as $result)
            {
                $arraycount[] = $result->servicename; 
            }
        }
       $a=count($arraycount);
       $_SESSION["count"]=$a;
        if($a>0)
        {
            $_SESSION["count"]=$a;
            $_SESSION["servicedata"]= $categoryresult;
            header("location:viewservices.php");
        }
        else
        {
            
            $_SESSION["count"]="No records Found";
            header("location:viewservices.php");

        }
?>