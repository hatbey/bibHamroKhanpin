<?php
/*
* Theme Option Functions
*/

//Favicon Image
if (!function_exists("dc_favicon")) {
    function dc_favicon(){
        if(dc_option('dc_favicon') == ""){
            echo '<link rel="shortcut icon" href="' . get_template_directory_uri() . '/favicon.png" >';
        } else {
            echo '<link rel="shortcut icon" href="' . dc_option('dc_favicon') .'" >';
        }
        if (dc_option('dc_show_apple_logo')) {
            echo dc_option('dc_apple_iphone_icon') != "" ? ('<link rel="apple-touch-icon" href="' . dc_option('dc_apple_iphone_icon') . '"/>') : '';
            echo dc_option('dc_apple_iphone_retina_icon') != "" ? ('<link rel="apple-touch-icon" sizes="114x114" href="' . dc_option('dc_apple_iphone_retina_icon') . '"/>') : '';
            echo dc_option('dc_apple_ipad_icon') != "" ? ('<link rel="apple-touch-icon" sizes="72x72" href="' . dc_option('dc_apple_ipad_icon') . '"/>') : '';
            echo dc_option('dc_apple_ipad_retina_icon') != "" ? ('<link rel="apple-touch-icon" sizes="144x144" href="' . dc_option('dc_apple_ipad_retina_icon') . '"/>') : '';
        }
    }
}

//Comments On Pages
if (!function_exists("comments_page")) {
    function comments_page(){
        if(dc_option('dc_blog_comments') && is_page()){
            comments_template();
        }
    }
}

//Logo Option
if (!function_exists("logo")) {
    function logo(){
        if( dc_option( 'dc_show_logo' ) == 0 ){ ?> 
        <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><i class="icon-cloud"></i> <?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a>
        <?php } else{ ?>            
        <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" >
            <img src="<?php echo dc_option( 'site_logo' );?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
        </a>
        <?php 
    }
}
}

//Copyright Text 
if( !function_exists('show_footer')){
    function show_footer(){
        if(dc_option( 'dc_footer_text_info' ) == 1){
            echo dc_option( 'dc_copyright_text' );
        }
    }
}

//Google Analytics
if( !function_exists('google_analytics') ){
    function google_analytics(){
        echo dc_option('dc_google_analytics');
    }
}

//Blog Sidebar Position
if(!function_exists('blog_date')){
    function blog_date(){
        if(dc_option('dc_blog_date')){
            echo dc_option('dc_blog_date');
        //the_time('$time');
        }
    }
}


//Featured Image on Single Post
if( !function_exists('featured_image_single_post')){
    function featured_image_single_post(){
        if(dc_option( 'dc_single_featured_image' ) == 1){
            the_post_thumbnail();
        } 
    }
}

//Post Author Section
if( !function_exists('dc_author_bio')){
    function dc_author_bio(){
        if( dc_option('dc_single_post_author') ){
            echo dc_option('dc_single_post_author');
        }
    }
}


//Comments On Blog
if (!function_exists("blog_comments")) {
    function blog_comments(){
        if(dc_option('dc_blog_comments') == 1 && is_single()){
            comments_template();
        }
    }
}

//Excerp Length
function dc_excerpt_length($length) {
    return dc_option('dc_excerpt_len');
}
add_filter('excerpt_length', 'dc_excerpt_length');


//Styling Options

function dc_style_options(){

    ob_start();


    if( dc_option('dc_body_text_font','face') ){ 

        echo '@import url(http://fonts.googleapis.com/css?family='. str_replace(' ','+',dc_option('dc_body_text_font','face')) .':400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic);';

    } else {
        echo '@import url(http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic);
        ';
    }


    if( dc_option('dc_heading_font','face') and ( dc_option('dc_body_text_font','face')!=dc_option('dc_heading_font','face') ) ){  

        echo "\n" . '@import url(http://fonts.googleapis.com/css?family='.str_replace(' ','+',dc_option('dc_heading_font','face')).':400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic);';
    }
    ?>

    /* Body Style */

    body{
    <?php

    if( dc_option('dc_body_background') ){  
        echo  'background: ' . dc_option('dc_body_background') . ';';
    } 


    if( dc_option('dc_body_text_font','color') ){  
        echo  'color: ' . dc_option('dc_body_text_font','color') . ';';
    } 

    if( dc_option('dc_body_text_font','face') ){  


        echo  'font-family: \'' . dc_option('dc_body_text_font','face') . '\';';
    }  else {
        echo  'font-family: \'Roboto\', sans-serif;';
    }

    if( dc_option('dc_body_text_font','size') ){  
        echo  'size: ' . dc_option('dc_body_text_font','size') . ';';
    } 

    ?>
}   

 /* Heading Style */

h1, h2, h3, h4, h5, h6{ 
<?php
if( dc_option('dc_heading_font','face') ){  
    echo  'font-family: \'' . dc_option('dc_heading_font','face') . '\';';
} else {
    echo 'font-family: \'Roboto\', sans-serif;';
}
?>
}



/*Link Color*/

a {
<?php  
if( dc_option('dc_link_color') ){  
    echo  'color: ' . dc_option('dc_link_color') . ';';
}
?>
}


/*Link Hover Color*/

a:hover {
<?php  
if( dc_option('dc_link_color') ){  
    echo  'color: ' . dc_option('dc_link_hover_color') . ';';
}
?>
}  

   /* Header Style */

#header {
<?php  
if( dc_option('dc_header_background') ){  
    echo  'background-color: ' . dc_option('dc_header_background') . ';';
}
?>
}  



/* Custom CSS */
<?php echo dc_option('dc_custom_css');?>


<?php 
return ob_get_clean();
}



//Social Sharing
function dc_social_share(){
    global $dc_socials;
    foreach ($dc_socials as $key => $value) {
        # code...
        if(dc_option($value['name']) !=""){    
            echo '<a href="' . str_replace('*', dc_option($value['name']), $value['link']) . '" target="_blank" title="' . $key . '" class="' . $key . '"><span class="icon-'. $key . '"></span></a>';
        }
    }

}

global $dc_socials;
$dc_socials = array(
    'facebook' => array(
        'name' => 'dc_facebook_username',
        'link' => 'http://www.facebook.com/*',
        ),
    'google-plus' => array(
        'name' => 'dc_googleplus_username',
        'link' => 'https://plus.google.com/u/0/*'
        ),
    'twitter' => array(
        'name' => 'dc_twitter_username',
        'link' => 'http://twitter.com/*',
        ),
    'youtube-play' => array(
        'name' => 'dc_youtube_username',
        'link' => 'http://www.youtube.com/user/*',
        )
    );

//Show Admin Bar
if(!function_exists('dc_adminbar')){
    function dc_adminbar(){
        if(dc_option('dc_admin_bar')==1){
            if(current_user_can( 'manage_options' ))
                return true;
            else 
                return false;
        }

        add_filter('show_admin_bar','dc_adminbar');
    }
}

if(!function_exists('dc_admin_logo')){
    function dc_admin_logo(){
        if(dc_option('dc_logo_login')){
            ?>
            <style type="text/css">
            body.login div#login h1 a {
                background-image: url(<?php echo dc_option('dc_logo_login');?>);
                padding-bottom: 30px;
            }
            </style>

            <?php } else { ?>

            <style type="text/css">
            body.login div#login h1 a {
                background-image: url(<?php echo admin_url('/images/wordpress-logo.png');?>);
                padding-bottom: 30px;
            }
            </style>

            <?php }
        }
        add_action( 'login_enqueue_scripts', 'dc_admin_logo' );
    }


    if(!function_exists('dc_logo_login_url')){
        function dc_logo_login_url(){
            return site_url();
        }
        add_filter( 'login_headerurl', 'dc_logo_login_url' );
    }



    
//
    function dc_exclude_search_pages($query) {
        if(dc_option('dc_exclude_search_page')==1){
          if ( $query->is_search ) {
            $query->set('post_type', 'post');

        }
        return $query;
    }
}
add_filter('pre_get_posts','dc_exclude_search_pages');
//}




function get_video_ID($link){

    if( empty($link) ) return false;

    $path  =  trim(parse_url($link, PHP_URL_PATH), '/');

    $query_string = parse_url($link, PHP_URL_QUERY);

    parse_str($query_string, $output);

    if( empty($output) ){
        return $path;
    } else {
        return $output['v'];
    }
}
