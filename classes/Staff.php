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
        unset($data['bos_chairman_certificate']);unset($data['bos_member_certificate']);unset($data['industry_certificate']);unset($data['subject_chairman_certificate']);unset($data['subject_expert_certificate']);unset($data['staff_selection_certificate']);unset($data['department_advisory_board_certificate']);unset($data['academic_audit_certificate']);unset($data['subject_expert_phd_certificate']);
        unset($data['other_universities_examiner_certificate']);unset($data['examination_auditor_certificate']);unset($data['subject_co-ordinator_src_certificate']);
        $data['is_fully_registered']=1;
        foreach($data as $key=>$value)
        {
            if(is_null($value) || $value == '')
                unset($data[$key]);
        }
        print_r($data);
        return self::generalUpdate('staff',$data,"staff_id = $staff_id");
    }

    public function uploadRemainingDetailsFiles() {
        $uploaded_file_names = array("bos_chairman_certificate","bos_member_certificate","industry_certificate","subject_chairman_certificate","subject_expert_certificate","staff_selection_certificate","department_advisory_board_certificate","academic_audit_certificate","subject_expert_phd_certificate","other_universities_examiner_certificate","examination_auditor_certificate","subject_co-ordinator_src_certificate");
        $target_dir = $_SERVER['DOCUMENT_ROOT'] ."/frcrce/teacher/upload/".$_SESSION['staff_id']."/";
        foreach ($uploaded_file_names as $uploaded_file_name){
            echo "Are you there";
            echo isset($_FILES[$uploaded_file_name]);
            if (isset($_FILES[$uploaded_file_name]) && $_FILES[$uploaded_file_name]['name']!=""){
// Where the file is going to be stored
                $file = $_FILES[$uploaded_file_name]['name'];
                $path = pathinfo($file);
                $filename = $uploaded_file_name;
                $ext = $path['extension'];
                $temp_name = $_FILES[$uploaded_file_name]['tmp_name'];
                $path_filename_ext = $target_dir.$filename.".".$ext;

// Check if file already exists
                    echo "moved";
                move_uploaded_file($temp_name,$path_filename_ext);


            }
        }
        die("show error");
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