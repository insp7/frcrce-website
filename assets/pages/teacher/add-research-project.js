$(document).ready(function () {



    $('#add-research-project').on('click', function (e) {
        e.preventDefault();

        var title = $('#title').val();
        var year = $('#year').val();
        var principal_investigator = $('#principal_investigator option:selected').attr('value');
        var grant_details = $('#grant_details').val();
        var amount = $('#amount').val();

        var dataToSend = {
            "title": title,
            "year": year,
            "principal_investigator": principal_investigator,
            "grant_details": grant_details,
            "amount": amount,
            "manage": "add-research-project"
        };

        // console.log(JSON.stringify(dataToSend));

        $.ajax({
            url: "http://localhost/frcrce/teacher/scripts/research-projects/add.php",
            method: "POST",
            data: "research_project_details_json_string=" + JSON.stringify(dataToSend),
            dataType: "text",
            success: function(data) {
                if(data){
                    // SET all values to blank !
                    $('#title').val('');
                    $('#year').val('');
                    $('#principal_investigator').val('Please Choose...');
                    $('#grant_details').val('');
                    $('#amount').val('');

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

                    toastr["success"]("Research Project Added", "Success");
                } else {
                    alert('Some problem' + data);
                    console.log(data);
                }
            }
        });
    });
});