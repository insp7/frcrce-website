<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 3/19/2019
 * Time: 10:45 PM
 */

if(isset($_POST['json_string_for_event_updation'])) { // unnecessary if; later remove
    require_once('../../../classes/Events.php');
    $updated_data = json_decode($_POST['json_string_for_event_updation'], true);
    $events = new Events();
    $result_set = $events->updateEventById($updated_data);

    echo $result_set;
} else {
    echo "json_string_for_news_updation NOT SET";
}