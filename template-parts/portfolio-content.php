<?php
    $pf_type_terms = get_the_terms($post -> ID, 'pf-type');
        
    $item_classes = '';
    if( $pf_type_terms != false) {
        foreach($pf_type_terms as $pf_type_term) {
            $item_classes .= " " . $pf_type_term -> slug;
        }        
    }
?>
<div class="portfolio-item apps col-xs-12 col-sm-4 col-md-3 <?php echo $item_classes ?>">
    
    <div class="recent-work-wrap">
        <?php the_post_thumbnail('medium', array('class' => 'img-responsive')); ?>
        
        <div class="overlay">
            <div class="recent-work-inner">
                <h3><a href="#"><?php the_title(); ?></a></h3>
                <p><?php the_excerpt(); ?></p>
                <a class="preview" href="<?php echo get_the_post_thumbnail_url(); ?>" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a>
            </div> 
        </div>
    </div>
</div>