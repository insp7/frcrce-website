<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 3/17/2019
 * Time: 7:32 PM
 */

require_once('Database.php');

if(session_status() == PHP_SESSION_NONE)
    session_start();

class Events {
    private $connection;

    public function __construct() {
        global $database;
        $this->connection = $database->getConnection();
    }

    public function getAllEvents() {
        $sql = "SELECT * FROM events WHERE is_deleted = 0";
        $ps = $this->connection->prepare($sql);
        $ps->execute();
        $result_set = $ps->fetchAll(PDO::FETCH_ASSOC);

        return $result_set;
    }

    public function getEventDetailsById($id) {
        $sql = "SELECT * FROM events WHERE event_id = :id";
        $ps = $this->connection->prepare($sql);
        $ps->execute(["id" => $id]);
        $result_row = $ps->fetch(PDO::FETCH_ASSOC); // Only one row is expected

        return $result_row;
    }

    public function deleteNewsById($id) {
        $sql = "UPDATE events SET is_deleted = 1 WHERE event_id = :id";
        $ps = $this->connection->prepare($sql);
        $ps->execute(["id" => $id]);

        if($ps->rowCount() >= 1)
            return "true";
        else
            return "False; No of affected rows: " . $ps->rowCount();
    }

    public function updateEventById($updated_event) { // $updated_event is an assoc array.
        $updated_by = $_SESSION['staff_id'];
        $updated_at = date('Y-m-d H:i:s');

        $sql = "UPDATE events SET event_name = :event_name, event_details = :event_details, address = :address, event_type = :event_type, ";
        $sql .= "institute_funding = :institute_funding, sponsor_funding = :sponsor_funding, event_expenditure = :event_expenditure, start_date = :start_date, ";
        $sql .= "end_date = :end_date, internal_participants_count = :internal_participants_count, external_participants_count = :external_participants_count, ";
        $sql .= "updated_at = '$updated_at', updated_by = $updated_by WHERE event_id = :event_id";

        $ps = $this->connection->prepare($sql);
        $ps->execute([
            "event_id" => $updated_event['event_id'],
            "event_name" => $updated_event['event_name'],
            "event_details" => $updated_event['event_details'],
            "address" => $updated_event['address'],
            "event_type" => $updated_event['event_type'],
            "institute_funding" => $updated_event['institute_funding'],
            "sponsor_funding" => $updated_event['sponsor_funding'],
            "event_expenditure" => $updated_event['event_expenditure'],
            "start_date" => $updated_event['start_date'],
            "end_date" => $updated_event['end_date'],
            "internal_participants_count" => $updated_event['internal_participants_count'],
            "external_participants_count" => $updated_event['external_participants_count']
        ]);

        if($ps->rowCount() >= 1)
            return "true";
        else
            return "False; No. of affected rows: " . $ps->rowCount();
    }

    public function deleteEventById($event_id) {
        $sql = "UPDATE events SET is_deleted = 1 WHERE event_id = :event_id";
        $ps = $this->connection->prepare($sql);
        $ps->execute(["event_id" => $event_id]);

        if($ps->rowCount() >= 1)
            return "true";
        else
            return "False; No of affected rows: " . $ps->rowCount();
    }

    public function insertEvent($event_info) { // $event_info is an associative array.
        $created_by = $_SESSION['staff_id'];

        $sql = "INSERT INTO events(event_name, event_details, address, event_type, institute_funding, sponsor_funding, event_expenditure, start_date, end_date, internal_participants_count, external_participants_count, created_by) VALUES(:event_name, :event_details, :address, :event_type, :institute_funding, :sponsor_funding, :event_expenditure, :start_date, :end_date, :internal_participants_count, :external_participants_count, :created_by)";
        $ps = $this->connection->prepare($sql);
        $result = $ps->execute([
            "event_name" => $event_info['event_name'],
            "event_details" => $event_info['event_details'],
            "address" => $event_info['event_address'],
            "event_type" => $event_info['event_type'],
            "institute_funding" => $event_info['event_institute_funding'],
            "sponsor_funding" => $event_info['event_sponsor_funding'],
            "event_expenditure" => $event_info['event_expenditure'],
            "start_date" => $event_info['event_start_date'],
            "end_date" => $event_info['event_end_date'],
            "internal_participants_count" => $event_info['event_internal_participants'],
            "external_participants_count" => $event_info['event_external_participants'],
            "created_by" => $created_by
        ]);

        return $result;
    }
}