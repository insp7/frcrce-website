<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 3/22/2019
 * Time: 9:50 AM
 */

require_once('Database.php');

if(session_status() == PHP_SESSION_NONE)
    session_start();

class EventCoordinators {
    private $connection;

    public function __construct() {
        global $database;
        $this->connection = $database->getConnection();
    }

    public function getAllEventCoordinators() {
        $sql = "SELECT * FROM event_coordinators WHERE is_deleted = 0";
        $ps = $this->connection->prepare($sql);
        $ps->execute();
        $result_set = $ps->fetchAll(PDO::FETCH_ASSOC);

        return $result_set;
    }

    public function insertEventCoordinator($event_id, $event_coordinators_id, $created_by) {
        $sql = "INSERT INTO event_coordinators(event_id, staff_id, created_by) VALUES(:event_id, :event_coordinators_id, :created_by)";
        $ps = $this->connection->prepare($sql);
        $result = $ps->execute(["event_id" => $event_id, "event_coordinators_id" => $event_coordinators_id, "created_by" => $created_by]);

        return $result;
    }
}