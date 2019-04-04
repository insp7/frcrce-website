<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 4/2/2019
 * Time: 8:47 PM
 */

require_once('Database.php');

if(session_status() == PHP_SESSION_NONE)
    session_start();

class Publications {
    private $connection;

    public function __construct() {
        global $database;
        $this->connection = $database->getConnection();
    }

    public function getAllPublications() {
        $sql = "SELECT * FROM publications WHERE is_deleted = 0";
        $ps = $this->connection->prepare($sql);
        $ps->execute();
        $result_set = $ps->fetchAll(PDO::FETCH_ASSOC);

        return $result_set;
    }

    public function insertPublication($publication_details) { // $publication_details is an associative array.
        $staff_id = $_SESSION['staff_id'];
        extract($publication_details);

        // Doing this, because there is a problem: the 0 value of a checkbox is not getting inserted into database...
        // its set to 1 even if check box is unchecked
        // echo $is_ugc_approved;
        if($is_ugc_approved == 0) {
            $sql = "INSERT INTO publications (staff_id, title, year, journal, citation, created_by) VALUES ";
            $sql .= "(:staff_id, :title, :year, :journal, :citation, :created_by)";

            $ps = $this->connection->prepare($sql);
            $result = $ps->execute([
                "staff_id" => $staff_id,
                "title" => $title,
                "year" => $year,
                "journal" => $journal,
                "citation" => $citation,
                "created_by" => $staff_id
            ]);
        } else if($is_ugc_approved == 1) {
            $sql = "INSERT INTO publications (staff_id, title, year, journal, is_ugc_approved, citation, created_by) VALUES ";
            $sql .= "(:staff_id, :title, :year, :journal, :is_ugc_approved, :citation, :created_by)";

            $ps = $this->connection->prepare($sql);
            $result = $ps->execute([
                "staff_id" => $staff_id,
                "title" => $title,
                "year" => $year,
                "journal" => $journal,
                "is_ugc_approved" => $is_ugc_approved,
                "citation" => $citation,
                "created_by" => $staff_id
            ]);
        }

        return $result;
    }

    public function getPublicationById($publication_id) {
        $sql = "SELECT * FROM publications WHERE publication_id = :publication_id AND is_deleted = 0";
        $ps = $this->connection->prepare($sql);
        $ps->execute(["publication_id" => $publication_id]);
        $result_row = $ps->fetch(PDO::FETCH_ASSOC); // Only one row is expected

        return $result_row;
    }

    // $publication_details is an associative array,
    // which contains updated publication info with the publication_id to be updated
    public function updatePublicationById($publication_details) {
        extract($publication_details);
        $updated_at = date('Y-m-d H:i:s');
        $updated_by = $_SESSION['staff_id'];

        $sql = "UPDATE publications SET title = :title, year = :year, journal = :journal, citation = :citation, is_ugc_approved = :is_ugc_approved, updated_by = :updated_by, updated_at = :updated_at WHERE publication_id = :publication_id";
//        echo $sql;
        $ps = $this->connection->prepare($sql);
        $ps->execute([
            "title" => $title,
            "year" => $year,
            "journal" => $journal,
            "citation" => $citation,
            "is_ugc_approved" => $is_ugc_approved,
            "updated_by" => $updated_by,
            "updated_at" => $updated_at,
            "publication_id" => $publication_id
        ]);

        if($ps->rowCount() >= 1)
            return "true";
        else
            return "False; No. of affected rows: " . $ps->rowCount();
    }

    public function deletePublicationById($publication_id) {
        $sql = "UPDATE publications SET is_deleted = 1 WHERE publication_id = :publication_id";
        $ps = $this->connection->prepare($sql);
        $ps->execute(["publication_id" => $publication_id]);

        if($ps->rowCount() >= 1)
            return "true";
        else
            return "False; No of affected rows: " . $ps->rowCount();
    }
}