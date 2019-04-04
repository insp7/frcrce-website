<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 4/3/2019
 * Time: 9:07 PM
 */

if(isset($_POST['delete_ipr_id'])) {
    $ipr_id = intval($_POST['delete_ipr_id']);

    require_once('../../../classes/IPR.php');

    $ipr = new IPR();
    $result = $ipr->deleteIPRById($ipr_id);

    echo $result;

} else {
    echo "delete_ipr_id NOT SET";
}