    // this show modal if is return validation from backend
    //edit modal
    document.querySelectorAll('.edit').forEach(item => {
        item.addEventListener('click', e => {
             document.getElementById("id").value =item.dataset.id;
            document.getElementById("notice").value =item.dataset.notice;
            document.getElementById("quantity").value =item.dataset.quantity;
            document.getElementById("rate").value =item.dataset.rate;

            const selectSupplierId = document.querySelector("#supplierId");
            const selectType = document.querySelector("#type");

            for(var i=0; i < selectSupplierId.options.length; i++)
            {
                    if(selectSupplierId.options[i].text === item.dataset.supplier_name)
                    {
                        selectSupplierId.selectedIndex = i;
                        break;
                    }
            }
            
            for(var i=0; i < selectType.options.length; i++)
            {
                    if(selectType.options[i].value === item.dataset.type)
                    {
                        selectType.selectedIndex = i;
                        break;
                    }
            }
                    $('#editModal').modal('show');
                })
            });
            
            $(window).on('load', function() {
            showModalAdd = document.querySelectorAll(".showModalAdd");
            console.log(showModalAdd.length);
                    if(showModalAdd.length > 0)
                    $('#addTank').modal('show');

            showModalEdit = document.querySelectorAll(".showModalEdit");
            console.log(showModalEdit.length)
            if(showModalEdit.length > 0)
            $('#editModal').modal('show');
            
            showModalAddEnd = document.querySelectorAll(".showModalAddEnd");
            console.log(showModalAddEnd.length)
            if(showModalAddEnd.length > 0)
              $('#addendReading').modal('show');
        });
    
