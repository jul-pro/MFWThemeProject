<?php
/*
 * Template Name: Portfolio Template
 */

get_header();
?>
<section id="portfolio">
    <div class="container">
        <div class="center">
            <h2>Portfolio</h2>
            <p class="lead">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br>
                et dolore magna aliqua. Ut enim ad minim veniam
            </p>
        </div>
    </div>
</section>
<?php
$args = array(
    'post_type' => 'portfolio',
    'posts_per_page' => 3
);

$works = new WP_Query($args);

if( $works -> have_posts() ) :
    while( $works -> have_posts() ) : $works -> the_post();
        get_template_part('template-parts/content', 'single');
    endwhile;
endif;

get_footer();

