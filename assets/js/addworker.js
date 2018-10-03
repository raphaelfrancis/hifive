$(document).ready(function() {
$('#submit').click(function(e) {
// Initializing Variables With Form Element Values
var username = $('#username').val();
var firstname = $('#firstname').val();
var lastname = $('#lastname').val();
var email = $('#email').val();
var password = $('#password').val();
var confirm_password = $('#confirm_password').val();
var phone = $('#phone').val();
var age = $('#age').val();
var address1 = $('#address1').val();
var address2 = $('#address2').val();
var location = $('#location').val();
var sublocality = $('#sublocality').val();
var landmark = $('#landmark').val();
var city = $('#city').val();
var district = $('#district').val();
var state = $('#state').val();
var latitude = $('#latitude').val();
var longitude = $('#longitude').val();
var rate = $('#rate').val();
var exp = $('#exp').val();
var gender =  $("input[name=inlineRadioOptions]:checked").length;
var noOfSelectedItems=$('#lstBox2 :selected').length;
// Initializing Variables With Regular Expressions
var name_regex = /^[a-zA-Z]+$/;
var email_regex = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
var add_regex = /^[0-9a-zA-Z]+$/;
var rate_regex = /^[0-9]+$/;
var phone_regex = /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/;

// var pwd_regex = /^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%&]).*$/;;     strong and complex password validation.Can be used if needed.
// Must be at least 8 characters.  At least 1 number, 1 lowercase, 1 uppercase letter.At least 1 special character from @#$%&


// To Check Empty Form Fields.
if (username.length == 0) {
$('#messages').html("<p>* Please fill the mandatory fields *</p>"); 
$("#username").focus();
return false;
}
// Validating username Field.
else if (!username.match(add_regex) || username.length == 0) {
$('#messages').html("<p>* Username can only contain alphabets and numbers *</p>"); 
$("#username").focus();
return false;
}
// Validating firstname Field.
else if (!firstname.match(name_regex) || firstname.length == 0) {

$('#messages').html("<p>*Please provide firstname - contain alphabets only *</p>"); 
$("#firstname").focus();
return false;
}
// Validating lastname Field.
else if (!lastname.match(name_regex) || lastname.length == 0) {
	
$('#messages').html("<p>* Please provide lastname - contain alphabets only*</p>"); 
$("#lastname").focus();
return false;
}


// Validating Email Field.
else if (!email.match(email_regex) || email.length == 0) {
$('#messages').html("<p>* Please enter a valid email address *</p>"); 
$("#email").focus();
return false;
}

// Validating password Field.
else if (!(password.length >= 6 )|| password.length == 0) {
$('#messages').html("<p>* Please enter password - should be atleast 6 characters length *</p>"); 
$("#password").focus();
return false;
}

//validating confirm password field.

else if(!confirm_password.length>=6 || confirm_password.length == 0) {
	$('#messages').html("</P>*Please enter confirm password *</p>");
	$("#confirm_password").focus();
	return false;

}
else if(password!= confirm_password) {
	$('#messages').html("<p>*Passwords do not match*</p>");
	$("#confirm_password").focus();
	return false;	
}


//validating gender field.
else if (gender < 1){
      $('#messages').html("<p>* Please enter your gender*</p>"); 
$("#inlineRadioOptions").focus();
return false;
}

// Validating phone Field.
else if (!phone.match(phone_regex) || phone.length == 0) {

$('#messages').html("<p>* Please enter a valid phone number*</p>"); 
$("#phone").focus();
return false;
} 


// Validating Address Field.
else if (!address1.match(add_regex) || address1.length == 0) {
$('#messages').html("<p>*Please enter address - contain alphabets and numbers only *</p>"); 
$("#address1").focus();
return false;
}
// Validating location Field.
else if (!location.match(name_regex) || location.length == 0) {
$('#messages').html("<p>* Please enter location - Only characters allowed *</p>");
$("#location").focus();
return false;
}

// Validating landmark Field.
else if (!landmark.match(name_regex) || landmark.length == 0) {
$('#messages').html("<p>*Plese enter landmark - only characters allowed  *</p>"); 
$("#landmark").focus();
return false;
}
// Validating city Field.
else if (!city.match(name_regex) || city.length == 0) {
$('#messages').html("<p>* Please enter city - Only characters allowed *</p>"); 
$("#city").focus();
return false;
}
// Validating district Field.
else if (!district.match(name_regex) || district.length == 0) {
$('#messages').html("<p>*Please enter district - only characters allowed*</P>"); 
$("#district").focus();
return false;
}
// Validating state Field.
else if (!state.match(name_regex) || state.length == 0) {
$('#messages').html("<p>* Please enter state only characters allowed *</p>"); 
$("#state").focus();
return false;
}
// validating category field
else if(noOfSelectedItems==0)
{
$('#messages').html("<p>* select category *</p>"); 
$("#lstBox2").focus();
return false;
}
else if (!rate.match(rate_regex) || rate.length == 0) {
$('#messages').html("<p>*Please enter rate - only numbers allowed*</p>"); 
$("#rate").focus();
return false;
}

else {
alert("Form Submitted Successfuly!");
return true;
}
});
});

