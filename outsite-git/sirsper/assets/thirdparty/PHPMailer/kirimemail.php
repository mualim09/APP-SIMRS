<?php
include "koneksi.php";
?>
 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><body bgcolor="#FFFFCC">
<table width="99%" height="86" border="1" align="center" cellspacing="0">
  <tr>
  <br />
<td height="84" align="center" valign="top" bgcolor="#66CCFF"><p><font face="Comic Sans MS"><h1>EMAIL DATA SALES</h1></font></p>
<?php
        echo "<a href=javascript:history.back()><h1>BACK TO LIHAT DATA SALES</h1></a></center>";
        ?>
<b style="font-size: 20px;"></b>
<hr><br>
 
<form action="mailproses.php" method="POST">
<span style="color: black; font-family: t; font-size: '30';"><b>Name</b></span> <span style="color: red;"><small>*</small></span><br>
<input  name="nama" size="30" type="text" value="" />
<br>
<span style="color: black; font-family: t; font-size: '30';"><b>Email</b></span> <span style="color: red;"><small>*</small></span><br>
<input  name="email" size="30" type="text" value="" />
<br>
<span style="color: black; font-family: t; font-size: '30';"><b>Subject</b></span> <span style="color: red;"><small>*</small></span><br>
<input  name="subject" size="30" type="text" value="" />
<br>
<span style="color: black; font-family: t; font-size: '30';"><b>Messages</b></span> <span style="color: red;"><small>*</small></span><br>
<textarea  cols="80"  name="message" rows="10">

</textarea>
<br>
<input  type="submit" value="SEND"/><input type="reset" value="RESET" />
</form>
</tr>
    </td>
</table>
        </FORM>
    </table>
    </body>
</html>