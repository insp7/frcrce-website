<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 4/3/2019
 * Time: 9:07 PM
 */

if(isset($_POST['ipr_details_json_string'])) {
    $ipr_details = json_decode($_POST['ipr_details_json_string'], true);

    require_once('../../../classes/IPR.php');

    $ipr = new IPR();
    $result = $ipr->insertIPR($ipr_details);

    if($result)
        echo "true";
    else
        echo "false";
} else {
    echo "ipr_details_json_string data not set";
}