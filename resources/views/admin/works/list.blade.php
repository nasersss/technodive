@extends('admin.layouts.master')

@section('title')
    عرض الأعمال
@endsection

@section('first-css')
@endsection

@section('header-content')
    عرض الأعمال
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
            <button type="button" class="btn btn-primary  me-1" data-bs-toggle="modal" data-bs-target="#addPump">
                <i class="mdi mdi-plus-circle ms-2"></i>اضافة طرمبة جديدة
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
                                    <th>العنوان</th>
                                    <th>الوصف</th>
                                    <th>الحالة</th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr class="odd" role="row">
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        5
                                    </td>
                                    <td>
                                        بترول
                                    </td>
                                    <td>


                                        <span class="badge badge-danger light">غير مطبوعة</span>
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

                                                <button type="button" value="" data-tank="1" data-id="5"
                                                    class="edit dropdown-item" href="edit all-details.html"><i
                                                        class="bi bi-pencil-square text-success ms-3"></i>تعديل</button>

                                                <button type="button" value="" data-id="1" data-is_active="1"
                                                    data-title="العمل" data-route='#'
                                                    class="toggle dropdown-item" href="toggle "><i
                                                        class="fa fa-trash ms-3 text-danger"></i>تعليق</button>


                                                <button type="button" value="" data-id="1" data-is_active="-1"
                                                    data-title="العمل" data-route='#'
                                                    class="toggle dropdown-item" href="toggle "><i
                                                        class="fa fa-trash ms-3 text-success"></i>تفعيل</button>


                                            </div>
                                        </div>
                                    </td>
                                </tr>


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

    @include('admin.works.modals.new')
    @include('admin.works.modals.update')
    @include('admin.toggle.toggle')

    <!--**********************************
        strat modals
    ***********************************-->
@endsection
@section('script')
    <script src="{{ asset('/js/update/update-pmup.js') }}"></script>
    <script src="{{ asset('/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/js/plugins-init/datatables.init.js') }}"></script>
@endsection
