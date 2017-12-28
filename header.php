<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <?php wp_head(); ?>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    
</head>
<body class="homepage">   
    <header id="header">
        
        <nav class="navbar navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <?php
                        if(has_custom_logo()) {
                            the_custom_logo();
                        } else {
                            echo '<a class="navbar-brand" href="index.html">Gp2.</a>';
                        }
                    ?>                    
                </div>
				
                <div class="collapse navbar-collapse navbar-right">
                    <?php
                        $args = array(
                            'theme_location' => 'primary',
                            'menu' => '',
                            'container' => '',
                            'container_class' => '',
                            'container_id' => '',
                            'menu_class' => 'nav navbar-nav',
                            'menu_id' => '',
                            'echo' => true,
                            'fallback_cb' => '',
                            'before' => '',
                            'after' => '',
                            'link_before' => '',
                            'link_after' => '',
                            'depth' => 0,
                            'walker' => '',
                        );
            
                        wp_nav_menu($args);
                    ?>
<!--                    <ul class="nav navbar-nav">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Portfolio</a></li>
                        <li class="active"><a href="#">Blog</a></li> 
                        <li><a href="#">Contact</a></li>                        
                    </ul>-->
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
		
    </header><!--/header-->
    