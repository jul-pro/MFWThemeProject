	<section id="bottom">
        <div class="container wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3>Company</h3>
                        <ul>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">We are hiring</a></li>
                            <li><a href="#">Meet the team</a></li>
                            <li><a href="#">Copyright</a></li>                           
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->

                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3>Support</h3>
                        <ul>
                            <li><a href="#">Faq</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Forum</a></li>
                            <li><a href="#">Documentation</a></li>                          
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->

                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3>Developers</h3>
                        <ul>
                            <li><a href="#">Web Development</a></li>
                            <li><a href="#">SEO Marketing</a></li>
                            <li><a href="#">Theme</a></li>
                            <li><a href="#">Development</a></li>
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->

                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3>Our Partners</h3>
                        <ul>
                            <li><a href="#">Adipisicing Elit</a></li>
                            <li><a href="#">Eiusmod</a></li>
                            <li><a href="#">Tempor</a></li>
                            <li><a href="#">Veniam</a></li>                           
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->
            </div>
        </div>
    </section><!--/#bottom-->
	
	<div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
			<div class="social">
                            <ul class="social-share">
                                <?php if(get_theme_mod('facebook_link') != '') : ?>
                                    <li><a href="<?php echo get_theme_mod('facebook_link'); ?>"><i class="fa fa-facebook"></i></a></li>
				<?php endif; ?>
                                <?php if(get_theme_mod('twitter_link') != '') : ?>
                                    <li><a href="<?php echo get_theme_mod('twitter_link'); ?>"><i class="fa fa-twitter"></i></a></li>
				<?php endif; ?>
                                <?php if(get_theme_mod('linkdedin_link') != '') : ?>
                                    <li><a href="<?php echo get_theme_mod('linkdedin_link'); ?>"><i class="fa fa-linkedin"></i></a></li> 
				<?php endif; ?>
                                <?php if(get_theme_mod('dribbble_link') != '') : ?>
                                    <li><a href="<?php echo get_theme_mod('dribbble_link'); ?>"><i class="fa fa-dribbble"></i></a></li>
                                <?php endif; ?>
                                <?php if(get_theme_mod('skype_link') != '') : ?>
                                    <li><a href="<?php echo get_theme_mod('skype_link'); ?>"><i class="fa fa-skype"></i></a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
		</div>
            </div><!--/.container-->
	</div><!--/.top-bar-->
	
	<footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <?php if(get_theme_mod('copyright_text')) : ?>
                        <?php echo get_theme_mod('copyright_text'); ?>
                    <?php else : ?>
                        &copy;
                    <?php endif; ?>
                    <!--&copy; 2015 <a target="_blank" href="http://bootstraptaste.com/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">bootstraptaste</a>. All Rights Reserved.-->
                </div>
                <!-- 
                    All links in the footer should remain intact. 
                    Licenseing information is available at: http://bootstraptaste.com/license/
                    You can buy this theme without footer links online at: http://bootstraptaste.com/buy/?theme=Gp
                -->
                <div col-sm-6>
                    <?php
                    $footer_menu_args = array(
                        'theme_location' => 'footer_menu',
                        'menu_class' => 'pull-right'
                    );
                    
                    wp_nav_menu($footer_menu_args);
                ?>                    
                </div>
                
<!--                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Faq</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>-->
            </div>
        </div>
    </footer><!--/#footer-->
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <?php wp_footer() ?>
</body>
</html>

