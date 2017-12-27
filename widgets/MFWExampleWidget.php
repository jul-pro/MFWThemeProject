<?php

namespace widgets;

class MFWExampleWidget extends \WP_Widget {
    public function __construct() {
        parent::__construct(
            'mfw_example', 
            'MFW Example Widget', 
            array(
                'description' => 'Example',
            )
        );
    }
    
    public function form($instance) {
        $title = "";
        $text = "";
        
        if( !empty($instance) ) {
            $title = $instance['title'];
            $text = $instance['text'];
        }
        
        $tableId = $this->get_field_id('title');
        $tableName = $this->get_field_name('title');
        
        echo '<label for="' . $tableId . '">Title</label><br>';
        echo '<input id="' . $tableId . '" type="text" name="'
                . $tableName . '" value="' . $title . '"><br>';
        
        $textId = $this->get_field_id('text');
        $textName = $this->get_field_name('text');
        
        echo '<label for="' . $textId . '">Text</label><br>';
        echo '<textarea id="' . $textId . '" name="' . $textName . '">'
                . $text . '</textarea>';
    }
    
    
    public function update($new_instance, $old_instance) {
        $values = array();
        $values["title"] = htmlentities($new_instance["title"]);
        $values["text"] = htmlentities($new_instance["text"]);
        return $values;
    }
    
    public function widget($args, $instance) {
        $title = $instance['title'];
        $text = $instance['text'];
        
        echo "<h2>$title</h2>";
        echo "<p>$text</p>";
    }
}