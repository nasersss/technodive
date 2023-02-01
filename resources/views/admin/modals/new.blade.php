<!-- Modal -->
<div class="modal  " id="addModal" style="background:#00000050;">
    <div class="modal-dialog modal-lg modal-dialog-scrollable " style="" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title second-color" id="addModalLabel"></h5>
            </div>
            <div class="modal-body">

                <form id="add-item-Form" action="" method=""
                    class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework needs-validation" novalidate>
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-sm-12 hide normal">
                            <label class="form-label" for="titleAr">العنوان بالعربي </label>
                            <input type="text" id="titleAr" value="{{ old('titleAr') }}"
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
                        <div class="col-md-6 col-sm-12 hide normal">
                            <label class="form-label" for="titleEn">العنوان بالإنجليزية </label>
                            <input type="text" id="titleEn" value="{{ old('titleEn') }}"
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

                        <div class="col-md-6 col-sm-12 mt-2 hide team">
                            <label class="form-label" for="nameAr">الاسم بالعربي </label>
                            <input type="text" id="nameAr" value="{{ old('nameAr') }}"
                                name="nameAr" class="form-control" placeholder="الرجاء ادخال الاسم بالعربي ">
                            <div class="fv-plugins-message-container invalid-feedback ">
                                الرجاء إدخال الاسم بالعربي
                            </div>
                            @error('nameAr')
                                <div class="text-danger px-2 showModalAdd ">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 col-sm-12 mt-2 hide team">
                            <label class="form-label" for="nameEn">الاسم بالإنجليزية </label>
                            <input type="text" id="nameEn" value="{{ old('nameEn') }}"
                                name="nameEn" class="form-control" placeholder="الرجاء ادخال الاسم بالإنجليزية ">
                            <div class="fv-plugins-message-container invalid-feedback ">
                                الرجاء إدخال الاسم بالإنجليزية
                            </div>
                            @error('nameEn')
                                <div class="text-danger px-2 showModalAdd ">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6 col-sm-12 mt-2 hide team">
                            <label class="form-label" for="jobAr">الوضيفة بالعربي </label>
                            <input type="text" id="jobAr" value="{{ old('jobAr') }}"
                                name="jobAr" class="form-control" placeholder="الرجاء ادخال الوضيفة بالعربي ">
                            <div class="fv-plugins-message-container invalid-feedback ">
                                الرجاء إدخال الوضيفة بالعربي
                            </div>
                            @error('jobAr')
                                <div class="text-danger px-2 showModalAdd ">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 col-sm-12 mt-2 hide team">
                            <label class="form-label" for="jobEn">الوضيفة بالإنجليزية </label>
                            <input type="text" id="jobEn" value="{{ old('jobEn') }}"
                                name="jobEn" class="form-control" placeholder="الرجاء ادخال الوضيفة بالإنجليزية ">
                            <div class="fv-plugins-message-container invalid-feedback ">
                                الرجاء إدخال الوضيفة بالإنجليزية
                            </div>
                            @error('jobEn')
                                <div class="text-danger px-2 showModalAdd ">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6 col-sm-12 mt-2 hide normal customer">
                            <label class="form-label" for="descriptionAr">الوصف بالعربي </label>
                            <textarea id="descriptionAr" name="descriptionAr" class="form-control"
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
                        <div class="col-md-6 col-sm-12 mt-2 hide normal customer">
                            <label class="form-label" for="descriptionEn">الوصف بالإنجليزية </label>
                            <textarea id="descriptionEn" name="descriptionEn" class="form-control"
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

                        <div class="col-12 mt-2 hide certificate-type">
                            <label class="form-label" for="type">نوع الشهادة </label>
                            <select name="type" id="type" class="form-control">
                                <option selected disabled>حدد نوع الشهادة</option>
                                <option value="تقدير-Appreciation">شهادة تقدير-Appreciation Certificate</option>
                                <option value="مؤهل-Qualification">شهادة مؤهل-Qualification Certificate</option>
                            </select>
                            <div class="fv-plugins-message-container invalid-feedback ">
                                الرجاء اختيار نوع الشهادة
                            </div>
                            @error('descriptionEn')
                                <div class="text-danger px-2 showModalAdd ">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                       <button class="btn btn-primary mt-3 show-add-image"> ارفاق الصورة</button>
                        <input type="hidden" class="form-control imageUrlPreview" name="imageUrl" id=""  >
                        <input type="hidden" class="typeImage" name="typeImage" id="">

                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" id="closeAddModal" class="btn btn-danger" data-dismiss="modal">إلغاء</button>
                <button type="submit" class="btn btn-primary ">إضافة</button>
            </div>
            </form>
            {{-- Modal upload image --}}
             <!-- Modal -->
            {{-- End Modal upload image  --}}
        </div>
    </div>
</div>
