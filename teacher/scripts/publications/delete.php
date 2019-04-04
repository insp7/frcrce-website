<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 4/3/2019
 * Time: 8:34 AM
 */

if(isset($_POST['delete_publication_id'])) {
    $publication_id = intval($_POST['delete_publication_id']);

    require_once('../../../classes/Publications.php');

    $publications = new Publications();
    $result = $publications->deletePublicationById($publication_id);

    echo $result;

} else {
    echo "delete_publication_id NOT SET";
}