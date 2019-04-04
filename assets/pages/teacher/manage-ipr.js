var parts = window.location.search.substr(1).split("&");
var $_GET = {};
for (var i = 0; i < parts.length; i++) {
    var temp = parts[i].split("=");
    $_GET[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
}

var hidden_staff_id =$('#hidden_staff_id').text();
// console.log(hidden_staff_id);
// window.alert("Value is"+hidden_staff_id);

// alert($_GET.bar);
var url;
if ($_GET['export'] == undefined) {
    url = "teacher/scripts/ipr/manage.php?staff_id="+hidden_staff_id;
}else {
    url = "teacher/scripts/ipr/manage.php?export=true&staff_id="+hidden_staff_id;
}

var iprTable;
var iprDatatable = function(){

    var handleIPRTable = function(){

        iprTable = $("#ipr-table");

        iprTable.dataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
                url: url,
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

        //DELETE
        iprTable.on('click', '.delete', function(e) {
            $id = $(this).attr('id');

            Swal.fire({
                title: 'Are you sure?',
                text: "For reverting this delete, contact admin",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Delete it'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "http://localhost/frcrce/teacher/scripts/ipr/delete.php",
                        method: "POST",
                        data: "delete_ipr_id=" + $id,
                        dataType: "text",
                        success: function (data) {
                            console.log(data);
                        }
                    });

                    // Swal.fire(
                    //     'Deleted!',
                    //     'Selected Entry has been deleted.',
                    //     'success'
                    // );

                    location.reload(); // refresh the current page, later write custom javascript to hide that entry and uncomment swal.fire
                }
            })
        });

    }
    return{
        //main function in javascript to handle all the initialisation part
        init: function(){
            handleIPRTable();
        }
    };
}();

jQuery(document).ready(function(){
    iprDatatable.init();


    var buttons = new $.fn.dataTable.Buttons(iprTable, {
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
    $('[name="ipr-table_length"]').addClass("input-sm");
});