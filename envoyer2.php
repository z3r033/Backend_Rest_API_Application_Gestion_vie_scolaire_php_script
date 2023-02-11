<?php
require('phpmailer/class.phpmailer.php');
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port     = 587;  
$mail->Username = "saad19551945@gmail.com";
$mail->Password = "GOGOGOstarnooa3301";
$mail->Host     = "smtp.gmail.com";
$mail->Mailer   = "smtp";
$mail->SetFrom("saad19551945@gmail.com", "ss");
$mail->AddReplyTo("ss", "PHPPot");
$mail->AddAddress("saad19551945@gmail.com");
$mail->Subject = "Test email using PHP mailer";
$mail->WordWrap   = 80;
$content = "<b>This is a test email using PHP mailer class.</b>"; $mail->MsgHTML($content);
$mail->IsHTML(true);
if($mail->Send()) {
echo "Problem sending email.";
}else{ 
echo "email sent.";}
?>
