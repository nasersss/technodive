//confirm modal

const confirm =document.querySelectorAll('.confirm');

document.querySelectorAll('.confirm').forEach(item => {
        item.addEventListener('click', e => {
        const header = document.querySelector('#header_confirm');
        const contentText = document.querySelector('#content_confirm');
        const id = item.dataset.id;
        const title = item.dataset.title;
  
        header.innerHTML = title;
        contentText.innerHTML=`هل أنت متأكد من ${title}`;
        const route = item.dataset.route;
        const form = document.querySelector('#confirmForm');
        form.action;
        form.action =`${route}`;   
        document.getElementById("id_confirm").value = item.dataset.id;
        document.getElementById("confirm_type").value = item.dataset.confirm_type;
        $('#confirmModal').modal('show');
    })
})
