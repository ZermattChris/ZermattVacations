<?php 
	
	session_start();
	
	$_SESSION['errorsHtml'] = '';
	$errorsHtmlString = '';
	
	
	
	/**
	 * Handle the sending of an email from the Guestbook Add page
	 * to Ashley.
	 */
	// ---------------------------------------------------------------------
	$sendMailTo = "info@zermattvacations.com";
	//$sendMailTo = "chris@bsoft.ch";
	//$thanksPage = "thanks.php";
	
	
	
	
	
	// ---------------------------------------------------------------------
	/**
	 * Captcha Image to block spam.
	 */
	include_once $_SERVER['DOCUMENT_ROOT'] . '/securimage/securimage.php';
	$securimage = new Securimage();
	if ($securimage->check($_POST['captcha_code']) == false) {
		// the code was incorrect
		// handle the error accordingly with your other error checking
		
		// or you can do something really basic like this
		$errorsHtmlString .= "The Captcha was incorrect, please try again" . "\n";		// each msg with a new line appended.
	}
	
	
	
	
	// ---------------------------------------------------------------------
	
	// Filter incoming data for email.
	$_SESSION['name'] = filter_var( $_POST['name'], FILTER_SANITIZE_STRING );
	$_SESSION['email'] = filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL );
	//$_SESSION['url'] = filter_var( $_POST['url'], FILTER_SANITIZE_STRING );
	$_SESSION['country'] = filter_var( $_POST['country'], FILTER_SANITIZE_STRING );
	$_SESSION['comment'] = filter_var( $_POST['comment'], FILTER_SANITIZE_STRING );
	
	// debug.
	//echo "name: $name <br/>\n";
	//echo "email: $email <br/>\n";
	//echo "url: $url <br/>\n";
	//echo "country: $country <br/>\n";
	//echo "comment: $comment <br/>\n";
	
	
	// Validate Name
	if ( trim( $_SESSION['name'] ) === '' ) {
	    $errorsHtmlString .= "You must enter a Name" . "\n";		// each msg with a new line appended.
	}
	
	// Validate Email
	if ( $_SESSION['email'] === false ) {
	    // it's not valid
	    $errorsHtmlString .= "You must enter a valid Email address" . "\n";		// each msg with a new line appended.
	}
	
	
	
	// Validate country
	if ( trim( $_SESSION['country'] ) === '' ) {
	    $errorsHtmlString .= "You must choose a Country" . "\n";		// each msg with a new line appended.
	}
	
	// Validate comment
	if ( trim( $_SESSION['comment'] ) === '' ) {
	    $errorsHtmlString .= "You must enter a Comment" . "\n";		// each msg with a new line appended.
	}
	
	
	
	$errorsList = explode( "\n", $errorsHtmlString );
	$tmp = "	<ul class='formEntryErrors'> \n";
	foreach ( $errorsList as $anErrStr ) {
		// skip last empty line if there's one.
		if ( ! trim( $anErrStr ) == '' ) {
			$_SESSION['errorsHtml'] .= "		<li>$anErrStr</li> \n";
		}
	}
	if ( $_SESSION['errorsHtml'] !==  '' ) {
		$_SESSION['errorsHtml'] .= "	</ul> \n\n";
		// Return to calling form and have it display the errors
		// by checking if the session var is empty or not.
		session_write_close();
		header( "Location: " . $_SERVER['HTTP_REFERER'] );
		return;
	}
	
	$mailTemplate = <<<MAIL
	
    Name: 		{$_SESSION['name']}
    Email: 		{$_SESSION['email']}
    Country:		{$_SESSION['country']}
    
    Comments:		{$_SESSION['comment']}
	
MAIL;
	
	$phpV = phpversion();
	
	// Send email.
	$headers =	"From: {$_SESSION['email']}\r\n";
	$headers .=	"X-Mailer: PHP/{$phpV}\r\n";
	
	$headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/plain; charset=utf-8\r\n";
    $headers .= "Content-Transfer-Encoding: 8bit";
	
	$sent = mail( $sendMailTo, "ZermattVacations.com Guestbook comment", $mailTemplate, $headers );	
	if ( $sent === false ) {
		session_write_close ();
		$_SESSION['errorsHtml'] = "Sorry!<br />\nThe sending of your form has failed. Please try again or contact us directly via phone or email.";
		header( "Location: " . $_SERVER['HTTP_REFERER'] );
		return;
	}
	
	// Success!
	session_write_close ();
	header( "Location: " . $thanksPage );
	
?>