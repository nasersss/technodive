 //edit tank
 const edit = document.querySelectorAll('.edit');
 document.querySelectorAll('.edit').forEach(item => {
     item.addEventListener('click', e => {
         const $select = document.querySelector('#typeTank');
         const $option = $select.querySelector('#myId');
         const type = item.dataset.type;
         document.getElementById("id").value = item.dataset.id;
         document.getElementById("capacityTank").value = item.dataset.capacity;
         $select.value = type;
         $('#editModal').modal('show');
     })
 })