<!-- Modal -->
<div class="modal   " id="updateModal" style="background:#00000050;">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" style="" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title second-color" id="updateModalLabel"></h5>
            </div>
            <div class="modal-body">
                <form id="update-item-Form" class="form-disable" action="" method=""
                    class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework " novalidate>
                    @csrf
                    <div class="row" id="elementUpdateForm">
                        <div class="col-md-6 col-sm-12 hide normal">
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
                        <div class="col-md-6 col-sm-12 hide normal">
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
                        <div class="col-md-6 col-sm-12 mt-2 hide team">
                            <label class="form-label" for="updateNameAr">الاسم بالعربي </label>
                            <input type="text" id="updateNameAr" value="{{ old('nameAr') }}"
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
                            <label class="form-label" for="updateNameEn">الاسم بالإنجليزية </label>
                            <input type="text" id="updateNameEn" value="{{ old('nameEn') }}"
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
                            <label class="form-label" for="updateJobAr">الوظيفة بالعربي </label>
                            <input type="text" id="updateJobAr" value="{{ old('jobAr') }}"
                                name="jobAr" class="form-control" placeholder="الرجاء ادخال الوظيفة بالعربي ">
                            <div class="fv-plugins-message-container invalid-feedback ">
                                الرجاء إدخال الوظيفة بالعربي
                            </div>
                            @error('jobAr')
                                <div class="text-danger px-2 showModalAdd ">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 col-sm-12 mt-2 hide team">
                            <label class="form-label" for="updateJobEn">الوظيفة بالإنجليزية </label>
                            <input type="text" id="updateJobEn" value="{{ old('jobEn') }}"
                                name="jobEn" class="form-control" placeholder="الرجاء ادخال الوظيفة بالإنجليزية ">
                            <div class="fv-plugins-message-container invalid-feedback ">
                                الرجاء إدخال الوظيفة بالإنجليزية
                            </div>
                            @error('jobEn')
                                <div class="text-danger px-2 showModalAdd ">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6 col-sm-12 mt-2 hide normal customer">
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
                        <div class="col-md-6 col-sm-12 mt-2 hide normal customer">
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
                        <div class="col-md-6 col-sm-12 mt-2 ">
                            <button class="btn btn-primary mt-3 show-add-image">إضافة صورة جديدة</button>
                            <img id="imageUrlUpdate" src="" width="100%" alt="">
                        </div>
                        <input type="hidden" class="form-control imageUrlPreview" name="imageUrl" id="">
                        <input type="hidden" class="typeImage" name="typeImage" id="">
                        <input type="hidden" id="updateId" name="id">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" id="closedUpdateModal" class="btn btn-danger" data-dismiss="modal">إلغاء</button>
                <button type="submit" class="btn btn-primary form-btn-disable">تحديث</button>
            </div>
            </form>
            {{-- @include('admin.modals.image') --}}

        </div>
    </div>
</div>
</div>
