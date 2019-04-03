$(document).ready(function () {

    $('#add-publication').on('click', function (e) {
        e.preventDefault();

        var title = $('#title').val();
        var year = $('#year').val();
        var journal = $('#journal').val();
        var is_ugc_approved = $('#is_ugc_approved').val();
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
                if(data){
                    $('#add-publication-form').submit();
                } else {
                    alert('Some problem' + data);
                    console.log(data);
                }
            }
        });
    });
});