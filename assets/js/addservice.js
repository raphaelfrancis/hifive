$(document).ready(function() {
$('#submit').click(function(e) {
// Initializing Variables With Form Element Values
var service_name = $('#service_name').val();
var cat_name = $('#cat_name').val();
var parentcat_name = $('#parentcat_name').val();
var amount = $('#amount').val();

// Initializing Variables With Regular Expressions
var name_regex = /^[a-zA-Z]+$/;
var amt_regex = /^[0-9]+$/;

// To Check Empty Form Fields.
if (service_name.length == 0) {
$('#messages').html("<p>* Please fill the mandatory fields *</p>"); 
$("#service_name").focus();
return false;
}

// Validating service name Field.
else if (!service_name.match(name_regex) || service_name.length == 0) {
$('#messages').html("<p>* Please provide service name name - contain alphabets only *</p>"); 
$("#service_name").focus();
return false;
}
// Validating category name Field.
else if (!cat_name.match(name_regex) || cat_name.length == 0) {
$('#messages').html("<p>* Please provide category name - contain alphabets only *</p>"); 
$("#cat_name").focus();
return false;
}
// Validating parent category name Field.
else if (!parentcat_name.match(name_regex) || parentcat_name.length == 0) {
$('#messages').html("<p>* Please provide parent category name - contain alphabets only *</p>"); 
$("#parentcat_name").focus();
return false;
}
else if(!amount.match(amt_regex) || amount.length == 0) {
	$('#messages').html("<p>*Please provide service amount - contain numbers only *</p>")
	$('#amount').focus();
	return false;
}
else {
alert("Form Submitted Successfuly!");
return true;
}
});
});