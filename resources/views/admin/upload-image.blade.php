
                <div class="card-body p-0">
                    <div class="container ">
                        <div class="row ">
                                 <div class="col-md-12">
                                        <div id="upload-container" class="text-center">
                                            <button id="browseFile" class="btn btn-primary">اختر الصورة</button>
                                        </div>
                                        <div  style="display: none" class="progress mt-3" style="height: 25px">
                                            <div class="progress-bar progress-bar-striped " role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%; height: 100%">75%</div>
                                        </div>
                                        <div class="card-footer p-2" style="display: none">
                                            {{-- <input  type="hidden" id="imageUrlPreview" name="imageUrl[]"> --}}
                                            <img  id="videoPreview" src="" width="100%" alt="">
                                        </div> 
                                    </div>
                         </div>
                    </div>
                </div>
                <script src="{{asset('/vendor/global/global.min.js')}}"></script>
                <script src="{{asset('/vendor/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>
                
{{-- <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/resumablejs@1.1.0/resumable.min.js"></script>
<script type="text/javascript">
 let imagespath = [];
    let browseFile = $('#browseFile');
    let resumable = new Resumable({
        target: '{{ route('uploadImage') }}',
        query:{_token:'{{ csrf_token() }}'} ,// CSRF token
        fileType: ['png','jpg'],
        chunkSize: 10*1024*1024, // default is 1*1024*1024, this should be less than your maximum limit in php.ini
        headers: {
            'Accept' : 'application/json'
        },
        testChunks: false,
        throttleProgressCallbacks: 1,
    });
    
    resumable.assignBrowse(browseFile[0]);

    resumable.on('fileAdded', function (file) { // trigger when file picked
        showProgress();
        resumable.upload() // to actually start uploading.
    });

    resumable.on('fileProgress', function (file) { // trigger when file progress update
        updateProgress(Math.floor(file.progress() * 100));
    });

    resumable.on('fileSuccess', function (file, response) { // trigger when file upload complete
        response = JSON.parse(response)
        $('#videoPreview').attr('src', response.path);
       
        imagespath.push(response.filename);
        $('#imageUrlPreview').val(imagespath);
        if(imagespath.length>1)
            $('#typeImage').val('array');
        var url = '{{ route("deleted_image", ":id") }}';
        url = url.replace(':id', response.filename);
        $('#canceledUploadVideo').attr('href',url);
        $('.card-footer').show();
        $('#browseFile').hide();
    });

    resumable.on('fileError', function (file, response) { // trigger when there is any error
        alert('file uploading error.')
    });


    let progress = $('.progress');
    function showProgress() {
        progress.find('.progress-bar').css('width', '0%');
        progress.find('.progress-bar').html('0%');
        progress.find('.progress-bar').removeClass('bg-success');
        progress.show();
    }

    function updateProgress(value) {
        progress.find('.progress-bar').css('width', `${value}%`)
        progress.find('.progress-bar').html(`${value}%`)
    }

    function hideProgress() {
        progress.hide();
    }
</script>