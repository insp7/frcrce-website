var TableDatatables = function() {
    var handleEventTable = function() {
        var eventTable = $("#event_list");

        var oTable = eventTable.dataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
                url: "admin/scripts/events/manage.php",
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
        eventTable.on('click', '.edit', function(e) {
            $id = $(this).attr('id');
            $("#edit_event_id").val($id);
            //fetching all other values from database using ajax and loading them onto their respective edit fields!
            //alert($id); to print for checking
            $.ajax({
                url:"http://localhost/frcrce/admin/scripts/events/fetch.php",
                method: "POST",
                data: {event_id:$id},
                dataType: "json",
                success: function(data) {
                    $('#event_name').val(data.event_name);
                    $('#event_details').val(data.event_details);
                    $('#address').val(data.address);
                    $('#event_type').val(data.event_type);
                    $('#institute_funding').val(data.institute_funding);
                    $('#sponsor_funding').val(data.sponsor_funding);
                    $('#event_expenditure').val(data.event_expenditure);
                    $('#start_date').val(data.start_date);
                    $('#end_date').val(data.end_date);
                    $('#internal_participants_count').val(data.internal_participants_count);
                    $('#external_participants_count').val(data.external_participants_count);

                    $("#edit_event_modal").modal('show');

                    $('#update_event').on('click', function(e) {
                        e.preventDefault();

                        // Take the updated values
                        data.event_name = $('#event_name').val();
                        data.event_details = $('#event_details').val();
                        data.address = $('#address').val();
                        data.event_type = $('#event_type').val();
                        data.institute_funding = $('#institute_funding').val();
                        data.sponsor_funding = $('#sponsor_funding').val();
                        data.event_expenditure = $('#event_expenditure').val();
                        data.start_date = $('#start_date').val();
                        data.end_date = $('#end_date').val();
                        data.description = $('#news_desc').val();
                        data.internal_participants_count = $('#internal_participants_count').val();
                        data.external_participants_count = $('#external_participants_count').val();

                        $.ajax({
                            url: "http://localhost/frcrce/admin/scripts/events/update.php",
                            method: "POST",
                            data: 'json_string_for_event_updation=' + JSON.stringify(data),
                            dataType: "text",
                            success: function (response) {
                                if(response === "true") {
                                    $('#edit_event_modal').modal('hide');
                                    window.location.pathname = 'frcrce/admin/events.php'; // Later remove this refresh
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
        eventTable.on('click', '.delete', function(e) {
            $id = $(this).attr('id');
            $('#event_id').val($id);

            $('#delete_event').on('click', function (e) {
                e.preventDefault();

                $.ajax({
                    url: "http://localhost/frcrce/admin/scripts/events/delete.php",
                    method: "POST",
                    data: 'delete_event_id=' + $id,
                    dataType: "text",
                    success: function (response) {
                        if(response === "true") {
                            $('#delete_event_modal').modal('hide');
                            window.location.pathname = 'frcrce/admin/events.php'; // Later remove this refresh
                        } else {
                            alert(response);
                            console.log(response);
                        }
                    }
                });
            });
        });

        $('#event_images_list').on('click', '.delete-event-image', function (e) {
            $id = $(this).attr('id');

            $('#delete_event_image').on('click', function (e) {
                e.preventDefault();

                $.ajax({
                    url: "http://localhost/frcrce/admin/scripts/events/delete-image.php",
                    method: "POST",
                    data: 'delete_event_image_id=' + $id,
                    dataType: "text",
                    success: function (response) {
                        if(response === "true") {
                            $('#delete_event_image_modal').modal('hide');
                            window.location.pathname = 'frcrce/admin/events.php'; // Later remove this refresh
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
            handleEventTable();
        }
    };
}();
jQuery(document).ready(function() {
    TableDatatables.init();
});