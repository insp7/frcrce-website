<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 4/3/2019
 * Time: 8:11 PM
 */

require_once('Database.php');

if(session_status() == PHP_SESSION_NONE)
    session_start();

class IPR {
    private $connection;

    public function __construct() {
        global $database;
        $this->connection = $database->getConnection();
    }

    public function getAllIPR() {
        $sql = "SELECT * FROM ipr WHERE is_deleted = 0";
        $ps = $this->connection->prepare($sql);
        $ps->execute();
        $result_set = $ps->fetchAll(PDO::FETCH_ASSOC);

        return $result_set;
    }

    public function insertIPR($ipr_details) { // $ipr_details is an associative array.
        $staff_id = $_SESSION['staff_id'];
        extract($ipr_details);

        $sql = "INSERT INTO ipr (staff_id, year, patents_published_count, patents_granted_count, created_by) VALUES ";
        $sql .= "(:staff_id, :year, :patents_published_count, :patents_granted_count, :created_by)";
        $ps = $this->connection->prepare($sql);
        $result = $ps->execute([
            "staff_id" => $staff_id,
            "year" => $year,
            "patents_published_count" => $patents_published_count,
            "patents_granted_count" => $patents_granted_count,
            "created_by" => $staff_id
        ]);

        return $result;
    }

    public function getIPRById($ipr_id) {
        $sql = "SELECT * FROM ipr WHERE ipr_id = :ipr_id AND is_deleted = 0";
        $ps = $this->connection->prepare($sql);
        $ps->execute(["ipr_id" => $ipr_id]);
        $result_row = $ps->fetch(PDO::FETCH_ASSOC); // Only one row is expected

        return $result_row;
    }

    // $ipr_details is an associative array,
    // which contains updated $ipr_details info with the ipr_id to be updated
    public function updateIPRById($ipr_details) {
        extract($ipr_details);
        $updated_at = date('Y-m-d H:i:s');
        $updated_by = $_SESSION['staff_id'];

        $sql = "UPDATE ipr SET year = :year, patents_published_count = :patents_published_count, patents_granted_count = :patents_granted_count, updated_by = :updated_by, updated_at = :updated_at WHERE ipr_id = :ipr_id";
//        echo $sql;
        $ps = $this->connection->prepare($sql);
        $ps->execute([
            "year" => $year,
            "patents_published_count" => $patents_published_count,
            "patents_granted_count" => $patents_granted_count,
            "updated_by" => $updated_by,
            "updated_at" => $updated_at,
            "ipr_id" => $ipr_id
        ]);

        if($ps->rowCount() >= 1)
            return "true";
        else
            return "False; No. of affected rows: " . $ps->rowCount();
    }

    public function deleteIPRById($ipr_id) {
        $sql = "UPDATE ipr SET is_deleted = 1 WHERE ipr_id = :ipr_id";
        $ps = $this->connection->prepare($sql);
        $ps->execute(["ipr_id" => $ipr_id]);

        if($ps->rowCount() >= 1)
            return "true";
        else
            return "False; No of affected rows: " . $ps->rowCount();
    }
}