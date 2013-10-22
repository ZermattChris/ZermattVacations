<?php
	
	//------------------------------------------------------
	// Custom Form input filters for Zermattvacations.com
	//------------------------------------------------------
	
	session_start();
	
	$localDebug = false;			// set to true to do local step debugging of this form handler.
	
	// Send completed form to this address (a copy goes to the customer's entered email address too).
	$to = 'info@zermattvacations.com';
	
	// Sending email server settings.
	$SMTPServer = 'mail.rhone.ch';
	$SMTPPort = 25;
	
	
	
	
	//================================ Shouldn't have to change below this line ==============================
	
	if ( $localDebug === true ) {
		$SMTPServer = 'mail.bluewin.ch';  //debug
		$to = 'dev@bsoft.ch';		//debug
	}
	
	
	
	// Get the Res form language and switch to the proper thanks page.
	$dirtyLang = $_GET['lang'];
	$lang = 'en';
	if ( $dirtyLang == 'en' ) {
		$lang = 'en';
		header('Location: /reservations/thanks.php');
	} else {
		$lang = 'de';
		header('Location: /reservations/thanks-d.php');
	}
	
	$timeout = 1800;		// in seconds. 3600 == 1 hour.
	$errString = '';
	
	// Get the input data from the form.
	$surname = $string = filter_var( $_POST['surname'], FILTER_SANITIZE_STRING ); 
	$firstname = $string = filter_var( $_POST['firstname'], FILTER_SANITIZE_STRING ); 
	$street = $string = filter_var( $_POST['street'], FILTER_SANITIZE_STRING ); 
	$postcode = $string = filter_var( $_POST['postcode'], FILTER_SANITIZE_STRING ); 
	$city = $string = filter_var( $_POST['city'], FILTER_SANITIZE_STRING ); 
	$country = $string = filter_var( $_POST['country'], FILTER_SANITIZE_STRING ); 
	$tel = $string = filter_var( $_POST['tel'], FILTER_SANITIZE_STRING ); 
	$fax = $string = filter_var( $_POST['fax'], FILTER_SANITIZE_STRING ); 
	$email = $string = filter_var( $_POST['email'], FILTER_SANITIZE_EMAIL ); 
	$arrival = $string = filter_var( $_POST['arrival'], FILTER_SANITIZE_STRING ); 
	$departure = $string = filter_var( $_POST['departure'], FILTER_SANITIZE_STRING ); 
	$numpeople = $string = filter_var( $_POST['numpeople'], FILTER_SANITIZE_STRING ); 
	$comments = $string = filter_var( $_POST['comments'], FILTER_SANITIZE_STRING ); 
	
	
	
	// 1) ------------------------------------------------------------------------
	// Check the session id code to make sure we're coming from our own form.
	if ( !isset( $_SESSION['token'] )) {
		$_SESSION['token'] = md5( uniqid( rand(), TRUE ));
	}
	// If the token matches, then make sure we've not timed out.
	if ( $_POST['token'] == $_SESSION['token'] ) {
		/* Valid Token */
		$token_age = time() - $_SESSION['token_time'];
		if ( $token_age <= $timeout ) {
			/* Haven't taken too long to fill in the form */
			//echo "******** Processing your web form input ******** <br/>\n";
			//echo "Success! Coming from our form!!! Continue to process... <br/>\n";
			//echo "SessionTok: " . $_SESSION['token'] . " <br/>\n";
			//echo "POSTTok: " . $_POST['token'] . " <br/>\n";
			//echo "token_age: $token_age <br/>\n";
			//echo "timeout: $timeout <br/>\n";
		} else {
			echo "ERROR: Timed out. Please reload the form and try again... <br/>\n";
			exit;
		}
	} else {
		echo "ERROR: You are not allowed to access this script directly... <br/>\n";
		exit;
	}
	
	
	
	
	
	
	
	// 3) ------------------------------------------------------------------------
	// Generate the mail to send.
	// info@zermattvacations.com
	
	$subject = 'ZermattVacations.com - Reservation Request';
	
	$body = <<<BODY
	
 Surname: {$surname}
 First Name: {$firstname}
 Email: {$email}

 Street: {$street}
 PLZ: {$postcode}
 City: {$city}
 Country: {$country}

 Tel: {$tel}
 Fax: {$fax}

 Arrival Date: {$arrival}
 Departure Date: {$departure}
 Number of People: {$numpeople}

 Comments:
 {$comments}
	
BODY;
	
	
	// Add a language flag to the mail going to Ashley...
	if ( $lang == 'en' ) {
		$myLang = "Language: English \n";
	} else {
		$myLang = "Language: Deutsch \n";
	}
	$privateBody = $myLang . $body;
	

	require_once 'Swift-4.1.2/lib/swift_required.php';

	// ---------------------- Swift Mailer ----------------------
	// -------- Send email to info@webascent.ch -------- 
	//Create the Transport
	$transport = Swift_SmtpTransport::newInstance($SMTPServer, $SMTPPort);
	//	->setUsername('xxx@yyyy.com')
	//	->setPassword('xxxx')
	//;

	//Create the Mailer using your created Transport
	$mailer = Swift_Mailer::newInstance($transport);

	//Create a message
	$message = Swift_Message::newInstance()
		->setSubject( $subject )

		->setFrom($email)
		->setTo($to)
		//->setFrom(array( $email => "$firstname $surname" ))
		//->setTo(array( $to ))
		->setBody( $privateBody )
	;

	//Send the message
	$result = $mailer->send($message);
	// Swift Mailer version STOP.
	
	
	// 
	if ( $lang == 'en' ) {
		$confirmMsg = "Thank you for your Zermatt Vacations Reservation Request!
	
We will answer your request as soon as possible.

If you have any questions or problems, please don't hesitate to contact us at info@zermattvacations.com
or via phone: +41 (0)27 967 0006.

Here is a copy of your Reservation Request:
" . $body ;
	} elseif ( $lang == 'de' ) {
		$confirmMsg = "Vielen Dank für Ihre Zermatt Vacations Anfrage.
	
Wir werden so bald als möglich mit Ihnen Kontakt aufnehmen.

Sollten Sie fragen oder Probleme haben, können Sie uns auf info@zermattvacations.com oder via Telefon kontaktieren.

Hier ist eine Kopie Ihrer Reservations Anfrage: 
" . $body ;
	}


	//Create the Mailer using your created Transport
	$mailer = Swift_Mailer::newInstance($transport);

	//Create a message
	$message = Swift_Message::newInstance()
		->setSubject( $subject )

		->setFrom(array( 'info@zermattvacations.com' => 'Zermatt Vacations' ))
		->setTo(array( $email ))
		->setBody( $confirmMsg )
	;

	//Send the message
	$result = $mailer->send($message);
	// Swift Mailer version STOP.
	
	
	
?>