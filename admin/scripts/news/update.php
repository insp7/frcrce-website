<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 3/19/2019
 * Time: 10:45 PM
 */

if(isset($_POST['json_string_for_news_updation'])) { // unnecessary if; later remove
    require_once('../../../classes/NewsFeed.php');
    $updated_data = json_decode($_POST['json_string_for_news_updation'], true);
    $news_feed = new NewsFeed();
    $result_set = $news_feed->updateNewsById($updated_data['news_id'], $updated_data['title'], $updated_data['description']);

    echo $result_set;
} else {
    echo "json_string_for_news_updation NOT SET";
}