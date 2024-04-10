<div class="sidebar-page-container">
    <div class="container">
        <div class="row clearfix">
            <!--Content Side-->
            <div class="content-side col-lg-9 col-md-12 col-sm-12">
                <!--Sec Title-->
                <div class="sec-title">
                    <h2>Health</h2>
                </div>
                <div class="content-blocks">
                    <div class="row">
                        <?php $the_query = catagorydatabyid(43, 2); ?>
                        <?php if ($the_query->have_posts()) : ?>
                            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                                <div class="nbo-st col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="inner-box business-focus">
                                        <div class="image">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php
                                                if (has_post_thumbnail()) {
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
                        <?php listingnews(43, 3, 2, ''); ?>
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