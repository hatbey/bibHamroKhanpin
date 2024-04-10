<div class="sidebar-page-container">
    <div class="container">
        <div class="row clearfix">
            <!--Content Side-->
            <div class="content-side col-lg-9 col-md-12 col-sm-12">
                <!--Sec Title-->
                <div class="sec-title">
                    <h2>Trending Foods</h2>
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
                    <?php $the_query = catagorydatabyid(54, 1); ?>
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
                        <?php listcatagory(54, 8, 1, ''); ?>
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