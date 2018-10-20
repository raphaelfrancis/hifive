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
                                            New Service
                                        </p>
                                    </div>
                                    <div class="card-body">
                                        <form>


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
                                                        <select class="form-control">
                                                            <option value="service1">service1</option>
                                                            <option value="service2">service1</option>
                                                            <option value="service2">service1</option>
                                                            <option value="service2">service1</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                    <div class="col-md-6">
                                                    <div class="form-group">
                                                        <!-- <label class="bmd-label-floating">
                                                            Service 
                                                        </label> -->
                                                        <select class="form-control">
                                                            <option value="category1">category1</option>
                                                            <option value="category2">category2</option>
                                                            <option value="category3">category3</option>
                                                            <option value="category4">category4</option>
                                                        </select>
                                                    
                                                        <!-- <input class="form-control" type="text" id="service_name" name="service_name">
                                                        </input>
                                                    </div> -->
                                                </div>
                                                </div>
                                            </div>
                                           
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">
                                                                message
                                                            </label>
                                                        <textarea class="form-control" rows = "2"cols = "90">
                                                            
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
                                                            <input class="form-control" id="parentcat_name" name="parentcat_name" type="text">
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
                                                            <input class="form-control" id="parentcat_name" name="parentcat_name" type="text">
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
                                                            <input class="form-control" type="text" name="amount" id="amount">
                                                            </input>
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
                                                            <input class="form-control" type="text" name="amount" id="amount">
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
                                                            <input class="form-control" type="text" name="amount" id="amount">
                                                            </input>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            <button class="btn btn-primary pull-right" type="submit" id="submit" name="submit">
                                                Request
                                            </button>
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
</html>     

