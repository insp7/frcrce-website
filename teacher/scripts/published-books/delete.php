<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 4/4/2019
 * Time: 6:19 AM
 */


if(isset($_POST['delete_published_books_id'])) {
    $delete_published_book_id = intval($_POST['delete_published_books_id']);

    require_once('../../../classes/PublishedBooks.php');

    $published_books = new PublishedBooks();
    $result = $published_books->deletePublishedBookById($delete_published_book_id);

    echo $result;

} else {
    echo "delete_published_books_id NOT SET";
}