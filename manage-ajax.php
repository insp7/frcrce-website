<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 3/4/2019
 * Time: 5:30 PM
 */

    require_once('classes/GeneralFunctions.php');

    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if(isset($_POST['manage'])) {
        switch($_POST['manage']) {
            case 'student_login':
                //data: "student_roll_no="+ roll_no + "&student_password=" + password + "&manage=student_login",
                $roll_no =  intval($_POST['student_roll_no']);
                $password = $_POST['student_password'];

                $where_condition = array('roll_no' => $roll_no, 'password' => $password);

                $result_set = GeneralFunctions::select("*", "students", $where_condition);

                if(mysqli_num_rows($result_set) == 1)
                    echo "true";
                else if(mysqli_num_rows($result_set) > 1)
                    echo "Database contains multiple row entries for the record with roll_no:" . $roll_no;
                else
                    echo "false";
                break;

            case 'admin_login':
                // data: "admin_email="+ email + "&admin_password=" + password + "&manage=admin_login",
                $email = $_POST['admin_email'];
                $password = $_POST['admin_password'];

                $where_condition = array('email' => $email, 'password' => $password);

                $result_set = GeneralFunctions::select("*", "staff", $where_condition);

                if(mysqli_num_rows($result_set) == 1)
                    echo "true";
                else if(mysqli_num_rows($result_set) > 1)
                    echo "Database contains multiple row entries for the record with email:" . $email;
                else
                    echo "false";
                break;

            case 'sign_out':
                // data: "manage=sign_out",
                session_unset();
                session_destroy();
        }
    }
?>