<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 3/19/2019
 * Time: 5:06 PM
 */

require_once('Database.php');

class Login {
    private $connection;

    public function __construct() {
        global $database;
        $this->connection = $database->getConnection();
    }

    public function validateStudentLogin($roll_no, $password) {
        $sql = "SELECT * FROM students WHERE roll_no = :roll_no AND password = :password";

        try {
            $ps = $this->connection->prepare($sql);
            $ps->execute(["roll_no" => $roll_no, "password" => $password]);
            $result = $ps->fetch(PDO::FETCH_ASSOC); // Only one row is expected
            $row_count = $ps->rowCount();

            if($row_count == 1)
                echo "true";
            else
                echo "false! row_count = " . $row_count;

        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function validateStaffLogin($email, $password) {
        $sql = "SELECT * FROM staff WHERE email = ? AND password = ?";

        try {
            $ps = $this->connection->prepare($sql);
            $ps->execute([$email, $password]);
            $result = $ps->fetch(PDO::FETCH_ASSOC); // Only one row is expected
            $row_count = $ps->rowCount();


            if($row_count == 1)
                echo "true";
            else
                echo "false! row_count = " . $row_count . "query = " . $sql . " email = " . $email . " password = " . $password;

        } catch (PDOException $e) {
            echo $e;
        }
    }
}