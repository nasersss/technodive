// this show modal if is return validation from backend
$(window).on('load', function() {
    showModalAdd = document.querySelectorAll(".showModalAdd");
         if(showModalAdd.length > 0)
           $('#addTank').modal('show');

    showModalEdit = document.querySelectorAll(".showModalEdit");
    console.log(showModalEdit.length)
         if(showModalEdit.length > 0)
           $('#editModal').modal('show');
     });

//edit modal
const edit =document.querySelectorAll('.edit');
console.log(edit);
 document.querySelectorAll('.edit').forEach(item => {
         item.addEventListener('click', e => {
             // alert(item.dataset.id)
         document.getElementById("id").value =item.dataset.id;
         document.getElementById("nameSuppliers").value =item.dataset.name;
         document.getElementById("addressSuppliers").value =item.dataset.address;
         document.getElementById("phoneSuppliers").value =item.dataset.phone;
        //  let type = item.dataset.type;
        //  const selectType = document.querySelector("#type");

        //  for(var i=0; i < selectType.options.length; i++)
        //  {
        //          console.log(selectType.options[i].value);
        //          if(selectType.options[i].value === type)
        //          {
        //              selectType.selectedIndex = i;
        //              break;
        //          }
        //  }
         $('#editModal').modal('show');
     })
 })
