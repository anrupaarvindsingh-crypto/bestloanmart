<?php
$to = 'care@bestloanmart.in'; 
$from = 'info@bestloanmart.in'; 
$fromName = 'Best Loan Market';  //Put in Your email address here
$subject  = "Apply Now Form"; // The default subject. Will appear by default in all messages. Change this if you want.

//User Info (DO NOT EDIT)
$loanamount = stripcslashes($_REQUEST['loanamount']); // User's Loan Amount
$income = stripcslashes($_REQUEST['income']); // User's Income
///$purposeloan = stripcslashes($_REQUEST['purposeloan']); // User's Purpose of Loan
///$loanyears = stripcslashes($_REQUEST['loanyears']); // Loan Years
$yourname = stripcslashes($_REQUEST['yourname']); // User's Full Name
$email = stripcslashes($_REQUEST['your-email']); // User's Email
//$phone = stripcslashes($_REQUEST['phonenumber']); // User's Mobile Number
//$martialstatus = stripcslashes($_REQUEST['martialstatus']); // User's Martial Status
$birthdate = stripcslashes($_REQUEST['birthdate']); // User's Birth Date
//$numberofdependents = stripcslashes($_REQUEST['numberofdependents']); // Number of Dependents
//$houseno = stripcslashes($_REQUEST['house-no']); // User's House Number
//$street = stripcslashes($_REQUEST['street']); // User's Street
$city = stripcslashes($_REQUEST['city']); // User's City
//$state = stripcslashes($_REQUEST['state']); // User's State
//$country = stripcslashes($_REQUEST['country']); // User's Country
$pin = stripcslashes($_REQUEST['pin']); // User's Pin Code
$employmentindustry = stripcslashes($_REQUEST['employmentindustry']); // User's Employment Industry
//$employer_name = stripcslashes($_REQUEST['employer_name']); // User's Employer Name
//$status = stripcslashes($_REQUEST['employer_status']); // User's Employer Status
//$lengthemployment = stripcslashes($_REQUEST['lengthemployment']); // User's Length of Employment
$worknumber = stripcslashes($_REQUEST['worknumber']); // User's Work Phone Number

$msg = "";

// The message you will receive in your mailbox
// Each parts are commented to help you understand what it does exaclty.
// YOU DON'T NEED TO EDIT IT BELOW BUT IF YOU DO, DO IT WITH CAUTION!
/*
$msg .= "Loan Amount : ".$loanamount."\r\n\n";  					// add sender's Loan Amount to the message
$msg .= "Income: ".$income."\r\n\n"; 								// add sender's Income to the message
//$msg .= "Purpose of Loan : ".$purposeloan."\r\n\n"; 				// add sender's Purpose of Loan to the message
//$msg .= "Loan Years : ".$loanyears."\r\n\n"; 						// add sender's Loan Years to the message
$msg .= "Full Name : ".$yourname."\r\n\n"; 							// add sender's name to the message
$msg .= "Email : ".$email."\r\n\n"; 								// add sender's Email to the message
//$msg .= "Phone : ".$phone."\r\n\n"; 								// add sender's Phone Number to the message
//$msg .= "Martial Status : ".$martialstatus."\r\n\n"; 				// add sender's Martial Status to the message
$msg .= "Birth Date : ".$birthdate."\r\n\n"; 						// add sender's Birth Date to the message
//$msg .= "Number of Dependence : ".$numberofdependents."\r\n\n"; 	// add sender's Number of Dependence to the message
//$msg .= "House No/Name : ".$houseno."\r\n\n"; 						// add sender's House No/Name to the message
//$msg .= "Street : ".$street."\r\n\n"; 								// add sender's Street to the message
$msg .= "City : ".$city."\r\n\n"; 									// add sender's City to the message
//$msg .= "State : ".$state."\r\n\n"; 								// add sender's State to the message
//$msg .= "Country : ".$country."\r\n\n"; 							// add sender's Country to the message
$msg .= "Pin Code : ".$pin."\r\n\n"; 								// add sender's Pin Code to the message
$msg .= "Employment Industry: ".$employmentindustry."\r\n\n"; 		// add sender's Employment Industry to the message
//$msg .= "Employer Name : ".$employer_name."\r\n\n"; 				// add sender's Employer Name to the message
//$msg .= "Employer Status : ".$status."\r\n\n";						// add sender's Employer Status to the message
//$msg .= "Length of Employment : ".$lengthemployment."\r\n\n"; 		// add /sender's Length of Employment to the message
$msg .= "Work Phone Number : ".$worknumber."\r\n\n"; 				// add sender's Work Phone Number to the message
*/

 
// Set content-type header for sending HTML email 
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 
// Additional headers 
$headers .= 'From: '.$from.'' . "\r\n"; 
$msg = '<table>
				<tr> <th style="border:1px solid #ccc; padding:10px; text-align:left;">Loan Amount: </th><td style="border:1px solid #ccc; padding:10px; text-align:left;">'.$loanamount.'</td> </tr>
				<tr> <th style="border:1px solid #ccc; padding:10px; text-align:left;">Monthly Income: </th><td style="border:1px solid #ccc; padding:10px; text-align:left;">'.$income.'</td> </tr>
				<tr> <th style="border:1px solid #ccc; padding:10px; text-align:left;">Full Name: </th><td style="border:1px solid #ccc; padding:10px; text-align:left;">'.$yourname.'</td> </tr>
				<tr> <th style="border:1px solid #ccc; padding:10px; text-align:left;">Email: </th><td style="border:1px solid #ccc; padding:10px; text-align:left;">'.$email.'</td> </tr>
				<tr> <th style="border:1px solid #ccc; padding:10px; text-align:left;width:50%;">Pin Code: </th><td style="border:1px solid #ccc; padding:10px; text-align:left;">'.$pin.'</td> </tr>
				<tr> <th style="border:1px solid #ccc; padding:10px; text-align:left;width:50%;">Employment Industry: </th><td style="border:1px solid #ccc; padding:10px; text-align:left;">'.$employmentindustry.'</td> </tr>
				<tr> <th style="border:1px solid #ccc; padding:10px; text-align:left;width:50%;">Work Phone Number: </th><td style="border:1px solid #ccc; padding:10px; text-align:left;">'.$worknumber.'</td> </tr>
			</table>';

 
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