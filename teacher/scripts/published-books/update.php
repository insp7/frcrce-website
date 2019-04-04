<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 4/4/2019
 * Time: 6:19 AM
 */

if(isset($_POST['update_published_books_json_string'])) {
    require_once('../../../classes/PublishedBooks.php');

    $update_published_book_info = json_decode($_POST['update_published_books_json_string'], true);

    $published_books = new PublishedBooks();
    $result = $published_books->updatePublishedBookById($update_published_book_info);

    echo $result;
} else {
    echo "update_published_books_json_string NOT SET";
}