// update suppliers
const edit =document.querySelectorAll('.edit');
document.querySelectorAll('.edit').forEach(item => {
        item.addEventListener('click', e => {
            // alert(item.dataset.id)
        document.getElementById("id").value =item.dataset.id;
        document.getElementById("nameSuppliers").value =item.dataset.name;
        document.getElementById("addressSuppliers").value =item.dataset.address;
        document.getElementById("phoneSuppliers").value =item.dataset.phone;
        // let type = item.dataset.type;
        // console.log(type)
        // const selectType = document.querySelector("#type");

        // for(var i=0; i < selectType.options.length; i++)
        // {
        //         if(selectType.options[i].value === type)
        //         {
        //             selectType.selectedIndex = i;
        //             break;
        //         }
        // }
        $('#editModal').modal('show');
    })
})
