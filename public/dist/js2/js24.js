
    toastr.options = {
        "debug": false,
        "positionClass": "toast-bottom-left",
        "onclick": null,
        "showMethod": "slideDown",
        "hideMethod": "slideUp",
        "preventDuplicates": true
    }

    $('.select2').select2();

    $('#guest_email').on('keyup', function() {
        $("#guest_email").prop('required',false);
        if ($('#guest_email').val()) {
            $("#guest_email").prop('required',true);
        }
    })


