//checking empty fields for username and password

  $(document).ready(function() {

      $('#login').click(function(e){
        e.preventDefault();
        var username = $("#username").val();
        var password = $("#password").val();

        if(username == '') 
       {
        $('#usernameerror').css('color','red');
        $('#usernameerror').html('username');
        return false;
       }
       if(password == '') 
       {
        $('#passworderror').css('color','red');
        $('#passworderror').html('Please add password');
        return false;
       }
        
       alert(username);
       return false;
       var person = {"username":username,"password":password}
       
        $.ajax({
            type: "POST",
            url: "addservice.php",
            dataType: "json",
            data: JSON.stringify(person),
            success : function(data){
                if (data.message=="success"){
                  alert(data);
                  //$('#result').html(JSON.stringify(data));
                   window.location.href = "view.php";
                } else {
                    $('#loginfail').html('Invalid Username or Password');
                    $('#loginfail').css('color','red');
                }
            }
        });


      });
  });
