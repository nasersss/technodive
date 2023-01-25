//edit modal
const edit =document.querySelectorAll('.edit');
document.querySelectorAll('.edit').forEach(item => {
        item.addEventListener('click', e => {
        document.getElementById("id").value =item.dataset.id;
        document.getElementById("quantity").value =item.dataset.quantity;
    const selectEmploy= document.querySelector("#employ_name");
    const selectTankId = document.querySelector("#tank_id");
    const selectSupply = document.querySelector("#supplyId");
    console.log(item.dataset.supply_id);
    for(var i=0; i < selectEmploy.options.length; i++)
    {
            if(selectEmploy.options[i].text === item.dataset.employ)
            {
                selectEmploy.selectedIndex = i;
                break;
            }
    }
    for(var i=0; i < selectSupply.options.length; i++)
    {
            if(selectSupply.options[i].value === item.dataset.supply_id)
            {
                selectSupply.selectedIndex = i;
                break;
            }
    }
    for(var i=0; i < selectTankId.options.length; i++)
    {
        console.log(selectTankId.options[i].value);
            if(selectTankId.options[i].value === item.dataset.tank_id)
            {
                selectTankId.selectedIndex = i;
                break;
            }
    }
        $('#editModal').modal('show');
    })
})
