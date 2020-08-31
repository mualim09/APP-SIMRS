<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><body bgcolor="#FFFFCC">
<table width="99%" height="86" border="1" align="center" cellspacing="0">
  <tr>
  <br />
<td height="84" align="center" valign="top" bgcolor="#66CCFF"><p><font face="Comic Sans MS"><h1>RESULT OF EMAIL DATA SALES</h1></font></p>
<?php
        echo "<a href=javascript:history.back()><h1>BACK TO LIHAT DATA SALES</h1></a></center>";
        ?>
        <b style="font-size: 20px;"></b>
<hr><br>
 
<?php
require("class.phpmailer.php");
require("class.smtp.php");
    
$mail = new PHPMailer();
$mail->IsSMTP();  // set mailer to use SMTP
$mail->SMTPSecure = "ssl";
$mail->Host = "smtp.ibpmail.com";  // specify main and backup server
$mail->Port = 465;
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Username = "titok.radityo@kuehne-nagel.com";  // SMTP username - Alamat Email Anda
$mail->Password = "5shzdBno"; // SMTP password - Password Email Anda
$mail->From = "titok.radityo@kuehne-nagel.com"; //Alamat Email Anda
$mail->FromName = "Administrator"; //Nama Pengirim yang akan ada di email sender
 
$to="titok.radityo@kuehne-nagel.com" ;
 
$mail->AddAddress($to);
//$mail->AddAddress("ellen@example.com");                  // name is optional
//$mail->AddReplyTo("info@example.com", "Information");
//$mail->WordWrap = 50;                                 // set word wrap to 50 characters
//$mail->AddAttachment("/var/tmp/file.tar.gz");         // add attachments
//$mail->AddAttachment("/tmp/image.jpg", "new.jpg");    // optional name
$mail->IsHTML(true);                                  // set email format to HTML
$mail->Subject = $_REQUEST['subject'];
 
$mail->Body    = $_REQUEST['message'] ;
//$mail->AltBody = "This is the body in plain text for non-HTML mail clients";
if(!$mail->Send())
 
//header("refresh:5;url=contac_us.html");
    //echo "<div align=\"center\">Message has been sent<br />Thank You<p>Redirecting to previous page...</p></div>";
{
   echo "<h1><font color='red'>Message Could Not Be Sent. Check Your Internet Connection<p></font></h1>";
   echo "<h1><font color='red'>Mailer Error: </font></h1>" . $mail->ErrorInfo;
   exit;
}
echo "<h1>Message Has Been Sent</h1>";
?>
</tr>  
    </td>
</table>
        </FORM>
    </table>
    </body>
    
</html>