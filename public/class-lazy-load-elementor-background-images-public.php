<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://james.revillini.com/
 * @since      1.0.0
 *
 * @package    Lazy_Load_Elementor_Background_Images
 * @subpackage Lazy_Load_Elementor_Background_Images/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Lazy_Load_Elementor_Background_Images
 * @subpackage Lazy_Load_Elementor_Background_Images/public
 * @author     James Revillini <james@vandertech.com>
 */
class Lazy_Load_Elementor_Background_Images_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;
    
	/**
	 * Flag to indicate scripts were added.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      bool    $js_added    Flag to indicate scripts were added.
	 */
	private $js_added;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * output inline style to set background-image property to none with !important modifier
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {


		//wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/lazy-load-elementor-background-images-public.css', array(), $this->version, 'all' );
        if ( is_admin() ) return;
        if ( ! ( is_singular() ) ) return;
        
        if ( ! ( $this->js_added ) ) return; // don't add css if scripts weren't added
        ob_start(); ?>
            <style>
                .lazyelementorbackgroundimages:not(.elementor-motion-effects-element-type-background) {
                    background-image: none !important; /* lazyload fix for elementor */
                }
            </style>
    <?php
        echo trim( ob_get_clean() );


	}

	/**
	 * insert inline scripts to add lazy class to all Elementor sections and columns (if dependencies can be loaded)
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {


		//wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/lazy-load-elementor-background-images-public.js', array( 'jquery' ), $this->version, false );
        
        // add lazy class to all elementor sections and columns
        if ( is_admin() ) return;
        if ( ! ( is_singular() ) ) return;

        $this->js_added = false;
        ob_start(); ?>
        jQuery( function ( $ ) {
            if ( ! ( window.Waypoint ) ) {
                // if Waypoint is not available, then we MUST remove our class from all elements because otherwise BGs will never show
                $('.elementor-section.lazyelementorbackgroundimages,.elementor-column-wrap.lazyelementorbackgroundimages').removeClass('lazyelementorbackgroundimages');
                if ( window.console && console.warn ) {
                    console.warn( 'Waypoint library is not loaded so backgrounds lazy loading is turned OFF' );
                }
                return;
            } 
            $('.lazyelementorbackgroundimages').each( function () {
                var $section = $( this );
                new Waypoint({
                    element: $section.get( 0 ),
                    handler: function( direction ) {
                        //console.log( [ 'waypoint hit', $section.get( 0 ), $(window).scrollTop(), $section.offset() ] );
                        $section.removeClass('lazyelementorbackgroundimages');
                    },
                    offset: $(window).height()*1.5 // when item is within 1.5x the viewport size, start loading it
                });
            } );
        });
    <?php
        $skrip = ob_get_clean();

        if ( ! wp_script_is( 'jquery', 'enqueued' ) ) {
            wp_enqueue_script( 'jquery' );
        }

        $this->js_added = wp_add_inline_script( 'jquery', $skrip );        
	}

	/**
	 * insert our lazyload class into Elementor HTML for all section and column DOM objects .
	 *
	 * @since    1.0.0
	 */
	public function elementor_frontend_the_content( $content ) {
        // NEW 2020-02-08 ... now lazyloads column backgrounds!!! feedback welcome!!!
        return preg_replace( ['/(\selementor-section\s)/m', '/(elementor-column-wrap)/m'], ' $1 lazyelementorbackgroundimages ', $content );  
    }

}
