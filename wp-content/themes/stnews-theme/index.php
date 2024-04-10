<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Khanpin-theme
 */
get_header();
?>
<!-- Advertisement before menu -->
<div class="fullwidth-add text-center ">
    <div class="container">
        <div class="image">
            <?php
            $args = array(
                'post_type' => 'advertisement',
                'posts_per_page' => 1,
                'tax_query' => array(
                    'relation' => 'OR',
                    array(
                        'taxonomy' => 'add-category',
                        'field'    => 'slug',
                        'terms'    => array('full-ad-section-1'),
                    ),
                ),
            );
            $bm = new WP_Query($args);
            while ($bm->have_posts()) : $bm->the_post(); ?>
                <?php the_post_thumbnail('', array('class' => 'img-fluid')); ?>
            <?php endwhile; ?>
        </div>
    </div>
</div>
<!-- //Advertisement before menu -->
<!-- Head News -->
<section class="tophead-news">
    <div class="container">
        <div class="clearfix">
            <?php
            $args = array('posts_per_page' => 5, 'category' => 2);
            $myposts = get_posts($args);
            foreach ($myposts as $post) : setup_postdata($post); ?>
                <?php if (get_field('post_field')) :  ?>
                    <?php
                    if (get_field('post_field') == 'title') {; ?>
                        <!-- Title Only -->
                        <div class="content-side col-lg-12 col-md-12 col-sm-12  text-center">
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <div class="post-meta">
                                <span class="post-icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/artha_icon.png" class="img-fluid"></span>
                                <span class="post-author"><?php echo get_the_author(); ?></span>
                            </div>
                        </div>
                        <!-- //title -->
                    <?php } else if (get_field('post_field') == 'ti') {; ?>
                        <!-- Title with image -->
                        <div class="content-side col-lg-12 col-md-12 col-sm-12  text-center">
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <div class="post-meta">
                                <span class="post-icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/artha_icon.png" class="img-fluid"></span>
                                <span class="post-author"><?php echo get_the_author(); ?></span>
                            </div>
                            <div class="post-media post-featured-image">
                                <a href="<?php the_permalink(); ?>">
                                    <?php
                                    if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
                                        the_post_thumbnail('large', array('class' => 'img-fluid'));
                                    } ?>
                                </a>
                            </div>
                        </div>
                        <!-- //Title with image -->
                    <?php } else if (get_field('post_field') == 'tc') {; ?>
                        <!-- Title with image -->
                        <div class="content-side col-lg-12 col-md-12 col-sm-12  text-center">
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <div class="post-meta">
                                <span class="post-icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/artha_icon.png" class="img-fluid"></span>
                                <span class="post-author"><?php echo get_the_author(); ?></span>
                            </div>
                            <div class="text"><?php echo excerpt(50); ?></div>
                        </div>
                        <!-- //Title with image -->
                    <?php  } else if (get_field('post_field') == 'all') {; ?>
                        <!-- Title image and content -->
                        <div class="content-side col-lg-12 col-md-12 col-sm-12  text-center">
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <div class="post-meta">
                                <span class="post-icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/artha_icon.png" class="img-fluid"></span>
                                <span class="post-author"><?php echo get_the_author(); ?> </span>
                            </div>
                            <div class="post-media post-featured-image">
                                <a href="<?php the_permalink(); ?>">
                                    <?php
                                    if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
                                        the_post_thumbnail('', array('class' => 'img-fluid'));
                                    } ?>
                                </a>
                            </div>
                            <div class="text"><?php echo excerpt(50); ?></div>
                        </div>
                        <!-- //title image and content -->
                    <?php }; ?>
                <?php endif; ?>
            <?php endforeach;
            wp_reset_postdata(); ?>
        </div>
    </div>
</section> 
<!-- End Head News -->
<!-- Business Focus -->
<?php include('health.php'); ?>
<!-- //Business Focus -->
<!-- Banking -->
<?php include('khanpin-parts/trending-foods.php'); ?>

<!-- //Banking -->
<!-- Share Market -->

<!-- //Share Market -->
<!-- Artha khoj -->
<!-- //Artha Khoj -->
<!-- Arthawarta -->

<!-- //Arthawarta -->
<!-- Insurance - Udhyog -->

<!-- //Insurance - Udhyog -->
<!-- krishi -->

<!-- //krishi -->
<!-- Sports -->
<div class="sidebar-page-container light-blue-bg">
    <div class="container">
        <div class="row clearfix">
            <!--Content Side-->
            <div class="content-side col-lg-12 col-md-12 col-sm-12">
                <!--Sec Title-->
                <div class="sec-title">
                    <h2>पर्यटन</h2>
                </div>
                <?php $the_query = catagorydatabyid(53, 1); ?>
                <?php if ($the_query->have_posts()) : ?>
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                        <div class="content-blocks row">
                            <div class="news-block-four col-lg-6 col-md-6 col-sm-12 clearfix">
                                <div class="inner-box">
                                    <div class="image-column ">
                                        <div class="image business-focus">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php
                                                if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
                                                    the_post_thumbnail('large-img', array('class' => 'img-fluid'));
                                                }
                                                ?>
                                            </a>
                                        </div>
                                        <div class="gap-20"></div>
                                        <div class="content-inner">
                                            <h2 class="ltext"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></a></h2>
                                            <div class="text"><?php echo excerpt(70); ?> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <div class="news-block-four col-lg-6 col-md-6 col-sm-12">
                        <div class="row">
                            <?php sportscatagory(53, 4, 1, ''); ?>
                        </div>
                    </div>
                        </div>
            </div>
        </div>
    </div>
</div>
<!-- //Sports -->
<!-- Tourism-->
<section class="block-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="block color-dark-blue">
                    <div class="sec-title">
                        <h2>खेलकुद</h2>
                        <!--<div class="pull-right">-->
                        <!--    <a href="#" class="readall">सबै-->
                        <!--        <span class="dotline">-->
                        <!--            <span></span>-->
                        <!--            <span></span>-->
                        <!--            <span></span>-->
                        <!--        </span></a>-->
                        <!--</div>-->
                    </div>
                    <?php $the_query = catagorydatabyid(66, 1); ?>
                    <?php if ($the_query->have_posts()) : ?>
                        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                            <div class="post-overaly-style clearfix">
                                <div class="post-imgs-thumb title-large business-focus">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php
                                        if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
                                            the_post_thumbnail('article-thumb', array('class' => 'img-fluid'));
                                        }
                                        ?>
                                    </a>
                                </div>
                                <div class="post-content">
                                    <h2 class="post-title">
                                        <a href="<?php the_permalink(); ?>"><?php echo mb_strimwidth(get_the_title(), 0, 35, '...'); ?></a>
                                    </h2>
                                </div><!-- Post content end -->
                            </div><!-- Post Overaly Article end -->
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <div class="gap-20"></div>
                    <div class="list-post-block">
                        <div class="list-post ">
                            <?php listnews(66, 3, 1, ''); ?>
                        </div><!-- List post end -->
                    </div><!-- List post block end -->
                </div><!-- Block end -->
            </div><!-- Travel Col end -->
            <div class="col-md-4">
                <div class="block color-aqua">
                    <div class="sec-title">
                        <h2>अटाे</h2>
                        <!--<div class="pull-right">-->
                        <!--    <a href="#" class="readall">सबै-->
                        <!--        <span class="dotline">-->
                        <!--            <span></span>-->
                        <!--            <span></span>-->
                        <!--            <span></span>-->
                        <!--        </span></a>-->
                        <!--</div>-->
                    </div>
                    <?php $the_query = catagorydatabyid(43, 1); ?>
                    <?php if ($the_query->have_posts()) : ?>
                        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                            <div class="post-overaly-style clearfix">
                                <div class="post-imgs-thumb title-large business-focus">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php
                                        if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
                                            the_post_thumbnail('article-thumb', array('class' => 'img-fluid'));
                                        }
                                        ?>
                                    </a>
                                </div>
                                <div class="post-content">
                                    <h2 class="post-title">
                                        <a href="<?php the_permalink(); ?>"><?php echo mb_strimwidth(get_the_title(), 0, 35, '...'); ?></a>
                                    </h2>
                                </div><!-- Post content end -->
                            </div><!-- Post Overaly Article end -->
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <div class="gap-20"></div>
                    <div class="list-post-block">
                        <ul class="list-post">
                            <?php listnews(43, 3, 1, ''); ?>
                        </ul><!-- List post end -->
                    </div><!-- List post block end -->
                </div><!-- Block end -->
            </div><!-- Gadget Col end -->
            <div class="col-md-4">
                <div class="block color-violet">
                    <div class="sec-title">
                        <h2>पालिका</h2>
                        <!--<div class="pull-right">-->
                        <!--    <a href="#" class="readall">सबै-->
                        <!--        <span class="dotline">-->
                        <!--            <span></span>-->
                        <!--            <span></span>-->
                        <!--            <span></span>-->
                        <!--        </span></a>-->
                        <!--</div>-->
                    </div>
                    <?php $the_query = catagorydatabyid(49, 1); ?>
                    <?php if ($the_query->have_posts()) : ?>
                        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                            <div class="post-overaly-style clearfix">
                                <div class="post-imgs-thumb title-large business-focus">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php
                                        if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
                                            the_post_thumbnail('article-thumb', array('class' => 'img-fluid'));
                                        }
                                        ?>
                                    </a>
                                </div>
                                <div class="post-content">
                                    <h2 class="post-title">
                                        <a href="<?php the_permalink(); ?>"><?php echo mb_strimwidth(get_the_title(), 0, 35, '...'); ?></a>
                                    </h2>
                                </div><!-- Post content end -->
                            </div><!-- Post Overaly Article end -->
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <div class="gap-20"></div>
                    <div class="list-post-block">
                        <ul class="list-post">
                            <?php listnews(49, 3, 1, ''); ?>
                        </ul><!-- List post end -->
                    </div><!-- List post block end -->
                </div><!-- Block end -->
            </div><!-- Health Col end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
</section>
<!-- //Tourism -->
<?php
//get_sidebar();
get_footer();
