<?php
/*
Plugin Name: Woocommerce Products Slider
Plugin URI: http://paratheme.com/items/woocommerce-product-slider-for-wordpress/
Description: Fully responsive and mobile ready Carousel Slider for your woo-commerce product. unlimited slider anywhere via short-codes and easy admin setting.
Version: 1.2
Author: paratheme
Author URI: http://paratheme.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

define('wcps_plugin_url', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
define('wcps_plugin_dir', plugin_dir_path( __FILE__ ) );

require_once( plugin_dir_path( __FILE__ ) . 'includes/wcps-meta.php');
require_once( plugin_dir_path( __FILE__ ) . 'includes/wcps-functions.php');


//Themes php files

require_once( plugin_dir_path( __FILE__ ) . 'themes/flat/index.php');
require_once( plugin_dir_path( __FILE__ ) . 'themes/rossi/index.php');
require_once( plugin_dir_path( __FILE__ ) . 'themes/saiga/index.php');
require_once( plugin_dir_path( __FILE__ ) . 'themes/sako/index.php');
require_once( plugin_dir_path( __FILE__ ) . 'themes/ruger/index.php');
require_once( plugin_dir_path( __FILE__ ) . 'themes/anti-ruger/index.php');


function wcps_init_scripts()
	{
		wp_enqueue_script('jquery');
		wp_enqueue_script('wcps_js', plugins_url( '/js/scripts.js' , __FILE__ ) , array( 'jquery' ));
		
		wp_localize_script('wcps_js', 'wcps_ajax', array( 'wcps_ajaxurl' => admin_url( 'admin-ajax.php')));
		wp_enqueue_style('wcps_style', wcps_plugin_url.'css/style.css');

		wp_enqueue_script('owl.carousel', plugins_url( '/js/owl.carousel.js' , __FILE__ ) , array( 'jquery' ));
		wp_enqueue_style('owl.carousel', wcps_plugin_url.'css/owl.carousel.css');
		wp_enqueue_style('owl.theme', wcps_plugin_url.'css/owl.theme.css');
		
		
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wcps_color_picker', plugins_url('/js/color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
		

		
		// Style for themes
		wp_enqueue_style('wcps-style-flat', wcps_plugin_url.'themes/flat/style.css');			
		wp_enqueue_style('wcps-style-rossi', wcps_plugin_url.'themes/rossi/style.css');
		wp_enqueue_style('wcps-style-saiga', wcps_plugin_url.'themes/saiga/style.css');
		wp_enqueue_style('wcps-style-sako', wcps_plugin_url.'themes/sako/style.css');
		wp_enqueue_style('wcps-style-ruger', wcps_plugin_url.'themes/ruger/style.css');		
		wp_enqueue_style('wcps-style-anti-ruger', wcps_plugin_url.'themes/anti-ruger/style.css');			
		
		
		
		
		//Style for font
		
		
		wp_register_style( 'Raleway', 'http://fonts.googleapis.com/css?family=Raleway:900'); 
		wp_enqueue_style( 'Raleway' );
		

		
	}
add_action("init","wcps_init_scripts");







register_activation_hook(__FILE__, 'wcps_activation');


function wcps_activation()
	{
		$wcps_version= "1.2";
		update_option('wcps_version', $wcps_version); //update plugin version.
		
		$wcps_customer_type= "free"; //customer_type "free"
		update_option('wcps_customer_type', $wcps_customer_type); //update plugin version.

	}


function wcps_display($atts, $content = null ) {
		$atts = shortcode_atts(
			array(
				'id' => "",

				), $atts);


			$post_id = $atts['id'];

			$wcps_themes = get_post_meta( $post_id, 'wcps_themes', true );

			$wcps_display ="";

			if($wcps_themes== "flat")
				{
					$wcps_display.= wcps_body_flat($post_id);
				}
				
			else if($wcps_themes== "rossi")
				{
					$wcps_display.= wcps_body_rossi($post_id);
				}				
				
			else if($wcps_themes== "saiga")
				{
					$wcps_display.= wcps_body_saiga($post_id);
				}
			else if($wcps_themes== "sako")
				{
					$wcps_display.= wcps_body_sako($post_id);
				}
				
			else if($wcps_themes== "ruger")
				{
					$wcps_display.= wcps_body_ruger($post_id);
				}				
				
			else if($wcps_themes== "anti-ruger")
				{
					$wcps_display.= wcps_body_anti_ruger($post_id);
				}				
				

return $wcps_display;



}

add_shortcode('wcps', 'wcps_display');









add_action('admin_menu', 'wcps_menu_init');


	
function wcps_menu_help(){
	include('wcps-help.php');	
}


function wcps_menu_settings(){
	include('wcps-settings.php');	
}



function wcps_menu_init() {


	add_submenu_page('edit.php?post_type=wcps', __('Settings','menu-wpt'), __('Settings','menu-wpt'), 'manage_options', 'wcps_menu_settings', 'wcps_menu_settings');	
		
	add_submenu_page('edit.php?post_type=wcps', __('Help & Upgrade','menu-wpt'), __('Help & Upgrade','menu-wpt'), 'manage_options', 'wcps_menu_help', 'wcps_menu_help');
	
	

	
	
	
	
}




























//Only for Pro version


		$wcps_customer_type = get_option('wcps_customer_type');

		if($wcps_customer_type=="pro")
			{
				
	
				
				
				//Update
				
				
				set_site_transient('update_plugins', null);
				
				// TEMP: Show which variables are being requested when query plugin API
				add_filter('plugins_api_result', 'wcps_notice_result', 10, 3);
				function wcps_notice_result($res, $action, $args) {
					return $res;
				}
				// NOTE: All variables and functions will need to be prefixed properly to allow multiple plugins to be updated
				
				
				
				$api_url = 'http://pricing-table.com/api/';
				$plugin_slug = basename(dirname(__FILE__));
				
				
				// Take over the update check
				add_filter('pre_set_site_transient_update_plugins', 'wcps_check_for_plugin_update');
				
				function wcps_check_for_plugin_update($checked_data) {
					global $api_url, $plugin_slug, $wp_version;
					
					//Comment out these two lines during testing.
					if (empty($checked_data->checked))
						return $checked_data;
					
					$args = array(
						'slug' => $plugin_slug,
						'version' => $checked_data->checked[$plugin_slug .'/'.$plugin_slug.'.php'],
					);
					$request_string = array(
							'body' => array(
								'action' => 'basic_check', 
								'request' => serialize($args),
								'api-key' => md5(get_bloginfo('url'))
							),
							'user-agent' => 'WordPress/' . $wp_version . '; ' . get_bloginfo('url'),
							'wcps_order_id' =>  get_option( 'wcps_order_id' ),
							'wcps_order_email' =>  get_option( 'wcps_order_email' ),
							
						);
					
					// Start checking for an update
					$raw_response = wp_remote_post($api_url, $request_string);
					
					if (!is_wp_error($raw_response) && ($raw_response['response']['code'] == 200))
						$response = unserialize($raw_response['body']);
					
					if (is_object($response) && !empty($response)) // Feed the update data into WP updater
						$checked_data->response[$plugin_slug .'/'. $plugin_slug .'.php'] = $response;
					
					update_option('wcps_customer_apikey', $response); //update api.
					
					
					
					
					return $checked_data;
				}
				
				
				// Take over the Plugin info screen
				add_filter('plugins_api', 'wcps_plugin_api_call', 10, 3);
				
				function wcps_plugin_api_call($def, $action, $args) {
					global $plugin_slug, $api_url, $wp_version;
					
					if ($args->slug != $plugin_slug)
						return false;
					
					// Get the current version
					$plugin_info = get_site_transient('update_plugins');
					$current_version = $plugin_info->checked[$plugin_slug .'/'. $plugin_slug .'.php'];
					$args->version = $current_version;
					
					$request_string = array(
							'body' => array(
								'action' => $action, 
								'request' => serialize($args),
								'api-key' => md5(get_bloginfo('url'))
							),
							'user-agent' => 'WordPress/' . $wp_version . '; ' . get_bloginfo('url')
						);
					
					$request = wp_remote_post($api_url, $request_string);
					
					if (is_wp_error($request)) {
						$res = new WP_Error('plugins_api_failed', __('An Unexpected HTTP Error occurred during the API request.</p> <p><a href="?" onclick="document.location.reload(); return false;">Try again</a>'), $request->get_error_message());
					} else {
						$res = unserialize($request['body']);
						
						
						
						
						if ($res === false)
							$res = new WP_Error('plugins_api_failed', __('An unknown error occurred'), $request['body']);
					}
					
					return $res;
				}

			}





?>