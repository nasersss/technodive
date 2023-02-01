$('#image-work-update').hide();
document.querySelectorAll('.shows-image-update').forEach(item => {
    item.addEventListener('click', e => {
        e.preventDefault();
       
        images = item.dataset.work;
        const myArr = JSON.parse(images);
        // console.log(myArr);
        for(i = 0 ;i<myArr.length;i++){
            // console.log(myArr[i].image);
            // $('.images').append('<img src='' width=60 height=60 />');
            // $('#images').prepend('<img  src="{{ asset("image.png") }}" />')


        }
    })

});
document.querySelectorAll('.close-image-preview').forEach(item => {
    item.addEventListener('click', e => {
        e.preventDefault();
        $('#image-work-update').hide();
    })
});