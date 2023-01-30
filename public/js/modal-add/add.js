$('#addModal').hide();
document.querySelectorAll('.add-item').forEach(item => {
    item.addEventListener('click', e => {
      e.preventDefault();
      $('#addModalLabel').html(item.dataset.modal_title);
      $('#add-item-Form').attr('action', item.dataset.route);
      $('#add-item-Form').attr('method', item.dataset.method);
      $('#addModal').show();
    })
  });
$('#closeAddModal').click(function(){
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