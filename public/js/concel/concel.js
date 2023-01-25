//concel modal
const concel =document.querySelectorAll('.concel');
document.querySelectorAll('.concel').forEach(item => {
        item.addEventListener('click', e => {
        const id = item.dataset.id;
        const title = item.dataset.title;
        const route = item.dataset.route;
        const form = document.querySelector('#concelForm');
        const header = document.querySelector('#concelheader');
        const content = document.querySelector('#concelcontent');
        const btn = document.querySelector('#concelbtncomfirm');
        form.action;
        header.innerHTML =`الغاء ${title}`;
        content.innerHTML = `هل أنت متأكد من الغاء ${title}`;
        content.classList.remove("text-primary");
        content.classList.add("text-danger");
        btn.classList.remove("btn-primary");
        btn.classList.add("btn-danger");
        form.action =`${route}`;
     
        document.getElementById("id_concel").value =item.dataset.id;
        console.log(item.dataset);

        $('#concelModal').modal('show');
    })
})