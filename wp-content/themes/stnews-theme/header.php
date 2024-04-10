<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Hamro-Khanpin
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">


    <?php wp_head(); ?>



    <link id="theme-color-file" href="<?php echo get_template_directory_uri(); ?>/assets/css/color-themes/blue-theme.css" rel="stylesheet">
     <link id="theme-color-file" href="<?php echo get_template_directory_uri(); ?>/assets/css/responsive.css" rel="stylesheet">
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=61d40ffd8b2e610019370c8d&product=inline-share-buttons' async='async'></script>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
<!-- Full Ad Section -->
<section class="block-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?php 
                            $args = array(
                            'post_type' => 'advertisement',
                            'posts_per_page' => 1,
                            'tax_query' => array(
                            'relation' => 'OR',
                            array(
                            'taxonomy' => 'add-category',
                            'field'    => 'slug',
                            'terms'    => array( 'top-header-ad-section' ),
                            ),
                            ),
                            );
                            $bm = new WP_Query( $args );
                            while($bm->have_posts()): $bm->the_post();?>
                <?php  the_post_thumbnail('', array('class' => 'img-fluid') );?>
                <?php endwhile;?>

            </div>
        </div>
    </div>
</section>

    <!-- Main Header  -->
    <header class="main-header header-style-three">
        <!--Header Top-->

        <!--Header-Upper-->
        <div class="header-upper">
            <div class="container">
                <div class="clearfix">

                    <div class="pull-left logo-outer">
                        <div class="logo">
                            <?php if ( get_theme_mod( 'logo' ) ) : ?>
                            <a class="logo" href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
                                <img class="sp-default-logo" src='<?php echo esc_url( get_theme_mod( 'logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>

                            <?php else : ?>
                            <hgroup>
                                <h1 class='site-title'><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php bloginfo( 'name' ); ?></a></h1>
                                <h2 class='site-description'><?php bloginfo( 'description' ); ?></h2>
                            </hgroup>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="pull-right upper-right clearfix">
                        <div class="add-image">
                            <?php 
                            $args = array(
                            'post_type' => 'advertisement',
                            'posts_per_page' => 1,
                            'tax_query' => array(
                            'relation' => 'OR',
                            array(
                            'taxonomy' => 'add-category',
                            'field'    => 'slug',
                            'terms'    => array( 'header-ad-section' ),
                            ),
                            ),
                            );
                            $bm = new WP_Query( $args );
                            while($bm->have_posts()): $bm->the_post();?>
							
                            <?php the_post_thumbnail('', array('class' => 'img-fluid') );?>
                            <?php endwhile;?>
                        </div>
                    </div>
                    

                </div>
            </div>
        </div>
        <!--End Header Upper-->

        <!--Header Lower-->
        <div class="header-lower">
            <div class="container">
                <div class="nav-outer clearfix">
                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-md">
                        <div class="navbar-header">
                            <!-- Toggle Button -->
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>



                        <?php
                               $defaults = array(
                                   'theme_location'  => 'primary',
                                   
                                   'container'       => 'div',
                                   'container_class' => 'navbar-collapse collapse clearfix',
                                   'container_id'    => 'navbarSupportedContent',
                                   'menu'            => '',
                                   'menu_class'      => 'navigation clearfix',
                                   'menu_id'         => '',
                                   'echo'            => true,
                                   'fallback_cb'     => 'wp_page_menu',

                                   'items_wrap'      => '<ul id="%1$s" class="%2$s ">%3$s</ul>',
                                   'depth'           => 3,
                                   'walker'          => new WP_Bootstrap_Navwalker()

                               );

                               wp_nav_menu( $defaults );

                             ?>
                       

                    </nav>

                    <!-- Hidden Nav Toggler -->
                    <div class="nav-toggler">
                        <button class="hidden-bar-opener"><span class="icon qb-menu1"></span></button>
                    </div>

                </div>
            </div>
        </div>
        <!--End Header Lower-->

        <!--Sticky Header-->
        <div class="sticky-header">
            <div class="container clearfix">
                <!--Logo-->
                <div class="logo pull-left">
                    <?php if ( get_theme_mod( 'logo' ) ) : ?>
                    <a class="logo" href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
                        <img class="sp-default-logo" src='<?php echo esc_url( get_theme_mod( 'logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>

                    <?php else : ?>
                    <hgroup>
                        <h1 class='site-title'><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php bloginfo( 'name' ); ?></a></h1>
                        <h2 class='site-description'><?php bloginfo( 'description' ); ?></h2>
                    </hgroup>
                    <?php endif; ?>
                </div>

                <!--Right Col-->
                <div class="right-col pull-left">
                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-md">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <?php
                               $defaults = array(
                                   'theme_location'  => 'primary',
                                   
                                   'container'       => 'div',
                                   'container_class' => 'navbar-collapse collapse clearfix',
                                   'container_id'    => 'navbarSupportedContent',
                                   'menu'            => '',
                                   'menu_class'      => 'navigation clearfix',
                                   'menu_id'         => '',
                                   'echo'            => true,
                                   'fallback_cb'     => 'wp_page_menu',

                                   'items_wrap'      => '<ul id="%1$s" class="%2$s ">%3$s</ul>',
                                   'depth'           => 3,
                                   'walker'          => new WP_Bootstrap_Navwalker()

                               );

                               wp_nav_menu( $defaults );

                             ?>


                    </nav><!-- Main Menu End-->
                </div>

            </div>
        </div>
        <!--End Sticky Header-->

    </header>
    <!--End Header  -->
    <!-- Main Header -->

    <!-- Hidden Navigation Bar -->
    <section class="hidden-bar left-align">

        <div class="hidden-bar-closer">
            <button><span class="qb-close-button"></span></button>
        </div>

        <!-- Hidden Bar Wrapper -->
        <div class="hidden-bar-wrapper">
            <div class="logo">
                <?php if ( get_theme_mod( 'logo' ) ) : ?>
                    <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
                        <img class="sp-default-logo" src='<?php echo esc_url( get_theme_mod( 'logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>

                    <?php else : ?>
                    <hgroup>
                        <h1 class='site-title'><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php bloginfo( 'name' ); ?></a></h1>
                        <h2 class='site-description'><?php bloginfo( 'description' ); ?></h2>
                    </hgroup>
                    <?php endif; ?>
            </div>
            <!-- .Side-menu -->
            
                <?php
                               $defaults = array(
                                   'theme_location'  => 'primary',
                                   
                                   'container'       => 'div',
                                   'container_class' => 'side-menu',
                                   'container_id'    => '',
                                   'menu'            => '',
                                   'menu_class'      => 'navigation clearfix',
                                   'menu_id'         => '',
                                   'echo'            => true,
                                   'fallback_cb'     => 'wp_page_menu',

                                   'items_wrap'      => '<ul id="%1$s" class="%2$s ">%3$s</ul>',
                                   'depth'           => 3,
                                   'walker'          => new WP_Bootstrap_Navwalker()

                               );

                               wp_nav_menu( $defaults );

                             ?>
                
            <!-- /.Side-menu -->

            <!--Options Box-->
            <div class="options-box">
                <!--Social Links-->
                <ul class="social-links clearfix">
                    <li><a href="#"><span class="fa fa-facebook-f"></span></a></li>
                    <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                    <li><a href="#"><span class="fa fa-instagram"></span></a></li>
                    <li><a href="#"><span class="fa fa-pinterest"></span></a></li>
                </ul>

            </div>

        </div><!-- / Hidden Bar Wrapper -->

    </section>
    <!-- End / Hidden Bar -->
