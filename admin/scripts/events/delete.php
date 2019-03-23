<?php
/**
 * Created by PhpStorm.
 * User: Dhananjay
 * Date: 3/17/2019
 * Time: 9:42 AM
 */

if(isset($_POST['delete_event_id'])) { // unnecessary if; later remove
    require_once('../../../classes/Events.php');
    require_once('../../../classes/EventCoordinators.php');

    // Delete event
    $events = new Events();
    $event_result_set = $events->deleteEventById($_POST['delete_event_id']);

    // Delete event_coordinator
    $ec = new EventCoordinators();
    $ec_result_set = $ec->deleteCoordinatorByEventId($_POST['delete_event_id']);

    echo ($event_result_set === "true" && $ec_result_set === "true") ? "true" : "false";
} else {
    echo "delete_event_id NOT SET";
}