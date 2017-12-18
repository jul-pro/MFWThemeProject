<?php

    function loadScriptsSite() {
        
        $ver = null;
        
        wp_register_style(
            'mfwtp-bootstrap', 
            get_template_directory_uri() . '/css/bootstrap.min.css', 
            array(), 
            $ver
        );
        
        wp_register_style(
            'mfwtp-font-awesome',
            get_template_directory_uri() . '/css/font-awesome.min.css',
            array(),
            $ver
        );
        
        wp_register_style(
            'mfwtp-animate',
            get_template_directory_uri() . '/css/animate.min.css',
            array(),
            $ver
        );
        
        wp_register_style(
            'mfwtp-prettyPhoto',
            get_template_directory_uri() . '/css/prettyPhoto.css',
            array(),
            $ver
        );
        
        wp_register_style(
            'mfwtp-main',
            get_template_directory_uri() . '/css/main.css',
            array(),
            $ver
        );
    
        wp_register_style(
            'mfwtp-responsive',
            get_template_directory_uri() . '/css/responsive.css',
            array(),
            $ver
        );
        
        
        wp_enqueue_style('mfwtp-bootstrap');
        wp_enqueue_style('mfwtp-font-awesome');
        wp_enqueue_style('mfwtp-animate');
        wp_enqueue_style('mfwtp-prettyPhoto');
        wp_enqueue_style('mfwtp-main');
        wp_enqueue_style('mfwtp-responsive');
        
        wp_register_script(
            'mfwtp-bootstrap', 
            get_template_directory_uri() . '/js/bootstrap.min.js',
            array(), 
            $ver, 
            true
        );
        
        wp_register_script(
            'mfwtp-prettyPhoto', 
            get_template_directory_uri() . '/js/jquery.prettyPhoto.js',
            array('jquery'),
            $ver,
            true
        );
        
        wp_register_script(
            'mfwtp-isotope',
            get_template_directory_uri() . '/js/jquery.isotope.min.js', 
            array('jquery'),
            $ver,
            true
        );
        
        wp_register_script(
            'mfwtp-wow',
            get_template_directory_uri() . '/js/wow.min.js', 
            array(),
            $ver,
            true
        );
        
        wp_register_script(
            'mfwtp-main',
            get_template_directory_uri() . '/js/main.js', 
            array(),
            $ver,
            true
        );
        
        wp_enqueue_script('jquery');
        wp_enqueue_script('mfwtp-bootstrap');
        wp_enqueue_script('mfwtp-prettyPhoto');
        wp_enqueue_script('mfwtp-isotope');
        wp_enqueue_script('mfwtp-wow');
        wp_enqueue_script('mfwtp-main');
    
    }
    
    add_action('wp_enqueue_scripts', 'loadScriptsSite');
