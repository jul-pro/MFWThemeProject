<?php get_header(); ?>
	
<section id="blog" class="container">
    <div class="center">
        <h2>Blogs</h2>
        <p class="lead">Pellentesque habitant morbi tristique senectus et netus et malesuada</p>
    </div>

    <div class="blog">
        <div class="row">
            <div class="col-md-8">
                <div class="blog-item">
                    <div class="row">
                        <div class="col-xs-12 col-sm-2 text-center">
                            <div class="entry-meta">
                                <span id="publish_date">07  NOV</span>
                                <span><i class="fa fa-user"></i> <a href="#">John Doe</a></span>
                                <span><i class="fa fa-comment"></i> <a href="blog-item.html#comments">2 Comments</a></span>
                                <span><i class="fa fa-heart"></i><a href="#">56 Likes</a></span>
                            </div>
                        </div>
                                
                        <div class="col-xs-12 col-sm-10 blog-content">
                            <a href="#"><img class="img-responsive img-blog" src="images/blog/blog1.jpg" width="100%" alt="" /></a>
                            <h2><a href="blog-item.html">Consequat bibendum quam liquam viverra</a></h2>
                            <h3>Curabitur quis libero leo, pharetra mattis eros. Praesent consequat libero eget dolor convallis vel rhoncus magna scelerisque. Donec nisl ante, elementum eget posuere a, consectetur a metus. Proin a adipiscing sapien. Suspendisse vehicula porta lectus vel semper. Nullam sapien elit, lacinia eu tristique non.posuere at mi. Morbi at turpis id urna ullamcorper ullamcorper.</h3>
                            <a class="btn btn-primary readmore" href="blog-item.html">Read More <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>    
                </div><!--/.blog-item-->
                        
                <div class="blog-item">
                    <div class="row">
                        <div class="col-sm-2 text-center">
                            <div class="entry-meta"> 
                                <span id="publish_date">07  NOV</span>
                                <span><i class="fa fa-user"></i> <a href="#">John Doe</a></span>
                                <span><i class="fa fa-comment"></i> <a href="blog-item.html#comments">2 Comments</a></span>
                                <span><i class="fa fa-heart"></i><a href="#">56 Likes</a></span>
                            </div>
                        </div>
                        <div class="col-sm-10 blog-content">
                            <a href=""><img class="img-responsive img-blog" src="images/blog/blog2.jpg" width="100%" alt="" /></a>
                            <h2><a href="blog-item.html">Consequat bibendum quam liquam viverra</a></h2>
                            <h3>Curabitur quis libero leo, pharetra mattis eros. Praesent consequat libero eget dolor convallis vel rhoncus magna scelerisque. Donec nisl ante, elementum eget posuere a, consectetur a metus. Proin a adipiscing sapien. Suspendisse vehicula porta lectus vel semper. Nullam sapien elit, lacinia eu tristique non.posuere at mi. Morbi at turpis id urna ullamcorper ullamcorper.</h3>
                            <a class="btn btn-primary readmore" href="blog-item.html">Read More <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>    
                </div><!--/.blog-item-->
                        
                <ul class="pagination pagination-lg">
                    <li><a href="#"><i class="fa fa-long-arrow-left"></i>Previous Page</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">Next Page<i class="fa fa-long-arrow-right"></i></a></li>
                </ul><!--/.pagination-->
            </div><!--/.col-md-8-->

        <?php get_sidebar(); ?>  
        </div><!--/.row-->
    </div>
</section><!--/#blog-->
	
<?php get_footer();	