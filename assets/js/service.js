//selecting services from the listbox
$(function() 
{
    function moveItems(origin,dest){
        $(origin).find(':selected').appendTo(dest);
    }
function moveAllItems(origin, dest) {
    $(origin).children().appendTo(dest);
}

    $('#btnleft').click(function () {
    moveItems('#lstBox2', '#lstBox1');
    });
 
    $('#btnright').on('click',function () {
    moveItems('#lstBox1', '#lstBox2');
    });

    $('#btnallleft').on('click', function () {
    moveAllItems('#lstBox2', '#lstBox1');
});
 
$('#btnallright').on('click', function () {
    moveAllItems('#lstBox1', '#lstBox2');
});
});