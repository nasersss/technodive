
<!--  Modal toggle Tank -->
<div class="modal fade" id="toggleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modalEdit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="header"><strong></strong></h4>
                <i type="reset" data-bs-dismiss="modal" aria-label="Close" class="las las la-times text-danger scale5"></i>
            </div>
            <div class="modal-body">
                <div class="text-center mb-4">
                    <p class="address-subtitle text-danger" id="content"> </p>
                </div>
                <form id="toggleForm" method="POST" action=""
                    class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework needs-validation" novalidate="">
                    @csrf
                    <input type="hidden" name="id" id="id_toggle">
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-danger me-sm-3 me-1" id="btncomfirm">نعم</button>
                        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                            aria-label="Close">الغاء</button>
                    </div>
                    <input type="hidden">
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal toggle Tank -->

