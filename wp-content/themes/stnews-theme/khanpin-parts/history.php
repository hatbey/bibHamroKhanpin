<section class="block-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="block color-dark-blue">
                    <div class="sec-title">
                        <h2>History</h2>
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
                    <?php $the_query = catagorydatabyid(45, 1); ?>
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
                            <?php listnews(45, 3, 1, ''); ?>
                        </ul><!-- List post end -->
                    </div><!-- List post block end -->
                </div><!-- Block end -->
            </div><!-- Bibidh Col end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
</section>