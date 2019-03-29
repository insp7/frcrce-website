<?php
    /**
     * Created by PhpStorm.
     * User: Aniket
     * Date: 2/23/2019
     * Time: 2:29 PM
     */

    /**
     * Total Relations:
     *
     * students(student_id, first_name, middle_name, last_name, contact_no, date_of_birth, roll_no, current_year, current_semester, year_of_admission, expected_year_of_passing, status, email, password, created_at, created_by, updated_at, updated_by, is_deleted)
     * staff(staff_id, first_name, middle_name, last_name, contact_no, date_of_birth, role, email, password, created_at, created_by, updated_at, updated_by, is_deleted)
     * events(event_id, event_name, event_details, address, event_type, institute_funding, sponsor_funding, event_expenditure, start_date, end_date, internal_participants_count, external_participants_count, created_at, created_by, updated_at, updated_by, is_deleted)
     * event_coordinators(ec_id, event_id, staff_id, created_at, created_by, updated_at, updated_by, is_deleted)
     */

    /**
     * Database class for establishing connection with the database;
     * Also will be used for getting this database connection object.
     *
     * @package frcrce
     * @subpackage classes
     * @author Aniket
     * @access public
     */
    class Database {
        private $host       =   "localhost";
        private $db_name    =   "frcrcedb1";
        private $username   =   "root";
        private $password   =   "";
        private $conn       =   null;

        /**
         * Database constructor.
         */
        public function __construct() {
            try {
                $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
            } catch (PDOException $e) {
                die("Issue : " . $e->getMessage());
            }

        }

        public function getConnection() {
            return $this->conn;
        }
    }

    // Create database object for later use
    $database = new Database();
?>