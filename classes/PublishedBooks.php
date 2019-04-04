<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 4/3/2019
 * Time: 6:57 PM
 */

require_once('Database.php');

if(session_status() == PHP_SESSION_NONE)
    session_start();

class PublishedBooks {
    private $connection;

    public function __construct() {
        global $database;
        $this->connection = $database->getConnection();
    }

    public function getAllPublishedBooks() {
        $sql = "SELECT * FROM published_books WHERE is_deleted = 0";
        $ps = $this->connection->prepare($sql);
        $ps->execute();
        $result_set = $ps->fetchAll(PDO::FETCH_ASSOC);

        return $result_set;
    }

    public function insertPublishedBook($published_book_details) { // $published_book_details is an associative array.
        $staff_id = $_SESSION['staff_id'];
        extract($published_book_details);

        $sql = "INSERT INTO published_books (staff_id, details, created_by) VALUES ";
        $sql .= "(:staff_id, :details, :created_by)";
        $ps = $this->connection->prepare($sql);
        $result = $ps->execute([
            "staff_id" => $staff_id,
            "details" => $details,
            "created_by" => $staff_id
        ]);

        return $result;
    }

    public function getPublishedBookById($published_books_id) {
        $sql = "SELECT * FROM published_books WHERE published_books_id = :published_books_id AND is_deleted = 0";
        $ps = $this->connection->prepare($sql);
        $ps->execute(["published_books_id" => $published_books_id]);
        $result_row = $ps->fetch(PDO::FETCH_ASSOC); // Only one row is expected

        return $result_row;
    }

    // $published_book_details is an associative array,
    // which contains updated $published_book_details info with the $published_books_id to be updated
    public function updatePublishedBookById($published_book_details) {
        extract($published_book_details);
        $updated_at = date('Y-m-d H:i:s');
        $updated_by = $_SESSION['staff_id'];

        $sql = "UPDATE published_books SET details = :details, updated_by = :updated_by, updated_at = :updated_at WHERE published_books_id = :published_books_id";
        echo $sql;
        $ps = $this->connection->prepare($sql);
        $ps->execute([
            "details" => $details,
            "updated_by" => $updated_by,
            "updated_at" => $updated_at,
            "published_books_id" => $published_books_id
        ]);

        if($ps->rowCount() >= 1)
            return "true";
        else
            return "False; No. of affected rows: " . $ps->rowCount();
    }

    public function deletePublishedBookById($published_books_id) {
        $sql = "UPDATE published_books SET is_deleted = 1 WHERE published_books_id = :published_books_id";
        $ps = $this->connection->prepare($sql);
        $ps->execute(["published_books_id" => $published_books_id]);

        if($ps->rowCount() >= 1)
            return "true";
        else
            return "False; No of affected rows: " . $ps->rowCount();
    }
}