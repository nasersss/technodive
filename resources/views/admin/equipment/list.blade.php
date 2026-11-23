@extends('admin.layouts.master')

@section('title')
    عرض المعدات
@endsection

@section('first-css')
@endsection

@section('header-content')
    عرض المعدات
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
            <button type="button" class="btn btn-primary  me-1 add-item" data-route="{{ route('equipment_store') }}"
                data-method="POST" data-modal_title='إضافة جهاز جديدة'>
                <i class="mdi mdi-plus-circle ms-2"></i>اضافة جهاز جديدة
            </button>
        </div>
        <!--**********************************Tabs End***********************************-->
        <div class="row">
            <div class="col-xl-12 tab-content">
                <!--**********************************Table Petrol Start***********************************-->
                <div class="tab-pane fade show active" id="Petrol" role="tabpanel" aria-labelledby="Petrol-tab">
                    <div class="table-responsive fs-14">
                        <table
                            class="table table-responsive-md  card-table display mb-4 dataTablesCard text-black text-center"
                            id="example">
                            <thead>
                                <tr>
                                    <th>رقم</th>
                                    <th>العنوان بالعربي</th>
                                    <th>العنوان بالانجليزي</th>
                                    <th>الوصف بالعربي</th>
                                    <th>الوصف بالانجليزي</th>
                                    <th>الصورة</th>
                                    <th>الحالة</th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($equipments)
                                    @foreach ($equipments as $equipment)
                                        <tr class="odd" role="row">
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                @isset($equipment->getTranslations('title')['ar'])
                                                    {{ $equipment->getTranslations('title')['ar'] }}
                                                @endisset
                                            </td>
                                            <td>
                                                @isset($equipment->getTranslations('title')['en'])
                                                    {{ $equipment->getTranslations('title')['en'] }}
                                                @endisset
                                            </td>
                                            <td>
                                                @isset($equipment->getTranslations('description')['ar'])
                                                    {{ $equipment->getTranslations('description')['ar'] }}
                                                @endisset

                                            </td>
                                            <td>
                                                @isset($equipment->getTranslations('description')['en'])
                                                    {{ $equipment->getTranslations('description')['en'] }}
                                                @endisset
                                            </td>
                                            <td>
                                                <img src="{{ asset('storage/images/' . $equipment->image) }}" width="200px"
                                                    alt="">
                                            </td>
                                            <td>
                                                @isset($equipment->is_active)
                                                    @if ($equipment->is_active == 1)
                                                        <span class="badge badge-success light">نشط</span>
                                                    @else
                                                        <span class="badge badge-danger light">غير نشط</span>
                                                    @endif
                                                @endisset
                                            <td>
                                                <div class="dropdown dropstart">
                                                    <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z"
                                                                stroke="#575757" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                            <path
                                                                d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z"
                                                                stroke="#575757" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                            <path
                                                                d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z"
                                                                stroke="#575757" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                        </svg>
                                                    </a>
                                                    <div class="dropdown-menu">

                                                        <button type="button" data-route="{{ route('equipments_update') }}"
                                                            data-method="POST" data-modal_title='تحديث المعدات '
                                                            data-id="@isset($equipment->id){{ $equipment->id }}@endisset"
                                                            data-title_ar="@isset($equipment->getTranslations('title')['ar']){{ $equipment->getTranslations('title')['ar'] }} @endisset"
                                                            data-title_en="@isset($equipment->getTranslations('title')['en']){{ $equipment->getTranslations('title')['en'] }} @endisset"
                                                            data-description_ar="@isset($equipment->getTranslations('description')['ar']){{ $equipment->getTranslations('description')['ar'] }} @endisset"
                                                            data-description_en="@isset($equipment->getTranslations('description')['en']){{ $equipment->getTranslations('description')['en'] }} @endisset"
                                                            data-path="{{ asset('storage/images/' . $equipment->image) }}"
                                                            class="update-item dropdown-item" href="#"><i
                                                                class="bi bi-pencil-square text-success ms-3"></i>تعديل</button>

                                                           <button type="button" 
                                                                data-route="{{route("equipments_delete",$equipment->id)}}"
                                                                 class=" delete-item   dropdown-item"
                                                                href="toggle "><i class="fa fa-trash ms-3 text-danger"></i>حذف</button>
                                                                
                                                        <button type="button" value="" data-id="{{$equipment->id}}" data-is_active="{{$equipment->is_avtive}}"
                                                            data-title="الجهاز" data-route='{{route('equipments_toggle')}}' class="toggle dropdown-item"
                                                            href="toggle ">
                                                            @if ($equipment->is_active == 1)
                                                            <i class="bi bi-eye-slash-fill fa-trash ms-3 text-danger"></i>تعليق
                                                            @else
                                                            <i class="bi bi-eye-fill ms-3 text-success"></i>تفعيل
                                                            @endif
                                                        </button>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endisset
                            </tbody>

                        </table>
                    </div>
                </div>
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
            query: {
                _token: '{{ csrf_token() }}'
            }, // CSRF token
            fileType: ['png', 'jpg'],
            chunkSize: 10 * 1024 *
            1024, // default is 1*1024*1024, this should be less than your maximum limit in php.ini
            headers: {
                'Accept': 'application/json'
            },
            testChunks: false,
            throttleProgressCallbacks: 1,
        });

        resumable.assignBrowse(browseFile[0]);

        resumable.on('fileAdded', function(file) { // trigger when file picked
            showProgress();
            resumable.upload() // to actually start uploading.
        });

        resumable.on('fileProgress', function(file) { // trigger when file progress update
            updateProgress(Math.floor(file.progress() * 100));
        });

        resumable.on('fileSuccess', function(file, response) { // trigger when file upload complete
            response = JSON.parse(response)
            $('.imagePreview').attr('src', response.path);
            imagespath.push(response.filename);
            $('.imageUrlPreview').val(imagespath);
            if (imagespath.length > 1)
                $('.typeImage').val('array');
            var url = '{{ route('deleted_image', ':id') }}';
            url = url.replace(':id', imagespath);
            $('.canceledUploadVideo').attr('href', url);
            $('.close-image-preview').hide();
            $('.card-footer').show();
            $('.browseFile').hide();
        });

        resumable.on('fileError', function(file, response) { // trigger when there is any error
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
