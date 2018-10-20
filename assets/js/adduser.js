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
var gender =  $("input[name=inlineRadioOptions]:checked").length;
// Initializing Variables With Regular Expressions
var name_regex = /^[a-zA-Z]+$/;
var email_regex = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;;
var add_regex = /^[0-9a-zA-Z]+$/;
var phone_regex = /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/;
// To Check Empty Form Fields.
if (username.length == 0) {
$('#messages').html("<p>* Please fill the mandatory fields *</p>"); 
$("#username").focus();
return false;
}
// Validating Username Field.
else if (!username.match(add_regex) || username.length == 0) {
$('#messages').html("<p>* Username can only contail alphabets and numbers *</p>"); 
return false;
}
// Validating firstname Field.
else if (!firstname.match(name_regex) || firstname.length == 0) {

$('#messages').html("<p>* Please provide firstname - contain alphabets only *</p>");
$("#firstname").focus();
return false;
}
// Validating lastname Field.
else if (!lastname.match(name_regex) || lastname.length == 0) {
$('#messages').html("<p>* Please provide lastname - contain alphabets only *</p>"); 
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
$('#messages').html("<p>* Please enter Password - should be atleast 6 characters length *</p>"); 
$("#password").focus();
return false;
}

//validating confirm password field.

else if(!confirm_password.length>=6&&confirm_password.length<=8 || confirm_password.length == 0) {
	$('#messages').html("<p>*please enter confirm password*</p>");
	$("#confirm_password").focus();
	return false;

}
else if(password!= confirm_password) {
	$('#messages').html("<p>*Passwords does not match*</p>");
	$("#confirm_password").focus();
	return false;	
}


//validating gender field.
else if (gender < 1){
      $('#messages').html("<p>* Please enter your gender*</p>"); 
$("#inlineRadio1").focus();
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
$('#messages').html("<p>* Please enter address - contain alphabets and numbers only *</p>"); 
$("#address1").focus();
return false;
}
// Validating location Field.
else if (!location.match(name_regex) || location.length == 0) {
$('#messages').html("<p>* Please enter location only characters allowed *</p>"); 
$("#location").focus();
return false;
}

// Validating landmark Field.
else if (!landmark.match(name_regex) || landmark.length == 0) {
$('#messages').html("<p>* Please enter landmark - only characters allowed *</p>"); 
$("#landmark").focus();
return false;
}
// Validating city Field.
else if (!city.match(name_regex) || city.length == 0) {
$('#messages').html("<p>* Please enter city - only characters allowed *</p>"); 
$("#city").focus();
return false;
}
// Validating district Field.
else if (!district.match(name_regex) || district.length == 0) {
$('#messages').html("<p>* Please enter district - only characters allowed *</p>"); 
$("#district").focus();
return false;
}
// Validating state Field.
else if (!state.match(name_regex) || state.length == 0) {
$('#messages').html("<p>* Please enter state - only characters allowed *</p>"); 
$("#state").focus();
return false;
}

else {
//alert("Form Submitted Successfuly!");
//return true;
}
});
});
//document ready function ends



































// $(document).ready(function(){
// 	$('#add_user').bootstrapValidator({
// 		container:'#messages',
// 		feedbackIcons: {
// 			valid: 'glyphicon glyphicon-ok',
//             invalid: 'glyphicon glyphicon-remove',
//             validating: 'glyphicon glyphicon-refresh'
// 		},
// 		fields:{
// 			username: {
// 				validators: {
// 					notEmpty: {
// 						message: 'The username is required and cannot be empty'
// 					}
// 				}
// 			},
// 			firstname: {
// 				validators: {
// 					notEmpty: {
// 						message: 'The firstname is required and cannot be empty'
// 					}
// 				}
// 			},
// 			lastname: {
// 				validators: {
// 					notEmpty: {
// 						message: 'The lastname is required and cannot be empty'
// 					}
// 				}
// 			},
// 			email: {
// 				validators: {
// 					notEmpty: {
// 						message: 'The email is required and cannot be empty'
// 					},
// 					emailAddress: {
// 						message: 'The email address is not valid'
// 					}
// 				}
// 			},
// 			password: {
// 				validators: {
// 					notEmpty: {
// 						message: 'The password is required and cannot be empty'
// 					}
// 				}
// 			},
// 			confirm_password: {
// 				validators: {
// 					notEmpty: {
// 						message: 'The confirm password is required and cannot be empty'
// 					}
// 				}
// 			},
// 			age: {
// 				validators: {
// 					notEmpty: {
// 						message: 'The age is required and cannot be empty'
// 					},
// 					stringLength: {
//                         max: 3,
//                         message: 'The age must be less than 3 characters long'
//                     }
// 				}
// 			},
// 			address1: {
// 				validators: {
// 					notEmpty: {
// 						message: 'The address1 is required and cannot be empty'
// 					}
// 				}
// 			},
// 			phone: {
// 				validators: {
// 					notEmpty: {
// 						message: 'The phone number is required and cannot be empty'
// 					},
// 					stringLength: {
//                         max: 10,
//                         message: 'The number must be 10 characters long'
//                     }
// 				}
// 			},
// 			location: {
// 				validators: {
// 					notEmpty: {
// 						message: 'The location is required and cannot be empty'
// 					}
// 				}
// 			},
// 			sublocality: {
// 				validators: {
// 					notEmpty: {
// 						message: 'The sub locality is required and cannot be empty'
// 					}
// 				}
// 			},
// 			landmark: {
// 				validators: {
// 					notEmpty: {
// 						message: 'The landmark is required and cannot be empty'
// 					}
// 				}
// 			},
// 			city: {
// 				validators: {
// 					notEmpty: {
// 						message: 'The city is required and cannot be empty'
// 					}
// 				}
// 			},
// 			district: {
// 				validators: {
// 					notEmpty: {
// 						message: 'The district is required and cannot be empty'
// 					}
// 				}
// 			},
// 			state: {
// 				validators: {
// 					notEmpty: {
// 						message: 'The state is required and cannot be empty'
// 					}
// 				}
// 			}
			
// 		}
// 	});
// 	});
