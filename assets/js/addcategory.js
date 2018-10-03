$(document).ready(function() {
$('#submit').click(function(e) {
// Initializing Variables With Form Element Values
var cat_name = $('#cat_name').val();
var parentcat_name = $('#parentcat_name').val();
var type = $('#type').val();

// Initializing Variables With Regular Expressions
var name_regex = /^[a-zA-Z]+$/;

// To Check Empty Form Fields.
if (cat_name.length == 0) {
$('#messages').html("<p>* Please fill the mandatory fields *</p>"); 
$("#cat_name").focus();
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
$('#messages').html("<p>*Please provide parent category name - contain alphabets only*</p>"); 
return false;
}
// Validating type Field.
else if (!type.match(name_regex) || type.length == 0) {
$('#messages').html("<p>* Please provide type of category - contain alphabets only *</p>"); 
return false;
}
else {
alert("Form Submitted Successfuly!");
return true;
}
});
});