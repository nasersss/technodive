const pupm_list = document.querySelector('#pumpList');
const accounts_pumps =document.querySelectorAll('.account_clint');
const pumps =document.querySelectorAll('.account_cl');

function functionSelect() {
    console.log('yes');
    if(type.value==0)
        {
             dieselSelectList.options.selectedIndex = 0;
             pupm_list.options.selectedIndex = 0;
            accounts_pumps.forEach(element => {
                element.setAttribute('hidden',true);
                let name = element.value.split('-');
                if(name[1]=='بترول'){
                    element.removeAttribute('hidden')
                }
                 });
                 pumps.forEach(element => {
                    element.setAttribute('hidden',true);
                    let type_pupm = element.dataset.type_pupm;
                    if(type_pupm==0){
                        element.removeAttribute('hidden')
                    }
                     });
        }
   else if(type.value==1) {
    dieselSelectList.options.selectedIndex = 0;
    pupm_list.options.selectedIndex=0;

    accounts_pumps.forEach(element => {
        element.setAttribute('hidden',true);
        let name = element.value.split('-');
        if(name[1]=='ديزل'){
            element.removeAttribute('hidden')
        }
         });
         pumps.forEach(element => {
            element.setAttribute('hidden',true);
            let type_pupm = element.dataset.type_pupm;
            if(type_pupm==1){
                element.removeAttribute('hidden')
            }
             });
       }
   }



