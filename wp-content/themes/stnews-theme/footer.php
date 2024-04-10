<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package stnews-theme
 */

?>
<!--Main Footer-->

<footer id="footer" class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
            <div class="col-md-3 col-lg-3">
                <div class="logo">
                    <?php if ( get_theme_mod( 'logo' ) ) : ?>

                    <a class="logo" href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
                        <img src='<?php echo esc_url( get_theme_mod( 'logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>

                    <?php else : ?>
                    <hgroup>
                        <h1 class='site-title'><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php bloginfo( 'name' ); ?></a></h1>
                        <h2 class='site-description'><?php bloginfo( 'description' ); ?></h2>
                    </hgroup>
                    <?php endif; ?>
                </div>
            </div>
            <?php
                        $args = array(
                        'post_type' => 'address',
//                        'posts_per_page' => 2,
//                            'order' => 'ASC',
                            
                        );
                        $ad = new WP_Query($args);
                        while($ad->have_posts()): $ad->the_post();
                        ?>
            <div class="col-md-9 col-lg-9">
                <ul class="social-icon-one text-center">
                   

                        <?php

              // check if the repeater field has rows of data
              if( have_rows('social_media') ):

              // loop through the rows of data
              while ( have_rows('social_media') ) : the_row();?>
               <li class="<?php the_sub_field('social_icon');?>">
                        <a href="<?php the_sub_field('social_url');?>" target="_blank">
                            <span class="social-icon">
                                <i class="fa fa-<?php the_sub_field('social_icon');?> link-icon" aria-hidden="true"></i>
                                </span>

                        </a>
</li>
                        <?php  endwhile;

              else :

              // no rows found

              endif;

              ?>


                   
                </ul>
            </div>
            <?php endwhile;?>
            </div>
        </div>
    </div>

    <div class="footer-main">
        <div class="container">
            <div class="row">
                <?php
                        $args = array(
                        'post_type' => 'address',
//                        'posts_per_page' => 2,
//                            'order' => 'ASC',
                            
                        );
                        $address = new WP_Query($args);
                        while($address->have_posts()): $address->the_post();
                        ?>
                <div class="col-md-3 col-sm-12 footer-widget">
                    <div class="footer-contact-title">
                        <h3><?php echo get_field('organization_name');?></h3>
                        
                    </div>
                    <div class="footer-contact-address">
                        <h3><?php echo get_field('organization_name_en');?></h3>
                        <?php echo get_field('address');?><br>
                        Phone No. :- <?php echo get_field('phone_no');?> <br>
                        Email:- <?php echo get_field('email');?><br>
                        सूचना विभाग दर्ता नं.: 
                        <?php echo get_field('registered_number');?>

                    </div>
                    <div class="footer-adver">
                        <h3>विज्ञापनका लागि सम्पर्क</h3>
                        <span class="txt"><?php echo get_field('adv_phone_no');?></span>
                        <span><?php echo get_field('adv_email');?></span>
                    </div>

                </div><!-- Col end -->
                <?php endwhile;?>
                <div class="col-md-3 col-sm-12 footer-widget footer ">
                    <h3 class="widget-title">अर्थसंजाल टीम</h3>
                    <?php
                        $args = array(
                        'post_type' => 'team-member',
//                        'posts_per_page' => 2,
//                            'order' => 'ASC',
                            
                        );
                        $apteam = new WP_Query($args);
                        while($apteam->have_posts()): $apteam->the_post();
                        ?>
                    <div class="txtbox">
                        <h4><?php echo get_field('post');?></h4>
                        <span class="txt1"><?php the_title();?></span>
                    </div>
                    <?php endwhile;?>


                </div>

                <div class="col-md-3 col-sm-12 footer-widget widget-categories">
                    <h3 class="widget-title">वेबसाइट नेभिगेशन</h3>

                                <?php

                                $defaults = array(
                                    'theme_location'  => 'footer-left',
                                    'menu'            => '',
                                    'container'       => '',
                                    'container_class' => '',
                                    'container_id'    => '',
                                    'menu_class'      => '',
                                    'menu_id'         => '',
                                    'echo'            => true,
                                    'fallback_cb'     => 'wp_page_menu',

                                    'items_wrap'      => '<ul id="%1$s" class="leftcol">%3$s</ul>',
                                    'depth'           => 0,
                                    'walker'          => new wp_bootstrap_navwalker()

                                );

                                wp_nav_menu( $defaults );

                              ?>
                              

                    <?php

                                $defaults = array(
                                    'theme_location'  => 'footer-mid',
                                    'menu'            => '',
                                    'container'       => '',
                                    'container_class' => '',
                                    'container_id'    => '',
                                    'menu_class'      => '',
                                    'menu_id'         => '',
                                    'echo'            => true,
                                    'fallback_cb'     => 'wp_page_menu',

                                    'items_wrap'      => '<ul id="%1$s" class="rightcol">%3$s</ul>',
                                    'depth'           => 0,
                                    'walker'          => new wp_bootstrap_navwalker()

                                );

                                wp_nav_menu( $defaults );

                              ?>
                              </div>
                              
<div class="col-md-3 col-sm-12 footer-widget widget-categories">
                    <h3 class="widget-title">नेभिगेशन</h3>
                    <?php

                                $defaults = array(
                                    'theme_location'  => 'footer-right',
                                    'menu'            => '',
                                    'container'       => '',
                                    'container_class' => '',
                                    'container_id'    => '',
                                    'menu_class'      => '',
                                    'menu_id'         => '',
                                    'echo'            => true,
                                    'fallback_cb'     => 'wp_page_menu',

                                    'items_wrap'      => '<ul id="%1$s" class="rightcol">%3$s</ul>',
                                    'depth'           => 0,
                                    'walker'          => new wp_bootstrap_navwalker()

                                );

                                wp_nav_menu( $defaults );

                              ?>


                </div><!-- Col end -->



            </div><!-- Row end -->
        </div><!-- Container end -->
    </div><!-- Footer main end -->


    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <div class="copyright-info">
                        <span>Copyright © 2021 Artha Sanjal. All Rights Reserved. Developed By Bhibhuti Solution</span>
                    </div>
                </div>

                <!--
                        <div class="col-xs-12 col-sm-6">
                            <div class="footer-menu">
                                <ul class="nav unstyled">
                                    <li><a href="#">Site Terms</a></li>
                                    <li><a href="#">Privacy</a></li>
                                    <li><a href="#">Advertisement</a></li>
                                    <li><a href="#">Cookies Policy</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
-->
            </div><!-- Row end -->

            

        </div><!-- Container end -->
         
    </div>
  
</footer>
<div class="scroll-to-top scroll-to-target" data-target="html" style="display: block;"><span class="icon fa fa-angle-double-up"></span></div>
<!--End Main Footer-->

</div>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/popper.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/owl.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/plyr.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/isotope.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/appear.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/wow.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.fancybox.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/script.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/color-settings.js"></script>

<script>
   function sticky_relocate() {
  var window_top = $(window).scrollTop();
  var div_top = $('#sticky-anchor').offset().top;
  if (window_top > div_top) {
    $('#sticky').addClass('stick');
  } else {
    $('#sticky').removeClass('stick');
  }
}

$(function() {
  $(window).scroll(sticky_relocate);
  sticky_relocate();
});
</script>
<?php wp_footer(); ?>

</body>

</html>
