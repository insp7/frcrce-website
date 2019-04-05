<?php
/**
 * Created by PhpStorm.
 * User: Dhananjay
 * Date: 3/30/2019
 * Time: 2:05 PM
 */?>

<?php
class Mailer{
    public function  __construct()
    {
        require("../includes/thirdparty/phpmailer/src/PHPMailer.php");
        require("../includes/thirdparty/phpmailer/src/SMTP.php");

        $this->mail = new PHPMailer\PHPMailer\PHPMailer();
        $this->mail->IsSMTP();                    // enable SMTP

        $this->mail->SMTPDebug = 1;            // debugging: 1 = errors and messages, 2 = messages only
        $this->mail->SMTPAuth = true;             // authentication enabled
        $this->mail->SMTPSecure = 'ssl';          // secure transfer enabled REQUIRED for Gmail
        $this->mail->Host = "smtp.gmail.com";
        $this->mail->Port = 465;               // or 587
        $this->mail->IsHTML(true);
    }


    public  function send_mail($user_mail,$body,$subject){

        $this->mail->Username = "crceit2019@gmail.com";
        $this->mail->Password = "ubuntuadmin@123"; /*PASSWORD*/
        $this->mail->SetFrom("crceit2019@gmail.com", "FRCRCE IT");
        $this->mail->Subject = $subject;
        $this->mail->Body = $body;
        $this->mail->AddAddress("$user_mail");

        if (!$this->mail->Send()) {
            return false;
        } else {
            return true;
        }

    }//end of func
}//end of class
?>