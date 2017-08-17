/**
 * Created by Arne on 17/08/2017.
 */
$(document).ready(function(){
$('#listupdates').on("click", 'input[type=image]', function(e){
    "use strict";
    var id = $(this).prev('input[name=id]').val();

    console.log(id);

    // Ajax Call
    $.post("ajax/deleteMessage.php", {id : id}).
    done(function( response ){
        if(response.status === 'removed') {
            // deadline verwijderen
            $('#'+id).remove();
        }
    });
    e.preventDefault();
});
});
