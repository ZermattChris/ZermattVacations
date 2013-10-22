<?php 
	// Prep the Guestbook for display here.
	include_once( "guestbook-viewer.php" );
	$rawComments = file_get_contents( 'comments.dat') ;
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
			<a href="/index-d.php" title="Return Home..." >
        		<img src="/images/zermattvacations-apartments-logo-new.png" alt="Holiday Apartments &amp; Flats in Zermatt Switzerland - Logo" />
        		<span class="home" ></span>
        	</a>
        	<span class="underline"><h1><span class="caps">G</span>ästebuch — Ihre Meinung interessiert uns </h1></span>
			<span class="languageMenu">
				<a href="index.php" title="Change this site's language to English">english</a>
				:: deutsch
			</span>
		</div>
		
		
		<!-- The main content section -->
		<div id="contents_box">
			<div id="contents">
				
				
				
				<!-- START :: Content area -->
				
				
				<!-- START :: Content area -->
				
				
				<p>
					Erzählen Sie uns über Ihren Aufenthalt in einer unserer Ferienwohnungen 
					und über Ihre Zeit in Zermatt. Das Gästebuch ist zudem eine ideale 
					Gelegenheit um zu erfahren, wie andere Urlauber den Aufenthalt in 
					unseren Ferienwohnungen und ihre Ferien in Zermatt erlebt haben. 
				</p>
				
				<div style="width:100%; height:15px;"></div>
				
				<h2>
					Für einen neuen Eintrag ins Gästebuch von ZermattVacations.com 
					klicken Sie den untenstehenden Link an.
				</h2>
				<div class="standard_button" style="float:clear; margin-top:20px; margin-bottom:20px; margin-left:auto; margin-right:auto;">
					<a href="/guestbook/add-guestbook-entry-d.php">Neue Eintrag</a>
				</div>

				<div style="width:100%; height:25px;"></div>

				<!-- END :: Content area -->
				
				
				
				
				
				
				
				
				
				<!-- GUESTBOOK Output :: Start -->
				<?php echo getFormattedComments( $rawComments ); ?>
				<!-- GUESTBOOK Output :: Stop -->
				
				
				
				
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
