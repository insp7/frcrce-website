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

        /**
         * Function to get all the data from 'students' table.
         *
         * @access public
         * @return mysqli_result|string $result_set of 'students' table on successful retrieval, else returns error-details specified by '$this->connection->error'
         */
        public function getAllStudents() {
            $sql = "SELECT * FROM students WHERE is_deleted = 0"; // Select all the students which are not set to be deleted
            $preparedStatement = $this->connection->prepare($sql);
            $preparedStatement->execute();
            $result_set = $preparedStatement->get_result();

            if($this->connection->errno)
                return "Error: " . $this->connection->errno;
            return $result_set;
        }

        /**
         * Function to get all students details specified by the '$attributes' parameter using the '$student_id'.
         *
         * Ex. IF $attributes = "first_name", $student_id = 1 THEN
         * $sql = "SELECT first_name FROM students WHERE student_id = 1"
         *
         * @access public
         * @param int $student_id Specifies the student_id
         * @param string $attributes Specifies the attribute names to be retrieved from the data-table 'students'
         * @return mysqli_result|string result_set consisting of single row with attributes specified in $attributes, null if no $student_id found; else error-details specified by $this->connection->error
         */
        public function getStudentById($student_id, $attributes) {
            $sql = "SELECT $attributes FROM students WHERE student_id = ?";
            $preparedStatement = $this->connection->prepare($sql);
            $preparedStatement->bind_param("i", $student_id);
            $preparedStatement->execute();
            $result_set = $preparedStatement->get_result();

            if($this->connection->errno)
                return "Error while getting student details : " . $this->connection->error;
            return $result_set;
        }

        /**
         * Function to insert a student into the database.
         *
         * @access public
         * @param string $student_details Contains a json encoded string which has all the required attributes for the new student to be created.
         * @return string "true" when insertion operation is successful, else error-details specified by '$preparedStatement->error'
         */
        public function insertStudent($student_details) {
            $student_info = json_decode($student_details, true); // Convert json string to associative array
            $total_unspecified_parameters_string = ''; // Total number of unspecified parameters i.e. question-marks(?)
            $attributes_list = ''; // List of all attributes in which values are to be inserted
            $datatype_defining_string = ''; // Specifies the string which is the first parameter in the 'bind_param' function
            $values_array = array(); // Array to store only the values of all keys from the json string

            foreach($student_info as $key => $val) {
                // Push values of each key into values_array
                array_push($values_array, $val);

                // Identify the data-type of the current value
                // And set the $datatype_defining_String accordingly
                if(gettype($val) == "boolean" || gettype($val) == "string")
                    $datatype_defining_string .= "s";
                else if(gettype($val) == "integer")
                    $datatype_defining_string .= "i";
                else if(gettype($val) == "double")
                    $datatype_defining_string .= "d";
                else
                    return "Error: Cannot perform insert on relation student! Datatype for given data is denied!";

                // Form the insertion string in the format attr1 = ?, attr2 = ?, ...
                // And also Maintain the attribute list
                if(count($student_info) == 1) { // if only 1 attribute is passed
                    $attributes_list = $key . "  "; // 2 spaces left blank after attribute-name intentionally; later they'll be removed by substr method
                    $total_unspecified_parameters_string = "?  "; // 2 spaces left blank after question-mark(?) intentionally; later they'll be removed by substr method
                    break;
                }
                $attributes_list .= $key . ", ";
                $total_unspecified_parameters_string .= "?, ";

            }

            // To remove the last comma & space i.e. ', ' in $attributes_list & $total_unspecified_parameters_string
            $attributes_list = substr($attributes_list, 0, -2);
            $total_unspecified_parameters_string = substr($total_unspecified_parameters_string, 0, -2);

            // Form SQL query & execute
            $sql = "INSERT INTO students($attributes_list) VALUES($total_unspecified_parameters_string)";
            $preparedStatement = $this->connection->prepare($sql);
            $preparedStatement->bind_param($datatype_defining_string, ...$values_array);
            $preparedStatement->execute();

            if($this->connection->errno)
                return "Error: " . $preparedStatement->error;
            return "true";
        }

        /**
         * Function to perform update operation on a student specified by $student_id;
         *
         * @access public
         * @param int $student_id Specifies the unique student id
         * @param string $attributes Contains json string which specifies the key-value pairs of attributes from student relation to be updated
         * @return string "true" upon successful updation, else returns the error-details
         */
        public function updateStudentById($student_id, $attributes) {
            $updated_student_info = json_decode($attributes, true); // Convert json string to associative array
            $updation_string = ''; // Specifies the string which comes after "SET" keyword in the UPDATE statement; initialized to blank by default
            $datatype_defining_string = ''; // Specifies the string which is the first parameter in the 'bind_param' function
            $values_array = array(); // Array to store only the values of all keys from the json string

            foreach($updated_student_info as $key => $val) {
                // Push values of each key into values_array
                array_push($values_array, $val);

                // Identify the data-type of the current value
                // And set the $datatype_defining_String accordingly
                if(gettype($val) == "boolean" || gettype($val) == "string")
                    $datatype_defining_string .= "s";
                else if(gettype($val) == "integer")
                    $datatype_defining_string .= "i";
                else if(gettype($val) == "double")
                    $datatype_defining_string .= "d";
                else
                    return "Error: Cannot perform update on relation student! Datatype for given data is denied!";

                // Form the updation string in the format attr1 = ?, attr2 = ?, ...
                if(count($updated_student_info) == 1) { // if only 1 attribute is passed
                    $updation_string = $key . " = ?  "; // 2 spaces left blank after question-mark(?) intentionally; later they'll be removed by substr method
                    break;
                }
                $updation_string .= $key . " = ?, ";
            }

            // To remove the last comma & space i.e. ', ' in the updation string
            $updation_string = substr($updation_string, 0, -2);

            // Form the SQL query & execute
            $sql = "UPDATE students SET $updation_string WHERE student_id = $student_id";
            $preparedStatement = $this->connection->prepare($sql);
            $preparedStatement->bind_param($datatype_defining_string, ...$values_array);
            $preparedStatement->execute();

            if($this->connection->error)
                return "Error while Updating: " . $this->connection->error;
            return "true";
        }

        /**
         * Function to delete a student row specified by student_id;
         * Below function actually sets the 'is_deleted' attribute to 1;
         * The student is NOT ACTUALLY deleted from database.
         *
         * @access public
         * @param int $student_id Specifies the unique student id
         * @return string 'true' when updation is successful, else returns error-details specified by '$this->connection->error'
         */
        public function deleteStudentById($student_id) {
            $sql = "UPDATE students SET is_deleted = 1 WHERE student_id = ?";
            $preparedStatement = $this->connection->prepare($sql);
            $preparedStatement->bind_param("i", $student_id);
            $preparedStatement->execute();

            if($this->connection->error)
                return "Error while deleting student: " . $this->connection->error;
            else
                return "true";
        }
    }
?>