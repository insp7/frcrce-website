$(document).ready(function () {

    $('#add-publication').on('click', function (e) {
        e.preventDefault();

        var title = $('#title').val();
        var year = $('#year').val();
        var journal = $('#journal').val();

        var is_ugc_approved;
        if($('#is_ugc_approved').prop("checked") == true) {
            is_ugc_approved = 1;
        } else if($('#is_ugc_approved').prop("checked") == false) {
            is_ugc_approved = 0;
        }

        var citation = $('#citation').val();

        var dataToSend = {
            "title": title,
            "year": year,
            "journal": journal,
            "is_ugc_approved": is_ugc_approved,
            "citation": citation,
            "manage": "add-publication"
        };

        $.ajax({
            url: "http://localhost/frcrce/teacher/scripts/publications/add.php",
            method: "POST",
            data: "publication_details_json_string=" + JSON.stringify(dataToSend),
            dataType: "text",
            success: function(data) {
                if(data) {
                    // $('#add-publication-form').submit();

                    // SET BLANK
                    $('#title').val('');
                    $('#year').val('');
                    $('#journal').val('');
                    $('#is_ugc_approved').val('');
                    $('#citation').val('');

                    // SET toastr options
                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": false,
                        "positionClass": "toast-bottom-right",
                        "preventDuplicates": true,
                        "onclick": null,
                        "showDuration": "200",
                        "hideDuration": "1000",
                        "timeOut": "1500",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    };

                    toastr["success"]("Publication Added", "Success");
                } else {
                    alert('Some problem' + data);
                    console.log(data);
                }
            }
        });
    });
});