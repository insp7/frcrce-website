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
        $("#industry_certificate").attr("required","true");
        $("#industry_experience_details").attr("required","true");

    }else{
        $("#industry_experience_years").removeAttr("required");
        $("#industry_certificate").removeAttr("required");
        $("#industry_experience_details").removeAttr("required");

    }
    $("#industry_experience_years").parsley().validate();
    $("#industry_certificate").parsley().validate();
    $("#industry_experience_details").parsley().validate();
});

//Subject Chairman Validator
$("#is_subject_chairman").click(function () {
    if($("#is_subject_chairman").prop("checked") == true) {

        $("#subject_chairman_certificate").attr("required","true");
        $("#subject_chairman_details").attr("required","true");

    }else{

        $("#subject_chairman_certificate").removeAttr("required");
        $("#subject_chairman_details").removeAttr("required");

    }
    $("#subject_chairman_certificate").parsley().validate();
    $("#subject_chairman_details").parsley().validate();
});
//Subject Chairman Expert
$("#is_subject_expert").click(function () {
    if($("#is_subject_expert").prop("checked") == true) {

        $("#subject_expert_certificate").attr("required","true");
        $("#subject_expert_details").attr("required","true");

    }else{

        $("#subject_expert_certificate").removeAttr("required");
        $("#subject_expert_details").removeAttr("required");

    }
    $("#subject_expert_certificate").parsley().validate();
    $("#subject_expert_details").parsley().validate();
});
//Staff Selection Committee
$("#is_staff_selection_committee_member").click(function () {
    if($("#is_staff_selection_committee_member").prop("checked") == true) {

        $("#staff_selection_certificate").attr("required","true");
        $("#staff_selection_details").attr("required","true");

    }else{

        $("#staff_selection_certificate").removeAttr("required");
        $("#staff_selection_details").removeAttr("required");

    }
    $("#staff_selection_certificate").parsley().validate();
    $("#staff_selection_details").parsley().validate();
});
//Department Advisory Board
$("#is_department_advisory_board").click(function () {
    if($("#is_department_advisory_board").prop("checked") == true) {

        $("#department_advisory_board_certificate").attr("required","true");
        $("#department_advisory_board_details").attr("required","true");

    }else{

        $("#department_advisory_board_certificate").removeAttr("required");
        $("#department_advisory_board_details").removeAttr("required");

    }
    $("#department_advisory_board_details").parsley().validate();
    $("#department_advisory_board_certificate").parsley().validate();
});
//Academic Auditor
$("#is_academic_audit").click(function () {
    if($("#is_academic_audit").prop("checked") == true) {

        $("#academic_audit_certificate").attr("required","true");
        $("#academic_audit_details").attr("required","true");

    }else{

        $("#academic_audit_certificate").removeAttr("required");
        $("#academic_audit_details").removeAttr("required");

    }
    $("#academic_audit_certificate").parsley().validate();
    $("#academic_audit_details").parsley().validate();
});
//Subject Expert for phd
$("#is_subject_expert_phd").click(function () {
    if($("#is_subject_expert_phd").prop("checked") == true) {

        $("#subject_expert_phd_certificate").attr("required","true");
        $("#subject_expert_phd_details").attr("required","true");

    }else{

        $("#subject_expert_phd_details").removeAttr("required");
        $("#subject_expert_phd_certificate").removeAttr("required");

    }
    $("#subject_expert_phd_details").parsley().validate();
    $("#subject_expert_phd_certificate").parsley().validate();
});
//examiner in other universities
$("#is_other_universities_examiner").click(function () {
    if($("#is_other_universities_examiner").prop("checked") == true) {

        $("#other_universities_examiner_certificate").attr("required","true");
        $("#other_universities_examiner_details").attr("required","true");

    }else{

        $("#other_universities_examiner_certificate").removeAttr("required");
        $("#other_universities_examiner_details").removeAttr("required");

    }
    $("#other_universities_examiner_certificate").parsley().validate();
    $("#other_universities_examiner_details").parsley().validate();
});
//Examination auditor?
$("#is_examination_auditor").click(function () {
    if($("#is_examination_auditor").prop("checked") == true) {

        $("#examination_auditor_certificate").attr("required","true");
        $("#examination_auditor_details").attr("required","true");

    }else{

        $("#examination_auditor_certificate").removeAttr("required");
        $("#examination_auditor_details").removeAttr("required");

    }
    $("#examination_auditor_certificate").parsley().validate();
    $("#examination_auditor_details").parsley().validate();
});
//Subject co-ordinator for Syllabus Revision Committe
$("#is_subject_co_ordinator_src").click(function () {
    if($("#is_subject_co_ordinator_src").prop("checked") == true) {

        $("#subject_co-ordinator_src_certificate").attr("required","true");
        $("#subject_co-ordinator_src_details").attr("required","true");

    }else{

        $("#subject_co-ordinator_src_certificate").removeAttr("required");
        $("#subject_co-ordinator_src_details").removeAttr("required");

    }
    $("#subject_co-ordinator_src_certificate").parsley().validate();
    $("#subject_co-ordinator_src_details").parsley().validate();
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

