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