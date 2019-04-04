<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 4/3/2019
 * Time: 9:08 PM
 */

if(isset($_POST['update_ipr_json_string'])) {
    require_once('../../../classes/IPR.php');

    $update_ipr_info = json_decode($_POST['update_ipr_json_string'], true);

    $ipr = new IPR();
    $result = $ipr->updateIPRById($update_ipr_info);

    echo $result;
} else {
    echo "update_ipr_json_string NOT SET";
}