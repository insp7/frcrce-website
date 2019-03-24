<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 3/4/2019
 * Time: 5:30 PM
 */

    require_once('classes/Database.php');
    require_once('classes/GeneralFunctions.php');
    require_once('classes/Login.php');

    if(session_status() == PHP_SESSION_NONE)
        session_start();

    global $database;

    if(isset($_POST['manage'])) {
        switch($_POST['manage']) {
            case 'student_login':
                //data: "student_roll_no="+ roll_no + "&student_password=" + password + "&manage=student_login",
                $roll_no =  intval($_POST['student_roll_no']);
                $password = $_POST['student_password'];

                $login = new Login();
                $login->validateStudentLogin($roll_no, $password);
                break;

            case 'admin_login':
                // data: "admin_email="+ email + "&admin_password=" + password + "&manage=admin_login",
                $email = $_POST['admin_email'];
                $password = $_POST['admin_password'];

                $login = new Login();
                $login->validateStaffLogin($email, $password);
                break;

            case 'sign_out':
                // data: "manage=sign_out",
                session_unset();
                session_destroy();
                break;

            case 'create_event':
                // data: "event_info=" + eventInfoStr + "&manage=create_event",
                $event_info = json_decode($_POST['event_info'], true);

                // Create the event by inserting into events table
                $event_insertion_result = GeneralFunctions::insert(array(
                    "event_name" => $event_info['event_name'],
                    "event_details" => $event_info['event_details'],
                    "address" => $event_info['event_address'],
                    "event_type" => $event_info['event_type'],
                    "institute_funding" => $event_info['event_institute_funding'],
                    "sponsor_funding" => $event_info['event_sponsor_funding'],
                    "start_date" => $event_info['event_start_date'],
                    "end_date" => $event_info['event_end_date'],
                    "internal_participants_count" => $event_info['event_internal_participants'],
                    "external_participants_count" => $event_info['event_external_participants'],
                    'event_expenditure' => $event_info['event_expenditure'],
                    "created_at" => date('Y-m-d H:i:s'),
                    "created_by" => $_SESSION['staff_id']
                ), "events");

                // Get the latest created event's ID(i.e. latest inserted event)
                $event_id = $database->getConnection()->insert_id;

                // Assign the selected event coordinator by making entry in event_coordinators table
                foreach($event_info['event_coordinator'] as $key => $event_coordinator_array) {
                    $event_coordinators = $event_info['event_coordinator'][$key];
                    $event_coordinators_insertion_result = GeneralFunctions::insert(array(
                        "event_id" => $event_id,
                        "staff_id" => $event_coordinators['id'],
                        "created_by" => $_SESSION['staff_id'],
                    ), "event_coordinators");
                }

                if($event_insertion_result && $event_coordinators_insertion_result)
                    echo "true";
                else
                    echo "false";
                break;
        }
    }

    if(isset($_POST['news_id'])) {
        require_once('classes/NewsImages.php');

        $news_images = new NewsImages();
        $result_set = $news_images->getNewsImagesById($_POST['news_id']);

        echo json_encode($result_set);
    } else {
        echo "news_id NOT SET";
    }

?>