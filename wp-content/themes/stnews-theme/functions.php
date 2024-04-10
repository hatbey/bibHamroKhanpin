<?php

/**
 * stnews-theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package stnews-theme
 */
if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}
if (!function_exists('stnews_theme_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function stnews_theme_setup()
    {
        /*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on stnews-theme, use a find and replace
		 * to change 'stnews-theme' to the name of your theme in all the template files.
		 */
        load_theme_textdomain('stnews-theme', get_template_directory() . '/languages');
        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');
        /*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
        add_theme_support('title-tag');
        /*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
        add_theme_support('post-thumbnails');
        add_image_size('post-img', 270, 207, true);
        add_image_size('large-img', 770, 463, true);
        add_image_size('article-thumb', 368, 216, true);
        add_image_size('feature-thumb', 1200, 532, true);
        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'primary' => esc_html__('Primary', 'stnews-theme'),
                'footer-left' => esc_html__('Footer Left', 'stnews-theme'),
                'footer-mid' => esc_html__('Footer Mid', 'stnews-theme'),
                'footer-right' => esc_html__('Footer Right', 'stnews-theme'),
            )
        );
        /*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            )
        );
        // Set up the WordPress core custom background feature.
        add_theme_support(
            'custom-background',
            apply_filters(
                'stnews_theme_custom_background_args',
                array(
                    'default-color' => 'ffffff',
                    'default-image' => '',
                )
            )
        );
        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');
        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support(
            'custom-logo',
            array(
                'height'      => 250,
                'width'       => 250,
                'flex-width'  => true,
                'flex-height' => true,
            )
        );
    }
endif;
add_action('after_setup_theme', 'stnews_theme_setup');
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function stnews_theme_content_width()
{
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('stnews_theme_content_width', 640);
}
add_action('after_setup_theme', 'stnews_theme_content_width', 0);
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function stnews_theme_widgets_init()
{
    register_sidebar(
        array(
            'name'          => esc_html__('Sidebar', 'stnews-theme'),
            'id'            => 'sidebar-1',
            'description'   => esc_html__('Add widgets here.', 'stnews-theme'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action('widgets_init', 'stnews_theme_widgets_init');
/**
 * Enqueue scripts and styles.
 */
function stnews_theme_scripts()
{
    wp_enqueue_style('stnews-theme-style', get_stylesheet_uri(), array(), _S_VERSION);
    wp_style_add_data('stnews-theme-style', 'rtl', 'replace');
    wp_enqueue_script('stnews-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'stnews_theme_scripts');
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
// nav walker
require_once(get_template_directory()  . '/lib/navwalker.php');
require_once(get_template_directory()  . '/lib/mobile-navwalker.php');
/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}
// content limit
function hk_trim_content($limit)
{
    $content = explode(' ', get_the_content(), $limit);
    if (count($content) >= $limit) {
        array_pop($content);
        $content = implode(" ", $content) . '...';
    } else {
        $content = implode(" ", $content);
    }
    $content = preg_replace('/\[.+\]/', '', $content);
    $content = apply_filters('the_content', $content);
    return $content;
}
add_filter('get_the_archive_title', 'replaceCategoryName');
function replaceCategoryName($title)
{
    $title =  single_cat_title('', false);
    return $title;
}
/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
function excerpt($limit)
{
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt) >= $limit) {
        array_pop($excerpt);
        $excerpt = implode(" ", $excerpt) . '...';
    } else {
        $excerpt = implode(" ", $excerpt);
    }
    $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);
    return $excerpt;
}
function catagorydatabyid($catid_n, $limit = null, $offset = null)
{
    // $catid_n = get_cat_ID('समाचार');
    $subcategories_n = get_categories('&child_of=' . $catid_n . '&hide_empty');
    $d = array(); // Initialize $d as an empty array
    foreach ($subcategories_n as $p) {
        $d[] = $p->cat_ID;
    }
    $a = implode("','", (array)$d);
    $categoryid = (!empty($a)) ? $a : $catid_n;
    $args = array('cat' => ($categoryid), 'orderby' => 'date', 'posts_per_page' => $limit, 'order' => 'DESC', 'offset' => $offset);
    $loop = new WP_Query($args);
    return $loop;
    wp_reset_query();
}
function parentwithchild($catid)
{
    $subcategories_n = get_categories('&child_of=' . $catid_n . '&hide_empty');
    foreach ($subcategories_n as $p) {
        $d[] = $p->slug;
    }
}
function listingnews($catid_n, $limit, $offset, $colorstyle)
{
    $subcategories_n = get_categories('&child_of=' . $catid_n . '&hide_empty');
    // Check if $subcategories_n is an array and not empty
    if (is_array($subcategories_n) && !empty($subcategories_n)) {
        $d = array(); // Initialize $d as an array
        foreach ($subcategories_n as $p) {
            $d[] = $p->cat_ID;
        }
        $a = implode("','", $d);
        $categoryid = (!empty($a)) ? $a : $catid_n;
        $args = array('cat' => ($categoryid), 'orderby' => 'date', 'posts_per_page' => $limit, 'order' => 'DESC', 'offset' => $offset);
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()) :
            while ($the_query->have_posts()) : $the_query->the_post();
                echo $output = '
<div class="news-block-five col-lg-4 col-md-4 col-sm-12">
    <div class="inner-box">
        <div class="image-column ">
            <div class="image">
               <a href="' . get_the_permalink() . '">
            ' . get_the_post_thumbnail($loop->ID, "", array('class' => 'img-fluid')) . '
                </a>
            </div>
            <div class="content-inner">
                <h3><a href="' . get_the_permalink() . '">' . mb_strimwidth(get_the_title(), 0, 80, '...') . '</a></h3>
                <div class="text">' . excerpt(15) . ' </div>
            </div>
        </div>
    </div>
</div>
';
            endwhile;
        endif;
    } else {
        echo 'No subcategories found.';
    }
}
function sportsnews($catid_n, $limit, $offset, $colorstyle)
{
    $subcategories_n = get_categories('&child_of=' . $catid_n . '&hide_empty');
    foreach ($subcategories_n as $p) {
        $d[] = $p->cat_ID;
    }
    $a = implode("','", $d);
    $categoryid = (!empty($a)) ? $a : $catid_n;
    $args = array('cat' => ($categoryid), 'orderby' => 'date', 'posts_per_page' => $limit, 'order' => 'DESC',    'offset' => $offset);
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) :
        while ($the_query->have_posts()) : $the_query->the_post();
            echo $output = '
<div class="news-block-four col-lg-6 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="image-column ">
                                        <div class="image">
                                           <a href="' . get_the_permalink() . '">
                                        ' . get_the_post_thumbnail($loop->ID, "post-img", array('class' => 'img-fluid')) . '
                                            </a>
                                        </div>
                                        <div class="content-inner">
                                            <h3><a href="' . get_the_permalink() . '">' . mb_strimwidth(get_the_title(), 0, 80, '...') . '
</a></h3>
                                            <div class="text">' . excerpt(15) . ' </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
';
        endwhile;
    endif;
}
function listcatagory($catid_n, $limit, $offset, $colorstyle)
{
    $subcategories_n = get_categories('&child_of=' . $catid_n . '&hide_empty');
    foreach ($subcategories_n as $p) {
        $d = [];

    $a = implode(',', $d);
    }
    $categoryid = (!empty($a)) ? $a : $catid_n;
    $args = array('cat' => ($categoryid), 'orderby' => 'date', 'posts_per_page' => $limit, 'order' => 'DESC',    'offset' => $offset);
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) :
        while ($the_query->have_posts()) : $the_query->the_post();
            echo $output = '
    
<div class="col-lg-6 col-md-12 col-sm-12">
<div class="nbo-st">
<div class="inner-box">
<div class="row clearfix">
<div class="image-column col-lg-3 col-md-12 col-sm-12">
<div class="image">
<a href="' . get_the_permalink() . '">
' . get_the_post_thumbnail(get_the_ID(), "post-img", array('class' => 'img-fluid')) . '
</a>
</div>
</div>
<div class="content-box-small col-lg-9 col-md-12 col-sm-12">
<div class="content-inner">
<h3 class="h3small">
<a href="' . get_the_permalink() . '">' . mb_strimwidth(get_the_title(), 0, 100, '...') . '
</a></h3>
</div>
</div>
</div>
</div>
</div>
</div>
';
     endwhile;
    endif;
}
function sportscatagory($catid_n, $limit, $offset, $colorstyle)
{
    $subcategories_n = get_categories('&child_of=' . $catid_n . '&hide_empty');
    $d = array(); // Initialize $d as an empty array
    foreach ($subcategories_n as $p) {
        $d[] = $p->cat_ID;
    }
    $a = implode("','", $d);
    $categoryid = (!empty($a)) ? $a : $catid_n;
    $args = array('cat' => ($categoryid), 'orderby' => 'date', 'posts_per_page' => $limit, 'order' => 'DESC',    'offset' => $offset);
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) :
        while ($the_query->have_posts()) : $the_query->the_post();
            echo $output = '
<div class="col-lg-6 col-md-12 col-sm-12">
<div class="nbo-st">
<div class="inner-box">
<div class="row clearfix">
<div class="image-column col-lg-6 col-md-6 col-sm-12">
<div class="image">
<a href="' . get_the_permalink() . '">
' . get_the_post_thumbnail(get_the_ID(), "post-img", array('class' => 'img-fluid')) . '
</a>
</div>
</div>
<div class="content-box-small col-lg-6 col-md-6 col-sm-12">
<div class="content-inner">
<h3 class="h3small">
<a href="' . get_the_permalink() . '">' . mb_strimwidth(get_the_title(), 0, 25, '...') . '
</a></h3>
</div>
</div>
</div>
</div>
</div>
</div>
';
        endwhile;
    endif;
}
function listnews($catid_n, $limit, $offset, $colorstyle)
{
    $subcategories_n = get_categories('&child_of=' . $catid_n . '&hide_empty');
    $d = array(); // Initialize $d as an empty array
    foreach ($subcategories_n as $p) {
        $d[] = $p->cat_ID;
    }
    $a = implode("','", $d);
    $categoryid = (!empty($a)) ? $a : $catid_n;
    $args = array('cat' => ($categoryid), 'orderby' => 'date', 'posts_per_page' => $limit, 'order' => 'DESC',    'offset' => $offset);
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) :
        while ($the_query->have_posts()) : $the_query->the_post();
            echo $output = '
                            <div class="nbo-st">
                                <div class="inner-box">
                                    <div class="row clearfix">
                                        <div class="image-column col-lg-3 col-md-3 col-sm-12">
                                            <div class="image">
                                                <a href="' . get_the_permalink() . '">
                                                ' . get_the_post_thumbnail(get_the_ID(), "thumbnail", array('class' => 'img-fluid')) . '
                                                </a>
                                            </div>
                                        </div>
                                        <div class="content-box-small col-lg-8 col-md-9 col-sm-12">
                                            <div class="content-inner">
                                                <h3 class="h3small">
                                                    <a href="' . get_the_permalink() . '">' . mb_strimwidth(get_the_title(), 0, 100, '...') . '
                                                </a></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
';
        endwhile;
    endif;
}
function listnewsst($catid_n, $limit, $offset, $colorstyle)
{
    $subcategories_n = get_categories('&child_of=' . $catid_n . '&hide_empty');
    $d = array(); // Initialize $d as an empty array
    foreach ($subcategories_n as $p) {
        $d[] = $p->cat_ID;
    }
    $a = implode("','", $d);
    $categoryid = (!empty($a)) ? $a : $catid_n;
    $args = array('cat' => ($categoryid), 'orderby' => 'date', 'posts_per_page' => $limit, 'order' => 'DESC',    'offset' => $offset);
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) :
        while ($the_query->have_posts()) : $the_query->the_post();
            echo $output = '
                            <div class="nbo-st">
                                <div class="inner-box">
                                    <div class="row clearfix">
                                        <div class="image-column col-lg-3 col-md-3 col-sm-12">
                                            <div class="image">
                                                <a href="' . get_the_permalink() . '">
                                                ' . get_the_post_thumbnail(get_the_ID(), "thumbnail", array('class' => 'img-fluid')) . '
                                                </a>
                                            </div>
                                        </div>
                                        <div class="content-box-small col-lg-9 col-md-9 col-sm-12">
                                            <div class="">
                                                <h3 class="h3small">
                                                <a href="' . get_the_permalink() . '">' . mb_strimwidth(get_the_title(), 0, 45, '...') . '
                                                </a></h3>
<div class="text">' . excerpt(25) . ' </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
';
        endwhile;
    endif;
}
function listnewslist($catid_n, $limit, $offset, $colorstyle)
{
    $subcategories_n = get_categories('&child_of=' . $catid_n . '&hide_empty');
    foreach ($subcategories_n as $p) {
        $d[] = $p->cat_ID;
    }
    $a = implode("','", $d);
    $categoryid = (!empty($a)) ? $a : $catid_n;
    $args = array('cat' => ($categoryid), 'orderby' => 'date', 'posts_per_page' => $limit, 'order' => 'DESC',    'offset' => $offset);
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) :
        while ($the_query->have_posts()) : $the_query->the_post();
            echo $output = '
  <div class="content-box col-lg-3 col-md-4 col-sm-12">
                            <div class="nbo-st">
                                <div class="inner-box">
                                    <div class="row clearfix">
                                        <div class="image-column col-lg-5 col-md-12 col-sm-12">
                                            <div class="image">
                                                <a href="' . get_the_permalink() . '">
                                                ' . get_the_post_thumbnail($loop->ID, "thumbnail", array('class' => 'img-fluid')) . '
                                                </a>
                                            </div>
                                        </div>
                                        <div class="content-box-small col-lg-7 col-md-12 col-sm-12">
                                            <div class="content-inner">
                                                <h3 class="h3small">
                                                <a href="' . get_the_permalink() . '">' . mb_strimwidth(get_the_title(), 0, 40, '...') . '
                                                </a></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
';
        endwhile;
    endif;
}
function listbusinesslist($catid_n, $limit, $offset, $colorstyle)
{
    $subcategories_n = get_categories('&child_of=' . $catid_n . '&hide_empty');
    foreach ($subcategories_n as $p) {
        $d[] = $p->cat_ID;
    }
    $a = implode("','", $d);
    $categoryid = (!empty($a)) ? $a : $catid_n;
    $args = array('cat' => ($categoryid), 'orderby' => 'date', 'posts_per_page' => $limit, 'order' => 'DESC',    'offset' => $offset);
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) :
        while ($the_query->have_posts()) : $the_query->the_post();
            echo $output = '
	<article class="widget-post col-md-6 clearfix">
			<figure class="post-thumb">
			<a href="' . get_the_permalink() . '">
			' . get_the_post_thumbnail($loop->ID, "thumb", array('class' => 'img-fluid')) . '
			</a>
					<div class="overlay"><span class="icon qb-play-arrow"></span></div>
			</figure>
			<div class="text">  <a href="' . get_the_permalink() . '">' . mb_strimwidth(get_the_title(), 0, 100, '...') . '
				</a></div>
	</article>';
        endwhile;
    endif;
}
function widgetnewslist($catid_n, $limit, $offset, $colorstyle)
{
    $subcategories_n = get_categories('&child_of=' . $catid_n . '&hide_empty');
    foreach ($subcategories_n as $p) {
        $d[] = $p->cat_ID;
    }
    $a = implode("','", $d);
    $categoryid = (!empty($a)) ? $a : $catid_n;
    $args = array('cat' => ($categoryid), 'orderby' => 'date', 'posts_per_page' => $limit, 'order' => 'DESC',    'offset' => $offset);
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) :
        while ($the_query->have_posts()) : $the_query->the_post();
            echo $output = '
	<article class="widget-post col-md-6 clearfix">
			<figure class="post-thumb">
			<a href="' . get_the_permalink() . '">
			' . get_the_post_thumbnail($loop->ID, "thumb", array('class' => 'img-fluid')) . '
			</a>
					<div class="overlay"><span class="icon qb-play-arrow"></span></div>
			</figure>
			<div class="text">  <a href="' . get_the_permalink() . '">' . mb_strimwidth(get_the_title(), 0, 100, '...') . '
				</a></div>
	</article>';
        endwhile;
    endif;
}
function searchForCategory($array)
{
    foreach ($array as $val) {
        if ($val->category_nicename != "fresh-news" && $val->category_nicename != "slider") {
            return $val->cat_name;
        }
    }
    return null;
}
function getallcatgorybyparentid($catid)
{
    $subcategories_n = get_categories('&child_of=' . $catid  . '&hide_empty');
    //echo "<pre>";  var_dump($subcategories_n); die();
    foreach ($subcategories_n as $p) {
        $thisCat =   get_category($p->category_parent);
        echo $output = '<a href="' . $thisCat->slug . '/' . $p->slug . '">' . $p->name . ' </a>';
    }
}
function catagorydata($catagoryname, $postper)
{
    wp_reset_query();
    $args = array('cat' => $catagoryname, 'posts_per_page' => $postper, 'post_status' => 'publish', 'order' => 'DESC');
    $loop = new WP_Query($args);
    return $loop;
}
function singlecatagorydatabyid($catid, $postper)
{
    wp_reset_query();
    $args = array('cat' => $catid, 'posts_per_page' => $postper, 'post_status' => 'publish', 'order' => 'DESC');
    $loop = new WP_Query($args);
    return $loop;
}
function wpbeginner_numeric_posts_nav()
{
    if (is_singular())
        return;
    global $wp_query;
    /** Stop execution if there's only 1 page */
    if ($wp_query->max_num_pages <= 1)
        return;
    $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
    $max   = intval($wp_query->max_num_pages);
    /**     Add current page to the array */
    if ($paged >= 1)
        $links[] = $paged;
    /**     Add the pages around the current page to the array */
    if ($paged >= 3) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
    if (($paged + 2) <= $max) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
    echo '<div class="styled-pagination text-center"><ul class="clearfix">' . "\n";
    /**     Previous Post Link */
    if (get_previous_posts_link())
        printf('<li>%s</li>' . "\n", get_previous_posts_link());
    /**     Link to first page, plus ellipses if necessary */
    if (!in_array(1, $links)) {
        $class = 1 == $paged ? ' class="active"' : '';
        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');
        if (!in_array(2, $links))
            echo '<li>…</li>';
    }
    /**     Link to current page, plus 2 pages in either direction if necessary */
    sort($links);
    foreach ((array) $links as $link) {
        $class = $paged == $link ? ' class="active"' : '';
        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
    }
    /**     Link to last page, plus ellipses if necessary */
    if (!in_array($max, $links)) {
        if (!in_array($max - 1, $links))
            echo '<li>…</li>' . "\n";
        $class = $paged == $max ? ' class="active"' : '';
        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($max)), $max);
    }
    /**     Next Post Link */
    if (get_next_posts_link())
        printf('<li>%s</li>' . "\n", get_next_posts_link());
    echo '</ul></div>' . "\n";
}
/*@ Get Related Posts for Single Page */
if (!function_exists('sc_get_related_posts_for_single')) {
    function sc_get_related_posts_for_single()
    {
        ob_start();
        $id = get_the_ID();
        /*@ Get current post's categories */
        $categories = get_the_category($id); // Disabled this if you want tag wise posts 
        /*@ Get current post's Tags */
        // $categories = wp_get_post_tags($id); // Enable this for tags wise related posts
        if (!empty($categories)) :
            /*@ Pluck all categories Ids */
            $categories_ids = array_column($categories, 'term_id');
            $related_args = [
                'post_status'         => 'publish',
                'category__in'        => $categories_ids, // Disabled this if you want tag wise posts
                //'tag__in'        => $categories_ids, // Enable this for tag wise related posts
                'post__not_in'        => [$id], // Exclude Current Post
                'posts_per_page'      => 4, // Number of related posts to show
                'ignore_sticky_posts' => 1
            ];
            $get_posts = new WP_Query($related_args);
            if ($get_posts->have_posts()) : ?>
                <div style="clear:both;"> </div>
                <?php
                while ($get_posts->have_posts()) : $get_posts->the_post(); ?>
                    <div class="news-block-two small-block col-lg-3 col-md-3 col-sm-12">
                        <div class="inner-box">
                            <div class="image">
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-img', array('class' => 'img-fluid')); ?></a>
                            </div>
                            <div class="releated-box">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            </div>
                        </div>
                    </div><?php
                        endwhile;
                    endif;
                endif;
                return ob_get_clean();
            }
            add_shortcode('prefix_related_posts_for_single', 'sc_get_related_posts_for_single');
        }
