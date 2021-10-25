$(document).ready(function(){
    function verify_email(email){
        $.ajax({
            url : "action.php",
            method : "POST",
            data : {check_email:1,email:email},
            success : function(data){
                $(".p-mail-error").html(data);
                if(data == "invalid"){
                    $(".p-mail-error").css("color","red");
                }else if(data == "good"){
                    $(".p-mail-error").css("color","green");
                }
                $(".p-mail-error").css("visibility","visible");
            }
        });
    }
    $("#p-email").focusout(function(){
        var email = $("#p-email").val();
        verify_email(email);
    })
})