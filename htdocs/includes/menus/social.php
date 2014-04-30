    <div class="social">

        <!-- Facebook -->
        <div class="social-button">
            <a class="social-link" href="https://www.facebook.com/zermatt.vacations" target="_blank">facebook</a>
            &nbsp;
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
        </div>
        <!-- Facebook::END -->

        <div style="width:15px; display:inline-block;"><!-- Just a spacer --></div>

        <!-- Twitter -->
        <div class="social-button">
            <a class="social-link" href="https://twitter.com/ZermattVacation" target="_blank">twitter</a>
            &nbsp;
            <a href="https://twitter.com/share" class="twitter-share-button" data-via="ZermattVacation">Tweet</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
        </div>
        <!-- Twitter::END -->

        <!-- Blog -->

    </div>