/* --------- store frequently used jquery selectors in variables --------- */

// For student login
var $student_roll_no = $('#student_roll_no');
var $student_password = $('#student_password');
var $student_roll_no_error = $('#student_roll_no_error');
var $student_password_error = $('#student_password_error');
var $student_login_form = $('#student_login_form');

// For admin login
var $admin_email = $('#admin_email');
var $admin_password = $('#admin_password');
var $admin_email_error = $('#admin_email_error');
var $admin_password_error = $('#admin_password_error');
var $admin_login_form = $('#admin_login_form');

/* !--------- END OF GLOBALS --------- */

/* --------- Code for student login --------- */
function btnStudentLoginClicked(event) {
    event.preventDefault();

    // DEFAULT: set blank
    $student_roll_no_error.html('');
    $student_password_error.html('');

    var roll_no = $student_roll_no.val();
    var password = $student_password.val();

    if (roll_no === "")
        $student_roll_no_error.html("Roll No cannot be empty");

    if (password === "")
        $student_password_error.html("Password cannot be empty");

    if (roll_no !== "" && password !== "")
        validateStudentLogin(roll_no, password);
}

function validateStudentLogin(roll_no, password) {
    $.ajax({
        type : 'POST' ,
        data: "student_roll_no="+ roll_no + "&student_password=" + password + "&manage=student_login",
        url: "manage-ajax.php"
    }).done(function(response) {
        if(response === "true")
            $student_login_form.submit();
        else
            $student_password_error.html('Invalid Roll No./Password');
    })
}

/* --------- Code for admin login --------- */
function btnAdminLoginClicked(event) {
    event.preventDefault();

    // DEFAULT: set blank
    $admin_email_error.html('');
    $admin_password_error.html('');

    var email = $admin_email.val();
    var password = $admin_password.val();

    if (email === "")
        $admin_email_error.html("Email cannot be empty");

    if (password === "")
        $admin_password_error.html("Password cannot be empty");

    if (email !== "" && password !== "")
        validateAdminLogin(email, password);
}

function validateAdminLogin(email, password) {
    $.ajax({
        type : 'POST' ,
        data: "admin_email="+ email + "&admin_password=" + password + "&manage=admin_login",
        url: "manage-ajax.php"
    }).done(function(response) {
        console.log(response);
        if(response === "true")
            $admin_login_form.submit();
        else if(response === "false")
            $admin_password_error.html('Invalid Email/Password');
        else
            alert(response);
    });
}

/* --------- Code to successfully logout the user --------- */
function btnSignOutClicked(event) {
    event.preventDefault();

    $.ajax({
        type : 'POST' ,
        data: "manage=sign_out",
        url: "manage-ajax.php"
    }).done(function() {
        window.location.pathname = "frcrce/login.php";
    });
}

function btnCreateEventClicked(event) {
    event.preventDefault();

    var eventInfo = {
         event_name: $('#event_name').val(),
         event_details: $('#event_details').val(),
         event_coordinator: $('#event_coordinator').select2('data')
         // event_address: $('#event_address').val(),
         // event_type: $('#event_type').val(),
         // event_institute_funding: $('#event_institute_funding').val(),
         // event_sponsor_funding: $('#event_sponsor_funding').val(),
         // event_start_date: $('#event_start_date').val(),
         // event_end_date: $('#event_end_date').val(),
         // event_expenditure: $('#event_expenditure').val(),
         // event_internal_participants: $('#event_internal_participants').val(),
         // event_external_participants: $('#event_external_participants').val()
    };

    var eventInfoStr = JSON.stringify(eventInfo);

    // Ajax send request
    $.ajax({
        type : 'POST' ,
        data: "event_info=" + eventInfoStr + "&manage=create_event",
        url: "admin/scripts/events/add.php"
    }).done(function(response) {
        if(response === "true") {
            window.location.pathname = 'frcrce/admin/events.php';
        }
        else {
            alert(response);
            console.log(response);
        }
    });
}

$(document).ready(function () {

    // For date picker plugin
    $('#event_start_date').datepicker({
        format : 'mm/dd/yyyy' ,
        container : container ,
        todayHighlight : true ,
        autoclose : true
    });

    // For datatables
    $('#view-events').DataTable({
        paging: true,
        searching: true
    });

});

