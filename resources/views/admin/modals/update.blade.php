<!-- Modal -->
<div class="modal   " id="updateModal" style="background:#00000050;">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" style="" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title second-color" id="updateModalLabel"></h5>
            </div>
            <div class="modal-body">
                <form id="update-item-Form" action="" method=""
                    class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework needs-validation" novalidate>
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-sm-12 ">
                            <label class="form-label" for="titleAr">العنوان بالعربي </label>
                            <input type="text" id="updateTitleAr" required="" value="{{ old('titleAr') }}"
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
                            <input type="text" id="updateTitleEn" required="" name="titleEn" class="form-control"
                                placeholder="الرجاء ادخال العنوان بالإنجليزية ">
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
                            <textarea id="updateDescriptionAr" required="" name="descriptionAr" class="form-control"
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
                            <textarea id="updateDescriptionEn" required="" name="descriptionEn" class="form-control"
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
                        <div class="col-md-6 col-sm-12 mt-2">
                            <img id="imageUrlUpdate" src="" width="100%" alt="">
                        </div>
                        <button class="btn btn-primary mt-3 show-add-image"> استبدال الصورة السابقة</button>
                        <input type="hidden" class="form-control imageUrlPreview" name="imageUrl" id="">
                        <input type="hidden" class="typeImage" name="typeImage" id="">
                        <input type="hidden" id="updateId" name="id">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" id="closedUpdateModal" class="btn btn-danger" data-dismiss="modal">إلغاء</button>
                <button type="submit" class="btn btn-primary ">إضافة</button>
            </div>
            </form>
            {{-- @include('admin.modals.image') --}}

        </div>
    </div>
</div>
</div>
