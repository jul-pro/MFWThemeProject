<?php

get_header(); ?>

<section id="portfolio">
    <div class="container">
        <?php if ( have_posts() ) : ?>
	<div class="center">
        <?php
            the_archive_title( '<h2>', '</h2>' );
            the_archive_description( '<p>', '</p>' );
	?>
        </div>
        <?php endif; ?>
        <ul class="portfolio-filter text-center">
            <li><a href="#" class="btn btn-default active" data-filter="*">All Works</a></li>
        <?php
            $p_terms = get_terms(array(
                'taxonomy' => 'pf-type',
                'hide_empty' => false,
            ));
            
            foreach ($p_terms as $p_term) :
        ?>
            <li>
                <a href="#" class="btn btn-default" data-filter="<?php echo '.' . $p_term -> slug ?>"><?php echo $p_term -> name ?></a>
            </li>
        <?php
            endforeach;
        ?>
        </ul>
        <div class="row">
            
                
            <?php
                if ( have_posts() ) : ?>
                <div class="portfolio-items">
                <?php
                    /* Start the Loop */
                    while ( have_posts() ) : the_post();
                    
                        /*
                         * Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        
                        
                        get_template_part( 'template-parts/portfolio-content', get_post_format() );

                    endwhile; 
                ?>
                </div>
                <?php the_posts_pagination($pagination_args);

                else :
                    get_template_part( 'template-parts/content', 'none' );

                endif; ?>

            </div>
        </div>
    </div>
</section>

<?php get_footer();
