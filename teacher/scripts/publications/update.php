<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 4/3/2019
 * Time: 8:00 AM
 */

if(isset($_POST['update_publication_json_string'])) {
    require_once('../../../classes/Publications.php');

    $update_publication_info = json_decode($_POST['update_publication_json_string'], true);

    $publications = new Publications();
    $result = $publications->updatePublicationById($update_publication_info);

    echo $result;
} else {
    echo "update_publication_json_string NOT SET";
}