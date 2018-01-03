<?php

namespace widgets;


class Widget_MFWP_Gallery extends \WP_Widget {
    public function __construct() {
        $id_base = 'mfwp_gallery';
        $name = __('Gallery', MFWT_TEXTDOMAIN);
        $widget_options = array(
            'description' => __('Displays the contents of the gallery page', MFWT_TEXTDOMAIN),
        );
        parent::__construct($id_base, $name, $widget_options);
    }
    
    public function widget($args, $instance) {
        if( $instance['page'] != '' ) {
            $title = apply_filters('widget_title', empty( $instance['title'] ) ? __('Gallery') : $instance['title'], $instance, $this->id_base);

            echo $args['before_widget'];

            if( $title ) {
                echo $args['before_title'] . $title . $args ['after_title'];
            }
            
            $page = get_post($instance['page']);
            
            echo apply_filters('the_content', $page->post_content);


            echo $args['after_widget'];
        
        }
        
    }
    
    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $new_instance = wp_parse_args((array) $new_instance, array('title' => ''));
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['page'] = $new_instance['page'];
        return $instance;
    }
    
    public function form($instance) {
        $instance = wp_parse_args( (array) $instance, array('title' => '', 'page' => '') );
        $title = $instance['title'];
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title') ?>" value="<?php echo esc_attr($title) ?>">
        </p>
        <?php $pages = get_pages(); ?>
        <p>
            <label for="<?php echo $this->get_field_id('page'); ?>"><?php _e('Select Gallery Page:'); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id('page') ?>" name="<?php echo $this->get_field_name('page') ?>">
                <option value=""><?php _e('Select Page'); ?></option>
                <?php foreach ($pages as $page) : ?>
                <option value="<?php echo $page->ID; ?>"<?php selected($instance['page'], $page->ID)?>><?php echo $page->post_name; ?></option>                    
                <?php endforeach; ?>
            </select>
        </p>
        <?php
    }
}
