$('#updateModal').hide();
document.querySelectorAll('.update-item').forEach(item => {
  item.addEventListener('click', e => {
    e.preventDefault();
    $('#updateId').val(item.dataset.id);
    $('#updateModalLabel').html(item.dataset.modal_title);
    $('#update-item-Form').attr('action', item.dataset.route);
    $('#update-item-Form').attr('method', item.dataset.method);
    $('#imageUrlUpdate').attr('src', item.dataset.path);
    if (item.dataset.type == "certificate") {
      $('.certificate-type').show();
      $('.normal').show();
    } else if (item.dataset.type == 'customer') {
      $('#updateJobEn').val(item.dataset.job_en);
      $('#updateJobAr').val(item.dataset.job_ar);
      $('#updateNameAr').val(item.dataset.name_ar);
      $('#updateNameEn').val(item.dataset.name_en);
      $('#updateDescriptionAr').val(item.dataset.description_ar);
      $('#updateDescriptionEn').val(item.dataset.description_en);
      $('.customer').show();
      $('.team').show();
      
    } else if (item.dataset.type == 'team') {
      $('.team').show();
      $('#updateJobEn').val(item.dataset.job_en);
      $('#updateJobAr').val(item.dataset.job_ar);
      $('#updateNameAr').val(item.dataset.name_ar);
      $('#updateNameEn').val(item.dataset.name_en);
    } else {
      $('.normal').show();

      $('#updateTitleEn').val(item.dataset.title_en);
      $('#updateTitleAr').val(item.dataset.title_ar);
      $('#updateDescriptionAr').val(item.dataset.description_ar);
      $('#updateDescriptionEn').val(item.dataset.description_en);

    }

    $('#updateModal').show();

  })
});
$('#closedUpdateModal').click(function () {
  $('#updateModal').hide();
});
$('#updateAddImageModal').hide();
document.querySelectorAll('.show-update-image').forEach(item => {
  item.addEventListener('click', e => {
    e.preventDefault();
    $('#updateAddImageModal').show();
  })
});

document.querySelectorAll('.close-image-preview-update').forEach(item => {
  item.addEventListener('click', e => {
    e.preventDefault();
    $('#updateAddImageModal').hide();
  })
});
