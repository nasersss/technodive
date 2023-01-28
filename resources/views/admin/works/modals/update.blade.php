
 <!-- Modal Edit Pump -->
 <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="modalEdit" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h4 class="modal-title"><strong>تعديل الطرمبة </strong></h4>
                 <i type="reset" data-bs-dismiss="modal" aria-label="Close" class="las las la-times text-danger scale5"></i>
             </div>

             <div class="modal-body">
                 <form id="addNewAddressForm" method="post" action="{{ route('updatePump') }}"
                     class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework  needs-validation" novalidate>
                     @csrf
                     <div class="row">
                         <div class="col-md-12">
                             <label class="form-label" for="tankId">حدد رقم الخزان المرتبط بطرمبة</label>
                             <select id="tank" name="idTank" class="form-control" required="">
                                 <option selected id="myId" disabled="disabled" value="">اختار الخزان المرتبط
                                     بطرمبة</option>
                                 @isset($tanks)
                                     @foreach ($tanks as $tank)
                                         <option value="{{ $tank->id }}">
                                             @isset($tank->type)
                                                 @if ($tank->type == 0)
                                                     الخزان رقم {{ $tank->id }} النوع
                                                     بترول
                                                 @else
                                                     الخزان رقم {{ $tank->id }} النوع
                                                     ديزل
                                                 @endif
                                             @endisset
                                         </option>
                                     @endforeach
                                 @endisset
                             </select>
                             <div class="fv-plugins-message-container invalid-feedback">
                                 الرجاء اختيار احدى الخزانات
                             </div>
                             @error('tankId')
                                 <div class="text-danger px-2 showModalEdit">
                                     {{ $message }}
                                 </div>
                             @enderror
                             <input type="hidden" id="id" name="id" value="">
                         </div>
                     </div>
             </div>

             <div class="modal-footer">
                 <button type="submit" class="btn btn-primary me-sm-3 me-1">تعديل</button>
                 <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                     aria-label="Close">الغاء</button>
             </div>
             </form>
         </div>
     </div>
 </div>
 <!--End Model Edit Pump-->
