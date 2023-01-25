//edit modal
const edit =document.querySelectorAll('.edit');
document.querySelectorAll('.edit').forEach(item => {
        item.addEventListener('click', e => {

        document.getElementById("id_update").value =item.dataset.id;
        document.getElementById("quantity").value =item.dataset.quantity;

        const type = document.querySelector("#type1");
        const senderName = document.querySelector("#clintName");

        for(var i=0; i < senderName.options.length; i++)
        {
            if(senderName.options[i].value === item.dataset.sender_name)
            {
                senderName.selectedIndex = i;
                break;
            }
        }
        for(var i=0; i < type.options.length; i++)
        {
            if(type.options[i].value === item.dataset.type)
            {
                type.selectedIndex = i;
                break;
            }
        }


            for (let index = 1; index < senderName.options.length; index++) {
                if(senderName.options[index].innerHTML.split('-')[1].split(' ')[0] == type.options[type.selectedIndex].innerHTML)
                {
                    senderName.options[index].removeAttribute('hidden');
                }
                else
                {
                    senderName.options[index].setAttribute('hidden',true);
                }
            }



        $('#updateModal').modal('show');
    })
})

function functionSelectType()
{
    const type = document.querySelector("#type1");
    const senderName = document.querySelector("#clintName");

    console.log(type.selectedIndex);
    var account=[];
    if(type.selectedIndex ==1 )

        {
            senderName.options.selectedIndex = 0;
            accounts.forEach(element => {
                element.setAttribute('hidden',true);
                let name = element.value.split('-');
                if(name[1]=='بترول'){
                    element.removeAttribute('hidden')
                }
                 });
        }
   else if(type.selectedIndex ==2) {
    senderName.options.selectedIndex = 0;
    accounts.forEach(element => {
        element.setAttribute('hidden',true);
        let name = element.value.split('-');
        if(name[1]=='ديزل'){
            element.removeAttribute('hidden')
        }
         });
   }
}
