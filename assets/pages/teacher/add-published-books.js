$(document).ready(function () {

    $('#add-published-book').on('click', function (e) {
        e.preventDefault();

        var details = $('#details').val();

        alert(details);
        var dataToSend = {
            "details": details,
            "manage": "add-published-book"
        };

        $.ajax({
            url: "http://localhost/frcrce/teacher/scripts/published-books/add.php",
            method: "POST",
            data: "published_book_details_json_string=" + JSON.stringify(dataToSend),
            dataType: "text",
            success: function(data) {
                if(data) {
                    console.log(data);

                    // SET BLANK
                    $('#details').val('');

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

                    toastr["success"]("Published Book Added", "Success");
                } else {
                    alert('Some problem' + data);
                    console.log(data);
                }
            }
        });
    });
});