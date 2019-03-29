<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 3/25/2019
 * Time: 6:47 PM
 */

if(isset($_POST['delete_news_image_id'])) { // unnecessary if; later remove
    require_once('../../../classes/NewsImages.php');

    $news_images = new NewsImages();
    $result_set = $news_images->deleteNewsImageById($_POST['delete_news_image_id']);

    echo $result_set;
} else {
    echo "delete_news_image_id NOT SET";
}

//echo "true" . $_POST['delete_news_id'];