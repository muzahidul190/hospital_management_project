window.onload = function() {
    let dashboard_nav = document.querySelector('.secondary_nav');

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
