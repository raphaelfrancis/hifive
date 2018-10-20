<?php
session_start();
$categoryname = $_POST["cat_name"];
$newdata = array("categoryname"=>$categoryname);
$data = json_encode($newdata);

$ch = curl_init();
        // URL to be called
        curl_setopt($ch, CURLOPT_URL, "http://localhost/hifive/admin/addcategories.php");
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
        $categoryresult = json_decode($result);
        
        $message = $categoryresult->message;
        
        if($message=="category Added Successfully")
        {
            $_SESSION["success"]="Category Added Successfully";
            header("location:addcategory.php");
        }
        else
        {
           
            $_SESSION["failure"]="Failed To Add Category";
            header("location:addcategory.php");

        }
?>