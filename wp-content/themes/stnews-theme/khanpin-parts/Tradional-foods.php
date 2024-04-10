<section class="block-wrapper ">
    <div class="container">
        <div class="block color-red">
            <div class="sec-title">
                <h2>Tradional Foods</h2>
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
                    <?php $the_query = catagorydatabyid(85, 1); ?>
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
                            <?php listnews(85, 2, 1, ''); ?>
                        </ul><!-- List post end -->
                    </div><!-- List post block end -->
                </div><!-- List post Col end -->
                <div class="col-md-4 col-sm-4">
                    <div class="list-post-block m-top-0">
                        <ul class="list-post">
                            <?php listnews(85, 2, 4, ''); ?>
                        </ul><!-- List post end -->
                    </div><!-- List post block end -->
                </div><!-- List post Col end -->
            </div>
        </div>
    </div>
</section>