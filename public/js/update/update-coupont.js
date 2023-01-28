//edit modal
const edit =document.querySelectorAll('.edit');
document.querySelectorAll('.edit').forEach(item => {
        item.addEventListener('click', e => {

        document.getElementById("id_update").value =item.dataset.id;
        document.getElementById("quantity").value =item.dataset.quantity;

        const type = document.querySelector("#type");
        const senderName = document.querySelector("#senderName");

        for(var i=0; i < senderName.options.length; i++)
        {
            console.log(senderName.options[i].value);
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

        if(type.selectedIndex == 1)
        {
            for (let index = 1; index < senderName.options.length; index +=2) {
                senderName.options[index].removeAttribute('hidden');
                senderName.options[index + 1].setAttribute('hidden',true);
            }
        }
        else
        {
            for (let index = 2; index < senderName.options.length; index +=2) {
                senderName.options[index].removeAttribute('hidden')
                senderName.options[index - 1].setAttribute('hidden',true);
            }
        };

        $('#updateModal').modal('show');
    })
})
function functionSelectType()
{
    senderName.selectedIndex = 0;
    if(type.selectedIndex == 1)
    {
        console.log('ptrol');
        for (let index = 1; index < senderName.options.length; index +=2) {
            senderName.options[index].removeAttribute('hidden');
            senderName.options[index+1].setAttribute('hidden',true);
        }

    }
    else
    {

        for (let index = 1; index < senderName.options.length; index +=2) {
            senderName.options[index].setAttribute('hidden',true);
            senderName.options[index +1].removeAttribute('hidden');
        }

    };
}
