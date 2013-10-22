<?php 
	// an array of countries for the drop menu.
	include_once( 'countries-list.php' );
	
	session_start();
	
	// previously entered form data (if any)
	$_SESSION['name'];
	$_SESSION['email'];
	//$_SESSION['url'];
	$_SESSION['country'];
	$_SESSION['comment'];
	
	// Need to process those pesky countries.
	$rawCountriesList = getCountryCodeArray();
	// Add our Default Countries list to the top.
	$topCountriesList = array( "Switzerland"=>"Switzerland", "United Kingdom"=>"United Kingdom", "Germany"=>"Germany", "France"=>"France", "Australia"=>"Australia", "United States"=>"United States", ""=>"" );
	
	$countriesList = array_merge( $topCountriesList, $rawCountriesList );
	
	/*
	             <option value="Australia">Australia</option>
                <option value="France">France</option>

                <option value="Germany">Germany</option>
                <option value="Switzerland">Switzerland</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States">United States</option>
	*/
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
    	
		<title>Gästebuch :: ZermattVacations.com</title>
		
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
		
    </head>
	<body>
		
		<?php include_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/awards.php" ); ?>
		
        <!-- The top Menu section. -->
		<?php include_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/menus/gastebuch-de.php" ); ?>
		
		<div id="headingBox">
			<a href="/index-d.php" title="Home..." >
        		<img src="/images/zermattvacations-apartments-logo-new.png" alt="Holiday Apartments &amp; Flats in Zermatt Switzerland - Logo" />
        		<span class="home" ></span>
        	</a>
        	<span class="underline"><h1><span class="caps">G</span>ästebuch — Ihre Meinung interessiert uns </h1></span>
			<span class="languageMenu">
				<a href="add-guestbook-entry.php" title="Change this site's language to English">english</a>
				:: deutsch
			</span>
		</div>
		
		
		<!-- The main content section -->
		<div id="contents_box">
			<div id="contents">
				
				<p>
					Erzählen Sie uns über Ihren Aufenthalt in einer unserer Ferienwohnungen und über Ihre Zeit in Zermatt.
				</p>
				
				<?php 
					// Display Form entry errors bubble
					if ( isset( $_SESSION['errorsHtml'] ) && $_SESSION['errorsHtml'] !== '' ) {
						echo "<h3 class='formEntryErrors'>Oops! Etwas fehlt...</h3>";
						echo $_SESSION['errorsHtml'];
						// Reset errors
						$_SESSION['errorsHtml'] = '';
					}
				?>
			
<form id="geustbookForm" method="post" action="/guestbook/handle-add-guestbook-entry.php" name="gbform">
  <input type="hidden" name="do" value="add">
    <table width="550" border="0" cellspacing="0" cellpadding="0" bgcolor="#000000">
      <tr>
      <td>
        <div align="center">
            <table width="100%" border="0" cellspacing="1" cellpadding="4">
              <tr bgcolor="#EDEEE8"> 
                <td width="20%"> 
                  <div align="right"><font face="verdana" size="2">*Name : </font></div>
                </td>
                <td width="72%"> 
                  <input type="text" name="name" size="40" maxlength="70" value="<?php echo $_SESSION['name']; ?>">
                </td>
              </tr>
              <tr bgcolor="#EDEEE8"> 
                <td width="28%" valign="top"> 
                  <div align="right"><font face="verdana" size="2">Email : </font></div>
                </td>
                <td width="72%"> 
                  <input type="text" name="email" size="40" maxlength="100" value="<?php echo $_SESSION['email']; ?>">
                </td>
              </tr>
              <!--  
              <tr bgcolor="#EDEEE8"> 
                <td width="28%"> 
                  <div align="right"><font face="verdana" size="2">Website : </font></div>
                </td>
                <td width="72%"> 
                  <input type="text" name="url" size="40" maxlength="150"  value="<?php echo $_SESSION['url']; ?>">
                </td>
              </tr>
				-->
				
              <tr bgcolor="#EDEEE8"> 
                <td width="28%"> 
                  <div align="right"><font face="verdana" size="2">*Land : </font></div>
                </td>
                <td width="72%"> 
                <select name="country">
				<?php 
					// Show all the countries, with currently selected chosen.
					$gapTrigger = 8;		// How many countries between each Gap.
					$gapCounter = 0;
					foreach ( $countriesList as $ISO => $countryName ) {
						$countryName = ucfirst(strtolower($countryName));
						// Add a 'Gap' every x lines for better readability.
						if ( $gapCounter % $gapTrigger === 0 ) {
							echo "				<option value=''> &nbsp; </option> \n";
						}
						if ( strtolower( trim( $_SESSION['country'] )) === strtolower( trim( $countryName )) ) {
							echo "				<option id='$ISO' value='$countryName' selected='selected'>$countryName</option> \n";
						} else {
							echo "				<option id='$ISO' value='$countryName'>$countryName</option> \n";
						}
						$gapCounter++;
					}
				?>
                </select>
                </td>
              </tr>
              <tr bgcolor="#EDEEE8"> 
                <td valign="top" width="28%"> 
                  <div align="right"><font face="verdana" size="2">*Kommentarfeld  : </font></div>
                </td>
                <td width="72%">

                    <textarea name="comment" cols="45" rows="8" wrap="virtual"><?php echo $_SESSION['comment']; ?></textarea>

    <br><font size="1" face="verdana">* erforderlich</font>
                </td>
              </tr>
				<tr bgcolor="#E4E4E4"> 
					<td colspan="2"> 
						<div align="center">
							<!-- Captcha -->
							<div style="height:10px;"></div>
							<p>*Bitte geben Sie den folgenden Text ein</p>
							<div style="height:10px;"></div>
							<img id="captcha" src="/securimage/securimage_show.php" alt="CAPTCHA Image" />
							<object width="19" height="19" data="/securimage/securimage_play.swf?audio=/securimage/securimage_play.php&amp;bgColor1=#fff&amp;bgColor2=#fff&amp;iconColor=#777&amp;borderWidth=1&amp;borderColor=#000" type="application/x-shockwave-flash"><param value="/securimage/securimage_play.swf?audio=/securimage/securimage_play.php&amp;bgColor1=#fff&amp;bgColor2=#fff&amp;iconColor=#777&amp;borderWidth=1&amp;borderColor=#000" name="movie"></object>
							<br />
							<input type="text" name="captcha_code" size="10" maxlength="6" />
							<br />
							<a href="#" onclick="document.getElementById('captcha').src = '/securimage/securimage_show.php?' + Math.random(); return false">Ein anderes Bild Zeigen <img border="0" align="bottom" onclick="this.blur()" alt="Reload Image" src="/securimage/images/refresh.gif" /></a>
							<div style="height:10px;"></div>
							<input type="submit" value="Senden">
							<div style="height:10px;"></div>
							
							<!-- Do a custom back button that isn't part of the form... 
								<input type="button" value="Back" onClick="window.location='/guestbook/index.php?page=1'">
							-->
						</div>
					</td>
				</tr>
              
            </table>
        </div>
      </td>
    </tr>

  </table>
  </form>
  
                <span class="spacer"></span>
                
                
  				<!-- Return button -->
				<div class="standard_button" style="float:clear; margin-top:20px; margin-left:auto; margin-right:auto;">
					<a href="/guestbook/index-d.php" >Z&uuml;ruck</a>
				</div>
				
                <span class="spacer"></span>
				
                <!-- The Footer section -->
                <div id="back_bottom">
                    <div id="footer_box">
                    	<?php include_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/footers/footer-en.php" ); ?>
                    </div>
                </div>
				
            </div>
        </div><!-- END: contents_box -->
        
		<?php include_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/footers/information.php" ); ?>
		
		<?php include_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/js-init.php" ); ?>
		<?php include_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/google-analytics.php" ); ?>
        
	</body>
</html>
