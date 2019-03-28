<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 3/21/2019
 * Time: 8:16 PM
 */

if(isset($_POST['event_id']))  { // unnecessary if; later remove
    require_once('../../../classes/Events.php');

    $events = new Events();
    $result_set = $events->getEventDetailsById($_POST['event_id']);

    echo json_encode($result_set);
} else {
    echo "news_id NOT SET";
}
