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
        $userresult = json_decode($result);
        //close curl connection
        
        curl_close($ch);
        if(!empty($userresult))
        {
            foreach($userresult as $login)
            {
                foreach($login as $value)
                {
                    $_SESSION["username"]= $value->username;
                    $_SESSION["idprofiles"]= $value->idprofiles;
                    $_SESSION["type"] = $value->type;
                    $_SESSION["message"] = $value->message;
                    $_SESSION["email"] = $value->email;
                    $_SESSION["phone"] = $value->phone;
                }
               
            }
            if( $_SESSION["type"]=='U')
            {
            header("location:viewdetails.php");
            }
            else
            {
                header("location:viewworkerdetails.php");
            }
        }
        else
        {
            $_SESSION["login"]="Failed";
            header("location:viewdetails.php");
        }
        
        }
        ?>