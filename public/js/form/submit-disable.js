        $(document).ready(function () {
            $(".form-disable").submit(function (e) {
                $(".form-btn-disable").attr("disabled", true);
                return true;
            });
        });