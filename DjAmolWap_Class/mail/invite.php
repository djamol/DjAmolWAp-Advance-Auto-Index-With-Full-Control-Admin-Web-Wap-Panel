<?
error_reporting(E_ALL ^ E_NOTICE);
###############DjAmol Group###############
//   DjAmolwap 12v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############

    //change this to your email.
    $to = $_POST["mailto"];
    $from = $_POST["from"];
    $subject = "Hello Dear! Invited To Wap.DjAmol.Com ";

    //DjAmolGroup
    $message = <<<EOF
<html>
  <body bgcolor="#FFFF00">
    <center>
        <b>Hi!!! I am invite to you.....</b> <br>
<a href="http://wap.djamol.com/"><img src="http://wap.djamol.com/images/logo.png" alt="logo" width="250" /></a><br>
        <font color="blue">Download Unlimted DjAmol Album!</font> <br>
    <font color="green">Bollywood Hollywood Songs</font> <br>
        <a href="http://wap.djamol.com/">Wap.DjAmol.Com</a>
    </center>
<small>Invited By $from</small>
      <br><br>*** Powered By DjAmolGroup <br> Regards<br>Amol Patil - Administrator
  </body>
</html>
EOF;
   //djamolGroup Inc
    $headers  = "From: $from@wap.com\r\n";
    $headers .= "Content-type: text/html\r\n";

    //options to send to cc+bcc
    //$headers .= "Cc: [email]maa@p-i-s.cXom[/email]";
    //$headers .= "Bcc: [email]email@maaking.cXom[/email]";
    
    // now lets send the email.
    mail($to, $subject, $message, $headers);

    echo "<b><font color='green'>Message has been sent....!</b></font><br>>><a href='http://wap.djamol.com/dashboard.php?avp=iml'>BAck</a><br>>><a href='http://wap.djamol.com/'>Wap.DjAmol.Com</a>";
?> 