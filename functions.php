<?php
    
    define('MFWT_TEXTDOMAIN', 'mfwthemeproject');

    function mfwthemeproject_setup() {
        load_theme_textdomain(MFWT_TEXTDOMAIN, get_template_directory() . '/languages');
        add_theme_support('title-tag');
        add_theme_support('custom-logo');
        add_theme_support('post-thumbnails');
        register_nav_menu('primary', __('Primary menu', MFWT_TEXTDOMAIN));
        register_nav_menu('footer_menu', __('Footer menu', MFWT_TEXTDOMAIN));
    }
    
    add_action('after_setup_theme', 'mfwthemeproject_setup');
    
    add_filter('get_the_archive_title', function( $title ){
	return preg_replace('~^[^:]+: ~', '', $title );
    });

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
        
        wp_enqueue_style('mfwtp-responsive');
        wp_enqueue_style('mfwtp-main');
        wp_enqueue_style('mfwthemeproject-style', get_stylesheet_uri());
        
        
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
            'description' => __('Widgets will be shown in the right column of the site', MFWT_TEXTDOMAIN),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>'
        ));
    }
    
    add_action('widgets_init', 'registerMyWidgets');
    
    require get_template_directory() . '/widgets/MFWExampleWidget.php';
    add_action('widgets_init', create_function('', 'return register_widget("widgets\MFWExampleWidget");'));
    require get_template_directory() . '/widgets/class-widget-mfwp-gallery.php';
    add_action('widgets_init', create_function('', 'return register_widget("widgets\Widget_MFWP_Gallery");'));
    
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
    
    add_action('customize_register', 'mfwthemeproject_customize_register');
    
    function mfwthemeproject_customize_register ($wp_customize) {
        $wp_customize->add_setting(
            'facebook_link',
            array(
                'default' => '',
                'transport' => 'refresh'
            )
        );
        
        $wp_customize->add_setting(
            'twitter_link',
            array(
                'default' => '',
                'transport' => 'refresh'
            )
        );
        
        $wp_customize->add_setting(
            'linkedin_link',
            array(
                'default' => '',
                'transport' => 'refresh'
            )
        );
        
        $wp_customize->add_setting(
            'dribbble_link',
            array(
                'default' => '',
                'transport' => 'refresh'
            )
        );
        
        $wp_customize->add_setting(
            'skype_link',
            array(
                'default' => '',
                'transport' => 'refresh'
            )
        );
        
        $wp_customize->add_setting(
            'copyright_text',
            array(
                'default' => '',
                'transport' => 'refresh'
            )
        );
        
        
        $wp_customize->add_section(
            'social_section',
            array(
                'title' => __('Social buttons', MFWT_TEXTDOMAIN),
                'priority' => 30,
            )
        );
        
        $wp_customize->add_control(
            'facebook_link',
            array(
                'label' => __('Facebook link', MFWT_TEXTDOMAIN),
                'section' => 'social_section',
                'settings' => 'facebook_link',
                'type' => 'text'
                
            )
        );
        
        $wp_customize->add_control(
            'facebook_link',
            array(
                'label' => __('Facebook link', MFWT_TEXTDOMAIN),
                'section' => 'social_section',
                'settings' => 'facebook_link',
                'type' => 'text'
                
            )
        );
        
        $wp_customize->add_control(
            'twitter_link',
            array(
                'label' => __('Twitter link', MFWT_TEXTDOMAIN),
                'section' => 'social_section',
                'settings' => 'twitter_link',
                'type' => 'text'
                
            )
        );
        
        $wp_customize->add_control(
            'linkedin_link',
            array(
                'label' => __('LinkedIn link', MFWT_TEXTDOMAIN),
                'section' => 'social_section',
                'settings' => 'linkedin_link',
                'type' => 'text'
                
            )
        );
        
        $wp_customize->add_control(
            'dribbble_link',
            array(
                'label' => __('Dribbble link', MFWT_TEXTDOMAIN),
                'section' => 'social_section',
                'settings' => 'dribbble_link',
                'type' => 'text'
                
            )
        );
        
        $wp_customize->add_control(
            'skype_link',
            array(
                'label' => __('Skype link', MFWT_TEXTDOMAIN),
                'section' => 'social_section',
                'settings' => 'skype_link',
                'type' => 'text'
                
            )
        );
        
        $wp_customize->add_control(
            'copyright_text',
            array(
                'label' => __('Copyright text', MFWT_TEXTDOMAIN),
                'section' => 'title_tagline',
                'settings' => 'copyright_text',
                'type' => 'text'
            )
        );
    }
    
    class Walker_Category_Mfwthemeproject extends Walker_Category {
        
        public function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
		/** This filter is documented in wp-includes/category-template.php */
		$cat_name = apply_filters(
			'list_cats',
			esc_attr( $category->name ),
			$category
		);

		// Don't generate an element if the category name is empty.
		if ( ! $cat_name ) {
			return;
		}

		$link = '<a href="' . esc_url( get_term_link( $category ) ) . '" ';
		if ( $args['use_desc_for_title'] && ! empty( $category->description ) ) {
			/**
			 * Filters the category description for display.
			 *
			 * @since 1.2.0
			 *
			 * @param string $description Category description.
			 * @param object $category    Category object.
			 */
			$link .= 'title="' . esc_attr( strip_tags( apply_filters( 'category_description', $category->description, $category ) ) ) . '"';
		}

		$link .= '>';
		$link .= $cat_name . ' ';
                if ( ! empty( $args['show_count'] ) ) {
			$link .= '<span class="badge">' . number_format_i18n($category->count) . '</span>';
//                        $link .= '<span class="badge">' . sprintf("%02d", 122345) . '</span>';
		}
                $link .= '</a>';

		if ( ! empty( $args['feed_image'] ) || ! empty( $args['feed'] ) ) {
			$link .= ' ';

			if ( empty( $args['feed_image'] ) ) {
				$link .= '(';
			}

			$link .= '<a href="' . esc_url( get_term_feed_link( $category->term_id, $category->taxonomy, $args['feed_type'] ) ) . '"';

			if ( empty( $args['feed'] ) ) {
				$alt = ' alt="' . sprintf(__( 'Feed for all posts filed under %s' ), $cat_name ) . '"';
			} else {
				$alt = ' alt="' . $args['feed'] . '"';
				$name = $args['feed'];
				$link .= empty( $args['title'] ) ? '' : $args['title'];
			}

			$link .= '>';

			if ( empty( $args['feed_image'] ) ) {
				$link .= $name;
			} else {
				$link .= "<img src='" . $args['feed_image'] . "'$alt" . ' />';
			}
			$link .= '</a>';

			if ( empty( $args['feed_image'] ) ) {
				$link .= ')';
			}
		}

		
		if ( 'list' == $args['style'] ) {
			$output .= "\t<li";
			$css_classes = array(
				'cat-item',
				'cat-item-' . $category->term_id,
			);

			if ( ! empty( $args['current_category'] ) ) {
				// 'current_category' can be an array, so we use `get_terms()`.
				$_current_terms = get_terms( $category->taxonomy, array(
					'include' => $args['current_category'],
					'hide_empty' => false,
				) );

				foreach ( $_current_terms as $_current_term ) {
					if ( $category->term_id == $_current_term->term_id ) {
						$css_classes[] = 'current-cat';
					} elseif ( $category->term_id == $_current_term->parent ) {
						$css_classes[] = 'current-cat-parent';
					}
					while ( $_current_term->parent ) {
						if ( $category->term_id == $_current_term->parent ) {
							$css_classes[] =  'current-cat-ancestor';
							break;
						}
						$_current_term = get_term( $_current_term->parent, $category->taxonomy );
					}
				}
			}

			/**
			 * Filters the list of CSS classes to include with each category in the list.
			 *
			 * @since 4.2.0
			 *
			 * @see wp_list_categories()
			 *
			 * @param array  $css_classes An array of CSS classes to be applied to each list item.
			 * @param object $category    Category data object.
			 * @param int    $depth       Depth of page, used for padding.
			 * @param array  $args        An array of wp_list_categories() arguments.
			 */
			$css_classes = implode( ' ', apply_filters( 'category_css_class', $css_classes, $category, $depth, $args ) );

			$output .=  ' class="' . $css_classes . '"';
			$output .= ">$link\n";
		} elseif ( isset( $args['separator'] ) ) {
			$output .= "\t$link" . $args['separator'] . "\n";
		} else {
			$output .= "\t$link<br />\n";
		}
	}
    }
    
    function mfwthemeproject_widget_categories($args) {
        $walker = new Walker_Category_Mfwthemeproject();
        
        $args = array_merge($args, array('walker' => $walker));
        
        return $args;
    }
    
    add_filter('widget_categories_args', 'mfwthemeproject_widget_categories');
    
    
    add_filter('widget_tag_cloud_args', 'mfwthemeproject_tag_cloud');
    
    function mfwthemeproject_tag_cloud($args) {
        $args['format'] = 'list';
        return $args;
    }
    
    add_filter('get_archives_link', 'mfwthemeproject_archives_link', 10, 6);
    
    function mfwthemeproject_archives_link($link_html, $url, $text, $format, $before, $after) {
        
        if(strpos($after, '&nbsp;(') !== 0) {
            return $link_html;
        }
        
        $end_pos_of_count = strpos($after, ')');
        $count = substr($after, 0, ++$end_pos_of_count);
        
        $start_pos_of_after = strpos($link_html, $after);
        $link_without_after = substr($link_html, 0, $start_pos_of_after);
        $after = substr($after, ++$end_pos_of_count);
        $link_html = $link_without_after . $after;
        $old_link = "<a href='$url'>$text</a>";
        $new_link = "<a href='$url'><i class='fa fa-angle-double-right'></i> $text<span class='pull-right'>$count</span></a>";
        
        $link_html = str_replace($old_link, $new_link, $link_html);
        return $link_html;
    }
    
    
    add_filter( 'manage_pages_columns', 'revealid_add_id_column', 5 );
    add_action( 'manage_pages_custom_column', 'revealid_id_column_content', 5, 2 );


    function revealid_add_id_column( $columns ) {
       $columns['revealid_id'] = 'ID';
       return $columns;
    }

    function revealid_id_column_content( $column, $id ) {
      if( 'revealid_id' == $column ) {
        echo $id;
      }
    }