<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 3/21/2019
 * Time: 7:54 PM
 */

if(isset($_POST['news_id']))  { // unnecessary if; later remove
    require_once('../../../classes/NewsFeed.php');

    $news_feed = new NewsFeed();
    $result_set = $news_feed->getNewsDetailsById($_POST['news_id']);

    echo json_encode($result_set);
} else {
    echo "news_id NOT SET";
}
