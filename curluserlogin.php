<?php
session_start();
        if(isset($_POST["login"]))
        {
        $username = $_POST["uname"];
        $password = $_POST["pwd"];
        $admindata = array("username"=>$username,"password"=>$password);
        $data = json_encode($admindata);
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://localhost/hifive/loginuser.php");
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
        $newusername = json_decode($result);
        $result = $newusername->message;

        //close curl connection
        curl_close($ch);
        
        if($result=="Failed")
        {
            $_SESSION["login"]="Failed";
            header("location:userlogin.php");
        }
        else
        {
            $newresult = $newusername->username;
            $_SESSION["username"] = $newresult;
            header("location:servicerequest.php");
        }
        }
        ?>