<?php
require_once "mail/class.phpmailer.php";

define("FROM_ADDRESS", "luuquochuy171020@gmail.com");
define("PASSWORD", "huy0387671894");
define("FROM_NAME", "Frenkie Huy");

$sendTo = $_POST["send_to"] ?? "";
$subject = $_POST["subject"] ?? "";
$content = $_POST["content"] ?? "";
$result = send_mail($sendTo, $subject, $content);
/*echo $result ? "Send email success" : "Have an error. Can't send email";*/
if ($result){
    echo"<script>alert('Gui email thành công')</script><script>window.location='inboxlist.php'</script>";
}
else{
    echo"<script>alert('<?php echo $result ?>')</script>";
}

function send_mail($email, $subject, $content)
{
    $mail = new PHPMailer(true);
    try
    {
        $mail->CharSet = 'UTF-8';                                   // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = FROM_ADDRESS;                           // SMTP username
        $mail->Password   = PASSWORD;                               // SMTP password
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to
        $mail->smtpConnect(
            array(
                "ssl" => array(
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                    "allow_self_signed" => true
                )
            )
        );
        //Recipients
        $mail->setFrom(FROM_ADDRESS, FROM_NAME);
        $mail->addAddress($email);              // Name is optional
        $mail->isHTML(true);             // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $content;
        $mail->send();
    }catch (Exception $e)
    {
        print_r($e->getMessage());
        return false;
    }
    return true;
}