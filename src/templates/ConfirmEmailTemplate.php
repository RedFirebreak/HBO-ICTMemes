<?php 
$mail ='';
$mail .="<head><style type='text/css' title='x-apple-mail-formatting'></style>";
$mail .="<meta name='viewport' content='width = 375, initial-scale = -1'>";
$mail .="<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>";
$mail .="<meta charset='UTF-8'>";
$mail .="<title></title>";
$mail .="<style>";

$mail .="@media only screen and (max-device-width: 700px) {";
  $mail .=" .table-wrapper {";
    $mail .="   margin-top: 0px !important;";
    $mail .="    border-radius: 0px !important;";
$mail .="  }";
  $mail .="  .header {";
    $mail .="    border-radius: 0px !important;";
    $mail .="  }";
  $mail .="}";

$mail .="</style>";

$mail .="</head>";

$mail .="<body style='-webkit-font-smoothing:antialiased;-webkit-text-size-adjust:none;margin:0;padding:0;font-family:&quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;font-size:100%;line-height:1.6'>";
$mail .="<table style='background: #F5F6F7;' width='100%' cellpadding='0' cellspacing='0'>";
$mail .=" <tbody><tr>";
  $mail .="   <td>";
    $mail .="     <!-- body -->";

      $mail .="     <table cellpadding='0' cellspacing='0' class='table-wrapper' style='margin:auto;margin-top:50px;border-radius:7px;-webkit-border-radius:7px;-moz-border-radius:7px;max-width:700px !important;box-shadow:0 8px 20px #e3e7ea !important;-webkit-box-shadow:0 8px 20px #e3e7ea !important;-moz-box-shadow:0 8px 20px #e3e7ea !important;box-shadow: 0 8px 20px #e3e7ea !important; -webkit-box-shadow: 0 8px 20px #e3e7ea !important; -moz-box-shadow: 0 8px 20px #e3e7ea !important;'>";
      $mail .="       <tbody><tr>";

        $mail .="         <!-- Brand Header -->";

          $mail .="           <td class='container' bgcolor='#FFFFFF' style='display:block !important;margin:0 auto !important;clear:both !important'>";

            $mail .="             <img src='https://www.hbo-ictmemes.nl/src/img/emailheader.jpg' style='max-width:100%'>";
              $mail .="         </td>";
           $mail .="      </tr>";

        $mail .="      <tr>";
        $mail .="         <td class='container content' bgcolor='#FFFFFF' style='padding:35px 40px;border-bottom-left-radius:6px;border-bottom-right-radius:6px;display:block !important;margin:0 auto !important;clear:both !important'>";
          $mail .="           <!-- content -->";
            $mail .="           <div class='content-box' style='max-width:600px;margin:0 auto;display:block'>";
            $mail .="<!-- Content -->";

$mail .="<h1 style='font-family:&quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif;margin-bottom:15px;color:#47505E;margin:0px 0 10px;line-height:1.2;font-weight:200;font-size:28px;font-weight:bold;margin-bottom:30px'>";
$mail .="Verifiëer je email-adres</h1>";

$mail .="<p style='font-weight:normal;padding:0;font-family:&quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height:1.7;margin-bottom:1.3em;font-size:15px;color:#47505E'>";
$mail .="Klik op de knop om je email te verifiëren.</p>";
$mail .="<center><a href='$sitename' class='confirmation-url btn-primary' style='color:#1EA69A;word-wrap:break-word;font-family:&quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;text-decoration:none;background-color:#FF7F45;border:solid #FF7F45;line-height:2;max-width:100%;font-size:14px;padding:8px 40px 8px 40px;margin-top:30px;margin-bottom:30px;font-weight:bold;cursor:pointer;display:inline-block;border-radius:30px;margin-left:auto;margin-right:auto;text-align:center;color:#FFF !important'>";
$mail .="Confirm Email</a></center>";

$mail .="<p style='font-weight:normal;padding:0;font-family:&quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height:1.7;margin-bottom:1.3em;font-size:15px;color:#47505E'>";
$mail .="Deze mail niet gestuurd? Dan kan u deze mail als niet verzonden beschouwen.<br>";
$mail .="Werkt de link niet? Kopieer de volgende link in uw browser:<br> <a href='$sitename'>$sitename</a></p>";
$mail .="<p style='font-weight:normal;padding:0;font-family:&quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height:1.7;margin-bottom:1.3em;font-size:15px;color:#47505E'>";
$mail .="Met vriendelijke groet,<br>";
$mail .="Het HBO-ICTMemes team.</p>";

$mail .="<!-- Auto-generated JSON-ld compliant JSON for showing action buttons in emails -->";

$mail .="<script type='application/ld+json'>{'@context':'http://schema.org','@type':'EmailMessage','potentialAction':{'@type':'ConfirmAction','name':'Confirm Email','handler':{'@type':'HttpActionHandler','url':'$sitename'}}}</script>";
$mail .="           </div>";
            $mail .="           <!-- /content -->";
            $mail .="         </td>";
          $mail .="         <td>";
          $mail .="         </td>";
          $mail .="       </tr>";
        $mail .="     </tbody></table>";

      $mail .="    <!-- /body -->";
      $mail .="     <div class='footer' style='padding-top:30px;padding-bottom:55px;width:100%;text-align:center;clear:both !important'>";
      $mail .="       <p style='font-weight:normal;padding:0;font-family:&quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height:1.7;margin-bottom:1.3em;font-size:15px;color:#47505E;font-size:12px;color:#666;margin-top:0px'>© 2019 HBO-ICTMemes™, <a href='https://www.hbo-ictmemes.nl' style='color: rgb(102, 102, 102); -webkit-text-decoration-color: rgba(102, 102, 102, 0.258824);'>https://www.hbo-ictmemes.nl</a></p>";
          $mail .="      </div>";
      $mail .="    </td>";
    $mail .="  </tr>";
  $mail .="</tbody></table>";
$mail .="</body>";
?>