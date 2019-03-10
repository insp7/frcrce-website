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

$(document).ready(function () {
    // For date picker plugin
    $('#event_start_date').datepicker({
        format : 'mm/dd/yyyy' ,
        container : container ,
        todayHighlight : true ,
        autoclose : true
    });
});

