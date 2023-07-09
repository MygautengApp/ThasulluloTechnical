<?php

require("class.phpmailer.php");

$name = $_REQUEST['name'] ;
$email = $_REQUEST['email'] ;
$subject = $_REQUEST['subject'] ;

$mail = new PHPMailer();
$mail->SMTPDebug = 0;                           
$mail->isSMTP();        
$mail->Host = "mail.remt.co.za";
$mail->SMTPAuth = false;  
$mail->WordWrap = 150;                                 // set word wrap to 50 characters		
$mail->Port = 25;                    
$mail->From = $email;
$mail->FromName = $name;
$mail->addAddress("info@remt.co.za", "REMT Group of Companies.");
$mail->isHTML(true);
$mail->Subject = $subject;                                 // set email format to HTML

$mail->Body    = "Hi REMT Group of Companies ,<br><br>A message has been sent through your website. Here are the details:<br/><br/><b>Name: </b>"
.$name ."<br/><b>Email: </b>".$email."<br/><br/><br/><b>Message : </b>".$message."<br/><br/>Thanks,<br/>".$name;

if($mail->Send())

{
   header('Location: index.php?msg=sent'); 
   echo '<script language="javascript">';
    echo 'alert("Appointment successfully sent")';
    echo '</script>';
 
}else 
{
   $error= $mail->ErrorInfo;
   //echo 'error'.$error;
    header('Location: index.php?msg='.$error); 
    echo '<script language="javascript">';
echo 'alert("Error while send the appointment, please try again.")';
echo '</script>';
   exit;

}



?>