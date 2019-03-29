<?php
/**
 * Created by PhpStorm.
 * User: Dhananjay
 * Date: 3/19/2019
 * Time: 8:48 PM
 *
 *
 *
 * DATABASE COLUMNS:staff_id`, `first_name`, `middle_name`, `last_name`, `contact_no`, `date_of_birth`, `role`, `email`, `password`, `gender`, `permanent`, `teaching`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`
 */

require_once('Database.php');
class Staff
{

    /**
     * Creates a new Staff object and sets the $connection variable for this object equal to the database connection object.
     *
     * @global resource The universally available database connection (mysqli)object named '$database'.
     * @access public
     */
    public function __construct() {
        global $database;
        $this->connection = $database->getConnection();
    }

    public function getStaffDetailsByEmail($email) {
        $sql = "SELECT * FROM staff WHERE email = :email";
        $ps = $this->connection->prepare($sql);
        $ps->execute(["email" => $email]);
        $result_row = $ps->fetch(PDO::FETCH_ASSOC); // Only one row is expected
        return $result_row;
    }

    public function getAllStaff() {
        $sql = "SELECT * FROM staff WHERE is_deleted = 0";
        $ps = $this->connection->prepare($sql);
        $ps->execute();
        $result_set = $ps->fetchAll(PDO::FETCH_ASSOC);

        return $result_set;
    }

    public function countStaff() {
        $sql = "SELECT count(*) AS total_staff_count FROM staff WHERE is_deleted = 0";
        $ps = $this->connection->prepare($sql);
        $ps->execute();
        $result_set = $ps->fetch(PDO::FETCH_ASSOC);

        return $result_set;
    }

    public function countMaleStaff() {
        $sql = "SELECT count(*) AS total_male_staff_count FROM staff WHERE is_deleted = 0 AND gender = 'm'";
        $ps = $this->connection->prepare($sql);
        $ps->execute();
        $result_set = $ps->fetch(PDO::FETCH_ASSOC);

        return $result_set;
    }

    public function countPermanentStaff() {
        $sql = "SELECT count(*) AS permanent_staff_count FROM staff WHERE is_deleted = 0 AND is_permanent = 1";
        $ps = $this->connection->prepare($sql);
        $ps->execute();
        $result_set = $ps->fetch(PDO::FETCH_ASSOC);

        return $result_set;
    }

    public function countPermanentTeachingSTaff() {
        $sql = "SELECT count(*) AS permanent_teaching_staff FROM staff WHERE is_deleted = 0 AND is_permanent = 1 AND is_teaching = 1";
        $ps = $this->connection->prepare($sql);
        $ps->execute();
        $result_set = $ps->fetch(PDO::FETCH_ASSOC);

        return $result_set;
    }

    public function countAdhocStaff() {
        $sql = "SELECT count(*) AS ad_hoc_staff_count FROM staff WHERE is_deleted = 0 AND is_permanent = 0";
        $ps = $this->connection->prepare($sql);
        $ps->execute();
        $result_set = $ps->fetch(PDO::FETCH_ASSOC);

        return $result_set;
    }

    public function countAdhocTeachingStaff() {
        $sql = "SELECT count(*) AS ad_hoc_staff_count FROM staff WHERE is_deleted = 0 AND is_permanent = 0 AND is_teaching = 1";
        $ps = $this->connection->prepare($sql);
        $ps->execute();
        $result_set = $ps->fetch(PDO::FETCH_ASSOC);

        return $result_set;
    }
}