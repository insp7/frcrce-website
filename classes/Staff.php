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
require_once ('GeneralFunctions.php');
class Staff extends GeneralFunctions
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

    public function getStaffDetailsById($id) {
        $sql = "SELECT * FROM staff WHERE staff_id = :staff_id";
        $ps = $this->connection->prepare($sql);
        $ps->execute(["staff_id" => $id]);
        if($ps->rowCount()!=1)
            return false;
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

    public function isFullyRegistered($staff_id) {
        $sql = "SELECT * FROM staff WHERE is_deleted = 0 AND staff_id = :staff_id";
        $ps = $this->connection->prepare($sql);
        $ps->execute(["staff_id" => $staff_id]);
        $result = $ps->fetch(PDO::FETCH_ASSOC);
        if($result['is_fully_registered'] == 0)
            return false;
        return true;
    }

    public function insertStaff($email, $password) {
        $sql = "INSERT INTO staff(email, password) VALUES(:email, :password)";
        $ps = $this->connection->prepare($sql);
        $result = $ps->execute(["email" => $email, "password" => $password]);
        $this->emailPassword($email,$password);
        return $result;
    }

    public function fillRemainingDetails($staff_id) {
        $data = $_POST;
        unset($data['remaining-details']);
        $data['is_fully_registered']=1;
        return self::generalUpdate('staff',$data,"staff_id = $staff_id");
    }

    private function emailPassword($email, $password){
        require_once("Mailer.php");
        $mailer = new Mailer();
        $user_email = "$email";
        $subject = "FRCRCEIT Login Info";

        $body = "
        <div style='font-family:Roboto; font-size:16px; max-width: 600px; line-height: 21px;'>    
            Hello,
            Your FRCRCEIT Account is Ready.
            <br>  
            PASSWORD: $password
            <br>
            Sincerely,
            The FRCRCEIT Team.
            </div>";

        $mailer->send_mail($user_email, $body, $subject);
    }

}