<?php
session_start();
?>
<?php
$ch = curl_init();
$data = array("idcategory","1");
// URL to be called
curl_setopt($ch, CURLOPT_URL, "http://localhost/hifive/admin/getcategories.php");
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
$getcategory = json_decode($result);

//print result
?>
<?php

//Option 1: Convert data array to json if you want to send data as json

//Option 2: else send data as post array.
//$data = urldecode(http_build_query($data));
/****** curl code ****/
//init curl
$ch = curl_init();
// URL to be called
curl_setopt($ch, CURLOPT_URL, "http://localhost/hifive/worker.php");
//set post TRUE to do a regular HTTP POST
curl_setopt($ch, CURLOPT_POST, 1);
//set http headers - if you are sending as json data (i.e. option 1) else comment this 
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
//send post data
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
//return as output instead of printing it
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//execute curl request
$workerlist = curl_exec($ch);
$workerdata = json_decode($workerlist);

//$newdata = json_decode($result);
//close curl connection
curl_close($ch);

?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <link href="assets/img/apple-icon.png" rel="apple-touch-icon" sizes="76x76">
            <link href="assets/img/favicon.png" rel="icon" type="image/png">
                <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible"/>
                <title>
                    Hifive
                </title>
                <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport"/>
                <!--     Fonts and icons     -->
                <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" rel="stylesheet" type="text/css"/>
                <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
                    <!-- CSS Files -->
                    <link href="assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet"/>
                    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            </link>
        </link>
    </head>
    <body class="">
        <div class="wrapper ">
            <div class="sidebar" data-background-color="white" data-color="purple" data-image="../assets/img/sidebar-1.jpg">
                <div class="logo">
                    <a class="simple-text logo-normal" href="#">
                        Hifive
                    </a>
                </div>
                <div class="sidebar-wrapper">
                     <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/project/studentproject-master/admin/dashboard.html">
                                <i class="material-icons">
                                    dashboard
                                </i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        
                </div>
            </div>
            <div class="main-panel">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                    <div class="container-fluid">
                        <div class="navbar-wrapper">
                            <a class="navbar-brand" href="#pablo">
                                User Profile
                            </a>
                        </div>
                        <button aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-toggle="collapse" type="button">
                            <span class="sr-only">
                                Toggle navigation
                            </span>
                            <span class="navbar-toggler-icon icon-bar">
                            </span>
                            <span class="navbar-toggler-icon icon-bar">
                            </span>
                            <span class="navbar-toggler-icon icon-bar">
                            </span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end">
                            <form class="navbar-form">
                                <div class="input-group no-border">
                                    <input class="form-control" placeholder="Search..." type="text" value="">
                                        <button class="btn btn-white btn-round btn-just-icon" type="submit">
                                            <i class="material-icons">
                                                search
                                            </i>
                                            <div class="ripple-container">
                                            </div>
                                        </button>
                                    </input>
                                </div>
                            </form>
                        </div>
                    </div>
                </nav>
                <!-- End Navbar -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="card">
                                    <div class="card-header card-header-primary">
                                        <h4 class="card-title">
                                            Request Service
                                        </h4>
                                        <p class="card-category">
                                            New Service<?php $userid = $_SESSION["idprofiles"];?>
                                        </p>
                                    </div>
                                    <div class="card-body">
                                        <form name = "f1" method="post" action="curlservicerequest.php">


                                            <div class ="row">

                                                    <div class="form-group">
                                                        <div class="col-md-12 col-md-offset-3">
                                                             <div id="messages">
                                                                 
                                                             </div>
                                                         </div>
                                                    </div>
                                                </div>


                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    
                                                        <!-- <label class="bmd-label-floating">
                                                            Service 
                                                        </label> -->
                                                        <label class="bmd-label-floating">
                                                            Category name
                                                        </label>
                                                      <select name="catid" id="catid">
                                                      <option>Please select a Category</option>
                                                           <?php
                                                           if ($getcategory)
                                                           {
                                                            foreach($getcategory as $value)
                                                            {
                                                              foreach($value as $data)
                                                              {
                                                              ?>
                                                           
                                                           <option value ="<?php echo $data->idcategory;?>"><?php echo $data->categoryname;?></option>
                                                             <?php
                                                              }
                                                            }
                                                           }
                                                           ?>
                                                       </select>
                                                    </div>
                                                </div>
                                                    <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">
                                                            Service 
                                                        </label>
                                                        <select class="form-control" name="servicename" id = "servicename">
                                                           <option value='serviceid'></option>
                                                        </select>
                                                    
                                                        <!-- <input class="form-control" type="text" id="service_name" name="service_name">
                                                        </input>
                                                    </div> -->
                                                </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    
                                                        <!-- <label class="bmd-label-floating">
                                                            Service 
                                                        </label> -->
                                                        <label class="bmd-label-floating">
                                                        Worker name
                                                        </label>
                                                      <select name="workerid" id="workerid">
                                                      <option>Please select a Worker</option>
                                                           <?php
                                                           if ($workerdata)
                                                           {
                                                            foreach($workerdata as $value)
                                                            {
                                                              foreach($value as $data)
                                                              {
                                                              ?>
                                                           
                                                           <option value ="<?php echo $data->idprofiles;?>"><?php echo $data->firstname;?></option>
                                                             <?php
                                                              }
                                                            }
                                                           }
                                                           ?>
                                                       </select>
                                                    </div>
                                                </div>
                                                   
                                            </div>

                                            
                                            
                                           
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">
                                                                message
                                                            </label>
                                                        <textarea class="form-control" rows = "4" cols = "90" name="usermessage">
                                                            
                                                        </textarea> 
                                                        <!-- <input class="form-control" type="text" name="cat_name" id="cat_name">
                                                        </input> -->
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating">
                                                                Location
                                                            </label>
                                                            <input class="form-control" id="parentcat_name" name="location" type="text">
                                                            </input>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating">
                                                                Address
                                                            </label>
                                                            <input class="form-control" id="parentcat_name" name="address" type="text">
                                                            </input>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                 <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating">
                                                                Payment type
                                                            </label>
                                                            <select name="payment_type" id="payment_type" class="browser-default custom-select">
                                                      <option  value ="C">Cash</option>
                                                      <option  value ="O">Online</option>
                                                      </select>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating">
                                                                Service Amount
                                                            </label>
                                                            <input class="form-control" type="text" name="amount" id="amount">
                                                            </input>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                 <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating">
                                                                Date
                                                            </label>
                                                            <input class="form-control" type="date" name="servicedate" id="servicedate">
                                                            </input>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                 <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating">
                                                                Time
                                                            </label>
                                                            <input class="form-control" type="time" name="servicetime" id="servicetime">
                                                            </input>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            <input type = "hidden" name = "userid" value = "<?php echo $userid;?>">
                                            <button class="btn btn-primary pull-right" type="submit" id="submit" name="submit">
                                                Request
                                            </button>
                                                    <table id= "mytable">
                                                    </table>    
                                            <div class="clearfix">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                    </div>

                    <footer class="footer">
                <div class="container-fluid">
                    <div class="copyright">
                         ©
                        <script>
                            document.write(new Date().getFullYear())
                            </script>
    <!-- , made with <i class="material-icons">favorite</i> by
            <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web. -->
                    </div>
                </div>
            </footer>

                </div>
            </div>
            <!--   Core JS Files   -->
<script src="assets/js/core/jquery.min.js" type="text/javascript">
</script>
<script src="assets/js/core/popper.min.js" type="text/javascript">
</script>
<script src="assets/js/core/bootstrap-material-design.min.js" type="text/javascript">
</script>
<script src="assets/js/plugins/perfect-scrollbar.jquery.min.js">
</script>

<!-- add services vaidation -->
<script src="assets/js/addservice.js"></script>

<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE">
</script>
<!-- Chartist JS -->
<script src="assets/js/plugins/chartist.min.js">
</script>
<!--  Notifications Plugin    -->
<script src="assets/js/plugins/bootstrap-notify.js">
</script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="assets/js/material-dashboard.min.js?v=2.1.0" type="text/javascript">
</script>


        </div>
    </body>
    <script type="text/javascript">
  $(document).ready(function() {

      $('#catid').change(function(e){
        var categoryid = $("#catid").val();
        var jsonData = {categoryid:categoryid};
        $.ajax({
            type: "POST",
            data: JSON.stringify(jsonData),
            url: 'admin/getservice.php',
            dataType: "json",
            success : function(data){
                if (data)
                {
                    $('#servicename').children().remove();
                    var person = JSON.stringify(data['data'][0]);
                    for(var i=0;i<person.length;i++)
                    {
                        var stddata = JSON.stringify(data['data'][i]);
                        var json = JSON.parse(stddata);
                        var servicetype = json["servicename"];
                        var serviceid = json["idservices"];
                        $('#servicename').append($('<option>').text(servicetype).attr('value',serviceid));
                        
                    }
                    
                    
                }
                else {
                    alert("error");
                }
            }
        });


      });
  });
</script>
<script type="text/javascript">
  
  
</script>
</html>     

