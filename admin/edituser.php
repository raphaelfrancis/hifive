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
$data = array("id" =>'2831540796');
//Option 1: Convert data array to json if you want to send data as json
//$data = json_encode($data);

//Option 2: else send data as post array.
//$data = urldecode(http_build_query($data));
/****** curl code ****/
//init curl
$ch = curl_init();
// URL to be called
curl_setopt($ch, CURLOPT_URL, "http://localhost/hifive/admin/read_single.php?id=$id");
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
                  <h4 class="card-title">Edit Profile</h4>
                  <p class="card-category">Complete your profile</p>
                </div>
                <?php
                $data=array();
                
                foreach($newdata as $key)
                {
                    $data[] = $key;
                }
                $gender = $data[7];
                $age = $data[6];
                
                $phone = $data[10];
                ?>             
                <div class="card-body">
                  <form method = "post" action = "curledit.php">
                      <div class="row">
                          <div class="col-md-5">
                              <div class="form-group">
                                  <label class="bmd-label-floating">
                                      Username
                                  </label>
                                  <input class="form-control" type="text" name ="username" value = "<?php print_r($newdata->username);?>">
                                  </input>
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="form-group">
                                  <label class="bmd-label-floating">
                                      Firstname
                                  </label>
                                  <input class="form-control" type="text" name="firstname" value = "<?php print_r($newdata->firstname);?>">
                                  </input>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label class="bmd-label-floating">
                                      Lastname
                                  </label>
                                  <input class="form-control" type="text" name="lastname" value = "<?php print_r($newdata->lastname);?>">
                                  </input>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label class="bmd-label-floating">
                                      Email
                                  </label>
                                  <input class="form-control" type="email" name ="email" value = "<?php print_r($newdata->email);?>">
                                  </input>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label class="bmd-label-floating">
                                      Password
                                  </label>
                                  <input class="form-control" type="password" name = "password" value = "<?php print_r(md5($newdata->password));?>">
                                  </input>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label class="bmd-label-floating">
                                     Confirm Password
                                  </label>
                                  <input class="form-control" type="password" name ="confirmpassword" value = "">
                                  </input>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label class="bmd-label-floating">
                                      Age
                                  </label>
                                  <input class="form-control" type="text" name="age" value = "<?php echo $age;?>">
                                  </input>
                              </div>
                          </div>
                          <div class="col-md-4">
                         
                          <div class="form-check form-check-radio form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadioOptions" value = "M " <?php if($gender=='M') echo 'checked="checked"';?>> Male
                                        <span class="circle">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                                       
                                          
                                <div class="form-check form-check-radio form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadioOptions" value = "F" <?php if($gender=='F') echo 'checked="checked"';?>>Female
                                        <span class="circle">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label class="bmd-label-floating">
                                      Phone
                                  </label>
                                  <input class="form-control" type="text" name="phone" value = "<?php echo $phone;?>">
                                  </input>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label class="bmd-label-floating">
                                      Address1
                                  </label>
                                  <input class="form-control" type="text" name ="address1" value="<?php print_r($newdata->address1);?>">
                                  </input>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label class="bmd-label-floating">
                                      Address2
                                  </label>
                                  <input class="form-control" type="text" name = "address2" value="<?php print_r($newdata->address2);?>">
                                  </input>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label class="bmd-label-floating">
                                      location
                                  </label>
                                  <input class="form-control" type="text" name="location" value = "<?php print_r($newdata->location);?>">
                                  </input>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label class="bmd-label-floating">
                                          sub locality
                                      </label>
                                      <input class="form-control" type="text" name="sublocality" value = "<?php print_r($newdata->sublocality);?>">
                                      </input>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label class="bmd-label-floating">
                                          Landmark
                                      </label>
                                      <input class="form-control" type="text" name="landmark" value = "<?php print_r($newdata->landmark);?>" >
                                      </input>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label class="bmd-label-floating">
                                          city
                                      </label>
                                      <input class="form-control" type="text" name="city" value = "<?php print_r($newdata->city);?>">
                                      </input>
                                  </div>
                              </div>
                          </div>
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label class="bmd-label-floating">
                                      District
                                  </label>
                                  <input class="form-control" type="text" name="district" value = "<?php print_r($newdata->district);?>">
                                  </input>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label class="bmd-label-floating">
                                     State
                                  </label>
                                  <input class="form-control" type="text" name="state" value = "<?php print_r($newdata->state);?>">
                                  </input>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label class="bmd-label-floating">
                                          Latitude
                                      </label>
                                      <input class="form-control" type="text">
                                      </input>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label class="bmd-label-floating">
                                         Longitude
                                      </label>
                                      <input class="form-control" type="text">
                                      </input>
                                  </div>
                              </div>
                          </div>
                    <input type="hidden" name ="idprofiles" value= "<?php print_r($newdata->idprofiles);?>">
                    <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
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