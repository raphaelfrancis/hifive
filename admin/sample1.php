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
        <div class = "card">
               <table id = "mytable">
               </table>
            <div>
</body>
       
            
                <!-- End Navbar -->
               
                        
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
                <script>
$(document).ready(function() {
 // executes when HTML-Document is loaded and DOM is ready
 $.ajax({
            type: "POST",
            url: "read.php",
            dataType: "json",
            success : function(data){
                if (data)
                {
                 var person = JSON.stringify(data['data']);
                 var tbl=$("<table border=1><center>").attr("id","mytable");
                 //$("#div1").append(tbl);
                 
                 for(var i=0;i<=person.length;i++)
                 {
                    var stddata = JSON.stringify(data['data'][i]);
                    var obj = $.parseJSON(stddata);
                    var pid = obj["profileid"];
                    //alert(pid);
                    var obj = $.parseJSON(stddata);
                    var pid = obj["profileid"]['i'];
                    
                    //document.getElementById("id").value = pid;
                    //document.getElementById("id").innerHTML = pid;
                    var tr="<tr>";
                    var td1="<td>"+obj["phone"]+"</td>";
                    var td2="<td>"+obj["email"]+"</td>";
                    var td3="<td>"+obj["city"]+"</td>";
                    var td4="<td>"+obj["state"]+"</td>";
                    var td5="<td>"+obj["district"]+"</td>";
                    
                   
                    
                    // var td6="<td><button  id='id' value= 'id' onclick=fu(this.value);>"+obj["id"]+"</button></td>";
                    // var td7="<td><a href=edit.php?id= >UPDATE</a></td></tr>";
                    $("#mytable").append(tbl+tr+td1+td2+td3+td4+td5).append('<a href="viewuser.html"><td><button class="btn btn-info btn-sm" rel="tooltip" type="button"><i class="material-icons">person</i></button></td></a><td><a href="edituser.html"><a href="edituser.html"><i class="material-icons"><button class="btn btn-success btn-sm" rel="tooltip" type="button"> <i class="material-icons">edit</i></button></a></td><td><button class="btn btn-danger btn-sm" rel="tooltip" type="button"><i class="material-icons"> close</i></td>');
                 }
                }
                else
                {
                    alert("error");
                }
            }
        });
});

</script>

                
            </div>
        </div>
    </body>
</html>
<script>
$(document).ready(function() {
 // executes when HTML-Document is loaded and DOM is ready
 $.ajax({
            type: "POST",
            url: "read.php",
            dataType: "json",
            success : function(data){
                if (data)
                {
                 var person = JSON.stringify(data['data']);
                 var tbl=$("<table border=1><center>").attr("id","mytable");
                 //$("#div1").append(tbl);
                 
                 for(var i=0;i<=person.length;i++)
                 {
                    var stddata = JSON.stringify(data['data'][i]);
                    var obj = $.parseJSON(stddata);
                    var pid = obj["profileid"];
                    //alert(pid);
                    var obj = $.parseJSON(stddata);
                    var pid = obj["profileid"]['i'];
                    
                    //document.getElementById("id").value = pid;
                    //document.getElementById("id").innerHTML = pid;
                    var tr="<tr>";
                    var tr1 = "</tr>";
                    var td0= "1";
                    var td2="<td>"+obj["profileid"]+"</td>";
                    var td3="<td>"+obj["username"]+"</td>";
                    var td4="<td>"+obj["phone"]+"</td>";
                    var td5="<td>"+obj["email"]+"</td>";
                    var td6="<td>"+obj["address1"]+"</td>";
                    var td7="<td>"+obj["address2"]+"</td>";
                    var td10 = '<td><a href="viewuser.html"><button class="btn btn-info btn-sm" rel="tooltip" type="button"><i class="material-icons">person</i></button></td>';
                    var td11 = '<td><a href="edituser.php?id='+obj["profileid"]+'"><button class="btn btn-sm btn-success" rel="tooltip" type="button"><i class="material-icons">edit</i></button></td>';
                    var td12 = '<td><a href="viewuser.html?id='+obj["profileid"]+'"><button class="btn btn-danger btn-sm" rel="tooltip" type="button"><i class="material-icons">close</i></button></td>';
                    td0++;
                   
                    
                    // var td6="<td><button  id='id' value= 'id' onclick=fu(this.value);>"+obj["id"]+"</button></td>";
                    // var td7="<td><a href=edit.php?id= >UPDATE</a></td></tr>";
                    $("#mytable").append(tr+td0+td2+td3+td4+td5+td6+td7+td10+td11+td12);
                 }
                }
                else
                {
                    alert("error");
                }
            }
        });
});

</script>