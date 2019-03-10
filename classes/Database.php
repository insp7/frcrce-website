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
        private $servername;
        private $username;
        private $password;
        private $database;
        private $connection;

        /**
         * Creates a new Database object and sets the necessary details(servername, username, password, database)
         * for establishing connection with the database.
         *
         * @access public
         */
        public function __construct() {
            $this->servername = "localhost";
            $this->username = "insp7";
            $this->password = "123";
            $this->database = "frcrcedb";
            $this->connectDB();
        }

        /**
         * Function for establishing connection with the database;
         * The connection is stored in the '$connection' variable.
         *
         * @access public
         */
        public function connectDB() {
            $this->connection = new mysqli($this->servername, $this->username, $this->password, $this->database);

            if(mysqli_connect_error()) { // if connection not successful
                die("Connection Failed : " . mysqli_error());
            }

            // FOR TESTING
            if(!$this->connection)
                echo "Database not connected";
//            else
//                echo "Connection established with the database!";
        }

        /**
         * Function to get the established connection.
         *
         * @access public
         * @return mysqli 'mysqli' connection object is returned if connection is established successfully
         */
        public function getConnection() {
            return $this->connection;
        }
    }

    // Create database object for later use
    $database = new Database();
?>