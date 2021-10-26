$(document).ready(function(){
    function verify_email_p(email){
        if(email == ""){
            $(".p-mail-error").html("Please enter email.");
            $(".p-mail-error").css("color","yellow");
        }else{
            $.ajax({
                url : "action.php",
                method : "POST",
                data : {check_email_p:1,email_p:email},
                success : function(data){
                    $(".p-mail-error").html(data);
                    if(data == "Good"){
                        $(".p-mail-error").css("color","green");
                    }else{
                        $(".p-mail-error").css("color","red");
                    }
                }
            });
        }
        $(".p-mail-error").css("visibility","visible");
    }
    $("#p-email").keyup(function(){
        var email = $("#p-email").val();
        verify_email_p(email);
    })



    function verify_email_d(email){
        $.ajax({
            url : "action.php",
            method : "POST",
            data : {check_email_d:1,email_d:email},
            success : function(data){
                $(".d-mail-error").html(data);
                if(data == "Good"){
                    $(".d-mail-error").css("color","green");
                }else{
                    $(".d-mail-error").css("color","red");
                }
                $(".d-mail-error").css("visibility","visible");
            }
        });
    }
    $("#d-email").keyup(function(){
        var email = $("#d-email").val();
        verify_email_d(email);
    })




    function verify_phone_p(email){
        $.ajax({
            url : "action.php",
            method : "POST",
            data : {check_phone_p:1,phone_p:email},
            success : function(data){
                $(".p-phone-error").html(data);
                if(data == "Good"){
                    $(".p-phone-error").css("color","green");
                }else{
                    $(".p-phone-error").css("color","red");
                }
                $(".p-phone-error").css("visibility","visible");
            }
        });
    }
    $("#p-phone").keyup(function(){
        var email = $("#p-phone").val();
        verify_phone_p(email);
    })


    function verify_pass_p(pass,cpass){
        $.ajax({
            url : "action.php",
            method : "POST",
            data : {verify_pass_p:1,check_pass_p:pass,check_cpass_p:cpass},
            success : function(data){
                $(".p-pass-error").html(data);
                if(data == "Password Matched."){
                    $(".p-pass-error").css("color","green");
                }else if(data == "Short Pass!"){
                    $(".p-pass-error").css("color","yellow");
                }else{
                    $(".p-pass-error").css("color","red");
                }
                $(".p-pass-error").css("visibility","visible");
            }
        });
    }
    $("#p-pass").keyup(function(){
        var pass = $("#p-pass").val();
        var cpass = $("#p-cpass").val();
        verify_pass_p(pass,cpass);
    })
    $("#p-cpass").keyup(function(){
        var pass = $("#p-pass").val();
        var cpass = $("#p-cpass").val();
        verify_pass_p(pass,cpass);
    })


    function verify_pass_d(pass,cpass){
        $.ajax({
            url : "action.php",
            method : "POST",
            data : {verify_pass_d:1,check_pass_d:pass,check_cpass_d:cpass},
            success : function(data){
                $(".d-pass-error").html(data);
                if(data == "Password Matched."){
                    $(".d-pass-error").css("color","green");
                }else if(data == "Short Pass!"){
                    $(".d-pass-error").css("color","yellow");
                }else{
                    $(".d-pass-error").css("color","red");
                }
                $(".d-pass-error").css("visibility","visible");
            }
        });
    }
    $("#d-pass").keyup(function(){
        var pass = $("#d-pass").val();
        var cpass = $("#d-cpass").val();
        verify_pass_d(pass,cpass);
    })
    $("#d-cpass").keyup(function(){
        var pass = $("#d-pass").val();
        var cpass = $("#d-cpass").val();
        verify_pass_d(pass,cpass);
    })


    $("#signup-patient").on("submit",function(){
        $.ajax({
            url : "action.php",
            method : "POST",
            data : $("#signup-patient").serialize(),
            success : function(data){
                if(data.search("Signup Successful") != -1){
                    window.location.href = "sign-in-or-sign-up.php";
                }
                alert(data);
            }
        })
    })


    $("#signup-doc").on("submit",function(){
        $.ajax({
            url : "action.php",
            method : "POST",
            data : $("#signup-doc").serialize(),
            success : function(data){
                if(data.search("Signup Successful") != -1){
                    window.location.href = "sign-in-or-sign-up.php";
                }
                alert(data);
            }
        })
    })


    $("#add_new_dep").on("submit",function(){
        $.ajax({
            url : "action.php",
            method : "POST",
            data : $("#add_new_dep").serialize(),
            success : function(data){
                if(data.isAdded){
                    alert(data.name+" is added successfully. Id: "+data.id);
                    window.location.href = "department.php?dep_id="+data.id;
                }else{
                    alert(data);
                }
            }
        })
    })

    $("#mark_done").click(function(){
        console.log($("#mark_done"));
        let app_id = $("#mark_done").parent().parent().children().first().children('a').data('appid');

        $.ajax({
            url : "action.php",
            method : "POST",
            data: {mark_done_clicked: 1,appointment_id: app_id },
            success : function(data){
                alert(data);
            }
        })
    })


})