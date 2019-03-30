<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 3/30/2019
 * Time: 12:32 AM
 */

require_once('../../../classes/Events.php');

$event_to_publish_info = json_decode($_POST['event_to_publish'], true);

$event_id = intval($event_to_publish_info['event_id']);
$selected_attributes_string = "";
//print_r($event_to_publish_info['event_attr']);

foreach($event_to_publish_info['event_attr'] as $key => $value) {
    $selected_attributes_string .= $event_to_publish_info['event_attr'][$key]['text'] . ",";
}

$selected_attributes_string = substr($selected_attributes_string, 0, -1); // to remove the last character which is a ','

$events = new Events();
$result = $events->publishAsNews($event_id, $selected_attributes_string);

echo $result;
