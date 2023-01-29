<!-- Modal -->
<div class="modal" id="addModal" style="background:#00000050;">
    <div class="modal-dialog" style="" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title second-color" id="addModalLabel">تأكيد الحذف</h5>
        </div>
        <div class="modal-body">
            
          <form  id="add-item-Form" action="" method=""   class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework needs-validation" novalidate>
            @csrf
            <div class="row">
            <div class="col-md-12">
                <label class="form-label" for="title">العنوان بالعربي </label>
                <input type="text" id="titleAr" required="" value="{{ old("titleAr") }}" name="titleAr" class="form-control" placeholder="الرجاء ادخال العنوان ">
                        <div class="fv-plugins-message-container invalid-feedback ">
                           الرجاء إدخال  العنوان بالعربي
                        </div>
                        @error('title')
                            <div class="text-danger px-2 showModalAdd ">
                            {{ $message }}
                            </div>
                        @enderror
            </div>

        </div>
            
        </div>
        <div class="modal-footer">
          <button type="button" id="closeAddModal" class="btn btn-danger" data-dismiss="modal">إلغاء</button>
          <button type="submit" class="btn btn-primary ">إضافة</button>
        </div>
    </form>
      </div>
    </div>
  </div>