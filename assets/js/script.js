window.onload = function() {
    let dashboard_nav = document.querySelector('.secondary_nav');
    if(dashboard_nav != null){
        var links = dashboard_nav.querySelectorAll("ul>li>a");
        for (let i = 0; i < links.length; i++) {
            links[i].addEventListener("click", function() {
                if(links[i].getAttribute('href')=="#doctor_approval"){
                    hide_all_except_clicked(links[i].getAttribute('href'));
                }else if((links[i].getAttribute('href')=="#departments")){
                    hide_all_except_clicked(links[i].getAttribute('href'));
                    
                }else if((links[i].getAttribute('href')=="#all_patitents")){
                    hide_all_except_clicked(links[i].getAttribute('href'));
                }else if((links[i].getAttribute('href')=="#approved_doctors")){
                    hide_all_except_clicked(links[i].getAttribute('href'));
                }else if((links[i].getAttribute('href')=="#add_another_dept")){
                    hide_all_except_clicked(links[i].getAttribute('href'));
                }
            });
        }
    }
    var go_back_in_signin_page = document.getElementById('goback');
    if(go_back_in_signin_page != null){
        go_back_in_signin_page.addEventListener('click', ()=>{
            document.getElementById('signinORsignup').classList.add('show-single-item');
            go_back_in_signin_page.classList.add('hide-single-item');
            go_back_in_signin_page.classList.remove('show-single-item');
            hide_all_forms_except(document.getElementById('signinORsignup'));
        })
    
        let singInButton = document.getElementById('signinbtn')
        singInButton.addEventListener('click', ()=>{
            document.getElementById('signInForm').classList.add('show-single-item');

            document.getElementById('signInForm').classList.remove('hide-single-item');
            
            go_back_in_signin_page.classList.add('show-single-item');
            document.getElementById('signinORsignup').classList.add('hide-single-item');
            document.getElementById('signinORsignup').classList.remove('show-single-item');
    
        })

        let singUpButton = document.getElementById('signupbtn')
        singUpButton.addEventListener('click', ()=>{
            document.getElementById('signUpCheck').classList.add('show-single-item');

            document.getElementById('signUpCheck').classList.remove('hide-single-item');
            
            go_back_in_signin_page.classList.add('show-single-item');
            document.getElementById('signinORsignup').classList.add('hide-single-item');
            document.getElementById('signinORsignup').classList.remove('show-single-item');
        })

        let chooseAccountType =  document.querySelectorAll('input[name="profession"]');

        chooseAccountType.forEach(element=>{
            element.addEventListener('click', ()=>{
                let account_type = document.querySelector('input[name="profession"]:checked').value;
                if(account_type == 'doctor'){
                    hide_all_forms_except(document.getElementById('signup-doc'));
                    go_back_in_signin_page.classList.add('show-single-item');
                }else if(account_type == 'patient'){
                    hide_all_forms_except(document.getElementById('signup-patient'));
                    go_back_in_signin_page.classList.add('show-single-item');
                }
            })
        })

        let doc_degrees = document.getElementById('d-degrees');
        let add_degree = document.getElementById('add-another-degree')

        add_degree.addEventListener('click', ()=>{
            let degrees = document.querySelectorAll('.doc-degree');
            for(i=0; i<degrees.length;i++){
                element = degrees[i];
                classes = element.getAttribute('class');
                if(classes.search('hide-single-item') != -1){
                    element.classList.remove('hide-single-item');
                    element.classList.add('show-single-item');
                    break;
                }
            }
        })

    }

    let patient_view = document.querySelector('.patient_view');
    if(patient_view != null){
        let patient_view_nav = document.querySelectorAll('.secondary_nav>ul>li>a');
        patient_view_nav.forEach(element=>{

            let element_text = element.getAttribute('href');
            element_text = element_text.slice(1,element_text.length);
            element.addEventListener('click', ()=>{
                if(element_text == 'appointment'){
                    let appointment = document.getElementById('appointment');
                    hide_all_forms_except(appointment)
                }
                else if(element_text == 'book_seat'){
                    let book_seat = document.getElementById('book_seat');
                    hide_all_forms_except(book_seat)
                }
                else if(element_text == 'update_account'){
                    let update_account = document.getElementById('update_account');
                    hide_all_forms_except(update_account)
                }
            })  
        })
    }

    let doc_dashboard = document.querySelector('.doc_dashboard');
    if(doc_dashboard != null){
        doc_dashboard_nav = document.querySelectorAll('.secondary_nav>ul>li>a');
        
        doc_dashboard_nav.forEach(element=>{
            let element_text = element.getAttribute('href');
            element_text = element_text.slice(1, element_text.length);
            element.addEventListener('click', ()=>{
                if(element_text == 'patient_list'){
                    let patient_list = document.getElementById('patient_list');
                    hide_all_forms_except(patient_list);
                }
                else if(element_text == 'update_details'){
                    let update_details = document.getElementById('update_details');
                    hide_all_forms_except(update_details)
                }
            })
        })
    }
    
}

function hide_all_except_clicked(item_not_to_hide){
    
    a = document.querySelectorAll('.single-item-design');
    a.forEach(element => {
        if(element.getAttribute('id') != item_not_to_hide.slice(1, item_not_to_hide.length)){
            element.classList.add('hide-single-item');
            element.classList.remove('show-single-item');
        }
        else{
            element.classList.add('show-single-item');
            element.classList.remove('hide-single-item');
        }
    });
}

function hide_all_forms_except(item){
    all_forms = document.querySelectorAll('.form-item');
    all_forms.forEach(element => {
        if(element.getAttribute('id') != item.getAttribute('id')){
            element.classList.remove('show-single-item');
            element.classList.add('hide-single-item');
        }
        else{
            item.classList.add('show-single-item');
            item.classList.remove('hide-single-item');
        }
    });
}