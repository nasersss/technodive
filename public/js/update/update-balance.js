 //edit tank
 const edit = document.querySelectorAll('.edit');
 document.querySelectorAll('.edit').forEach(item => {
     item.addEventListener('click', e => {
        document.querySelector('#name').value=item.dataset.name;
        document.querySelector('#id').value=item.dataset.id;        
         //$name.value = name;
         $('#editbalance').modal('show');
     })
 })