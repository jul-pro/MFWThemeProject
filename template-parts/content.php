<article id="post-<?php the_ID(); ?>" <?php post_class('blog-item'); ?>>
    <div class="row">
        <div class="col-xs-12 col-sm-2 text-center">
            <div class="entry-meta">
                <span id="publish_date"><?php echo get_the_date('j M'); ?></span>
                <span><i class="fa fa-user"></i><a href="<?php the_author_link(); ?>"><?php the_author(); ?></a></span>
                <span><i class="fa fa-comment"></i><a href="<?php echo get_comments_link(); ?>"><?php echo get_comments_number(); ?> Comments</a></span>
                <?php the_ratings('span'); ?>
            </div>                            
        </div>
        <div class="col-xs-12 col-sm-10 blog-content">
            <a href="<?php the_permalink(); ?>">
                <?php 
                    the_post_thumbnail(
                        'post-thumbnail',
                        array(
                            'class' => "img-responsive img-blog"
                        )
                    ); 
                ?>
            </a>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <h3><?php the_excerpt(); ?></h3>
            <a class="btn btn-primary readmore" href="<?php the_permalink($post)?>">Read More <i class="fa fa-angle-right"></i></a>
        </div>
    </div>
</article> <!--/.blog-item-->
    

