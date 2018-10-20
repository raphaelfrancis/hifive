<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
</head>
<body>
<h1><center>WELCOME</center></h1>
<center><table id ="mytable" border=1><tr><td>ID</td><td>Title</td><td>Body</td><td>Author</td><td>Category id</td><td>ACTION</td></tr></table></center>
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
                    var td1="<td>"+obj["username"]+"</td>";
                    var td2="<td>"+obj["email"]+"</td>";
                    var td3="<td>"+obj["phone"]+"</td>";
                    var td4="<td>"+obj["address1"]+"</td>";
                    var td5="<td>"+obj["address2"]+"</td>";
                    var td6="<td><button  id='id' value= 'id' onclick=fu(this.value);>"+obj["id"]+"</button></td>";
                    var td7="<td><a href=edit.php?id= >UPDATE</a></td></tr>";
                    $("#mytable").append(tr+td1+td2+td3+td4+td5+"<td><button  id='id' value= '"+obj["id"]+"' onclick=fu(this.value);>DELETE</button></td>"+"<td><button><a href=edit.php?id='"+obj["id"]+"'>EDIT</button></td>");
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
<script type="text/javascript">
  function fu(id)
  {
    
    var person={"id":id}
    $.ajax({
            type: "POST",
            url: "delete.php",
            dataType: "json",
            data: JSON.stringify(person),
            success : function(data){
                if (data){
                  //$('#result').html(JSON.stringify(data));
                   //alert(data.message);
                   window.location.href="view.php";
                } else {
                    alert("error");
                }
            }
        });

  }
  function update(id)
  {

    $.ajax({
            type: "GET",
            url: "read_single.php?id="+id,
            dataType: "json",
            
            success : function(data){
                if (data){
                  alert(JSON.stringify(data));
                } else {
                    alert("error");
                }
            }
        });

  }
</script>
            
        
</body>

</table>
<a href="addproduct.php">GO</a>
</html>