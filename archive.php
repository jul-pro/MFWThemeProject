<?php get_header(); ?>
	
<section id="blog" class="container">
    <div class="center">
        <?php
            the_archive_title( '<h2>', '</h2>' );
            the_archive_description( '<p>', '</p>' );
	?>
    </div>

    <div class="blog">
        <div class="row">
            <div class="col-md-8">
                
                <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php
                            get_template_part( 'template-parts/content', get_post_format() );
                        ?>
                    <?php endwhile; ?>
                <?php else : ?>
                    <?php get_template_part( 'template-parts/content', 'none' ); ?>
                <?php endif; ?>
                
                <div class="row">
                    <div class="col-xs-12 col-sm-2"></div>
                    <div class="col-xs-12 col-sm-10">
                        <div class="center">
                            <?php the_posts_pagination($pagination_args); ?>
                        </div>    
                    </div>
                </div>
                    
            </div><!--/.col-md-8-->

            <?php get_sidebar(); ?>  
        </div><!--/.row-->
    </div>
</section><!--/#blog-->
	
<?php get_footer();	