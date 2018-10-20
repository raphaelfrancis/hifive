<?php
session_start();
?>
<!DOCTYPE doctype html>
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
                </link>
            </link>
        </link>
    </head>
    <body>
        <div class="">
            
            <div class="content">
                <div class="container-fluid">
                    <!-- your content here -->
                    
                    <div class="row" style="margin-top:100px">
                        <div class="col-md-6 offset-3">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title ">
                                        Admin Login
                                    </h4>
                                    <p class="card-category">
                                        
                                    </p>
                                </div>
                                <div class="card-body">
                                    <form action="curluserlogin.php" method="post">
                                        <div class="form-group">
                                            <label for="username">
                                                Username:
                                            </label>
                                            <input class="form-control" name="uname" type="text">
                                            </input>
                                        </div>
                                        <div class="form-group">
                                            <label for="pwd">
                                                Password:
                                            </label>
                                            <input class="form-control" name="pwd" type="password">
                                            </input>
                                        </div>
                                        <button class="btn btn-primary" name="login" type="submit">
                                            Login
                                        </button>
                                    </form>
                                    <?php
                                    if(isset($_SESSION["newresult"]))
                                    {
                                           
                                    echo "<span style=color:green>Failed to login</span>";
                                
                                    }
                                    session_destroy();
                                    ?>
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
                                </script>
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
</html>
