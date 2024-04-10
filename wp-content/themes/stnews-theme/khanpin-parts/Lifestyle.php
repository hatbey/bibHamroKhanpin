<section class="block-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="block color-dark-blue">
                    <div class="sec-title">
                        <h2>Lifestyle</h2>
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
                    <?php $the_query = catagorydatabyid(51, 1); ?>
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
                            <?php listnewsst(51, 3, 1, ''); ?>
                        </ul><!-- List post end -->
                    </div><!-- List post block end -->
                </div><!-- Block end -->
            </div><!-- Insurance end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
</section>