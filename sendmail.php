<?php
    $recipient =  $_REQUEST['email'];
    $subject =  $_REQUEST['subject'];
    $message = $_REQUEST['message'];
     // Email headers
     $headers = "From: vigyatkumar1975@gmail.com\r\n";
     $headers .= "MIME-Version: 1.0\r\n";
     $headers .= "Content-Type: multipart/mixed; boundary=boundary1234\r\n";
 
     // Email body
     $body = "--boundary1234\r\n";
     $body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
     $body .= "Content-Transfer-Encoding: 7bit\r\n";
     $body .= "\r\n";
     $body .= $message . "\r\n";
     $body .= "\r\n";
 
     // Check if any file is uploaded
     if ($_FILES['attachment']['name']) {
         $filename = $_FILES['attachment']['name'];
         $filedata = file_get_contents($_FILES['attachment']['tmp_name']);
 
         $body .= "--boundary1234\r\n";
         $body .= "Content-Type: application/octet-stream; name=\"$filename\"\r\n";
         $body .= "Content-Disposition: attachment; filename=\"$filename\"\r\n";
         $body .= "Content-Transfer-Encoding: base64\r\n";
         $body .= "\r\n";
         $body .= chunk_split(base64_encode($filedata));
         $body .= "\r\n";
     }
 
     $body .= "--boundary1234--";
 
     // Send the email
     if (mail($recipient, $subject, $body, $headers)) {
         echo "<h2>Email sent successfully! You can log out now.</h2><br>";
         echo '<h3><a href="logout.php"><b>Log Out<b></a></h3>';
     } else {
         echo "Error sending email. Please logout and login again.<br>";
         echo '<h3><a href="logout.php"><b>Log Out<b></a></h3>';
     }
 
 ?>