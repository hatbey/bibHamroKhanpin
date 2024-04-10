<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package stnews-theme
 */

?>



<!--Page Title-->
<!--<section class="news-title">-->
<!--    <div class="full-container">-->
<!--        <div class="clearfix">-->
<!--            <div class="text-center">-->
<!--                <h3>|| <?php // $cat = get_the_category(); echo $cat[0]->cat_name; ?> ||</h3>-->
<!--                <h2 class="pt20"><?php //the_title();?></h2>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!--End Page Title-->
<!--Sidebar Page Container-->
<div class="sidebar-page-container">
    <div class="full-container">

        <div class="row clearfix pt20">

            <div class="content-side col-lg-9 col-md-9 col-sm-8 ">
                <div id="sticky-anchor"></div>
                <div class="news-title" id="sticky">
                
                <h3><?php //$cat = get_the_category(); echo $cat[0]->cat_name; ?></h3>
                <h2 class="pt20"><?php the_title();?></h2>
                
            </div>
                
                <div class="content">
                    <div class="news-single">
                        <div class="inner-box">
                            <div class="upper-box">
                                <ul class="post-meta">
                                    <li><span class="icon qb-user2"></span><?php the_author();?></li>
                                    <li><span class="icon fa fa-clock-o"></span> <?php echo get_the_date();?></li>
                                    <li style="float:right"><div class="sharethis-inline-share-buttons"></div></li>
                                </ul>
                            </div>
                            <div class="image news-details">
                                <?php the_post_thumbnail('', array('class'=>'img-fluid'));?>

                            </div>
                            <br>
                            <div class="text ">
                                <?php the_content();?>
                                <h5>
                                    मिती : 
                                   <?php echo get_the_date("F j, Y g:i a");?>
                                   बजे प्रकाशित 
                                </h5>
                            </div>
                            <!--post-share-options-->



                        </div>
                        <!-- Author Section -->
                        <div class="author-box">
                                <div class="author-comment">
                                    <div class="inner-box">
                                        <div class="image">
                                            <?php
    // Retrieve The Post's Author ID
    $user_id = get_the_author_meta('ID');
    // Set the image size. Accepts all registered images sizes and array(int, int)
    $size = '';

    // Get the image URL using the author ID and image size params
    $imgURL = get_cupp_meta($user_id, $size);

    // Print the image on the page
    echo '<img src="'. $imgURL .'" alt="">';
?>
                                            <!--<img src="images/resource/author-1.jpg" alt="">-->
                                        </div>
                                        <h4><?php echo get_the_author(); ?></h4>
                                        <!--<div class="text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit doli. Aenean commodo ligula eget dolor. Aenean massa. Cumtipsu sociis natoque penatibus et magnis dis parturient montesti, nascetur ridiculus mus. Donec quam penatibus et magnis .</div>-->
                                        <!--<ul class="social-icon-two">-->
                                        <!--    <li><a href="#"><span class="fa fa-facebook-square"></span></a></li>-->
                                        <!--    <li><a href="#"><span class="fa fa-twitter"></span></a></li>-->
                                        <!--    <li><a href="#"><span class="fa fa-google-plus"></span></a></li>-->
                                        <!--    <li><a href="#"><span class="fa fa-linkedin-square"></span></a></li>-->
                                        <!--    <li><a href="#"><span class="fa fa-pinterest-p"></span></a></li>-->
                                        <!--</ul>-->
                                    </div>
                                </div>
                        </div>
                        <!-- //Author Section -->
                         <div class="related-posts">
            <div class="sec-title">
                <h2>सम्बन्धित खवर</h2>
            </div>

            <div class="row clearfix">
                <?php
                    echo do_shortcode( '[prefix_related_posts_for_single]' );?>
                <!--News Block Two-->
                

            </div>
        </div>
                    </div>
                </div>
            </div>

            <div class="sidebar-side col-lg-3 col-md-3 col-sm-4 ">
                <aside class="sidebar default-sidebar right-sidebar">
                    <?php 
                            $args = array(
                            'post_type' => 'advertisement',
                            'posts_per_page' => 6,
                            'tax_query' => array(
                            'relation' => 'OR',
                            array(
                            'taxonomy' => 'add-category',
                            'field'    => 'slug',
                            'terms'    => array( 'inner-rightsidebar-top-ad' ),
                            ),
                            ),
                            );
                            $bm = new WP_Query( $args );
                            while($bm->have_posts()): $bm->the_post();?>
                            <div class="sidebar-widget">
                            <div class="widget-content">
                            <div class="image">
                                <?php  the_post_thumbnail('', array('class' => 'img-fluid') );?>
                            </div>
                            </div>
                            </div>
                                    
                        <?php endwhile;?>
                    <div class="sidebar-title">
                                <h2>ताजा समाचार</h2>
                            </div>
       <ol class="devanagariList">
       <?php
       $the_query = new WP_Query( 'posts_per_page=7' ); ?>
            <?php 
            // Start our WP Query
            while ($the_query -> have_posts()) : $the_query -> the_post(); 
            // Display the Post Title with Hyperlink
            ?>
          
            <li><a href="<?php the_permalink();?>"><?php the_title(); ?></a></li>
           <?php 
            // Repeat the process and reset once it hits the limit
            endwhile; ?>
        </ol> 
<!--<article class="widget-post">-->
                                <!--<figure class="post-thumb">-->
                                <!--    <a href="<?php //the_permalink();?>">-->
                                <!--      <?php //the_post_thumbnail('thumbnail', array('class'=>'img-fluid wow fadeIn'));?>-->
                                    <!--<img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/post-thumb-1.jpg" alt="">-->
                                <!--    </a>-->
                                <!--    <div class="overlay"><span class="icon qb-play-arrow"></span></div></figure>-->
                                
                                <!--<div class="text"><a href="<?php //the_permalink();?>"><?php //the_title(); ?>   </a></div>-->
                                <!--<div class="post-info"> <?php// the_date(); ?></div>-->
                            <!--</article>-->
                    <!--News Post Widget-->
                    <div class="sidebar-widget posts-widget">

                       <aside class="sidebar default-sidebar">

                    <?php 
                            $args = array(
                            'post_type' => 'advertisement',
                            'posts_per_page' => 6,
                            'tax_query' => array(
                            'relation' => 'OR',
                            array(
                            'taxonomy' => 'add-category',
                            'field'    => 'slug',
                            'terms'    => array( 'inner-rightsidebar-below-ad' ),
                            ),
                            ),
                            );
                            $bm = new WP_Query( $args );
                            while($bm->have_posts()): $bm->the_post();?>
                            <div class="sidebar-widget">
                            <div class="widget-content">
                            <div class="image">
                                <?php  the_post_thumbnail('', array('class' => 'img-fluid') );?>
                            </div>
                            </div>
                            </div>
                                    
                        <?php endwhile;?>

                    

                </aside>
                    </div>
                    <!--End Post Widget-->

         </aside>
            </div>
        </div>
        <!--Related Posts-->
       
        <!-- Business Focus -->
        <div class="related-posts">
            <div class="sec-title">
                <h2>विजनेश फोकस</h2>
            </div>
            <div class="content-blocks">
                    <div class="row">
                    <?php $the_query = catagorydatabyid(46, 4); ?>
                    <?php if ($the_query->have_posts()): ?>
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <div class="nbo-st col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="inner-box">

                                <div class="image business-focus1">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php
                                            if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
                                                the_post_thumbnail('large-img',array('class' => 'img-fluid'));
                                            }
                                            ?>
                                    </a>
                                </div>
                                <div class="content-inner pt20">
                                    <h2> <a href="<?php the_permalink(); ?>"><?php echo mb_strimwidth(get_the_title(), 0, 50, '...'); ?></a></h2>
                                    <div class="text"><?php// echo excerpt(35);?> </div>
                                </div>

                            </div>
                        </div>
                        

                    <?php endwhile; ?>
                    <?php endif; ?>
                </div>           

                    
                </div>
            
        </div>
        

    </div>
</div>
<!--End Sidebar Page Container-->
