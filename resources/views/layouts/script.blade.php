<script src="{{asset('/vendor/global/global.min.js')}}"></script>
<script src="{{asset('/vendor/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>

<script src="{{asset('/js/toggle/toggle.js')}}"></script>
<script src="{{asset('/js/concel/concel.js')}}"></script>
<script src="{{asset('/js/confirm/confirm.js')}}"></script>
<script src="{{asset('js/print_confirmation/print_confirmation.js')}}"></script>
<script src="{{asset('/js/selected/selected.js')}}"></script>
<script src="{{asset('/js/update/update-transfer.js')}}"></script>

<!-- Required vendors -->
<script src="{{asset('/vendor/chart.js/Chart.bundle.min.js')}}"></script>
{{-- <script src="{{asset('/js/toggle.js')}}"></script> --}}

<!-- Apex Chart -->
<script src="{{asset('/vendor/apexchart/apexchart.js')}}"></script>
<script src="{{asset('/vendor/nouislider/nouislider.min.js')}}"></script>
<script src="{{asset('/vendor/wnumb/wNumb.js')}}"></script>

<!-- Dashboard 1 -->
<script src="{{asset('/js/dashboard/dashboard-1.js')}}"></script>


@yield('script')
<script src="{{asset('/js/custom.min.js')}}"></script>
<script src="{{asset('/js/dlabnav-init.js')}}"></script>
<script src="{{asset('js/validation.js')}}"></script>


<script>
    // this show modal if is return validation from backend
    $(window).on('load', function() {
       showModalAdd = document.querySelectorAll(".showModalAdd");
            if(showModalAdd.length > 0)
              $('#addTank').modal('show');

       showModalEdit = document.querySelectorAll(".showModalEdit");
       console.log(showModalEdit.length)
            if(showModalEdit.length > 0)
              $('#editModal').modal('show');
        });
    
</script>
    <!-- Toastr -->
    <script src="{{asset('/js/toastr/toastr.min.js')}}"></script>

    <!-- All init script -->
    <script src="{{asset('/js/toastr/toastr-init.js')}}"></script>