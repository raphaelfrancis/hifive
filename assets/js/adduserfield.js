$(document).ready(function() {
$('#submit').click(function(e) {
// Initializing Variables With Form Element Values
var field_name = $('#field_name').val();
var length = $('#length').val();
var type = $('#type').val();

// Initializing Variables With Regular Expressions
var name_regex = /^[a-zA-Z]+$/;
var len_regex = /^[0-9]+$/;

// To Check Empty Form Fields.
if (field_name.length == 0) {
$('#messages').html("<p>* Please fill the mandatory fields *</p>"); // This Segment Displays The Validation Rule For All Fields
$("#field_name").focus();
return false;
}

// Validating field name Field.
else if (!field_name.match(name_regex) || field_name.length == 0) {
$('#messages').html("<p>* Please provide cname of the field - contain alphabets only *</p>");
$("#field_name").focus();
return false;
}
// Validating type Field.
else if (!type.match(name_regex) || type.length == 0) {
$('#messages').html("<p>*Please provide type of the field - contain alphabets only*</p>"); 
$("#type").focus();
return false;
}
// Validating length Field.
else if (!length.match(len_regex) || length.length == 0) {
$('#messages').html("<p>* Please provide length of the field - only numbers allowed *</p>"); 
$("#length").focus();
return false;
}
else {
alert("Form Submitted Successfuly!");
return true;
}
});
});