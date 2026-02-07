<?php 
$to = 'care@bestloanmart.in'; // Put in your email address here
$subject  = "Contact Us Form"; // The default subject. Will appear by default in all messages. Change this if you want.
$from = 'info@bestloanmart.in'; 
// User info (DO NOT EDIT!)
$name = stripslashes($_REQUEST['name']); // sender's name
$email = stripslashes($_REQUEST['email']); // sender's email
$phone = stripslashes($_REQUEST['phone']); 
$subject = stripslashes($_REQUEST['subject']); 
$message = stripslashes($_REQUEST['message']);
$msg = "";

// Set content-type header for sending HTML email 

 
// The message you will receive in your mailbox
// Each parts are commented to help you understand what it does exaclty.
// YOU DON'T NEED TO EDIT IT BELOW BUT IF YOU DO, DO IT WITH CAUTION!
$msg .= "Name: ".$name."\r\n\n";  // add sender's name to the message
$msg .= "E-mail: ".$email."\r\n\n";  // add sender's email to the message
$msg .= "phone: ".$phone."\r\n\n";  // add sender's email to the message
$msg .= "Subject: ".$subject."\r\n\n";  // add sender's sources to the message
$msg .= "Message: ".$message."\r\n\n";  // add sender's checkboxes to the message
$msg .= "\r\n\n"; 

$msg = '<table>
				<tr> <th style="border:1px solid #ccc; padding:10px; text-align:left;">Name: </th><td style="border:1px solid #ccc; padding:10px; text-align:left;">'.$name.'</td> </tr>
				<tr> <th style="border:1px solid #ccc; padding:10px; text-align:left;">E-mail: </th><td style="border:1px solid #ccc; padding:10px; text-align:left;">'.$email.'</td> </tr>
				<tr> <th style="border:1px solid #ccc; padding:10px; text-align:left;">Phone: </th><td style="border:1px solid #ccc; padding:10px; text-align:left;">'.$phone.'</td> </tr>
				<tr> <th style="border:1px solid #ccc; padding:10px; text-align:left;">Subject: </th><td style="border:1px solid #ccc; padding:10px; text-align:left;">'.$subject.'</td> </tr>
				<tr> <th style="border:1px solid #ccc; padding:10px; text-align:left;width:50%;">Message: </th><td style="border:1px solid #ccc; padding:10px; text-align:left;">'.$message.'</td> </tr>
			</table>';

//$mail = @mail($to, $subject, $msg, "From: info@bestloanmart.in");  // This command sends the e-mail to the e-mail address contained in the $to variable
ini_set('SMTP', 'smtpout.secureserver.net');
ini_set('smtp_port', 465);
ini_set('sendmail_from', 'care@bestloanmart.in');

// Recipient email address
$to = 'care@bestloanmart.in';

// Additional headers
$headers = "From: care@bestloanmart.in" . "\r\n";
$headers .= "Reply-To: care@bestloanmart.in" . "\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();
$headers .= "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
// Send the email
$mailSent = mail($to, $subject, $msg, $headers);

// Check if the email was sent successfully
if ($mailSent) {
    header("Location:thank-you.html");	
    echo 'Email sent successfully';
} else {
    echo 'Failed to send email';
}

?>