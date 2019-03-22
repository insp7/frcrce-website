<?php
/**
 * Created by PhpStorm.
 * User: Dhananjay
 * Date: 3/17/2019
 * Time: 9:41 AM
 */

if(session_status() == PHP_SESSION_NONE)
    session_start();

if(isset($_POST['manage']) && $_POST['manage'] === "create_event") {
    require_once('../../../classes/Events.php');
    require_once('../../../classes/EventCoordinators.php');

    // data: "event_info=" + eventInfoStr + "&manage=create_event",
    $event_info = json_decode($_POST['event_info'], true);

    // Create the event by inserting into events table
    $events = new Events();
    $event_insertion_result = $events->insertEvent($event_info);

    // Get the latest created event's ID(i.e. latest inserted event)
    $event_id = $database->getConnection()->lastInsertId();

    $event_coordinator_obj = new EventCoordinators();

    // Assign the selected event coordinator by making entry in event_coordinators table
    foreach($event_info['event_coordinator'] as $key => $event_coordinator_array) {
        $event_coordinators = $event_info['event_coordinator'][$key];
        $event_coordinators_insertion_result = $event_coordinator_obj->insertEventCoordinator($event_id, $event_coordinators['id'], $_SESSION['staff_id']);
    }

    if($event_insertion_result && $event_coordinators_insertion_result)
        echo "true";
    else
        echo "false";
}
