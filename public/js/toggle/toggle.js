//toggle modal
const toggle =document.querySelectorAll('.toggle');
document.querySelectorAll('.toggle').forEach(item => {
        item.addEventListener('click', e => {
        console.log(item.dataset.id);
        const id = item.dataset.id;
        const is_active = item.dataset.is_active;
        const title = item.dataset.title;
        const route = item.dataset.route;
        const form = document.querySelector('#toggleForm');
        const header = document.querySelector('#header');
        const content = document.querySelector('#content');
        const btn = document.querySelector('#btncomfirm');
        form.action;
        if(is_active==-1){
            header.innerHTML =`تفعيل ${title}`;
            content.innerHTML = `هل أنت متأكد من تفعيل ${title}`;
            content.classList.remove("text-danger");
            content.classList.add("text-primary");
            btn.classList.remove("btn-danger");
            btn.classList.add("btn-primary");
            form.action =`${route}`;
        }
        else{
            header.innerHTML =`تعليق ${title}`;
            content.innerHTML = `هل أنت متأكد من تعليق ${title}`;
            content.classList.remove("text-primary");
            content.classList.add("text-danger");
            btn.classList.remove("btn-primary");
            btn.classList.add("btn-danger");
            form.action =`${route}`;
        }
        document.getElementById("id_toggle").value =item.dataset.id;
        $('#toggleModal').modal('show');
    })
})
