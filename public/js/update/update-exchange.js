//edit modal
const edit =document.querySelectorAll('.edit');
document.querySelectorAll('.edit').forEach(item => {
        item.addEventListener('click', e => {

        document.getElementById("id_update").value =item.dataset.id;
        document.getElementById("petrolQuantity").value =item.dataset.petrolquantity;
        document.getElementById("dieselQuantity").value =item.dataset.dieselquantity;

        const type = document.querySelector("#type");
        const senderName = document.querySelector("#senderName");

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
            console.log(type.options[type.selectedIndex].innerHTML.split(' ')[0]);
            if(senderName.options[index].innerHTML.split('-')[1].split(' ')[0] == type.options[type.selectedIndex].innerHTML.split(' ')[0])
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
const type = document.querySelector("#type");
const senderName = document.querySelector("#senderName");
var accounts =document.querySelectorAll('.account_clint');
console.log(type.selectedIndex);
var account=[];
if(type.selectedIndex ==1 )

    {
        senderName.options.selectedIndex = 0;
        accounts.forEach(element => {
            element.setAttribute('hidden',true);
            let name = element.innerHTML.split('-')[1].split(' ')[0];
            if(name =='بترول'){
                element.removeAttribute('hidden')
            }
             });
    }
        else if(type.selectedIndex ==2)
        {
        senderName.options.selectedIndex = 0;
        accounts.forEach(element => {
            element.setAttribute('hidden',true);
            let name = element.innerHTML.split('-')[1].split(' ')[0];
            if(name =='ديزل'){
                element.removeAttribute('hidden')
            }
            });
        }
}
