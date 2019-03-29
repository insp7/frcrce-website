<?php
    /**
     * Created by PhpStorm.
     * User: Aniket
     * Date: 2/23/2019
     * Time: 2:57 PM
     */

    // students(student_id, first_name, middle_name, last_name, contact_no, date_of_birth, roll_no, current_year, current_semester, year_of_admission, expected_year_of_passing, status, email, password, created_at, created_by, updated_at, updated_by, is_deleted)
    require_once('Database.php');

    /**
     * 'Students' class to perform various operations on the database relation 'students';
     *
     * @package frcrce
     * @subpackage classes
     * @author Aniket
     * @access public
     */
    class Students {
        private $connection;

        /**
         * Creates a new Students object and sets the $connection variable for this object equal to the database connection object.
         *
         * @global resource The universally available database connection (mysqli)object named '$database'.
         * @access public
         */
        public function __construct() {
            global $database;
            $this->connection = $database->getConnection();
        }

        public function getStudentDetailsByRollNo($roll_no) {
            $sql = "SELECT * FROM students WHERE roll_no = :roll_no";
            $ps = $this->connection->prepare($sql);
            $ps->execute(["roll_no" => $roll_no]);
            $result_row = $ps->fetch(PDO::FETCH_ASSOC); // Only one row is expected

            return $result_row;
        }

        public function countStudents() {
            $sql = "SELECT count(*) AS total_students_count FROM students WHERE is_deleted = 0";
            $ps = $this->connection->prepare($sql);
            $ps->execute();
            $result_set = $ps->fetch(PDO::FETCH_ASSOC);

            return $result_set;
        }
    }
?>