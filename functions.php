<?php
    
    define('MFWT_TEXTDOMAIN', 'mfwthemeproject');

    function mfwthemeproject_setup() {
        load_theme_textdomain(MFWT_TEXTDOMAIN, get_template_directory() . '/languages');
        add_theme_support('title-tag');
        add_theme_support('custom-logo');
        add_theme_support('post-thumbnails');
        register_nav_menu('primary', __('Primary menu', MFWT_TEXTDOMAIN));
    }
    
    add_action('after_setup_theme', 'mfwthemeproject_setup');

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
    
    add_filter('excerpt_more', function($more) {
        return '';
    });

    function addAdminMenu() {
        $mainMenuPage = add_menu_page(
            _x(
                'Theme Menu Title', 
                'admin menu page',
                MFWT_TEXTDOMAIN
            ),
            
            _x(
                'Theme Menu Title',
                'admin menu page',
                MFWT_TEXTDOMAIN
            ),
                
            'manage_options',
            MFWT_TEXTDOMAIN, 
            'renderMainMenu',
            get_template_directory_uri() . '/images/main-menu.png'
        );
        
        $subMenuPage = add_submenu_page
        (
            MFWT_TEXTDOMAIN, 
            _x(
                'Sub Theme Menu Title',
                'admin menu page',
                MFWT_TEXTDOMAIN
            ),
            _x(
                'Sub Theme Menu Title',
                'admin menu page',
                MFWT_TEXTDOMAIN
            ),
            'manage_options',
            'mfwt_control_sub_menu',
            'renderSubMenu'
        );
        
        
        $themeMenuPage = add_theme_page(
            __('Sub Theme Menu Page', MFWT_TEXTDOMAIN),
            __('Sub Theme Menu Page', MFWT_TEXTDOMAIN),
            'read',
            'mfw_theme_control_sub_theme_menu',
            'renderThemeMenu'
        );
    }
    
    add_action('admin_menu', 'addAdminMenu');
    
    function renderMainMenu() {
        _e('MFW theme page', MFWT_TEXTDOMAIN);
    }
    
    function renderSubMenu() {
        _e('MFW Sub Menu Theme Page', MFWT_TEXTDOMAIN);
    }
    
    function renderThemeMenu() {
        _e('Sub Theme Menu', MFWT_TEXTDOMAIN);
    }
    
    
    function registerMyWidgets() {
        register_sidebar(array(
            'name' => __('Right side bar of the site', MFWT_TEXTDOMAIN),
            'id' => 'right-sidebar',
            'description' => __('These widgets will be shown in the right column of the site', MFWT_TEXTDOMAIN),
            'before_title' => '<h1>',
            'after_title' => '</h1>'
        ));
    }
    
    add_action('widgets_init', 'registerMyWidgets');
    
    require get_template_directory() . '/widgets/MFWExampleWidget.php';
    add_action('widgets_init', create_function('', 'return register_widget("widgets\MFWExampleWidget");'));
    
    
    $pagination_args = array(
        'prev_text' => '<i class="fa fa-long-arrow-left"></i> ' . __('Previous'),
        'next_text' => __('Next') . ' <i class="fa fa-long-arrow-right"></i>'
    );
    
    add_filter('navigation_markup_template', 'my_navigation_template');
    
    function my_navigation_template() {
        return '
	<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>    
	';
    }