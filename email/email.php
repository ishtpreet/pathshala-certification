<?php
//echo $certno;
$string=str_replace("UPES CSR ","CSR Certificate _UPESCSR 0",$certno);
//echo $string;
//$imgsrc = 'http://certification.upescsi.in/uploads/'.$string.'.jpg';


require 'lib/PHPMailerAutoload.php';
$mail = new PHPMailer;

$mail->isSMTP();
$mail->SMTPDebug = 2;

$mail->Debugoutput = 'html';

$mail->Host = 'upescsi.in';
$mail->Port = 25;
$mail->SMTPSecure = '';
$mail->SMTPAuth = true;
$mail->SMTPKeepAlive =true;
$mail->Username = "csitech@upescsi.in";
$mail->Password = "upescsi123";
$mail->setFrom('csitech@upescsi.in', 'UPES-CSI');
$mail->addReplyTo('csitech@upescsi.in', 'UPES-CSI');
$mail->addAddress( $email, $name);
$mail->Subject = 'CSR Certificate of Participation';
$mail->Body    = 'The UPES-CSI Student Chapter kept up its tradition of service to humanity and upholding the responsibility of Corporate Houses and Organizations towards our society by recently conducting the CSR on 23rd September 2017. The success of the event added another feather to the cap of UPES-CSI Student Chapter and also filled the members with an air of pride and satisfaction for having stood up and sharing a day with the foundlings.

UPES-CSI congratulates all its members for showing their healing touch of compassion and contribution towards society.
Please Downlaod the Certificate from the below Link :
http://certification.upescsi.in
Your Certificate Number is :
    '.$certno;
$mail->addAttachment();
$mail->AltBody = 'Whatever'; // Seems like this text doesnt matter.
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
$mail->ClearAllRecipients(); 
    $mail->ClearAttachments(); 