<?php
session_start();
if($_SESSION["idprofiles"])
{
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
                <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

                    <!-- CSS Files -->
                    <link href="assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet"/>
                   
            </link>
        </link>
    </head>
    <?php
$id =$_GET["id"];

$data = array("id" =>'$id');
//Option 1: Convert data array to json if you want to send data as json
//$data = json_encode($data);

//Option 2: else send data as post array.
//$data = urldecode(http_build_query($data));
/****** curl code ****/
//init curl
$ch = curl_init();
// URL to be called
curl_setopt($ch, CURLOPT_URL, "http://localhost/hifive/editworkerservicerequest.php?id=$id");
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

//close curl connection
curl_close($ch);
//print result
?>
   
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
                            <a class="nav-link" href="dashboard.html">
                                <i class="material-icons">
                                    dashboard
                                </i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                         <li class="nav-item ">
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
                        <li class="nav-item active ">
                            <a class="nav-link" href="./services.html">
                                <i class="material-icons">
                                    work
                                </i>
                                <p>
                                    Service Requests
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
                            <a class="navbar-brand" href="#pablo">
                                <!-- Table List -->
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
                            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="logout.php">
                  
                  
                    Logout
                  
                </a>
              </li>
             </ul>
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
                  <h4 class="card-title">Edit Service Request</h4>
                  
                </div>
                           
                <div class="card-body">
                Requested user:<?php echo $newdata[0]->firstname;?>
                
                <span style="padding-right;20px;"></span>Requested user Location:<?php echo $newdata[0]->location;?>
                <span style="padding-right;20px;"></span>Requested user Phone:<?php echo $newdata[0]->phone;?>
                <span style="padding-right;20px;"></span>Requested user Address:<?php echo $newdata[0]->address1;?>

                  <form method = "post" action = "updatecurlservicerequest.php">
                      <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">
                                                                message
                                                            </label>
                                                        <textarea class="form-control" rows = "4" cols = "90" name="usermessage"><?php echo $newdata[0]->usermessage;?></textarea> 
                                                        <!-- <input class="form-control" type="text" name="cat_name" id="cat_name">
                                                        </input> -->
                                                    </div>
                                                </div>
                                                
                                            </div>
					   <div class="row">
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label class="bmd-label-floating">
                                     Servicelocation
                                  </label>
                                  <input class="form-control" type="text" name="service_location" value = "<?php echo $newdata[0]->service_location;?>">
                                  </input>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label class="bmd-label-floating">
                                     Address1
                                  </label>
                                  <input class="form-control" type="text" name="address1" value = "<?php echo $newdata[0]->address1;?>">
                                  </input>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label class="bmd-label-floating">
                                     Address2
                                  </label>
                                  <input class="form-control" type="text" name="address2" value = "<?php echo $newdata[0]->address2;?>">
                                  </input>
                              </div>
                          </div>
                         
                          
                      </div>
					   <div class="row">
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label class="bmd-label-floating">
                                     Servicedate
                                  </label>
                                  <input class="form-control" type="date" name="servicedate" value = "<?php echo $newdata[0]->servicedate;?>">
                                  </input>
                              </div>
                          </div>
                          
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label class="bmd-label-floating">
                                     Service Time                                  </label>
                                  <input class="form-control" type= "time" name="servicetime" value = "<?php echo $newdata[0]->servicetime;?>">
                                  </input>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label class="bmd-label-floating">
                                     Type of Service</label>
                                  <input class="form-control" type= "text" name="servicename" value = "<?php echo $newdata[0]->servicename;?>" readonly>
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
                                                        $value = $newdata[0]->worker_status;
                                                        ?>
                                                      </label>
                                                      <select name="worker_status" id="worker_status" class="browser-default custom-select">
                                                      <option <?php if ($value == "1"){echo 'selected';}?> value ="1">Assigned</option>
                                                      <option <?php if ($value == "0"){echo 'selected';}?> value ="0">Not Aassigned</option>
                                                      </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                    
                                                        <!-- <label class="bmd-label-floating">
                                                            Service 
                                                        </label> -->
                                                        <label class="bmd-label-floating">
                                                           Service_status
                                                           </label>
                                                        <?php
                                                        $service = $newdata[0]->service_status;
                            
                                                        ?>
                                                      
                                                      <select name="service_status" id="service_status" class="browser-default custom-select">
                                                      <option <?php if ($service == "N"){echo 'selected';}?> value ="N">Not Started</option>
                                                      <option <?php if ($service == "S"){echo 'selected';}?> value ="S">Started</option>
                                                      <option <?php if ($service == "C"){echo 'selected';}?> value ="C">Completed</option>
                                                      <option <?php if ($service == "Ca"){echo 'selected';}?> value ="Ca">Cancelled</option>
                                                      <option <?php if ($service == "P"){echo 'selected';}?> value ="P">Progress</option>
                                                      </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                              <div class="form-group">
                                  <label class="bmd-label-floating">
                                     Payment Status
                                  </label>
                                  <input class="form-control" type="text" name="payment_status" value = "<?php if($newdata[0]->payment_status=="1"){echo "paid";}else{echo "Not Paid";} ?>" readonly>
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
                                                        Workeremail_status
                                                        <?php
                                                        $email = $newdata[0]->is_email;
                                                        ?>
                                                      </label>
                                                      <select name="is_email" id="is_email" class="browser-default custom-select">
                                                      <option <?php if ($email == "1"){echo 'selected';}?> value ="1">sent</option>
                                                      <option <?php if ($email == "0"){echo 'selected';}?> value ="0">Not sent</option>
                                                      </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                              <div class="form-group">
                                  <label class="bmd-label-floating">
                                     Service Amount                                  </label>
                                  <input class="form-control" type= "text" name="amount" value = "<?php echo $newdata[0]->amount;?>" readonly>
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
                                                       
                                                     




                                                    </div>
                                                </div>
                                            </div>
                    <input type="hidden" name ="workerid" value= "<?php echo $newdata[0]->workerid;?>">
                    <input type="hidden" name ="idservice_request" value= "<?php echo $newdata[0]->idservice_request;?>">
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
                <!--  Google Maps Plugin    -->
                <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE">
                </script>
                <!-- Chartist JS -->
                <script src="../assets/js/plugins/chartist.min.js">
                </script>
                <!--  Notifications Plugin    -->
                <script src="../assets/js/plugins/bootstrap-notify.js">
                </script>
                <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
                <script src="../assets/js/material-dashboard.min.js?v=2.1.0" type="text/javascript">
                </script>
                
            </div>
        </div>
    </body>
</html>
<?php
}
else
{
    header("location:userlogin.php");
}
?>
