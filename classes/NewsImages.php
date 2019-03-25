<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 3/23/2019
 * Time: 7:13 PM
 */

require_once('Database.php');

if(session_status() == PHP_SESSION_NONE)
    session_start();

class NewsImages {
    private $connection;

    public function __construct() {
        global $database;
        $this->connection = $database->getConnection();
    }

    public function getAllNewsImages() {
        $sql = "SELECT * FROM news_images WHERE is_deleted = 0";
        $ps = $this->connection->prepare($sql);
        $ps->execute();
        $result_set = $ps->fetchAll(PDO::FETCH_ASSOC);

        return $result_set;
    }

    public function insertNewsImages($uploaded_files) {
        // Count the no. of files
        // Dividing by 2 coz $uploaded_files also contains news_id, but we only want the total number of files(and not the total length of $uploaded_files)
        $no_of_files = count($uploaded_files) / 2 ;

        $sql = "INSERT INTO news_images (news_id, news_image_path) VALUES (?, ?)";
        // to make the remaining query and identify how many rows are to be inserted!
        for($i = 1; $i < $no_of_files; $i++) { // will run (no_of_files - 1) times
            $sql .= ", (?, ?)";
        }

        // Execute
        $ps = $this->connection->prepare($sql);
        $result = $ps->execute($uploaded_files);

        return $result;
    }

    public function getNewsImagesById($news_id) {
        $sql = "SELECT * FROM news_images WHERE news_id = :news_id AND is_deleted = 0";
        $ps = $this->connection->prepare($sql);
        $ps->execute(["news_id" => $news_id]);
        $result_row = $ps->fetchAll(PDO::FETCH_ASSOC); // Only one row is expected

        return $result_row;
    }

    public function deleteNewsImageById($news_image_id) {
        $sql = "UPDATE news_images SET is_deleted = 1 WHERE news_images_id = :news_image_id";
        $ps = $this->connection->prepare($sql);
        $ps->execute(["news_image_id" => $news_image_id]);

        if($ps->rowCount() >= 1)
            return "true";
        else
            return "False; No of affected rows: " . $ps->rowCount();
    }
}
