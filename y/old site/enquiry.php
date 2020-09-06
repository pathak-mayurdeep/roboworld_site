<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>JEC RoboWorld</title>
  </head>
  <body>
    <?php
    // Escape user inputs for security
    $name =  $_POST['name'];
    $phone = $_POST['phone'];
    $email = "enquiry@jecroboworld.in";
    $sender_email = $_POST['email'];
    $subject = $_POST['sub'];
    $sender_info ="Sent by - ".$name."\n Phone - ".$phone."\n Email - ".$sender_email."\n\n\n";

    $message = $_POST['message'];
    $sender_info = $sender_info."Subject - ".$subject."\n\nMessage --\n\n".$message;
      $to      = 'mayurdeeppathak@gmail.com';

      $headers = 'From: '. $email . "\r\n" .
          'Reply-To: '.$sender_email . "\r\n" .
          'X-Mailer: PHP/' . phpversion();

      mail($to, $subject, $sender_info, $headers);

      $to      = 'dibyajyoti.dc@gmail.com';
      mail($to, $subject, $sender_info, $headers);

      $to      = 'borahdigboloy@gmail.com';
      mail($to, $subject, $sender_info, $headers);

      $to      = 'poojaraniborah@gmail.com';
      mail($to, $subject, $sender_info, $headers);


      header( "refresh:5;url=./index.php" );

    ?>

  <h1> Thank You!! We will get back in touch with you..<h1>
  <p> Your message has now been sent to the concerned members. </p>
  <p> You will be redirected to jecroboworld.in in <span id="time"></span> </p>

  <script type="text/javascript">
      var timeleft = 5;
      var downloadTimer = setInterval(function(){

      document.getElementById("time").innerHTML = "" + timeleft--;
      if(timeleft <= 0)
      clearInterval(downloadTimer);
      },1000);
  </script>
  </body>
</html>
