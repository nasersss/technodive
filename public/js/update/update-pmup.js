     //edit pmup
     const edit = document.querySelectorAll('.edit');
     document.querySelectorAll('.edit').forEach(item => {
         item.addEventListener('click', e => {
             const $select = document.querySelector('#tank');
             const $option = $select.querySelector('#myId');
             const id = item.dataset.tank;
             document.getElementById("id").value = item.dataset.id;
             $select.value = id;
             $('#editModal').modal('show');
         })
     })

