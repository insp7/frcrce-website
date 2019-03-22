var TableDatatables = function() {
    var handleNewsTable = function() {
        var newsTable = $("#news_list");

        var oTable = newsTable.dataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
                url: "admin/scripts/news/manage.php",
                type: "POST"
            },
            "lengthMenu": [
                [5,15,20,-1],
                [5,15,25, "All"]
            ],
            "pageLength": 5,//set the default length
            "order":[
                [0, "desc"] //everything would be ordered by 0th column desc default
            ],
            "columnDefs":[{
                'orderable': false,
                'targets':[-1,-2] //dont show orderable symbol as -1 and -2 are edit and delete
                }
            ],
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        });

        //EDIT
        newsTable.on('click', '.edit', function(e){
            $id = $(this).attr('id');
            $("#edit_news_id").val($id);
            //fetching all other values from database using ajax and loading them onto their respective edit fields!
            //alert($id); to print for checking
            $.ajax({
                url: "http://localhost/frcrce/admin/scripts/news/fetch.php",
                method: "POST",
                data: {news_id: $id},
                dataType: "json",
                success: function(data) {
                    $("#news_title").val(data.title);
                    $("#news_desc").val(data.description);
                    $("#edit_news_modal").modal('show');

                    $('#update_news').on('click', function(e) {
                        e.preventDefault();

                        // Take the updated values
                        data.title = $('#news_title').val();
                        data.description = $('#news_desc').val();

                        $.ajax({
                            url: "http://localhost/frcrce/admin/scripts/news/update.php",
                            method: "POST",
                            data: 'json_string_for_news_updation=' + JSON.stringify(data),
                            dataType: "text",
                            success: function (response) {
                                if(response === "true") {
                                    $('#edit_news_modal').modal('hide');
                                    window.location.pathname = 'frcrce/admin/news.php'; // Later remove this refresh
                                } else {
                                    alert(response);
                                    console.log(response);
                                }
                            }
                        });
                    });
                }
            });
        });

        //DELETE
        newsTable.on('click', '.delete', function(e) {
            $id = $(this).attr('id');
            $("#news_id").val($id);

            $('#delete_news').on('click', function (e) {
                e.preventDefault();

                $.ajax({
                    url: "http://localhost/frcrce/admin/scripts/news/delete.php",
                    method: "POST",
                    data: 'delete_news_id=' + $id,
                    dataType: "text",
                    success: function (response) {
                        if(response === "true") {
                            $('#delete_news_modal').modal('hide');
                            window.location.pathname = 'frcrce/admin/news.php'; // Later remove this refresh
                        } else {
                            alert(response);
                            console.log(response);
                        }
                    }
                });
            });
        });

    }
    return {
        //main function in javascript to handle all the initialisation part
        init: function() {
            handleNewsTable();
        }
    };
}();

jQuery(document).ready(function() {
    TableDatatables.init();
});