$.ajaxSetup({
    cache : false
});

$(document).ready(function(){
    // Init Ajax with CSRF
    var csrf_token = $("meta[name='_csrf']").attr("content");
    // Ajax setup
    $.ajaxSetup({
        beforeSend: function (xhr) {
            // Set CSRF Token.
            xhr.setRequestHeader('x-csrf-token', csrf_token);
        }
    });

});
