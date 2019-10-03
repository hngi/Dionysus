<?php  
function send_mail($to, $token, $msg)
{ 

include 'mail/PHPMailerAutoload.php'; 
$mail = new PHPMailer; 

$mail->isSMTP();                                            // Set mailer to use SMTP
$mail->Host = 'mail.alcredia.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'infodesk@alcredia.com';                 // SMTP username
$mail->Password = 'emmanuel2580';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->From = 'infodesk@alcredia.com';
$mail->FromName = 'Dionysus';
$mail->addAddress($to);               // Name is optional
$mail->addReplyTo($to, 'Reply');

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Password Recovery';
$mail->Body    = $msg;  

if($mail->send()) { 
echo "<script>
window.location.href = '/password.php?msg'
</script>";
die; 
} else { 
echo "<script>
window.location.href = '/password.php?err_msg'
</script>";
}
}
?>

 