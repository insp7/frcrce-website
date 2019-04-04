<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 4/4/2019
 * Time: 6:18 AM
 */

if(isset($_POST['published_book_details_json_string'])) {
    $published_book_details = json_decode($_POST['published_book_details_json_string'], true);

    require_once('../../../classes/PublishedBooks.php');

    $published_book = new PublishedBooks();
    $result = $published_book->insertPublishedBook($published_book_details);

    if($result)
        echo "true";
    else
        echo "false";
} else {
    echo "published_book_details_json_string data not set";
}