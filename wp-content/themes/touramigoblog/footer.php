   <footer class="footer">
        <div class="content">
            <div class="scroll-top scroll-btn" data-href=".page-wrap">
                <i class="icon icon-scroll-top"></i>
                <span>Back to top</span>
            </div><!--scroll-top-->

            <div class="spacer">
                <a href="<?php echo home_url( '/' ); ?>" class="footer-logo">
                    <img src="<?php the_field('logo_footer', option); ?>" alt="" class="footer-logo__icon">
                    <span><?php the_field('logo_footer_text', option); ?></span>
                </a>

                <a target="_blank" href="<?php the_field('go_to_touramigo_url_footer', option); ?>" class="footer__link pos-center bd-block">
                    <i class="border-top-right"></i>
                    <i class="border-bottom-left"></i>
                   <?php the_field('go_to_touramigo_footer_title', option); ?>
                </a>

                <div class="footer-right">
                    <div class="social">
<?php  while(has_sub_field('social_network', option)) { ?>
                        <a target="_blank" href="<?php the_sub_field('url'); ?>" class="social__link <?php the_sub_field('class_icon'); ?>"></a>
 <?php } ?>
                    </div><!--social-->


<?php if(get_field('privacy_policy_title', option)) { ?>
                    <a href="<?php the_field('privacy_policy_url', option); ?>" class="privacy">
                       <?php the_field('privacy_policy_title', option); ?>
                    </a>
<?php } ?>
                </div><!--footer-right-->

            </div><!--spacer-->

        </div><!--content-->

    </footer>

</section><!--page-wrap-->


<div class="overlay">
    <div class="popup popup-subscribing">
        <span class="popup__close">
            <i class="icon icon-close"></i>
        </span>

        <p class="popup__title">We are now officially amigos</p>
        <p class="popup__desc">
            You were successfully subscribed to our newsletter. <br>
            <span>We promise being sweet and not to spam you</span>
        </p>

        <i class="icon icon-subscribing"></i>

    </div><!--popup-->

</div><!--overlay-->

<div class="menu-overlay"></div>

<section class="menu">
    <span class="menu__close">
        <i class="icon icon-close"></i>
    </span>


<?php if(get_field('go_to_touramigo_footer_title', option)) { ?>
    <a  target="_blank" href="<?php the_field('go_to_touramigo_url_footer', option); ?>" class="menu__main-link bd-block">
        <i class="border-top-right"></i>
        <i class="border-bottom-left"></i>
        <?php the_field('go_to_touramigo_footer_title', option); ?>
    </a>
<?php } ?>
<?php wp_nav_menu( array( 'theme_location' => 'primary','fallback_cb'=> '', 'items_wrap'      => '<ul class="menu-categories">%3$s</ul>', 'container'       => '',
 'walker' => new menuvert_walker()) ); ?>
   <?php wp_nav_menu( array( 'theme_location' => 'primary1','fallback_cb'=> '', 'items_wrap'      => '<ul class="menu-links">%3$s</ul>', 'container'       => '',
 'walker' => new menuvert2_walker()) ); ?>
  
</section><!--menu-->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.bxslider.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/script.js"></script>
<script type="text/javascript" src="//s3.amazonaws.com/downloads.mailchimp.com/js/signup-forms/popup/embed.js" data-dojo-config="usePlainJson: true, isDebug: false"></script><script type="text/javascript">require(["mojo/signup-forms/Loader"], function(L) { L.start({"baseUrl":"mc.us15.list-manage.com","uuid":"ec465085aa92acf1fa8221481","lid":"d890b24a6d"}) })</script>
<?php wp_footer(); ?>

<!-- GA Analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-59111622-2', 'auto');
  ga('send', 'pageview');
</script>

</body>
</html>
