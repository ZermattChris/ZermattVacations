<?php 
	
	$host = $_SERVER['HTTP_HOST'];
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
    	
        <title>Thank you! - Danke! :: Zermatt Vacation Apartments &amp; Holiday Flats</title>
		
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		<meta http-equiv="refresh" content="3;url=http://<?php echo $host; ?>/" />
		
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
	
		<div id="headingBox"> 
        	<span class="underline" style="top:50px;"><h1><span class="caps">T</span>hank you! — <span class="caps">D</span>anke!</h1></span>
		</div>
		
		
		<!-- The main content section -->
		<div id="contents_box">
			<div id="contents">
				
				<p style="position:relative; top:-100px;">Your comments have been sent to us.</p>
				
                <!-- The Footer section -->
                <div id="back_bottom">
                    <div id="footer_box">
                    	
                    </div>
                </div>
				
            </div>
        </div><!-- END: contents_box -->
        
		<?php include_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/footers/information.php" ); ?>
		
		<?php include_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/js-init.php" ); ?>
		<?php include_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/google-analytics.php" ); ?>
        
	</body>
</html>
