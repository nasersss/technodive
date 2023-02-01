$('#confirmDelete').hide();
document.querySelectorAll('.delete-item').forEach(item => {
    item.addEventListener('click', e => {
      e.preventDefault();
      if(item.dataset.category_delete==1)
      $("#categoryDeleteMessage").text('انتبه سوف يتم حذف الصنف مع جميع المقالات المرتبطة ...');
      $('#ConfirmDeleteForm').attr('action', item.dataset.route);
      $('#confirmDelete').show();
    })
  });
$('#closeConfirmDelete').click(function(){
    $('#confirmDelete').hide();
});