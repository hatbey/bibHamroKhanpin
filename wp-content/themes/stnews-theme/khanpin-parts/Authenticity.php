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
                    <?php $the_query = catagorydatabyid(48, 1); ?>
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
                        <?php listnews(48, 3, 1, ''); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>