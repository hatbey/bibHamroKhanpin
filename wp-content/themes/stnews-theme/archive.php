<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package stnews-theme
 */

get_header();
?>
<?php if ( have_posts() ) : ?>
<!--Page Title-->
<section class="news-title">
    <div class="auto-container">
        <div class="clearfix">
            <div class="text-center">
                <h2><?php the_archive_title();?></h2>
            </div>
            <!--
                    <div class="pull-right">
                        <ul class="news-title-breadcrumb">
                            <li><a href="#"><span class="fa fa-home"></span>Home</a></li>
                            <li>About</li>
                        </ul>
                    </div>
-->
        </div>
    </div>
</section>
<!--End Page Title-->

<div class="sidebar-page-container">
    <div class="auto-container">
        <div class="row clearfix">



            <!--News Block One-->
            <?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();?>
            <div class="news-block-one col-lg-4 col-md-4 col-sm-12">
                <div class="inner-box">
                    <div class="image">
                        <a href="<?php the_permalink();?>">
                            <?php the_post_thumbnail('article-thumb'); ?>
                        </a>
                    </div>
                    <div class="lower-box pb20">
                        <h3> <a href="<?php the_permalink();?>"><?php the_title();?></a></h3>



                    </div>
                </div>
            </div>
            <?php endwhile;?>
            <!--End News Block-->


        </div>
<?php wpbeginner_numeric_posts_nav(); ?>
        <!-- Styled Pagination -->
        <!--<div class="styled-pagination text-center">-->
        <!--    <ul class="clearfix">-->
        <!--        <li><a href="#" class="active">1</a></li>-->
        <!--        <li><a href="#">2</a></li>-->
        <!--        <li><a href="#">3</a></li>-->
        <!--        <li><a class="next" href="#"><span class="fa fa-angle-right"></span></a></li>-->
        <!--    </ul>-->
        <!--</div>-->

    </div>
</div>
<!--End Sidebar Page Container-->

<?php endif;?>

<?php
//get_sidebar();
get_footer();
