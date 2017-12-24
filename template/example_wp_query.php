<?php

/* 
 * 
 * Template name: Example WP_Query
 * 
 */

?>

<?php get_header(); ?>

<main id="content" class="container" role="main">
    
        <div class="center">
            <h2 class="page-title">Знакомство с WP_Query</h2>
        </div>
        <div>
            <br>
            <?php
                $query = new WP_Query(array('category_name' => 'news'));
                while($query->have_posts()) {
                    $query->the_post();
                    the_title();
                }
            ?>
            <br>
            <?php
                global $wp_query;
                //print_r($wp_query);
                var_dump("<pre>", $wp_query ,"</pre>");
            ?>
            <hr>
            <?php
                $args = array(
                    'posts_per_page' => 5,
                    'orderby' => 'comment_count'
                );
                $myquery = new WP_Query($args);
                
                if($myquery->have_posts()) {
                    while($myquery->have_posts()) {
                        $myquery->the_post();
                        echo "<li>" . get_the_title() . "</li>";
                    }
                } else { 
            ?>
                <p>Posts not found</p>
            <?php
                } 
            ?>
            <hr>
            <?php
                $myquery = new WP_Query(array('author__in' => array(2, 6)));
                if($myquery->have_posts()) {
                    while($myquery->have_posts()) {
                        $myquery->the_post();
                        echo "<li>" . get_the_title() . "</li>";
                    }
                } else { 
            ?>
                <p>Posts not found</p>
            <?php
                }
                
                echo "<hr>";
                
                the_title();
                
                wp_reset_postdata();
                echo "<br>";
                
                the_title();
            ?>
            <hr>
            
            
        </div>
</main>

<?php get_footer();

