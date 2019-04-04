<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 4/2/2019
 * Time: 8:45 PM
 */

if(isset($_POST['publication_details_json_string'])) {
    $publication_details = json_decode($_POST['publication_details_json_string'], true);

    require_once('../../../classes/Publications.php');

    $publications = new Publications();
    $result = $publications->insertPublication($publication_details);

    if($result)
        echo "true";
    else
        echo "false";
} else {
    echo "data not set";
}