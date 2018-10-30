<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.js"></script>  
         <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">


        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css"/>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>

       
        <link href="../assets/img/apple-icon.png" rel="apple-touch-icon" sizes="76x76">
            <link href="../assets/img/favicon.png" rel="icon" type="image/png">
                <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible"/>
                <title>
                    Hifive
                </title>
                <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport"/>
                <!--     Fonts and icons     -->
                <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" rel="stylesheet" type="text/css"/>
                    <!-- CSS Files -->
                    <link href="../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet"/>
                    
                </link>
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
                            <form class="navbar-form" method= "post" action ="adduser.php">
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
                                            Add User
                                        </h4>
                                        <p class="card-category">
                                            New User
                                        </p>
                                    </div>
                                    <div class="card-body">
                                        <form id="add_user" method= "post" action ="curlinsert.php">

                                            <div class ="row">

                                                    <div class="form-group">
                                                        <div class="col-md-12 col-md-offset-3">
                                                             <div id="messages">
                                                             <div id = "username_result"></div>
                                                             </div>
                                                         </div>
                                                    </div>
                                                </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">
                                                            Username
                                                        </label>
                                                        <input class="form-control" type="text" name="username" id="username">
                                                        </input>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">
                                                            Firstname
                                                        </label>
                                                        <input class="form-control" type="text" name="firstname" id="firstname">
                                                        </input>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">
                                                            Lastname
                                                        </label>
                                                        <input class="form-control" type="text" name="lastname" id="lastname">
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
                                                        <input class="form-control" id="email" type="text" name="email">
                                                        </input>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">
                                                            Password
                                                        </label>
                                                        <input class="form-control" id="password" type="password" name="password">
                                                        </input>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">
                                                           Confirm Password
                                                        </label>
                                                        <input class="form-control" type="password" name="confirm_password" id="confirm_password">
                                                        </input>
                                                    </div>
                                                </div>
                                            </div>
                                          
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">
                                                            Age(optional)
                                                        </label>
                                                        <input class="form-control" type="number" id="age" name="age">
                                                        </input>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                     
                                                    <label class="bmd-label-floating">
                                                            Gender
                                                        </label>

                                                    <div class="form-check form-check-radio form-check-inline">
                                                        <label class="form-check-label">
                                                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="M"> Male
                                                          <span class="circle">
                                                              <span class="check"></span>
                                                          </span>
                                                        </label>
                                                      </div>
                                                      <div class="form-check form-check-radio form-check-inline">
                                                        <label class="form-check-label">
                                                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="F"> Female
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
                                                        <input class="form-control" type="number" id="phone" name="phone">
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
                                                        <input class="form-control" type="text" name="address1" id="address1">
                                                        </input>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">
                                                            Address2(optional)
                                                        </label>
                                                        <input class="form-control" type="text" name="address2" id="address2">
                                                        </input>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">
                                                            location
                                                        </label>
                                                        <input class="form-control" type="text" name="location" id="location">
                                                        </input>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating">
                                                                sub locality(optional)
                                                            </label>
                                                            <input class="form-control" type="text" name="sublocality" id="sublocality">
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating">
                                                                Landmark
                                                            </label>
                                                            <input class="form-control" type="text" name="landmark" id="landmark">
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating">
                                                                city
                                                            </label>
                                                            <input class="form-control" type="text" name="city" id="city">
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
                                                        <input class="form-control" type="text" name="district" id="district">
                                                        </input>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">
                                                           State
                                                        </label>
                                                        <input class="form-control" type="text" name="state" id="state">
                                                        </input>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="row">
                                            <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating">
                                                                Type Of User
                                                            </label>
                                                            <select class="form-control" type="text" name="type" id="type">
                                                            <option value="A">Admin</option>
                                                            <option value="W">Worker</option>
                                                            <option value="U">User</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating">
                                                                Latitude(optional)
                                                            </label>
                                                            <input class="form-control" type="text" name="latitude" id="latitude">
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating">
                                                               Longitude(optional)
                                                            </label>
                                                            <input class="form-control" type="text" name="longitude" id="longitude">
                                                            </input>
                                                        </div>
                                                    </div>
                                                </div>
                                            <button class="btn btn-primary pull-right" type="submit" id="submit" name="submit">
                                                Add
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
<script src="../assets/js/core/jquery.min.js" type="text/javascript">
</script>
<script src="../assets/js/core/popper.min.js" type="text/javascript">
</script>
<script src="../assets/js/core/bootstrap-material-design.min.js" type="text/javascript">
</script>
<script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js">
</script>
<!--Add user form validation-->
<script src="../assets/js/adduser.js">
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
<script type="text/javascript">
 $(document).ready(function(){
  $('#username').keyup(function(){
    var username = $('#username').val();
    var jsonData = {username:username};
    $.ajax({
     type: "POST",
     url: "checkusername.php",
     data: JSON.stringify(jsonData),
     dataType: "json",
     success: function(data)
     {
         
        $('#username').val("");
        $('#username_result').html('This person has already registered');
        $('#username_result').css('color','red');
     }
      
    }); //ajax ends
   
  });//user name change function ends
 }); //document ready function ends
</script> 
    </body>
    
</html>     

