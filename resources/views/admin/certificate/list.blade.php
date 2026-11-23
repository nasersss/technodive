@extends('admin.layouts.master')

@section('title')
    عرض الشهادات
@endsection

@section('first-css')
@endsection

@section('header-content')
    عرض الشهادات
@endsection

@section('content-body')
    <!--**********************************
                    Content body start
                ***********************************-->
    @include('admin.massages')
    <!-- row -->
    <div class="container-fluid">
        <!--**********************************Tabs Start***********************************-->
        <div class="d-flex flex-wrap align-items-center mb-3">
            <button type="button" class="btn btn-primary  me-1 add-item" data-route="{{ route('certificate_store') }}"
                data-type="certificate" data-method="POST" data-modal_title='إضافة شهادة جديدة'>
                <i class="mdi mdi-plus-circle ms-2"></i>اضافة شهادة جديدة
            </button>
        </div>
        <div class="mb-3 ms-auto">
            <div class="card-tabs style-1 mt-3 mt-sm-0">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="javascript:void(0);" data-bs-toggle="tab" id="transaction-tab"
                            data-bs-target="#Appreciation" role="tab">التقدير</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);" data-bs-toggle="tab" id="Completed-tab"
                            data-bs-target="#Qualification" role="tab">المؤهل </a>
                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************Tabs End***********************************-->
        <div class="row">
            <div class="col-xl-12 tab-content">
                <!--**********************************Table Petrol Start***********************************-->
                @include('admin.certificate.table.appreciation')
                @include('admin.certificate.table.qualification')
                <!--**********************************Table Petrol End***********************************-->
            </div>
        </div>
    </div>

    <!--**********************************
                    Content body end
                ***********************************-->

    <!--**********************************
            strat modals
        ***********************************-->
    @include('admin.modals.image')
    @include('admin.modals.update')
    @include('admin.modals.new')
    @include('admin.toggle.toggle')

    <!--**********************************
            strat modals
        ***********************************-->
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/resumablejs@1.1.0/resumable.min.js"></script>
<script type="text/javascript">
    let imagespath = [];
    let browseFile = $('.browseFile');

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
        $('.imagePreview').attr('src', response.path);
        imagespath.push(response.filename);
        $('.imageUrlPreview').val(imagespath);
        if(imagespath.length>1)
            $('.typeImage').val('array');
        var url = '{{ route("deleted_image", ":id") }}';
        url = url.replace(':id',imagespath);
        $('.canceledUploadVideo').attr('href',url);
        $('.close-image-preview').hide();
        $('.card-footer').show();
        $('.browseFile').hide();
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

    <script src="{{ asset('/js/update/update-pmup.js') }}"></script>
    <script src="{{ asset('/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/js/plugins-init/datatables.init.js') }}"></script>
@endsection
