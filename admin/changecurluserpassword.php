<?php
    
       $currentpassword =  $_POST["currentpassword"]; 
       $newpassword = $_POST["newpassword"];
       $retypenewpassword = $_POST["retypenewpassword"];
       $username = $_POST["username"];
       $passworddata = array("currentpassword"=>$currentpassword,"newpassword"=>$newpassword,"retypenewpassword"=>$retypenewpassword,"username"=>$username);
       $data = json_encode($passworddata);
       $ch = curl_init();
        // URL to be called
        curl_setopt($ch, CURLOPT_URL, "http://localhost/hifive/admin/changeadminpassword.php");
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
        
        if(isset($result))
        {
            echo "Password Changed Successfully";
            header("location:listusers.php");
        }
    
    ?>