<?php
$data = array("readcategory"=>"read");
$ch = curl_init();
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
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <link href="../assets/img/apple-icon.png" rel="apple-touch-icon" sizes="76x76">
            <link href="../assets/img/favicon.png" rel="icon" type="image/png">
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
                    <link href="../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet"/>
                   
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
                            <a class="nav-link" href="dashboard.html">
                                <i class="material-icons">
                                    dashboard
                                </i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
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
                        <li class="nav-item  active">
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
                                        <h4 class="card-title ">
                                            Categories
                                        </h4>
                                        <p class="card-category">
                                            Here is a subtitle for this table
                                        </p>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class=" text-primary">
                                                    <tr><th>Category_id</th>
                                                    <th>Category name</th>
                                                    <th>Created Date</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                 if (!empty($getcategory))
                                                 {
                                                    $id = 1;
                                                foreach($getcategory as $value)
                                                {
                                                    foreach($value as $data)
                                                    {
                                                     ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $id;?>
                                                        </td>
                                                        <td>
                                                        <?php echo $data->categoryname;?>
                                                        </td>
                                                        <td><?php echo $data->created;?></td>
                                                       
                                                        <td class="text-right">
                                                          
                                                            <a href="viewuser.php?id=<?php echo $data->idcategory;?>">
                                                                <button class="btn btn-sm btn-info" rel="tooltip" type="button">
                                                                    <i class="material-icons">
                                                                        person
                                                                    </i>
                                                                </button>
                                                            </a>
                                                            <a href="editcategory.php?id=<?php echo $data->idcategory;?>">
                                                                <button class="btn btn-sm btn-success" rel="tooltip" type="button">
                                                                    <i class="material-icons">
                                                                        edit
                                                                    </i>
                                                                </button>
                                                            </a>
                                                            <a href="curldeletecategory.php?id=<?php echo $data->idcategory;?>">
                                                                <button class="btn btn-sm btn-danger" rel="tooltip" type="button">
                                                                    <i class="material-icons">
                                                                        close
                                                                    </i>
                                                                </button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                     $id++;
                                                     }//second for loop ends
                                                     }//first forloop ends
                                                    }//if ends
                                                    ?>

                                                </tbody>
                                            </table>
                                            <a href="addcategory.php">Add Category
                                                <button class="btn btn-sm btn-success" rel="tooltip" type="button">
                                                    <i class="material-icons">
                                                        add_box
                                                    </i>
                                                 </button>
                                            </a>
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
                <script src="../assets/js/core/jquery.min.js" type="text/javascript">
                </script>
                <script src="../assets/js/core/popper.min.js" type="text/javascript">
                </script>
                <script src="../assets/js/core/bootstrap-material-design.min.js" type="text/javascript">
                </script>
                <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js">
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