<section class="block-wrapper bg-light-grey">
    <div class="container">
        <div class="block  ">
            <div class="sec-title">
                <h2>Seasonal Foods</h2>
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
                <?php $args = array('posts_per_page' => 4, 'category' => array(13));
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