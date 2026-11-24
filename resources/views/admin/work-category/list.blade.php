@extends('admin.layouts.master')

@section('title')
    أقسام الأعمال
@endsection

@section('first-css')
@endsection

@section('header-content')
    أقسام الأعمال
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
            <button type="button" class="btn btn-primary  me-1 add-item" data-route="{{ route('work_category_store') }}"
                data-method="POST" data-type="work-category" data-modal_title='إضافة قسم جديد'>
                <i class="mdi mdi-plus-circle ms-2"></i>إضافة قسم جديد
            </button>
            <p class="text-muted mb-0" style="margin-inline-start: 1rem;">الأقسام المفعّلة التي فيها أعمال تظهر كفلاتر في صفحة الأعمال. حذف القسم لا يحذف أعماله.</p>
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
                                    <th>الاسم بالعربي</th>
                                    <th>الاسم بالإنجليزية</th>
                                    <th>عدد الأعمال</th>
                                    <th>الحالة</th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr class="odd" role="row">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $category->getTranslation('name', 'ar', false) }}</td>
                                        <td>{{ $category->getTranslation('name', 'en', false) }}</td>
                                        <td>{{ $category->works_count }}</td>
                                        <td>
                                            @if ($category->is_active == 1)
                                                <span class="badge badge-success light">نشط</span>
                                            @else
                                                <span class="badge badge-danger light">غير نشط</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="dropdown dropstart">
                                                <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <button type="button" data-route="{{ route('work_category_update') }}"
                                                        data-method="POST" data-modal_title="تعديل القسم" data-type="work-category"
                                                        data-id="{{ $category->id }}"
                                                        data-title_ar="{{ $category->getTranslation('name', 'ar', false) }}"
                                                        data-title_en="{{ $category->getTranslation('name', 'en', false) }}"
                                                        class="update-item dropdown-item"><i class="bi bi-pencil-square text-success ms-3"></i>تعديل</button>
                                                    <button type="button" data-route="{{ route('work_category_delete', $category->id) }}"
                                                        class="delete-item dropdown-item"><i class="fa fa-trash ms-3 text-danger"></i>حذف</button>
                                                    <button type="button" data-id="{{ $category->id }}"
                                                        data-is_active="{{ $category->is_active }}" data-title="القسم"
                                                        data-route="{{ route('work_categories_toggle') }}"
                                                        class="toggle dropdown-item">
                                                        @if ($category->is_active == 1)
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.modals.update')
    @include('admin.modals.new')
    @include('admin.toggle.toggle')

    <!--**********************************
            strat modals
        ***********************************-->
@endsection
@section('script')
    <script src="{{ asset('/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/js/plugins-init/datatables.init.js') }}"></script>
@endsection
