$('#addModal').hide();
document.querySelectorAll('.add-item').forEach(item => {
    item.addEventListener('click', e => {
        e.preventDefault();
        $('#addModalLabel').html(item.dataset.modal_title);
        $('#add-item-Form').attr('action', item.dataset.route);
        $('#add-item-Form').attr('method', item.dataset.method);
        $('#addModal').show();
        if (item.dataset.type == "certificate"){
            $('.certificate-type').show();
            $('.normal').show();
        }else if(item.dataset.type == 'customer'){
            $('.customer').show();
            $('.team').show();
        }else if(item.dataset.type == 'team'){
            $('.team').show();
        }else if(item.dataset.type == 'work-category'){
            $('.work-category').show();
            $('.show-add-image').hide();
            $('label[for=titleAr]').text('اسم القسم بالعربي');
            $('label[for=titleEn]').text('اسم القسم بالإنجليزية');
            $('#titleAr, #updateTitleAr').attr('placeholder', 'مثال: إنقاذ سفن');
            $('#titleEn, #updateTitleEn').attr('placeholder', 'e.g. Ship salvage');
        }else if(item.dataset.type == 'work'){
            $('.normal').show();
            $('.work').show();
        }else{
            $('.normal').show();
        }
    })
});
$('#closeAddModal').click(function () {
    $('#addModal').hide();
});
$('#addImageModal').hide();
document.querySelectorAll('.show-add-image').forEach(item => {
    item.addEventListener('click', e => {
        e.preventDefault();
        $('#addImageModal').show();
    })
});

document.querySelectorAll('.close-modal-image').forEach(item => {
    item.addEventListener('click', e => {
        e.preventDefault();
        $('#addImageModal').hide();
    })
});

document.querySelectorAll('.close-image-preview').forEach(item => {
  item.addEventListener('click', e => {
    e.preventDefault();
    $('#addImageModal').hide();
  })
});