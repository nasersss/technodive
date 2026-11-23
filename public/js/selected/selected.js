const dieselSelectList = document.querySelector('#dieselSelectList');
const accounts =document.querySelectorAll('.account_clint');
const type = document.querySelector('#type');
function functionSelect() {
    var account=[]; 
    if(type.value==0)
        {
            dieselSelectList.options.selectedIndex = 0;
            accounts.forEach(element => {
                element.setAttribute('hidden',true);
                let name = element.value.split('-');
                if(name[1]=='بترول'){
                    element.removeAttribute('hidden')
                }              
                 });
        }
   else if(type.value==1) {
    dieselSelectList.options.selectedIndex = 0;
    accounts.forEach(element => {
        element.setAttribute('hidden',true);
        let name = element.value.split('-');
        if(name[1]=='ديزل'){
            element.removeAttribute('hidden')
        }    
         });
   }
    
}

