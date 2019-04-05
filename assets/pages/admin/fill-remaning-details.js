$(function () {

    $('#dobdatepicker').datepicker({
        autoclose: true
    });

    //iCheck for checkbox and radio inputs
    // $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
    //     checkboxClass: 'icheckbox_minimal-blue',
    //     radioClass   : 'iradio_minimal-blue'
    // });


    $('#dobdatepicker').datepicker()
        .on('changeDate', function(e) {
            $(this).parsley().validate();
        });

    $('#dojidatepicker').datepicker()
        .on('changeDate', function(e) {
            $(this).parsley().validate();
        });

    $('.form-success').toggleClass('hidden', true);
    $('.form-danger').toggleClass('hidden', true);

    $('#remaining-details-form').parsley().on('field:validated', function() {
        var ok = $('.parsley-error').length === 0;
        $('.form-success').toggleClass('hidden', !ok);
        $('.form-danger').toggleClass('hidden', ok);
    })
        .on('form:submit', function() {
            return true; // Don't submit form for this demo
        });


    $("#remaining-details").click();
});



$("#is_bos_chairman").click(function () {
    $('#bos_chairman_a').click();
    if($("#is_bos_chairman").prop("checked") == true){

        $("#bos_chairman_certificate").attr("required","true");
        $("#bos_chairman_details").attr("required","true");

        $("#is_bos_member").attr("disabled", true);
    }else{
        $("#bos_chairman_certificate").removeAttr("required");
        $("#bos_chairman_details").removeAttr("required");

        $("#is_bos_member").removeAttr("disabled");
    }
    $("#bos_chairman_certificate").parsley().validate();
    $("#bos_chairman_details").parsley().validate();
});

$("#is_bos_member").click(function () {
    $('#bos_member_a').click();
    if($("#is_bos_member").prop("checked") == true){

        $("#bos_member_certificate").attr("required","true");
        $("#bos_member_details").attr("required","true");

        $("#is_bos_chairman").attr("disabled", true);
    }else{
        $("#bos_member_certificate").removeAttr("required");
        $("#bos_member_details").removeAttr("required");

        $("#is_bos_chairman").removeAttr("disabled");
    }
    $("#bos_member_certificate").parsley().validate();
    $("#bos_member_details").parsley().validate();
});

//Industry Experience Validator

$("#is_industry_experience").click(function () {
    if($("#is_industry_experience").prop("checked") == true) {
        $("#industry_experience_years").attr("required","true");

    }else{
        $("#industry_experience_years").removeAttr("required");

    }
    $("#industry_experience_years").parsley().validate();
});

/*CSI IEEE ISTE ACM...*/
$("#is_ieee").click(function () {
    if($("#is_ieee").prop("checked") == true) {
        $("#ieee_membership_id").attr("required","true");

    }else{
        $("#ieee_membership_id").removeAttr("required");

    }
    $("#ieee_membership_id").parsley().validate();
});
$("#is_csi").click(function () {
    if($("#is_csi").prop("checked") == true) {
        $("#csi_membership_id").attr("required","true");

    }else{
        $("#csi_membership_id").removeAttr("required");

    }
    $("#csi_membership_id").parsley().validate();
});
$("#is_acm").click(function () {
    if($("#is_acm").prop("checked") == true) {
        $("#acm_membership_id").attr("required","true");

    }else{
        $("#acm_membership_id").removeAttr("required");

    }
    $("#acm_membership_id").parsley().validate();
});
$("#is_iste").click(function () {

    if($("#is_iste").prop("checked") == true) {
        $("#iste_membership_id").attr("required","true");

    }else{
        $("#iste_membership_id").removeAttr("required");

    }
    $("#iste_membership_id").parsley().validate();
});

/*Password validator*/
//has uppercase
window.Parsley.addValidator('uppercase', {
    requirementType: 'number',
    validateString: function(value, requirement) {
        var uppercases = value.match(/[A-Z]/g) || [];
        return uppercases.length >= requirement;
    },
    messages: {
        en: 'Your password must contain at least (%s) uppercase letter.'
    }
});

//has lowercase
window.Parsley.addValidator('lowercase', {
    requirementType: 'number',
    validateString: function(value, requirement) {
        var lowecases = value.match(/[a-z]/g) || [];
        return lowecases.length >= requirement;
    },
    messages: {
        en: 'Your password must contain at least (%s) lowercase letter.'
    }
});

//has number
window.Parsley.addValidator('number', {
    requirementType: 'number',
    validateString: function(value, requirement) {
        var numbers = value.match(/[0-9]/g) || [];
        return numbers.length >= requirement;
    },
    messages: {
        en: 'Your password must contain at least (%s) number.'
    }
});

//has special char
window.Parsley.addValidator('special', {
    requirementType: 'number',
    validateString: function(value, requirement) {
        var specials = value.match(/[^a-zA-Z0-9]/g) || [];
        return specials.length >= requirement;
    },
    messages: {
        en: 'Your password must contain at least (%s) special characters.'
    }
});

