
		<link href="//fonts.googleapis.com/css?family=Tangerine:regular,bold&subset=latin" rel="stylesheet" type="text/css" />

		<!-- Fix IE 6 png bug -->
		<!--[if lte IE 6]>
		<script src="/includes/DD_belatedPNG_0.0.8a-min.js" type="text/javascript" ></script>
		<script src="/includes/png-fix.js" type="text/javascript" ></script>
		<![endif]-->
		<!--@INCLUDE-JS@-->
		

		<!-- Shadowbox hooks -->
		<link href="/includes/shadowbox-3.0.3/shadowbox.css" rel="stylesheet" type="text/css" />
		<script src="/includes/shadowbox-3.0.3/shadowbox.js" type="text/javascript"></script>
		<script type="text/javascript">
            
            Shadowbox.init({
                // skip the automatic setup again, we do this later manually
                skipSetup: true,
                lanaguage: 'en'
            });
            
            // inject the Shadow-box pop up into all links inside any elements marked 
            // with a css class of "dwa-popup"
            Shadowbox.setup( "a.slides", {
                overlayOpacity: 0.75,
                gallery: "thumbnails",
                continuous: true,
                //counterType: "skip",
                slideshowDelay: 4
            });
            
		</script>
		

		