<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 3/19/2019
 * Time: 10:45 PM
 */

if(isset($_POST['delete_news_id'])) { // unnecessary if; later remove
    require_once('../../../classes/NewsFeed.php');

    $news_feed = new NewsFeed();
    $result_set = $news_feed->deleteNewsById($_POST['delete_news_id']);

    echo $result_set;
} else {
    echo "delete_news_id NOT SET";
}

//echo "true" . $_POST['delete_news_id'];