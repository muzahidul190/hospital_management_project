function get_day(number_of_date){
    switch(number_of_date){
        case 0: return "Saturday";
        case 1: return "Sunday";
        case 2: return "Monday";
        case 3: return "Tuesday";
        case 4: return "Wednesday";
        case 5: return "Thursday";
        case 6: return "Friday";
    }
}

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

    let mark_done_btn = document.querySelectorAll('.mark_done');
    mark_done_btn.forEach(element => {
        element.addEventListener('click', ()=>{
            let parent_tr = element.parentElement.parentElement;
            let parent_td = parent_tr.parentElement;
            let app_id = parent_tr.children[0].children[0].getAttribute('data-appid');
            
            let data = {as:'as', as1:"sad"}

            if(!app_id){ 
                let boo_and_dept_id =element.getAttribute('data-book-and-dep-id');
                boo_and_dept_id;
                
                data = {
                    mark_done_clicked: 1,
                    booking_id:  boo_and_dept_id.split(',')[0],
                    department_id:  boo_and_dept_id.split(',')[1],
                }
            }
            else{
                data = {
                    mark_done_clicked: 1,appointment_id: app_id 
                }
            }
            $.ajax({
                url : "action.php",
                method : "POST",
                data: data,
                success : function(data){
                    alert(data);
                    if(data="Released this seat."){
                        $('#booked_seat_count').html($('#booked_seat_count').html()-1);
                    }
                    parent_tr.remove();
                    if(parent_td.childElementCount == 1){
                        if(data == "Released this seat."){
                            parent_td.innerHTML = parent_td.innerHTML + ("<tr> <td  colspan='3'>No Booked Seat.. </td></tr>");
                        }
                        else{
                            parent_td.innerHTML = parent_td.innerHTML + ("<tr> <td  colspan='3'>No upcoming appointments for you. </td></tr>");
                        }
                        
                    }

                }
            })
        })
    })


    $("#p_department_seat").change(function(){
        var id = $("#p_department_seat").val();
        $.ajax({
            url : "action.php",
            method : "POST",
            data : {seat_booking:1,id:id},
            success : function(data){
                $("#seat_book_button").prop("disabled",true);
                $("#seat_cost").show();
                var available = data.total_seat - data.booked;
                var av_col = "green";
                if(available <= 0){
                    av_col = "red";
                }
                $("#seat_availability").html("<strong style='font-size:45px;color:"+av_col+";'>"+available+"</strong> seats available out of "+data.total_seat);
                $("#seat_cost").html("This seat will cost you: <big style='color:yellow;'>"+data.cost+"</big>");
                if(av_col == "red"){
                    $("#seat_cost").hide();
                }else{
                    $("#seat_book_button").prop("disabled",false);
                }
            }
        })
    })

    $("#seat_booking_form").on("submit",function(){

        $.ajax(
            {
                url: "action.php",
                method: "POST",
                data: $("#seat_booking_form").serialize(),
                success: function(data){
                    alert(data);
                    $.ajax({
                        url : "action.php",
                        method : "POST",
                        data : {seat_booking:1,id:$("#p_department_seat").val()},
                        success : function(data){
                            $("#seat_book_button").prop("disabled",true);
                            $("#seat_cost").show();
                            var available = data.total_seat - data.booked;
                            var av_col = "green";
                            if(available <= 0){
                                av_col = "red";
                            }
                            $("#seat_availability").html("<strong style='font-size:45px;color:"+av_col+";'>"+available+"</strong> seats available out of "+data.total_seat);
                            $("#seat_cost").html("This seat will cost you: <big style='color:yellow;'>"+data.cost+"</big>");
                            if(av_col == "red"){
                                $("#seat_cost").hide();
                            }else{
                                $("#seat_book_button").prop("disabled",false);
                            }
                        }
                    })
                }
            }
        )
    })
    $("#p_department_app").on('change', ()=>{
        var dept_id = $("#p_department_app").val();
        if(dept_id){
            $.ajax({
                url: "action.php",
                method: "POST",
                data: {
                    p_dashboard_department_id:dept_id,
                },
                success: function(data){
                    data = JSON.stringify(data);
                    var json_obj = JSON.parse(data);
                    if(json_obj.length == 0) $("#select_doc").hide();
                    $("#selected_doc_availability").hide()
                    $("#select_doc").html('<option value="false">Choose a doctor</option>');
                    for(var i=0; i<json_obj.length; i++){
                        var opt = '<option value="'+json_obj[i].doc_id +'">' + json_obj[i].doc_name + '</option>';
                        $("#select_doc").show();
                        $("#select_doc").html($("#select_doc").html()+opt);
                    }
                }
            })
        }
    })
    $("#select_doc").on('change', ()=>{
        var doc_id = $("#select_doc").val();
        $("#selected_doc_availability").hide()
        if(doc_id != "false"){
            $.ajax({
                url: "action.php",
                method: "POST",
                data: {
                    p_dashboard_doc_id:doc_id,
                },
                success: function(data){
                    $("#doc-available-day").html('');
                    for(var i=0; i<data.split(',').length; i++){

                        var li_item = "<option value='"+parseInt(data.split(',')[i]) +"'>"+ get_day(parseInt(data.split(',')[i]))+"</option>"
                        
                        $("#doc-available-day").html($("#doc-available-day").html()+ li_item);
                    }
                    $("#selected_doc_availability").show();
                    $("#btn-appointment").attr('disabled', false);
                    
                    // data = JSON.stringify(data);
                    // var json_obj = JSON.parse(data);
                    // if(json_obj.length == 0) $("#select_doc").hide();
                    // $("#select_doc").html('');
                    // for(var i=0; i<json_obj.length; i++){
                    //     var opt = '<option value="'+json_obj[i].doc_id +'">' + json_obj[i].doc_name + '</option>';
                    //     $("#select_doc").show();
                    //     $("#select_doc").html($("#select_doc").html()+opt);
                    // }
                }
            })
        }
    })
    $('#btn-appointment').on('click', ()=>{
        // EDIT Patient ID here
        var patient_id = 2;
        $.ajax({
            url: "action.php",
            method: "POST",
            data: $("#make_appointment").serialize() + "&patient_id="+patient_id,
            success: function (data){
                alert(data)
            }
        })
    })


    $("#signin").on("submit",function(){
        $("#warning").hide();
        $email = $("#email").val();
        $pass = $("#pass").val();
        if($email == "" && $pass == ""){
            $("#warning").html("Please enter email and password.");
            $("#warning").css("color","red");
            $("#warning").show();
        }else if($email == ""){
            $("#warning").html("Please enter your email.");
            $("#warning").css("color","red");
            $("#warning").show();
        }else if($pass == ""){
            $("#warning").html("Please enter password.");
            $("#warning").css("color","red");
            $("#warning").show();
        }else{
            $remember = $("#remem").val();
            $.ajax({
                url : "action.php",
                method : "POST",
                data : $("#signin").serialize(),
                success : function(data){
                    if(data == "doctors"){
                        window.location.href = "doctor_dashboard.php";
                    }else if(data == "patients"){
                        window.location.href = "patient_dashbord.php";
                    }else if(data == "admin"){
                        window.location.href = "management_dashboard.php";
                    }else{
                        alert(data);
                    }
                }
            })
        }
    })

    $("#logout").on("click",function(){
        $.ajax({
            url : "action.php",
            method : "POST",
            data : {logoutClicked:1},
            success : function(data){
                alert(data);
                if(data == "Logged Out"){
                    window.location.href = "index.php";
                }
            }
        })
    })

    $(".approve").each(function(){
        $(this).click(function(){
            $.ajax({
                url: "action.php",
                method: "POST",
                data: {
                    doc_approve:1,
                    doc_id:$(this).data('doc-id'),
                },
                success: function(data){
                    alert(data);
                }
            })
        })
    });
    $(".delete_doc").each(function(){
        $(this).click(function(){
            $.ajax({
                url: "action.php",
                method: "POST",
                data: {
                    doc_delete:1,
                    doc_id:$(this).data('doc-id'),
                },
                success: function(data){
                    alert(data);
                }
            })
        })
    });
})