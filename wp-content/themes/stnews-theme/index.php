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
 * @package stnews-theme
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
<div class="sidebar-page-container">
    <div class="container">
        <div class="row clearfix">
            <!--Content Side-->
            <div class="content-side col-lg-9 col-md-12 col-sm-12">
                <!--Sec Title-->
                <div class="sec-title">
                    <h2>विजनेश फोकस</h2>
                    <!--<div class="pull-right">-->
                    <!--    <a href="#" class="readall">सबै-->
                    <!--        <span class="dotline">-->
                    <!--            <span></span>-->
                    <!--            <span></span>-->
                    <!--            <span></span>-->
                    <!--        </span></a>-->
                    <!--</div>-->
                </div>
                <div class="content-blocks">
                    <div class="row">
                        <?php $the_query = catagorydatabyid(46, 2); ?>
                        <?php if ($the_query->have_posts()) : ?>
                            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                                <div class="nbo-st col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="inner-box business-focus">
                                        <div class="image">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php
                                                if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
                                                    the_post_thumbnail('', array('class' => 'img-fluid'));
                                                }
                                                ?>
                                            </a>
                                        </div>
                                        <div class="content-inner pt20">
                                            <h2> <a href="<?php the_permalink(); ?>"><?php echo mb_strimwidth(get_the_title(), 0, 35, '...'); ?></a></h2>
                                            <div class="text"><?php echo excerpt(35); ?> </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                    <div class="row">
                        <?php listingnews(46, 3, 2, ''); ?>
                    </div>
                </div>
            </div>
            <div class="sidebar-side col-lg-3 col-md-12 col-sm-12">
                <aside class="sidebar default-sidebar">
                    <?php
                    $args = array(
                        'post_type' => 'advertisement',
                        'posts_per_page' => 5,
                        'tax_query' => array(
                            'relation' => 'OR',
                            array(
                                'taxonomy' => 'add-category',
                                'field'    => 'slug',
                                'terms'    => array('right-side-business-focus-ad'),
                            ),
                        ),
                    );
                    $bm = new WP_Query($args);
                    while ($bm->have_posts()) : $bm->the_post(); ?>
                        <div class="sidebar-widget">
                            <div class="widget-content">
                                <div class="image">
                                    <?php the_post_thumbnail('', array('class' => 'img-fluid')); ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </aside>
            </div>
        </div>
    </div>
</div>
<!-- //Business Focus -->
<!-- Banking -->
<div class="sidebar-page-container">
    <div class="container">
        <div class="row clearfix">
            <!--Content Side-->
            <div class="content-side col-lg-9 col-md-12 col-sm-12">
                <!--Sec Title-->
                <div class="sec-title">
                    <h2>बैंकिङ्र</h2>
                    <!--<div class="pull-right">-->
                    <!--    <a href="#" class="readall">सबै-->
                    <!--        <span class="dotline">-->
                    <!--            <span></span>-->
                    <!--            <span></span>-->
                    <!--            <span></span>-->
                    <!--        </span></a>-->
                    <!--</div>-->
                </div>
                <div class="content-blocks">
                    <?php $the_query = catagorydatabyid(37, 1); ?>
                    <?php if ($the_query->have_posts()) : ?>
                        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                            <div class="nbo-st">
                                <div class="inner-box">
                                    <div class="row clearfix">
                                        <div class="image-column col-lg-7 col-md-7 col-sm-12">
                                            <div class="image">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php
                                                    if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
                                                        the_post_thumbnail('large-img', array('class' => 'img-fluid'));
                                                    }
                                                    ?>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="content-box col-lg-5 col-md-5 col-sm-12">
                                            <div class="content-inner">
                                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                <div class="text"><?php echo excerpt(40); ?> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <div class="row">
                        <?php listcatagory(37, 8, 1, ''); ?>
                    </div>
                </div>
            </div>
            <div class="sidebar-side col-lg-3 col-md-12 col-sm-12">
                <aside class="sidebar default-sidebar">
                    <div class="widget color-default">
                        <div class="sec-title">
                            <h2>धेरै पढिएको</h2>
                            <!--<div class="pull-right">-->
                            <!--    <a href="#" class="readall">सबै-->
                            <!--        <span class="dotline">-->
                            <!--            <span></span>-->
                            <!--            <span></span>-->
                            <!--            <span></span>-->
                            <!--        </span></a>-->
                            <!--</div>-->
                        </div>
                        <div class="list-post-block">
                            <?php get_sidebar(); ?>
                        </div><!-- List post block end -->
                    </div><!-- Sidebar right end -->
                </aside>
            </div>
        </div>
    </div>
</div>
<!-- //Banking -->
<!-- Share Market -->
<section class="block-wrapper ">
    <div class="container">
        <div class="block color-red">
            <div class="sec-title">
                <h2>शेयर बजार</h2>
                <!--<div class="pull-right">-->
                <!--    <a href="#" class="readall">सबै-->
                <!--        <span class="dotline">-->
                <!--            <span></span>-->
                <!--            <span></span>-->
                <!--            <span></span>-->
                <!--        </span></a>-->
                <!--</div>-->
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <?php $the_query = catagorydatabyid(42, 1); ?>
                    <?php if ($the_query->have_posts()) : ?>
                        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                            <div class="post-block-style clearfix">
                                <div class="post-imgs-thumb">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php
                                        if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
                                            the_post_thumbnail('', array('class' => 'img-fluid'));
                                        }
                                        ?>
                                    </a>
                                </div>
                                <div class="post-content">
                                    <h2 class="post-title title-extra-large">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h2>
                                    <p><?php //echo excerpt(50);
                                        ?></p>
                                </div><!-- Post content end -->
                            </div><!-- Post Block style end -->
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div><!-- Col end -->
                <div class="col-md-4 col-sm-4">
                    <div class="list-post-block m-top-0">
                        <ul class="list-post">
                            <?php listnews(42, 2, 1, ''); ?>
                        </ul><!-- List post end -->
                    </div><!-- List post block end -->
                </div><!-- List post Col end -->
                <div class="col-md-4 col-sm-4">
                    <div class="list-post-block m-top-0">
                        <ul class="list-post">
                            <?php listnews(42, 2, 4, ''); ?>
                        </ul><!-- List post end -->
                    </div><!-- List post block end -->
                </div><!-- List post Col end -->
            </div>
        </div>
    </div>
</section>
<!-- //Share Market -->
<!-- Artha khoj -->
<section class="block-wrapper bg-light-grey">
    <div class="container">
        <div class="block  ">
            <div class="sec-title">
                <h2>अर्थ खोज</h2>
                <!--<div class="pull-right">-->
                <!--    <a href="#" class="readall">सबै-->
                <!--        <span class="dotline">-->
                <!--            <span></span>-->
                <!--            <span></span>-->
                <!--            <span></span>-->
                <!--        </span></a>-->
                <!--</div>-->
            </div>
            <div class="row">
                <?php $args = array('posts_per_page' => 4, 'category' => array(51));
                $myposts = get_posts($args);
                foreach ($myposts as $post) : setup_postdata($post); ?>
                    <div class="col-md-3 col-sm-6 mrb-30 clearfix">
                        <div class="post-block-style h250  effect2 clearfix">
                            <div class="post-charcha-thumb">
                                <?php
                                if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
                                    the_post_thumbnail('', array('class' => 'img-fluid'));
                                } ?>
                            </div><!-- Post thumb end -->
                            <div class="post-content">
                                <h2 class="post-title title-large ">
                                    <a href="<?php the_permalink(); ?>"><?php echo mb_strimwidth(get_the_title(), 0, 30, '...'); ?></a>
                                </h2>
                                <div class="post-meta">
                                    <span class="post-date"><?php // echo get_the_date();
                                                            ?></span>
                                </div>
                            </div><!-- Post content end -->
                        </div>
                    </div><!-- Col 1 end -->
                <?php endforeach;
                wp_reset_postdata(); ?>
            </div><!-- Row end -->
        </div>
        <!--<hr class="class-1 clearfix">-->
        <div class="row">
            <?php //listnewslist(51,8,4,'');
            ?>
        </div>
    </div>
</section>
<!-- //Artha Khoj -->
<!-- Arthawarta -->
<div class="sidebar-page-container">
    <div class="container">
        <!--Content Side-->
        <div class="content-side ">
            <!--Sec Title-->
            <div class="sec-title">
                <h2>अर्थवार्ता </h2>
                <!--<div class="pull-right">-->
                <!--    <a href="#" class="readall">सबै-->
                <!--        <span class="dotline">-->
                <!--            <span></span>-->
                <!--            <span></span>-->
                <!--            <span></span>-->
                <!--        </span></a>-->
                <!--</div>-->
            </div>
            <div class="content-blocks">
                <div class="row clearfix">
                    <?php $the_query = catagorydatabyid(13, 1); ?>
                    <?php if ($the_query->have_posts()) : ?>
                        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                            <div class="image-column col-lg-7 col-md-7 col-sm-12 ">
                                <div class="nbo-st">
                                    <div class="inner-box">
                                        <div class="image">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php
                                                if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
                                                    the_post_thumbnail('large-img', array('class' => 'img-fluid'));
                                                }
                                                ?>
                                            </a>
                                        </div>
                                        <div class="content-inner pt20">
                                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <div class="content-box col-lg-5 col-md-5 col-sm-12 ">
                        <?php listnews(13, 3, 1, ''); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //Arthawarta -->
<!-- Insurance - Udhyog -->
<section class="block-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="block color-dark-blue">
                    <div class="sec-title">
                        <h2>बिमा</h2>
                        <!--<div class="pull-right">-->
                        <!--    <a href="#" class="readall">सबै-->
                        <!--        <span class="dotline">-->
                        <!--            <span></span>-->
                        <!--            <span></span>-->
                        <!--            <span></span>-->
                        <!--        </span></a>-->
                        <!--</div>-->
                    </div>
                    <?php $the_query = catagorydatabyid(44, 1); ?>
                    <?php if ($the_query->have_posts()) : ?>
                        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                            <div class="post-overaly-style clearfix">
                                <div class="post-imgs-thumb title-large">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php
                                        if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
                                            the_post_thumbnail('large-img', array('class' => 'img-fluid'));
                                        }
                                        ?>
                                    </a>
                                </div>
                                <div class="post-content">
                                    <h2 class="post-title">
                                        <a href="<?php the_permalink(); ?>"><?php echo mb_strimwidth(get_the_title(), 0, 50, '...'); ?></a>
                                    </h2>
                                    <div class="text"><?php echo excerpt(35); ?> </div>
                                </div><!-- Post content end -->
                                <br>
                            </div><!-- Post Overaly Article end -->
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <div class="gap-20"></div>
                    <div class="list-post-block">
                        <ul class="list-post">
                            <?php listnewsst(44, 3, 1, ''); ?>
                        </ul><!-- List post end -->
                    </div><!-- List post block end -->
                </div><!-- Block end -->
            </div><!-- Insurance end -->
            <div class="col-md-6">
                <div class="block color-dark-blue">
                    <div class="sec-title">
                        <h2>उधोग</h2>
                        <!--<div class="pull-right">-->
                        <!--    <a href="#" class="readall">सबै-->
                        <!--        <span class="dotline">-->
                        <!--            <span></span>-->
                        <!--            <span></span>-->
                        <!--            <span></span>-->
                        <!--        </span></a>-->
                        <!--</div>-->
                    </div>
                    <?php $the_query = catagorydatabyid(45, 1); ?>
                    <?php if ($the_query->have_posts()) : ?>
                        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                            <div class="post-overaly-style clearfix">
                                <div class="post-imgs-thumb title-large">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php
                                        if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
                                            the_post_thumbnail('large-img', array('class' => 'img-fluid'));
                                        }
                                        ?>
                                    </a>
                                </div>
                                <div class="post-content">
                                    <h2 class="post-title">
                                        <a href="<?php the_permalink(); ?>"><?php echo mb_strimwidth(get_the_title(), 0, 50, '...'); ?></a>
                                    </h2>
                                    <div class="text"><?php echo excerpt(35); ?> </div>
                                </div><!-- Post content end -->
                                <br>
                            </div><!-- Post Overaly Article end -->
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <div class="gap-20"></div>
                    <div class="list-post-block">
                        <ul class="list-post">
                            <?php listnewsst(45, 3, 1, ''); ?>
                        </ul><!-- List post end -->
                    </div><!-- List post block end -->
                </div><!-- Block end -->
            </div><!-- Insurance end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
</section>
<!-- //Insurance - Udhyog -->
<!-- krishi -->
<section class="block-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="block color-dark-blue">
                    <div class="sec-title">
                        <h2>समाज</h2>
                        <!--<div class="pull-right">-->
                        <!--    <a href="#" class="readall">सबै-->
                        <!--        <span class="dotline">-->
                        <!--            <span></span>-->
                        <!--            <span></span>-->
                        <!--            <span></span>-->
                        <!--        </span></a>-->
                        <!--</div>-->
                    </div>
                    <?php $the_query = catagorydatabyid(39, 1); ?>
                    <?php if ($the_query->have_posts()) : ?>
                        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                            <div class="post-overaly-style clearfix">
                                <div class="post-imgs-thumb title-large business-focus">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php
                                        if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
                                            the_post_thumbnail('', array('class' => 'img-fluid'));
                                        }
                                        ?>
                                    </a>
                                </div>
                                <div class="post-content">
                                    <h2 class="post-title">
                                        <a href="<?php the_permalink(); ?>"><?php echo mb_strimwidth(get_the_title(), 0, 25, '...'); ?></a>
                                    </h2>
                                </div><!-- Post content end -->
                            </div><!-- Post Overaly Article end -->
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <div class="gap-20"></div>
                    <div class="list-post-block">
                        <div class="list-post ">
                            <?php listnews(39, 3, 1, ''); ?>
                        </div><!-- List post end -->
                    </div><!-- List post block end -->
                </div><!-- Block end -->
            </div><!-- Samaj Col end -->
            <div class="col-md-4">
                <div class="block color-aqua">
                    <div class="sec-title">
                        <h2>कृषि</h2>
                        <!--<div class="pull-right">-->
                        <!--    <a href="#" class="readall">सबै-->
                        <!--        <span class="dotline">-->
                        <!--            <span></span>-->
                        <!--            <span></span>-->
                        <!--            <span></span>-->
                        <!--        </span></a>-->
                        <!--</div>-->
                    </div>
                    <?php $the_query = catagorydatabyid(54, 1); ?>
                    <?php if ($the_query->have_posts()) : ?>
                        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                            <div class="post-overaly-style clearfix">
                                <div class="post-imgs-thumb title-large business-focus">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php
                                        if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
                                            the_post_thumbnail('', array('class' => 'img-fluid'));
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
                            <?php listnews(54, 3, 1, ''); ?>
                        </ul><!-- List post end -->
                    </div><!-- List post block end -->
                </div><!-- Block end -->
            </div><!-- Krishi Col end -->
            <div class="col-md-4">
                <div class="block color-violet">
                    <div class="sec-title">
                        <h2>बिबिध</h2>
                        <!--<div class="pull-right">-->
                        <!--    <a href="#" class="readall">सबै-->
                        <!--        <span class="dotline">-->
                        <!--            <span></span>-->
                        <!--            <span></span>-->
                        <!--            <span></span>-->
                        <!--        </span></a>-->
                        <!--</div>-->
                    </div>
                    <?php $the_query = catagorydatabyid(47, 1); ?>
                    <?php if ($the_query->have_posts()) : ?>
                        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                            <div class="post-overaly-style clearfix">
                                <div class="post-imgs-thumb title-large business-focus">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php
                                        if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
                                            the_post_thumbnail('', array('class' => 'img-fluid'));
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
                            <?php listnews(47, 3, 1, ''); ?>
                        </ul><!-- List post end -->
                    </div><!-- List post block end -->
                </div><!-- Block end -->
            </div><!-- Bibidh Col end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
</section>
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
