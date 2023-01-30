<!-- Modal Add Pump -->
<div class="modal fade none-border" id="addPump">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>إضافة عمل جديدة</strong></h4>
                <i type="reset" data-bs-dismiss="modal" aria-label="Close"
                    class="las las la-times text-danger scale5"></i>
            </div>
            <div class="modal-body">
                <form id="addNewAddressForm" method="POST" action="{{route('work_store')}}"
                    class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework needs-validation" novalidate
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-label" style="font-weight: bold" for="titleAr">أدخل عنوان العمل
                                بالعربي</label>
                            <input type="text" id="titleAr" name="titleAr" class="form-control" required>
                            <div class="fv-plugins-message-container invalid-feedback ">
                                @error('titleAr')
                                    <div class="text-danger px-2 showModalAdd ">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="fv-plugins-message-container invalid-feedback ">
                                الرجاء أدخال عنوان العمل
                                بالعربي
                            </div>
                        </div>
                        <div class="col-md-12  mt-4">
                            <label class="form-label" style="font-weight: bold" for="titleEn">أدخل عنوان العمل
                                بالانجليزي</label>
                            <input type="text" id="titleEn" name="titleEn" class="form-control" required>
                            <div class="fv-plugins-message-container invalid-feedback ">
                                @error('titleEn')
                                    <div class="text-danger px-2 showModalAdd ">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="fv-plugins-message-container invalid-feedback ">
                                الرجاء أدخال عنوان العمل
                                بالانجليزي
                            </div>
                        </div>
                        <div class="col-md-12  mt-4">
                            <label class="form-label" style="font-weight: bold" for="descriptionAr">أدخل وصف العمل
                                بالعربي</label>
                            <textarea name="descriptionAr" id="descriptionAr" cols="30" rows="10" class="form-control" required>

                            </textarea>
                            <div class="fv-plugins-message-container invalid-feedback ">
                                @error('descriptionAr')
                                    <div class="text-danger px-2 showModalAdd ">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="fv-plugins-message-container invalid-feedback ">
                                الرجاء أدخال الوصف العمل
                                بالعربي
                            </div>
                        </div>
                        <div class="col-md-12  mt-4">
                            <label class="form-label" style="font-weight: bold" for="descriptionEn">أدخل وصف العمل
                                بالانجليزي</label>
                            <textarea name="descriptionEn" id="descriptionEn" cols="30" rows="10" class="form-control" required>

                            </textarea>
                            <div class="fv-plugins-message-container invalid-feedback ">
                                @error('descriptionEn')
                                    <div class="text-danger px-2 showModalAdd ">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="fv-plugins-message-container invalid-feedback ">
                                الرجاء أدخال وصف العمل
                                بالانجليزي
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <label class="form-label" style="font-weight: bold" for="’mainImage">اختر صورة رئيسية
                                للعمل</label>
                            <input class="form-control" required id="’mainImage" name="’mainImage" accept="image/*" type="file"
                                multiple>
                            <div class="fv-plugins-message-container invalid-feedback ">
                                الرجاء اختيار صورة رئيسية للعمل
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <label class="form-label" style="font-weight: bold" for="images">اختر باقي الصور
                                للعمل</label>
                            <input class="form-control" id="images" name="images[]" accept="image/*" type="file"
                                multiple>
                            <div class="fv-plugins-message-container invalid-feedback ">
                                الرجاء اختيار باقي الصور
                                للعمل
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary me-sm-3 me-1">اضافة</button>
                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                    aria-label="Close">الغاء</button>
            </div>
            <input type="hidden">
            </form>
        </div>
        <div class="modal-body">
            
          <form  id="add-item-Form" action="" method=""   class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework needs-validation" novalidate>
            @csrf
            <div class="row">
            <div class="col-md-12">
                <label class="form-label" for="title">العنوان </label>
                <input type="text" id="title" required="" value="{{ old("title") }}" name="title" class="form-control" placeholder="الرجاء ادخال العنوان ">
                        <div class="fv-plugins-message-container invalid-feedback ">
                           الرجاء إدخال  العنوان
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