<!-- Modal -->
<div class="modal  modal-dialog-scrollable " id="addModal" style="background:#00000050;">
    <div class="modal-dialog modal-lg" style="" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title second-color" id="addModalLabel"></h5>
            </div>
            <div class="modal-body">

                <form id="add-item-Form" action="" method=""
                    class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework needs-validation" novalidate>
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-sm-12 ">
                            <label class="form-label" for="titleAr">العنوان بالعربي </label>
                            <input type="text" id="titleAr" required="" value="{{ old('titleAr') }}"
                                name="titleAr" class="form-control" placeholder="الرجاء ادخال العنوان بالعربي ">
                            <div class="fv-plugins-message-container invalid-feedback ">
                                الرجاء إدخال العنوان بالعربي
                            </div>
                            @error('titleAr')
                                <div class="text-danger px-2 showModalAdd ">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label class="form-label" for="titleEn">العنوان بالإنجليزية </label>
                            <input type="text" id="titleEn" required="" value="{{ old('titleEn') }}"
                                name="titleEn" class="form-control" placeholder="الرجاء ادخال العنوان بالإنجليزية ">
                            <div class="fv-plugins-message-container invalid-feedback ">
                                الرجاء إدخال العنوان بالإنجليزية
                            </div>
                            @error('titleEn')
                                <div class="text-danger px-2 showModalAdd ">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 col-sm-12 mt-2">
                            <label class="form-label" for="descriptionAr">الوصف بالعربي </label>
                            <textarea id="descriptionAr" required="" name="descriptionAr" class="form-control"
                                placeholder="الرجاء ادخال الوصف بالعربي ">
                              {{-- {{ old('descriptionAr') }} --}}
                          </textarea>
                            <div class="fv-plugins-message-container invalid-feedback ">
                                الرجاء إدخال الوصف بالعربي
                            </div>
                            @error('descriptionAr')
                                <div class="text-danger px-2 showModalAdd ">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 col-sm-12 mt-2">
                            <label class="form-label" for="descriptionEn">الوصف بالإنجليزية </label>
                            <textarea id="descriptionEn" required="" name="descriptionEn" class="form-control"
                                placeholder="الرجاء ادخال الوصف بالإنجليزية ">
                              {{-- {{ old('descriptionEn') }} --}}
                            </textarea>
                            <div class="fv-plugins-message-container invalid-feedback ">
                                الرجاء إدخال الوصف بالإنجليزية
                            </div>
                            @error('descriptionEn')
                                <div class="text-danger px-2 showModalAdd ">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                       <button class="btn btn-primary mt-3 show-add-image"> ارفاق الصورة</button>
                        <input type="hidden" class="form-control" name="imageUrl" id="imageUrlPreview"  >
                        <input type="hidden" name="typeImage" id="typeImage">

                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" id="closeAddModal" class="btn btn-danger" data-dismiss="modal">إلغاء</button>
                <button type="submit" class="btn btn-primary ">إضافة</button>
            </div>
            </form>
            {{-- Modal upload image --}}
             <!-- Modal -->
  <div class="modal " id="addImageModal">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="">إرفاق الصورة </h5>
         
        </div>
        <div class="modal-body">
          @include('admin.upload-image')
          
        </div>
        <div class="modal-footer">
          <a href="" id="canceledUploadVideo" class="btn btn-secondary" >إلغاء</a>
          <button type="button" class="btn btn-primary close-modal-image" data-dismiss="modal">حفظ </button>
        </div>
      </div>
    </div>
  </div>
            {{-- End Modal upload image  --}}
        </div>
    </div>
</div>
