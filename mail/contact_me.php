<?php
// Check for empty fields
$response  = array();
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['date']) || empty($_POST['time']) || empty($_POST['people']))
{
	$response['status'] = 1;
	$response['condition'] = "Insufficient data provided";
	echo json_encode($response);
   }
else {
$name = htmlspecialchars($_POST['name']);
$email_address = htmlspecialchars($_POST['email']);
$phone = htmlspecialchars($_POST['phone']);
$message = htmlspecialchars($_POST['message']);
$date = htmlspecialchars($_POST['date']);
$time = htmlspecialchars($_POST['time']);
$people = htmlspecialchars($_POST['people']);
	
// Create the email and send the message
$to = 'info@sahibsgrillkitchen.com'; 
$email_subject = "Reservation Request:  $name";
$email_body = "Reservation Request\n\nName:".$name."\n\nEmail: ".$email_address."\n\nPhone: ".$phone."\n\nDate: ".$date."\n\nTime: ".$time."\n\nPeople: ".$people."\n\nMessage:\n".$message;
$headers = "From: noreply@sahibsgrillkitchen.com\n"; 
$headers .= "Reply-To: ".$email_address;	
$headers .= "X-Mailer: PHP/" . phpversion();   
$mail_response = mail($to,$email_subject,$email_body,$headers);
if($mail_response) {
	$response['status'] = 0;
	echo json_encode($response);
}
else {
	$response['status'] = 1;
	$response['condition'] = "Error";
	echo json_encode($response);
}
}

?>