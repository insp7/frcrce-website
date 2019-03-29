var parts = window.location.search.substr(1).split("&");
var $_GET = {};
for (var i = 0; i < parts.length; i++) {
    var temp = parts[i].split("=");
    $_GET[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
}


// alert($_GET.bar);
var url;
if ($_GET['export'] == undefined){
    url = "admin/scripts/staff/manage.php";
}else {
    url = "admin/scripts/staff/manage.php?export=true";
}

var staffTable;
var StaffDatatable = function(){

    var handleStaffTable = function(){

        staffTable = $("#staff-table");

        staffTable.dataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
                url:
                    url,
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
            "columnDefs":[
                {
                    'orderable': false,
                    'targets': [-1, -2] //dont show orderable symbol as -1 and -2 are edit and delete
                }
                // },
                // {
                //     "className": 'noVis',
                //     "targets": [6,7]
                // }
            ]
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
            {
                extend: 'colvis',
                columns: ':not(.noVis)'
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: ':visible'}
                }
        ]
    }).container().appendTo($('#export-buttons'));


    $(".buttons-pdf").addClass("btn btn-default");
    $(".buttons-excel").addClass("btn btn-danger");
    $(".buttons-copy").addClass("btn btn-success");
    $(".buttons-csv").addClass("btn btn-warning");
    $('[name="staff-table_length"]').addClass("input-sm");
});