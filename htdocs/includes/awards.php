		
		<!-- Awards -->
		
		<div id="AwardsBox">
			<div id="tripAdvisorFlipKeyAward">
				Find <a id="flipkey_excellence_badge" href="http://www.flipkey.com/vacation+rentals/switzerland/valais/zermatt/">Zermatt Vacation Rentals</a> on FlipKey
			</div>
			<!--<script type="text/javascript" src="http://data.flipkey.com/widgets/jsapi/33794/kb3/86rm/"></script>-->
		</div>
		
		
		<!-- Facebook like -->
		<div id="LikeBox">
			<div id="fb-root"></div>
			<script>(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) {return;}
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
			<?php
				// dynamically create the Like button page link.
				$host = $_SERVER['HTTP_HOST'];
				$filePath = $_SERVER['PHP_SELF'];
				$likeThisPage = "http://{$host}{$filePath}";
			?>
			<div class="fb-like" data-href="<?php echo $likeThisPage; ?>" data-send="true" data-layout="box_count" data-width="60" data-show-faces="true"></div>
		</div>