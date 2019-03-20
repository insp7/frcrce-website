<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 3/20/2019
 * Time: 12:12 AM
 */

if(isset($_POST['news_id']))  { // unnecessary if; later remove
    require_once('../../../classes/NewsFeed.php');

    $news_feed = new NewsFeed();
    $result_set = $news_feed->getNewsDetailsById($_POST['news_id']);


    echo json_encode($result_set);
} else {
    echo "news_id NOT SET";
}




