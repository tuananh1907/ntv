<div id="footer">
        <div class="footerSp hide-pc">
            <div class="footerSpInner table">
                <div class="fMap cell">
                    <?php 
                    echo ( isset( $config['_google_map_mobile_'])  ? $config['_google_map_mobile_'] : '');
                    ?>
                </div>
                <div class="fText cell">
                    <?php 
                    echo ( isset( $config['_address_mobile_'])  ? $config['_address_mobile_'] : '');
                    ?>
                </div>
            </div>
            <ul class="fNav01 clearfix">
                <?php
                foreach($adsmobile as $r) {
                ?>
                    <li>
                        <a href="<?php echo ($r['a']) ? $r['a'] :'#' ; ?>">
                            <img src="<?php echo $r['img']; ?>" alt="SMJ" />
                        </a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
        <address>
        Copyright &copy; 2015 SANKO MOLD VIETNAM. All Rights Reserved. Design by Sorimachi Vietnam.
        </address>
    </div>
</div>
<p class="pageTop"><a href="#wrapper"><img src="<?php echo DEFAULT_IMAGE_PATH; ?>/pagetop_off.jpg" alt="page top" /></a></p>
</body>
</html>