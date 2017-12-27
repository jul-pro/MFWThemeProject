<?php get_header(); ?>
	
<section id="blog" class="container">
    <?php if ( is_home() && ! is_front_page() ) : ?>
		<header class="page-header">
			<h1 class="page-title"><?php single_post_title(); ?></h1>
		</header>
	<?php else : ?>
	<div class="center">
            <h2 class="page-title"><?php _e( 'Blogs', MFWT_TEXTDOMAIN ); ?></h2>
            <p class="lead">Pellentesque habitant morbi tristique senectus et netus et malesuada</p>
        </div>
	<?php endif; ?>

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