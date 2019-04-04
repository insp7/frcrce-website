$(document).ready(function () {

    $('#add-ipr').on('click', function (e) {
        e.preventDefault();

        var year = $('#year').val();
        var patents_published_count = $('#patents_published_count').val();
        var patents_granted_count = $('#patents_granted_count').val();

        var dataToSend = {
            "year": year,
            "patents_published_count": patents_published_count,
            "patents_granted_count": patents_granted_count,
            "manage": "add-ipr"
        };

        $.ajax({
            url: "http://localhost/frcrce/teacher/scripts/ipr/add.php",
            method: "POST",
            data: "ipr_details_json_string=" + JSON.stringify(dataToSend),
            dataType: "text",
            success: function(data) {
                if(data) {
                    // console.log(data);
                    // $('#add-ipr-form').submit();

                    // SET BLANK
                    $('#year').val('');
                    $('#patents_published_count').val('');
                    $('#patents_granted_count').val('');

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

                    toastr["success"]("IPR Added", "Success");
                } else {
                    alert('Some problem' + data);
                    console.log(data);
                }
            }
        });
    });
});