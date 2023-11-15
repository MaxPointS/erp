$(document).ready(function () {
    $("#editHomes").on('click', function () {
        $('#houseno_name-label').text("Building Number");
        $("#houseno_name").attr("placeholder", "Building Number");
        $("#house_divs").find('input').prop('disabled', false);
        $("#house_divs").show();
    });
    $("#editBuildings").on('click', function () {
        $('#houseno_name-label').text("Building Number");
        $("#houseno_name").attr("placeholder", "Building Number");
        $("#house_divs").find('input').prop('disabled', false);
        $("#house_divs").show();
    });
    $("#editOffices").on('click', function () {
        $('#houseno_name-label').text("Office Number");
        $("#houseno_name").attr("placeholder", "Office Number");
        $("#house_divs").find('input').prop('disabled', false);
        $("#house_divs").show();
    });

    $(".addaddress").click(function () {
        $('#add_address')[0].reset();
        $('#add_address').data('formValidation').resetForm();
        $('#addaddress').modal('show');
    });

    $(".edit_useraddress").click(function () {
        $('#edit_address')[0].reset();
        $('#edit_address').data('formValidation').resetForm();
        var area = $(this).data('area_id');
        $("#area").val(area);
        $("#address_title").val($(this).data('address_title'));
        $("#block").val($(this).data('block'));
        $("#judda").val($(this).data('judda'));
        $("#street").val($(this).data('street'));
        $("#houseno_name").val($(this).data('houseno_name'));
        $("#extra_direction").val($(this).data('extra_direction'));
        $("#floor").val($(this).data('floor'));
        $("#office_apt").val($(this).data('office_apt'));
        $("#type_name").val($(this).data('type_name'));
        $("#area_name").val($(this).data('area_name'));
        $("#id").val($(this).data('id'));
        var type = $(this).data('type_id');
        if (type == 1) {
            $("#editHomes").attr('checked', 'checked');
            $('#houseno_name-label').text("Building Number");
            $("#houseno_name").attr("placeholder", "Building Number");            
            $("#house_divs").find('input').prop('disabled', false);
            $("#house_divs").show();
            
            $("#editOffices").removeAttr('checked');
            $("#editBuildings").removeAttr('checked');
        } else if (type == 2) {
            $("#editOffices").attr('checked', 'checked');
            $('#houseno_name-label').text("Office Number");
            $("#houseno_name").attr("placeholder", "Office Number");
            $("#house_divs").find('input').prop('disabled', false);
            $("#house_divs").show();

            $("#editHomes").removeAttr('checked');
            $("#editBuildings").removeAttr('checked');
        } else if (type == 3) {
            $("#editBuildings").attr('checked', 'checked');
            $('#houseno_name-label').text("Building Number");
            $("#houseno_name").attr("placeholder", "Building Number");            
            $("#house_divs").find('input').prop('disabled', false);
            $("#house_divs").show();

            $("#editHomes").removeAttr('checked');
            $("#editOffices").removeAttr('checked');
        }

        $('#edit_useraddress').modal('show');
    });

    $('#add_address').formValidation('enableFieldValidators', 'floor', false);
    $('#add_address').formValidation('enableFieldValidators', 'appartment', false);

    $("#Homes").on('click', function () {
        $('#add_address').data('formValidation').resetForm();
        $('#add_address').formValidation('enableFieldValidators', 'floor', false);
        $('#add_address').formValidation('enableFieldValidators', 'appartment', true);

        $("#number").attr("placeholder", "Building Number*");
        $("#house_div").find('input').prop('disabled', false);
        $("#house_div").show();
    });
    $("#Buildings").on('click', function () {
        $('#add_address').data('formValidation').resetForm();
        $('#add_address').formValidation('enableFieldValidators', 'floor', true);
        $('#add_address').formValidation('enableFieldValidators', 'appartment', true);

        $("#number").attr("placeholder", "Building Number*");
        $("#house_div").find('input').prop('disabled', false);
        $("#house_div").show();
    });
    $("#Offices").on('click', function () {
        $('#add_address').data('formValidation').resetForm();
        $('#add_address').formValidation('enableFieldValidators', 'floor', true);
        $('#add_address').formValidation('enableFieldValidators', 'appartment', true);

        $("#number").attr("placeholder", "Office Number*");
        $("#house_div").find('input').prop('disabled', false);
        $("#house_div").show();
    });

    $(".editprofile").click(function () {
        $("#userid").val($(this).data('id'));
        $("#firstname").val($(this).data('firstname'));
        $("#lastname").val($(this).data('lastname'));
        $("#mobileno").val($(this).data('mobileno'));
        $("#housephone").val($(this).data('housephone'));
        $("#workphone").val($(this).data('workphone'));
        $("#company").val($(this).data('company'));
        var gender = $(this).data('gender');
        if (gender == 'male') {
            $("#males").attr('checked', 'checked');
        } else {
            $("#females").attr('checked', 'checked');
        }
        var dateofbirth = $(this).data('dob');
        var dobdata = dateofbirth.split('-');
        var year_selected = dobdata[0];
        var month_selected = dobdata[1];
        var day_selected = dobdata[2];
        $("#year_sel").val(year_selected);
        $("#month_sel").val(month_selected);
        $("#day_sel").val(day_selected);
        $('#editprofile').modal('show');
    });
});