const registry =document.querySelectorAll('.registry');
document.querySelectorAll('.registry').forEach(item => {
        item.addEventListener('click', e => {

        const hide = document.querySelectorAll('.re-hide');
        const el='.num-'+item.dataset.id
        const num=document.querySelectorAll(el)

        for (let i = 0; i < hide.length; i++)
            hide[i].style.display='none'

        for (let i = 0; i < num.length; i++) 
            num[i].style.display='table-row'

        $('#registryModal').modal('show');
    })
})
