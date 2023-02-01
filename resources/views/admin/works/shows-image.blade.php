@extends('admin.layouts.master')

@section('title')
    مراجعة الصور
@endsection

@section('first-css')
@endsection

@section('header-content')
مراجعة الصور
@endsection

@section('content-body')
    <!--**********************************
                        Content body start
                    ***********************************-->
                    @include('admin.massages')
                    <!-- row -->
    <div class="container-fluid">
        <!--**********************************Tabs Start***********************************-->
        
        <!--**********************************Tabs End***********************************-->
        <div class="row">
            <div class="row ">
                @foreach ($images   as $image)
                {{-- @if() --}}
                <div class="col-6">
                       <a href="{{ route('work_image_delete',$image->id) }}"> <button class="btn btn-danger">حذف</button></a>
                    <img src="{{asset('storage/images/'.$image->image)}}" class="m-2" width="100%" alt="">
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!--**********************************
                        Content body end
                    ***********************************-->

    <!--**********************************
                strat modals

                strat modals
          <--  ***********************************-->
@endsection
@section('script')

    <script src="{{asset('/js/modal-image/image-privew.js')}}"></script>
    <script src="{{ asset('/js/update/update-pmup.js') }}"></script>
    <script src="{{ asset('/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/js/plugins-init/datatables.init.js') }}"></script>
@endsection
