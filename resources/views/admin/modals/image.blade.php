<div class="modal " id="addImageModal" style="z-index: 8000">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header d-flex justify-content-between">
          <h5 class="modal-title" id="">إرفاق الصورة </h5>
          <a href="" class="close-image-preview"><button type="button" class="btn-close close-image-preview" aria-label="Close" style="position: absolute;left:5%; color:red;"></button></a>
        </div>
        <div class="modal-body">
          @include('admin.upload-image') 
        </div>
        <div class="modal-footer card-footer" style="display: none">
          <a href="" id="" class="btn btn-secondary canceledUploadVideo" >إلغاء</a>
          <button type="button" class="btn btn-primary close-modal-image" data-dismiss="modal">حفظ </button>
        </div>
      </div>
    </div>
  </div>