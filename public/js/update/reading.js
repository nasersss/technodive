 // this show modal if is return validation from backend
 $(window).on('load', function() {
    showModalAdd = document.querySelectorAll(".showModalAdd");
    if (showModalAdd.length > 0)
        $('#addReading').modal('show');

    showModalEdit = document.querySelectorAll(".showModalEdit");
    console.log(showModalEdit.length)
    if (showModalEdit.length > 0)
        $('#editModal').modal('show');

    showModalAddEnd = document.querySelectorAll(".showModalAddEnd");
    console.log(showModalAddEnd.length)
    if (showModalAddEnd.length > 0)
        $('#addendReading').modal('show');
});


//edit start reading modal
const edit = document.querySelectorAll('.edit');
document.querySelectorAll('.edit').forEach(item => {
    item.addEventListener('click', e => {
        document.getElementById("id").value = item.dataset.id;
        document.getElementById("start-of-dayRead").value = item.dataset.start_of_day_read;
        console.log(item.dataset.pump_id);
        
        // const selectPump = document.querySelector("#pumpIdStratReading");
        const selectEmploy = document.querySelector("#selectEmployName");
        // for(var i=0; i < selectPump.options.length; i++)
        // {
        //         if(selectPump.options[i].value === item.dataset.pump_id)
        //         {
        //             selectPump.selectedIndex = i;
        //             break;
        //         }
        // }

        for(var i=0; i < selectEmploy.options.length; i++)
        {
            console.log(selectEmploy.options[i])
                if(selectEmploy.options[i].text === item.dataset.employ_name)
                {
                    selectEmploy.selectedIndex = i;
                    // console.log(selectEmploy.options[i].text,selectEmploy.selectedIndex);
                    break;
                }
        }
        $('#editModal').modal('show');
    })
})

// add end reading
const reading = document.querySelectorAll('.reading');
document.querySelectorAll('.reading').forEach(item => {
    item.addEventListener('click', e => {
        console.log(item.dataset.id);
        document.getElementById("idReading").value = item.dataset.id;
        document.getElementById("startReading").value = item.dataset.start_of_day_read;
        $('#addendReading').modal('show');
    })
})

//edit end reading modal
const editend = document.querySelectorAll('.editend');
document.querySelectorAll('.editend').forEach(item => {
    item.addEventListener('click', e => {
        console.log(item.dataset.id);
        document.getElementById("idend").value = item.dataset.id;
        document.getElementById("Strat-of-dayRead").value = item.dataset.start_of_day_read;
        document.getElementById("end-of-dayRead").value = item.dataset.end_of_day_read;
        $('#editmodalend').modal('show');
    })
})