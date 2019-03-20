var staffTable;
var StaffDatatable = function(){

    var handleStaffTable = function(){

        staffTable = $("#staff-table");

        staffTable.dataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
                url:
                    "admin/scripts/staff/manage.php",
                type: "POST",
            },
            "lengthMenu": [
                [5,15,25,-1],
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
        });

        //EDIT
        staffTable.on('click', '.edit', function(e){
            $id = $(this).attr('id');
            $("#edit_event_id").val($id);
            //fetching all other values from database using ajax and loading them onto their respective edit fields!
            //alert($id); to print for checking
            $.ajax({
                url:"http://localhost/erp/pages/scripts/event/fetch.php",
                method: "POST",
                data: {event_id:$id},
                dataType: "json",
                success: function(data){
                    $("#event_name").val(data.event_name);
                    $("#hsn_code").val(data.hsn_code);
                    $("#gst_rate").val(data.gst_rate);
                    $("#editModal").modal('show');
                },
            });
        });

        //DELETE
        staffTable.on('click', '.delete', function(e){
            $id = $(this).attr('id');
            $("#recordID").val($id);
        });

    }
    return{
        //main function in javascript to handle all the initialisation part
        init: function(){
            handleStaffTable();
        }
    };
}();

jQuery(document).ready(function(){
    StaffDatatable.init();
    var buttons = new $.fn.dataTable.Buttons(staffTable, {
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    }).container().appendTo($('#export-buttons'));

    $(".buttons-pdf").addClass("btn btn-default");
    $(".buttons-excel").addClass("btn btn-danger");
    $(".buttons-copy").addClass("btn btn-success");
    $(".buttons-csv").addClass("btn btn-warning");
});