<?php get_header(); ?>

<section id="blog" class="container">
    <div class="blog">
        <?php the_title('<div class="center"><h2 class="page-title">', '</h2></div>'); ?>
        <div class="row">
            <div class="col-md-8">
                <?php
                    while(have_posts()) : the_post();
                        get_template_part('template-parts/content', 'single');
                    endwhile;
                ?>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</section>


