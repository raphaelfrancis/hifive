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
 
</head>
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
//print result
?>
<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      
      <div class="logo">
        <a href="#" class="simple-text logo-normal">
          Hive
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
            <a class="navbar-brand" href="#pablo"><!-- Table List --></a>
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
           <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  
                  
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
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Users</h4>
                  <p class="card-category"> Here is a subtitle for this table</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      
                        <tr>
                        <th>
                          ID
                        </th>
                        <td>
                           
                          </td>
                      </tr>
                      <tr>
                        <th>
                          Username
                        </th>
                        <td>
                          <?php
                        print_r($newdata->username);
                        ?>
                          </td>
                      </tr>
                      <tr>
                        <th>
                          Firstname
                        </th>
                        <td>
                        <?php
                        print_r($newdata->firstname);
                        ?>
                          </td>
                      </tr>
                        <th>
                          Lastname
                        </th>
                        <td>
                        <?php
                        print_r($newdata->lastname);
                        ?>
                        </td>
                        <tr>
                        <th>
                          Email
                        </th>
                        <td>
                        <?php
                        print_r($newdata->email);
                        ?>
                          </td>
                      </tr>
                      <tr>
                        <th>
                          Password
                        </th>
                        <td>
                        <?php
                        print_r($newdata->password);
                        ?>
                          </td>
                      </tr>
                      <tr>
                        <th>
                          Age
                        </th>
                        <td>
                        <?php
                        print_r($newdata->age);
                        ?>
                          </td>
                      </tr>
                      <tr>
                        <th>
                          Gender
                        </th>
                        <td>
                        <?php print_r($newdata->gender);?>
                          </td>
                      </tr>
                      <tr>
                        <th>
                          Phone
                        </th>
                        <td>
                        <?php
                        print_r($newdata->phone);
                        ?>
                          </td>
                      </tr>
                      <tr>
                        <th>
                          Address
                        </th>
                        <td>
                        <?php
                        print_r($newdata->address1);
                        ?>
                          </td>
                      </tr>
                      <tr>
                        <th>
                          Location
                        </th>
                        <td>
                            abc
                          </td>
                      </tr>
                      <tr>
                        <th>
                          City
                        </th>
                        <td>
                            Thrissur
                          </td>
                      </tr>
                      <tr>
                        <th>
                          State
                        </th>
                        <td>
                            Kerala
                          </td>
                      </tr>
                      <tr>
                        <th>
                          Active
                        </th>
                        <td>
                        <?php
                        print_r($newdata->status);
                        ?>
                          </td>
                      </tr>
                      <tr>
                        <th>
                          Created date
                        </th>
                        <td>
                            <?php
                        print_r($newdata->created);
                        ?>
                          </td>
                        </tr>
                       
                       
                          
                          
                          
                         
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          <td class = "text-left">
                         
               <a href= "edituser.html"><button type="button" rel="tooltip" class="btn btn-success">
                    <i class="material-icons">edit</i>
                </button></a>
                <button type="button" rel="tooltip" class="btn btn-danger">
                    <i class="material-icons">close</i>
                </button>
                          </td>


                        </tr>
                       
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
           
      </div>
      <footer class="footer">
        <div class="container-fluid">
         
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
  <!--   Core JS Files   -->
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
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
</body>

</html>