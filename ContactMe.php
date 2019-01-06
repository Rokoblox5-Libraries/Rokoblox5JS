<?php
	$name = $_POST['name'];
	$visitor_email = $_POST['email'];
	$message = $_POST['message'];

	$email_from = "no-reply@rokoblox5.000webhostapp.com via $visitor_email";

	$email_subject = "CustomerCare";

	$email_body = "User Name: $name. \n".
					"User E-Mail: $visitor_email. \n".
					"Message: $message";

	$to = "rokoblox5.info@gmail.com";

	$headers = "From: $email_from \r\n";

	$headers .= "Reply-To: $visitor_email \r\n";

	mail($to, $email_subject, $email_body);

	header("Location: http://rokoblox5.000webhostapp.com");
 ?>
