<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 3/27/2019
 * Time: 9:20 PM
 */

if(isset($_POST['delete_event_image_id'])) { // unnecessary if; later remove
    require_once('../../../classes/EventImages.php');

    $event_images = new EventImages();
    $result_set = $event_images->deleteEventImageById($_POST['delete_event_image_id']);

    echo $result_set;
} else {
    echo "delete_event_image_id NOT SET";
}

//echo "true" . $_POST['delete_event_image_id'];