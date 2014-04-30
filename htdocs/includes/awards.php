		
		<!-- Awards -->
		
		<div id="AwardsBox">
<!--			<div id="tripAdvisorFlipKeyAward">-->
<!--				Find <a id="flipkey_excellence_badge" href="http://www.flipkey.com/vacation+rentals/switzerland/valais/zermatt/">Zermatt Vacation Rentals</a> on FlipKey-->
<!--			</div>-->
            <div id="centerAwardsBox">
                <div id="FK_Best_Of_Badge535ea0daa1b95">
                    <a href="http://www.flipkey.com/"><img alt="FlipKey"  src="http://www.flipkey.com//img/FK-logo-90x14.png"/></a>
                    <script src="http://www.flipkey.com//widgets/badges/best_of/19564/535ea0daa1b95/c2lsdmVy/88171"></script>
                </div>
                <div id="FK_Frontdesk_Badge535ea184e32db">
                    <a href="http://www.flipkey.com/"><img alt="FlipKey"  src="http://www.flipkey.com/img/logos/FlipKey_TA_Color_Logo.svg"/></a>
                    <script src="http://www.flipkey.com/widgets/badges/frontdesk/19564/535ea184e32db/88174"></script>
                </div>
                <div id="FK_Best_Of_Badge535ea11f320ee">
                    <a href="http://www.flipkey.com/"><img alt="FlipKey"  src="http://www.flipkey.com//img/FK-logo-90x14.png"/></a>
                    <script src="http://www.flipkey.com//widgets/badges/best_of/19564/535ea11f320ee/MjAxMg==/88172"></script>
                </div>
            </div>
        </div>
		</div>
		
		
		<!-- Facebook like -->
		<div id="LikeBox">
            <?php
                // dynamically create the Like button page link.
                $host = $_SERVER['HTTP_HOST'];
                $filePath = $_SERVER['PHP_SELF'];
                $likeThisPage = "http://{$host}{$filePath}";
            ?>
            <div id="fb-root"></div>
            <script>
                (function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
            </script>

            <div class="fb-like" data-href="<?php echo $likeThisPage; ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>

<!--			<div id="fb-root"></div>-->
<!--			<script>(function(d, s, id) {-->
<!--				var js, fjs = d.getElementsByTagName(s)[0];-->
<!--				if (d.getElementById(id)) {return;}-->
<!--				js = d.createElement(s); js.id = id;-->
<!--				js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";-->
<!--				fjs.parentNode.insertBefore(js, fjs);-->
<!--			}(document, 'script', 'facebook-jssdk'));</script>-->
<!---->
<!--			<div class="fb-like" data-href="--><?php //echo $likeThisPage; ?><!--" data-send="true" data-layout="box_count" data-width="60" data-show-faces="true"></div>-->
		</div>