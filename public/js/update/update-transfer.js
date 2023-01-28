
//update modal
const senderNameSelect = document.querySelector('#senderName');
const update =document.querySelectorAll('.edit');
document.querySelectorAll('.edit').forEach(item => {
        item.addEventListener('click', e => {
        const id = item.dataset.id;
        const is_active = item.dataset.is_active;
        const title = item.dataset.title;

         document.querySelector('#recipientName').value = item.dataset.recipient_name;
         document.querySelector('#type').value = item.dataset.type;
         document.querySelector('#quantity').value = item.dataset.quantity;
         document.querySelector('#accounterId').value = item.dataset.accounter_id;
         document.querySelector('#rate').value = item.dataset.rate;

         for(var i=0; i < senderNameSelect.options.length; i++)
         {

                 if(senderNameSelect.options[i].value === item.dataset.sender_name)
                 {
                     senderNameSelect.selectedIndex = i;
                    break;
                 }
         }
        const route = item.dataset.route;
        const formUpdate = document.querySelector('#updateForm');

        formUpdate.action;
        formUpdate.action =`${route}`;
        document.getElementById("id_update").value =item.dataset.id;

        if(document.querySelector('#type').selectedIndex == 1)
        {
            for (let index = 1; index < senderNameSelect.options.length; index +=2) {
                senderNameSelect.options[index].removeAttribute('hidden');
                senderNameSelect.options[index + 1].setAttribute('hidden',true);
            }
        }
        else
        {
            for (let index = 2; index < senderNameSelect.options.length; index +=2) {
                senderNameSelect.options[index].removeAttribute('hidden')
                senderNameSelect.options[index - 1].setAttribute('hidden',true);
            }
        };
        $('#updateModal').modal('show');
    })
})


function functionSelectType()
{
    senderNameSelect.selectedIndex = 0;
    if(document.querySelector('#type').selectedIndex == 1)
    {
        console.log('ptrol');
        for (let index = 1; index < senderNameSelect.options.length; index +=2) {
            senderNameSelect.options[index].removeAttribute('hidden');
            senderNameSelect.options[index + 1].setAttribute('hidden',true);
        }

    }
    else
    {

        for (let index = 2; index < senderNameSelect.options.length; index +=2) {
            senderNameSelect.options[index].removeAttribute('hidden')
            senderNameSelect.options[index - 1].setAttribute('hidden',true);
        }

    };
}
