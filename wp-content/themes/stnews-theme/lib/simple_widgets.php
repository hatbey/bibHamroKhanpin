<?php
/**
 * Simple Widget lets you to choose the post type.
 * Author: Raju Shrestha <amritms@gmail.com>
 
 * 
 */
// Creating the simple_post widget
class simple_post_widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
// Base ID of your widget
            'simple_post_widget',

// Widget name will appear in UI
            __('Simple Post Widget', 'simple_post_widget_domain'),

// Widget description
            array('description' => __('Simple Post widget ', 'simple_post_widget_domain'),)
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *  Creating widget front-end
     * This is where the action happens
     * */
    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);
        $numberOfListings = apply_filters('widget_numberOfListings', $instance['numberOfListings']);
        $post_type = esc_attr($instance['post_type']);
        $show_date = esc_attr($instance['show_date']);
        $show_description = esc_attr($instance['show_description']);
        $show_thumb = esc_attr($instance['show_thumb']);

        $col = $show_thumb == 'on' ? 9 : 12;


//        $maxlines = esc_attr($instance['maxlines']);

// before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if (!empty($title))
            echo $args['before_title'] . $title . $args['after_title'];

        if (empty($orderby)) $pfunc = 'post_date desc';

        $gp_args = array(
            'posts_per_page' => $numberOfListings,
            'post_type' => $post_type,
            'orderby' => 'post_date',
            'order' => 'desc',
            'post_status' => 'publish',
        );
//        $loop = new WP_Query( $gp_args );
        $posts = get_posts($gp_args);
//var_dump($posts);
        foreach ($posts as $post):
            echo '<div class=" recent-news">';
            if($show_thumb){
                if(has_post_thumbnail($post->ID)){
                    $col = 8;
                    echo '<div class="col-md-4">' . get_the_post_thumbnail($post->ID, 'thumbnail', array('class' => 'img-responsive')) . '</div>';
                }else{
                    $col = 12;
                }
            }
            echo "<a class='col-md-{$col} col-sm-{$col} col-xs-{$col}'";
            echo 'href="' . get_permalink($post->ID) . '" title="Read the story, ' . $post->post_title . '">';
            echo $post->post_title;
            if($show_date == 'on') echo '<div style="font-size:10px">' . date('Y-m-d', strtotime($post->post_date)) . '</div>';
            if($show_description == 'on') {
                if (strlen($post->post_content) > 50) {
                    echo substr($post->post_content, 0, 47) . '...';
                }
                else substr($post->post_content, 0, 50);
            }
            echo  '</a>';
            echo '</div>';
        endforeach;
    }

// Widget Backend
    public function form($instance)
    {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('New title', 'simple_post_widget_domain');
        }

        if (isset($instance['numberOfListings'])) {
            $numberOfListings = $instance['numberOfListings'];
        } else {
            $numberOfListings = __('5', 'simple_post_widget_domain');
        }
        $post_type = isset($instance['post_type']) ? esc_attr($instance['post_type']) : '';
        $show_date = isset($instance['show_date']) ? esc_attr($instance['show_date']) : 'on';
        $show_description = isset($instance['show_description']) ? esc_attr($instance['show_description']) : '';
        $show_thumb = isset($instance['show_thumb']) ? esc_attr($instance['show_thumb']) : '';
// Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('post_type');?>"><?php _e('Post Type');?></label>
            <select id="<?php echo $this->get_field_id('post_type'); ?>"
                    name="<?php echo $this->get_field_name('post_type'); ?>">
                <?php
                $post_types = get_post_types('', 'names');

                $badtypes = array('nav_menu_item', 'revision', 'attachment', 'page'); // others????
                foreach ($post_types as $ptype) {
                    if (!in_array($ptype, $badtypes)) {
                        echo "<option value=\"$ptype\" ";
                        if ($post_type == $ptype) echo 'selected="true"';
                        echo ">$ptype</option>";
                    }
                }
                ?>
            </select>

        </p>
        <p>
            <label for="<?php echo $this->get_field_id('numberOfListings'); ?>"><?php _e('No. Of Posts:'); ?></label>
            <select id="<?php echo $this->get_field_id('numberOfListings'); ?>"
                    name="<?php echo $this->get_field_name('numberOfListings'); ?>">
                <?php for ($x = 1; $x <= 10; $x++): ?>
                    <option <?php echo $x == $numberOfListings ? 'selected="selected"' : ''; ?>
                        value="<?php echo $x; ?>"><?php echo $x; ?></option>
                <?php endfor; ?>
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('show_date');?>"><?php _e("Show Date:");?></label>
            <input type="checkbox" id="<?php echo $this->get_field_id('show_date');?>" name="<?php echo $this->get_field_name('show_date') ?>" <?php if($show_date == 'on') echo 'checked';?>/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('show_description');?>"><?php _e("Show Description:");?></label>
            <input type="checkbox" id="<?php echo $this->get_field_id('show_description');?>" name="<?php echo $this->get_field_name('show_description') ?>" <?php if($show_description == 'on') echo 'checked';?>/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('show_thumb');?>"><?php _e("Show Thumbnail:");?></label>
            <input type="checkbox" id="<?php echo $this->get_field_id('show_thumb');?>" name="<?php echo $this->get_field_name('show_thumb') ?>" <?php if($show_thumb == 'on') echo 'checked';?>/>
        </p>
    <?php
    }

// Updating widget replacing old instances with new
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['numberOfListings'] = (!empty($new_instance['numberOfListings'])) ? strip_tags($new_instance['numberOfListings']) : '5';
        $instance['post_type'] = esc_attr($new_instance['post_type']);
        $instance['show_date'] = esc_attr($new_instance['show_date']);
        $instance['show_description'] = esc_attr($new_instance['show_description']);
        $instance['show_thumb'] = esc_attr($new_instance['show_thumb']);
        return $instance;
    }
} // Class wpb_widget ends here

// Register and load the widget
function simple_post_load_widget()
{
    register_widget('simple_post_widget');
}

add_action('widgets_init', 'simple_post_load_widget');
// end of simple_post widget
