<?php

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
$mail->Username = "yugmak@certification.upescsi.in";
$mail->Password = "Nevertry123";
$mail->setFrom('certificates@upescsi.in', 'UPES-CSI');
$mail->addReplyTo('certificates@upescsi.in', 'UPES-CSI');
require 'config.php';
$que = mysql_query("SELECT * FROM `yugmak18` WHERE `sent` = '0' AND `email` != '' LIMIT 1");

while ($row = mysql_fetch_array($que)) {
    $certno = $row[1];
    $name = $row[2];
    $email = $row[3];
    $mail->addAddress("adityapudipeddi@gmail.com", $name);
    $mail->Subject = 'Yugmak certificate of participation';
    $mail->Body    = "Dear participant,
UPES-CSI would like to thank you for your participation and attendance for our flagship event Yugmak 2k18 – ‘A Magical Euphoria’ held between 8th-10th April 2018.
We sincerely treasure your engagement in such a fruitful and constructive event and for taking the time out of your schedule to take part in the same. We hope you have come away from the event fully content and gratified.
We look forward to seeing you next time when we will put in even more effort to make it a herculean success.

Please Download the Certificate from the below Link :
http://certification.upescsi.in
Your Certificate Number is : $certno
Enter you name as: $name

P.S: There's a link to a WhatsApp group to join if your name is spelled wrong.";
    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message sent!".$certno."<br>";
        $sent = mysql_query("UPDATE MiniConvention SET `sent` = '1' WHERE NAME = '".$name."'");
    }
    $mail->ClearAllRecipients();
    $mail->ClearAttachments();
}
