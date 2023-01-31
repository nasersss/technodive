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

    @include('admin.modals.new')
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
