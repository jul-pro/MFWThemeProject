<article id="post-<?php the_ID(); ?>" <?php post_class('blog-item') ?>>
    
    <div class="row">
        <div class="col-xs-12 col-sm-2 ">
            <div class ="entry-meta">
                <span id="publish_date"><?php echo get_the_date('j M'); ?></span>
                <span>
                    <i class="fa fa-user"></i><a href="<?php the_author_link();?>"><?php the_author(); ?></a>
                </span>
                <span>
                    <i class="fa fa-comment"></i><a href="<?php get_comments_link(); ?>"><?php echo get_comments_number(); ?>
                        <?php _e('comments', MFWT_TEXTDOMAIN);?>
                    </a>
                </span>
                <?php the_ratings('span'); ?>
            </div>
        </div>
        <div class="col-xs-12 col-sm-10 blog-content">
            <?php 
                the_post_thumbnail(
                    'post-thumbnail',
                    array(
                        'class' => 'img-responsive img-blog'
                    )
                );
            ?>
            <h3><?php the_content(); ?></h3>
                
        </div>
    
    </div>
</article>

