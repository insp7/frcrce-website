$(function () {

    $('#dobdatepicker').datepicker({
        autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass   : 'iradio_minimal-blue'
    });


    $('#dobdatepicker').datepicker()
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
});