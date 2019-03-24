<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 3/19/2019
 * Time: 7:55 PM
 */

require_once('Database.php');

if(session_status() == PHP_SESSION_NONE)
    session_start();

class NewsFeed {
    private $connection;

    public function __construct() {
        global $database;
        $this->connection = $database->getConnection();
    }

    public function getAllNews() {
        $sql = "SELECT * FROM news_feed WHERE is_deleted = 0";
        $ps = $this->connection->prepare($sql);
        $ps->execute();
        $result_set = $ps->fetchAll(PDO::FETCH_ASSOC);

        return $result_set;
    }

    public function getNewsDetailsById($id) {
        $sql = "SELECT * FROM news_feed WHERE news_id = :id";
        $ps = $this->connection->prepare($sql);
        $ps->execute(["id" => $id]);
        $result_row = $ps->fetch(PDO::FETCH_ASSOC); // Only one row is expected

        return $result_row;
    }

    public function updateNewsById($id, $title, $description) {
        $updated_by = $_SESSION['staff_id'];
        $updated_at = date('Y-m-d H:i:s');

        $sql = "UPDATE news_feed SET title = :title, description = :description, updated_at = '$updated_at', updated_by = $updated_by WHERE news_id = :id";
        $ps = $this->connection->prepare($sql);
        $ps->execute(["title" => $title, "description" => $description, "id" => $id]);

        if($ps->rowCount() >= 1)
            return "true";
        else
            return "False; No. of affected rows: " . $ps->rowCount();
    }

    public function deleteNewsById($id) {
        $sql = "UPDATE news_feed SET is_deleted = 1 WHERE news_id = :id";
        $ps = $this->connection->prepare($sql);
        $ps->execute(["id" => $id]);

        if($ps->rowCount() >= 1)
            return "true";
        else
            return "False; No of affected rows: " . $ps->rowCount();
    }

    public function insertNews($title, $description) {
        $sql = "INSERT INTO news_feed(title, description) VALUES(:title, :description)";
        $ps = $this->connection->prepare($sql);
        $result = $ps->execute(["title" => $title, "description" => $description]);

        return $result;
    }

    public function countNews() {
        $sql = "SELECT count(*) AS total_news_count FROM news_feed WHERE is_deleted = 0";
        $ps = $this->connection->prepare($sql);
        $ps->execute();
        $result_set = $ps->fetch(PDO::FETCH_ASSOC);

        return $result_set;
    }
}
