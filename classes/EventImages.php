<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 3/27/2019
 * Time: 9:21 PM
 */

require_once('Database.php');

if(session_status() == PHP_SESSION_NONE)
    session_start();

class EventImages {

    private $connection;

    public function __construct() {
        global $database;
        $this->connection = $database->getConnection();
    }

    public function getAllEventImages() {
        $sql = "SELECT * FROM event_images WHERE is_deleted = 0";
        $ps = $this->connection->prepare($sql);
        $ps->execute();
        $result_set = $ps->fetchAll(PDO::FETCH_ASSOC);

        return $result_set;
    }

    public function insertEventImages($uploaded_files) {
        // Count the no. of files
        // Dividing by 2 coz $uploaded_files also contains news_id, but we only want the total number of files(and not the total length of $uploaded_files)
        $no_of_files = count($uploaded_files) / 2 ;

        $sql = "INSERT INTO event_images (event_id, event_image_path) VALUES (?, ?)";
        // to make the remaining query and identify how many rows are to be inserted!
        for($i = 1; $i < $no_of_files; $i++) { // will run (no_of_files - 1) times
            $sql .= ", (?, ?)";
        }

        // Execute
        $ps = $this->connection->prepare($sql);
        $result = $ps->execute($uploaded_files);

        return $result;
    }

    public function getEventImagesById($event_id) {
        $sql = "SELECT * FROM event_images WHERE event_id = :event_id AND is_deleted = 0";
        $ps = $this->connection->prepare($sql);
        $ps->execute(["event_id" => $event_id]);
        $result_row = $ps->fetchAll(PDO::FETCH_ASSOC); // Only one row is expected

        return $result_row;
    }

    public function deleteEventImageById($event_images_id) {
        $sql = "UPDATE event_images SET is_deleted = 1 WHERE event_images_id = :event_images_id";
        $ps = $this->connection->prepare($sql);
        $ps->execute(["event_images_id" => $event_images_id]);

        if($ps->rowCount() >= 1)
            return "true";
        else
            return "False; No of affected rows: " . $ps->rowCount();
    }

    public function countEventImages($event_id) {
        $sql = "SELECT count(*) AS total_event_image_count FROM event_images WHERE event_id = :event_id AND is_deleted = 0";
        $ps = $this->connection->prepare($sql);
        $ps->execute(["event_id" => $event_id]);
        $result_set = $ps->fetch(PDO::FETCH_ASSOC);

        return $result_set;
    }
}