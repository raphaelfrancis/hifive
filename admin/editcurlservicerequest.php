<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Hifive
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
</head>

<body class="">
<?php
$id = $_GET["id"];
$userid = $_SESSION["idprofiles"];
$data = array("id" =>'$id');
//Option 1: Convert data array to json if you want to send data as json

//Option 2: else send data as post array.
//$data = urldecode(http_build_query($data));
/****** curl code ****/
//init curl
$ch = curl_init();
// URL to be called
curl_setopt($ch, CURLOPT_URL, "http://localhost/hifive/admin/readsingle_request.php?id=$id");
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
$newdata = json_decode($result);
//$newdata = json_decode($result);
//close curl connection
curl_close($ch);
?>
<?php

//Option 1: Convert data array to json if you want to send data as json

//Option 2: else send data as post array.
//$data = urldecode(http_build_query($data));
/****** curl code ****/
//init curl
$ch = curl_init();
// URL to be called
curl_setopt($ch, CURLOPT_URL, "http://localhost/hifive/admin/worker.php");
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
<script>

//document.write(x);
</script>
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
     
      <div class="logo">
        <a href="#" class="simple-text logo-normal">
          Hifive
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.html">
                                <i class="material-icons">
                                    dashboard
                                </i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="./userlist.html">
                                <i class="material-icons">
                                    person
                                </i>
                                <p>
                                    Users
                                </p>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a class="nav-link" href="./adduserfield.html">
                                <i class="material-icons">
                                    person
                                </i>
                                <p>
                                    Add custom user field
                                </p>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a class="nav-link" href="./workerlist.html">
                                <i class="material-icons">
                                    person
                                </i>
                                <p>
                                    Workers
                                </p>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a class="nav-link" href="./categories.html">
                                <i class="material-icons">
                                    supervised_user_circle
                                </i>
                                <p>
                                    Categories
                                </p>
                            </a>
                        </li>
                        
                        <li class="nav-item  ">
                            <a class="nav-link" href="./services.html">
                                <i class="material-icons">
                                    work
                                </i>
                                <p>
                                    Services
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="notifications.html">
                                <i class="material-icons">
                                    notification_important
                                </i>
                                <p>
                                    Notifications
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="settings.html">
                                <i class="material-icons">
                                    settings
                                </i>
                                <p>
                                    Settings
                                </p>
                            </a>
                        </li>
                    </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">User Profile</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
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
                  <h4 class="card-title">Edit Services</h4>
                  
                </div>
                           
                <div class="card-body">
                  <form method = "post" action = "updatecurlservicerequest.php">
                      <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">
                                                                message
                                                            </label>
                                                        <textarea class="form-control" rows = "4" cols = "90" name="usermessage">
                                                            <?php print_r($newdata->usermessage);?>
                                                        </textarea> 
                                                        <!-- <input class="form-control" type="text" name="cat_name" id="cat_name">
                                                        </input> -->
                                                    </div>
                                                </div>
                                                
                                            </div>
					   <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label class="bmd-label-floating">
                                     Servicelocation
                                  </label>
                                  <input class="form-control" type="text" name="service_location" value = "<?php print_r($newdata->service_location);?>">
                                  </input>
                              </div>
                          </div>
                          
                      </div>
					   <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label class="bmd-label-floating">
                                     Servicedate
                                  </label>
                                  <input class="form-control" type="date" name="servicedate" value = "<?php print_r($newdata->servicedate);?>">
                                  </input>
                              </div>
                          </div>
                      </div>
                      
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                    
                                                        <!-- <label class="bmd-label-floating">
                                                            Service 
                                                        </label> -->
                                                        <label class="bmd-label-floating">
                                                           worker_status
                                                        <?php
                                                        $value = $newdata->worker_status;
                                                        ?>
                                                      </label>
                                                      <select name="worker_status" id="worker_status" class="browser-default custom-select">
                                                      <option <?php if ($value == "1"){echo 'selected';}?> value ="1">1</option>
                                                      <option <?php if ($value == "0"){echo 'selected';}?> value ="0">0</option>
                                                      </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                    
                                                        <!-- <label class="bmd-label-floating">
                                                            Service 
                                                        </label> -->
                                                        <label class="bmd-label-floating">
                                                        Workeremail_status
                                                        <?php
                                                        $email = $newdata->is_email;
                                                        ?>
                                                      </label>
                                                      <select name="is_email" id="is_email" class="browser-default custom-select">
                                                      <option <?php if ($email == "1"){echo 'selected';}?> value ="1">1</option>
                                                      <option <?php if ($email == "0"){echo 'selected';}?> value ="0">0</option>
                                                      </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                    
                                                        <!-- <label class="bmd-label-floating">
                                                            Service 
                                                        </label> -->
                                                        <label class="bmd-label-floating">
                                                        Workers
                                                      </label>
                                                      <select name="workerid" id="workerid" class="browser-default custom-select">
                                                      <?php
                                                      foreach($workerdata as $value)
                                                      {
                                                         foreach($value as $worker)
                                                         {
                                                          ?>
                                                        <option value = "<?php echo $worker->idprofiles;?>"><?php echo $worker->firstname;?></option>
                                                        <?php   
                                                         }
                                                      }




                                                     ?>
                                                      
                                                      </select>
                                                    </div>
                                                </div>
                                            </div>
                    <input type="hidden" name ="userid" value= "<?php echo $userid;?>">
                    <input type="hidden" name ="idservice_request" value= "<?php print_r($newdata->idservice_request);?>">
                    <button type="submit" class="btn btn-primary pull-right">Update Service Request</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          
            </div> 
          </div>

            <footer class="footer">
        <div class="container-fluid">
         
          </nav> 
          <div class="copyright">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script><!-- , made with <i class="material-icons">favorite</i> by
            <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web. -->
          </div>
        </div>
      </footer>


        </div>
      </div>
              <script src="../assets/js/core/jquery.min.js" type="text/javascript"></script>
              <script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
              <script src="../assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
              <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
              <!--  Google Maps Plugin    -->
              <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
              <!-- Chartist JS -->
              <script src="../assets/js/plugins/chartist.min.js"></script>
              <!--  Notifications Plugin    -->
              <script src="../assets/js/plugins/bootstrap-notify.js"></script>
              <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
              <script src="../assets/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
              
                </div>
              </div>
  <!--   Core JS Files   -->
  
 
</body>

</html>