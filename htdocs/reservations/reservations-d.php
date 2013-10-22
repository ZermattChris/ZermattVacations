<?php
	// Generate a unique token to identify this Form for later processing.
	// Helps to stop direct access to the form processing script.
	
	// set the Compact Policy Header so IE doesn't yak big time on us!
	//header('P3P: policyref="http://www.zermattvacations.com/w3c/p3p.xml",  CP="IDC DSP CONa TELa OUR IND PHY ONL DEM OTC"');
	
	session_start();
	$token = md5(uniqid(rand(), TRUE));
	$_SESSION['token'] = $token;
	$_SESSION['token_time'] = time();
	
	$errors = $_SESSION['errors'];
	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
    	
        <title>Zermatt Vacations :: Zermatt Fereinwohnungen Reservationen und Anfragen</title>
		
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
        <meta name="Description" content="Zermatt Vacations Holiday Apartments - Quality non-smoking apartment rentals in Zermatt Switzerland (at the foot of the Matterhorn)" />
        <meta name="Keywords" content="Zermatt,Apartments,Holiday,Chalet,Flat,Alpine,mountains,alps,Rentals,Switzerland,Lodging,Non-smoking,Quality,Vacation,Matterhorn,Ski,Climb,Hike,Bike" />
        <meta name="Author" content="bSoftware of Zermatt, Switzerland" />
        <meta name="Copyright" content="© by Zermatt Vacations — All rights reserved." />
        <link href="/css/home-menu.css" rel="stylesheet" type="text/css" />
        <link href="/css/contents.css" rel="stylesheet" type="text/css" />
        <link href="/css/detail-menu.css" rel="stylesheet" type="text/css" />
		
		<?php include_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/head-scripts.php" ); ?>
		<?php include_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/head-ie-fixes.php" ); ?>
		
		<style type="text/css">
			input {
				float: left;
			}
		</style>
		
    </head>
	<body>
		
		<?php include_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/awards.php" ); ?>
		
        <!-- The top Menu section. -->
		<?php include_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/menus/reservation-de.php" ); ?>
		
		<div id="headingBox">
			<a href="/index-d.htm" title="Home..." >
        		<img src="/images/zermattvacations-apartments-logo-new.png" alt="Holiday Apartments &amp; Flats in Zermatt Switzerland - Logo" />
        		<span class="home" ></span>
        	</a>
        	<span class="underline"><h1><span class="caps">R</span>eservationen und Anfragen </h1></span>
			<span class="languageMenu">
				<a href="reservations.php" title="Change this site's language to English">english</a>
				:: deutsch
			</span>
		</div>
		
		
		<!-- The main content section -->
		<div id="contents_box">
			<div id="contents">
				
				
				
				<!-- START :: Content area -->
				
				<p>
					Um eine Reservation oder Anfrage zu machen, füllen 
					Sie bitte das folgende Formular aus. Wir werden 
					Ihnen in Kürze antworten.
				</p>
				<p>
					Notwendige felder sind mit eine <span class="red">*</span> markiert. 
				</p>
				
				<!-- Form section -->
<form method="post" action="/nobotsfrmmale/bsoftfrm.php?lang=de">
	<input name="token" value="<?php echo $token; ?>" type="hidden" />
  <table style="margin:30px 0 0 70px; font-family: verdana,arial,sans-serif; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: 18px; font-size-adjust: none; font-stretch: normal;" bgcolor="#cccccc" border="0" cellpadding="5" cellspacing="5" width="80%">
    <tbody>
      <tr>
        <td bgcolor="#ffffcc">
          <div align="right"><span class="red">*</span>E-Mail:</div>
        </td>
        <td bgcolor="#ddebec">
          <div align="left">
            <input name="email" id="email" type="text" />
          </div>
        </td>
      </tr>
      <tr>
        <td bgcolor="#ffffcc" width="36%">
        <div align="right">Nachname:</div>
        </td>
        <td bgcolor="#ddebec" width="64%">
        <div align="left"> <input name="surname" id="surname" size="40" type="text" /></div>
        </td>
      </tr>
      <tr>
        <td bgcolor="#ffffcc">
        <div align="right">Vorname:</div>
        </td>
        <td bgcolor="#ddebec">
        <div align="left"> <input name="firstname" id="firstname" size="40" type="text" /></div>
        </td>
      </tr>
      <tr>
        <td bgcolor="#ffffcc">
        <div align="right">Strasse:</div>
        </td>
        <td bgcolor="#ddebec">
        <div align="left"> <input name="street" id="street" size="60" type="text" /></div>
        </td>
      </tr>
      <tr>
        <td bgcolor="#ffffcc">
        <div align="right">PLZ:</div>
        </td>
        <td bgcolor="#ddebec">
        <div align="left"> <input name="postcode" type="text" id="postcode" maxlength="15" /></div>
        </td>
      </tr>
      <tr>
        <td bgcolor="#ffffcc">
        <div align="right">Wohnort:</div>
        </td>
        <td bgcolor="#ddebec">
        <div align="left"> <input name="city" type="text" id="city" maxlength="35" /></div>
        </td>
      </tr>
      <tr>
        <td bgcolor="#ffffcc">
        <div align="right">Land:</div>
        </td>
        <td bgcolor="#ddebec">
        <div align="left"> <input name="country" type="text" id="country" maxlength="35" /></div>
        </td>
      </tr>
      <tr>
        <td bgcolor="#ffffcc">&nbsp; </td>
        <td bgcolor="#ddebec">&nbsp; </td>
      </tr>
      <tr>
        <td bgcolor="#ffffcc">
        <div align="right">Telefon:</div>
        </td>
        <td bgcolor="#ddebec">
        <div align="left"> <input name="tel" type="text" id="tel" maxlength="25" /></div>
        </td>
      </tr>
      <tr>
        <td bgcolor="#ffffcc">
        <div align="right">Fax:</div>
        </td>
        <td bgcolor="#ddebec">
        <div align="left"> <input name="fax" type="text" id="fax" maxlength="25" /></div>
        </td>
      </tr>
      <tr>
        <td bgcolor="#ffffcc">&nbsp; </td>
        <td bgcolor="#ddebec">&nbsp; </td>
      </tr>
      <tr>
        <td bgcolor="#ffffcc">
        <div align="right">Ankunftsdatum:<br />
        	(tt/mm/yy)
        </div>
        </td>
        <td bgcolor="#ddebec">
        <div align="left"> <input name="arrival" type="text" id="arrival" maxlength="25" /></div>
        </td>
      </tr>
      <tr>
        <td bgcolor="#ffffcc" height="46">
        <div align="right">
        	Abreisedatum:<br />(tt/mm/yy)<br />
        </div>
        </td>
        <td bgcolor="#ddebec"><input name="departure" type="text" id="departure" maxlength="25" /></td>
      </tr>
      <tr>
        <td bgcolor="#ffffcc">
        <div align="right">Anzahl Personnen:</div>
        </td>
        <td bgcolor="#ddebec">
        <div align="left"> <input name="numpeople" type="text" id="numpeople" maxlength="3" /></div>
        </td>
      </tr>
      <tr>
        <td bgcolor="#ffffcc">
        <div align="right">Bemerkungen: <br/></div>
        </td>
        <td bgcolor="#ddebec">
        <div align="left"> <textarea name="comments" cols="35" rows="4" id="comments"></textarea></div>
        </td>
      </tr>
      <tr>
        <td colspan="2">
        <div align="center"> <label><strong>Danke!</strong><br />
        <br />
        <input style="margin:0 auto; float:none;" name="Submit" value="Senden" type="submit" /> </label> </div>
        </td>
      </tr>
    </tbody>
  </table>
</form>
				<!-- END: Form section -->

				
				
				
				<!-- END :: Content area -->
				
				
				
				
				
                <span class="spacer"></span>
				
                <!-- The Footer section -->
                <div id="back_bottom">
                    <div id="footer_box">
                    	<?php include_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/footers/footer-de.php" ); ?>
                    </div>
                </div>
				
            </div>
        </div><!-- END: contents_box -->
        
		<?php include_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/footers/information-de.php" ); ?>
		
		<?php include_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/js-init.php" ); ?>
		<?php include_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/google-analytics.php" ); ?>
        
	</body>
</html>
