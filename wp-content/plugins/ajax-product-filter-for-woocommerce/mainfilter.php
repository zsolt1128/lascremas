<?php 
/* Plugin Name:Ajax Product Filter for Woocommerce

* Plugin URI: https://www.phoeniixx.com/product/ajax-product-filter-woocommerce/

* Description: Ajax based product filter based on product attributes. 

* Version: 1.8

* Author: phoeniixx

* Author URI: http://www.phoeniixx.com/

* License: GPLv2 or later

* Text Domain:phoen-ajax-product-Filter

* License URI: http://www.gnu.org/licenses/gpl-2.0.html

* WC requires at least: 2.6.0

* WC tested up to: 3.2.1

*/


if ( ! defined( 'ABSPATH' ) ) exit;

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) 
{

	include(dirname(__FILE__).'/libs/execute-libs.php');	

	function function_mainfilter(){
		
		wp_enqueue_script( 'wp-color-picker' );
		
		wp_enqueue_style( 'wp-color-picker' );
		
	}
	
	add_action('admin_menu', 'phoe_Ajax_Product_Filter_menu');
	
	function phoe_Ajax_Product_Filter_menu() {
		
		add_menu_page('Ajax_Product_Filter', 'Ajax Product Filter' ,'manage_options','Ajax_Product_Filter','phoe_Ajax_Product_Filter', plugin_dir_url( __FILE__ ).'assets/images/aa2.png' ,'57.1');
		
	} 
	
	
	function phoen_ajx_prod_how_to_install_plugin()
	{
			?>
		<script>
		//window.location = 'http://sushil.codiixx.com/wp-admin/admin.php?page=Ajax_Product_Filter&tab=how_to_instal_ajx';  //your page location
		</script> 
		<?php
	}

	
	function phoe_Ajax_Product_Filter() {  ?>
		
		<div id="profile-page" class="wrap">
	
			<?php
				
			if(isset($_GET['tab']))
					
			{
				$tab = sanitize_text_field( $_GET['tab'] );
				
			}
			
			else
				
			{
				
				$tab="";
				
			}
			
			?>
			<h2> <?php _e('Ajax Product Filter','phoen-ajax-product-Filter'); ?></h2>
			
			<?php $tab = (isset($_GET['tab']))?$_GET['tab']:'';?>
			
			<h2 class="nav-tab-wrapper woo-nav-tab-wrapper">
			
				<a class="nav-tab <?php if($tab == 'ajax_setting' || $tab == ''){ echo esc_html( "nav-tab-active" ); } ?>" href="?page=Ajax_Product_Filter&amp;tab=ajax_setting"><?php _e('Setting','Ajax_Product_Filter'); ?></a>
				
				<a class="nav-tab <?php if($tab == 'premium_setting' ){ echo esc_html( "nav-tab-active" ); } ?>" href="?page=Ajax_Product_Filter&amp;tab=premium_setting"><?php _e('Premium','Ajax_Product_Filter'); ?></a>

			</h2>
			
		</div>
		
		<?php
		
		if($tab=='ajax_setting'|| $tab == '' ) 
		{
			
			include_once(plugin_dir_path(__FILE__).'includes/pagesetting.php');
									
		} 
		
		if($tab=='premium_setting' )
		{
			
			include_once(plugin_dir_path(__FILE__).'includes/premiumsetting.php');
									
		}		
			
	}

	include_once(plugin_dir_path(__FILE__).'widget/product_widget.php');			
		
}
	function phoe_loader_ajax_filter_display() {     
		?>

		<div class="phoeniixx_ajax_filter_loader_html" style="display:none;" > 
		
			<div class="phoeniixx_ajax_filter_loader_html_main" style="display:none;" >
			
				<div id="phoeniixx_ajax_filter_loader" style="display:none;">
			
					<div id="phoeniixx_ajax_filter_disp" >
				
						<img height ='100px' width='100px' src="<?php echo plugin_dir_url( __FILE__ ).'assets/images/loading_spinner.gif' ;?>">
				
					</div>
				
				</div>
				
			</div>
		</div>	
		
		<?php
	}
	register_activation_hook( __FILE__,'activate_ajax_reg');
function activate_ajax_reg()
{
	
	$gen_settings = get_option('phoe_Ajax_Product_Filter_value');
			
			$enable_ajax=isset($gen_settings['enable_ajax'])?$gen_settings['enable_ajax']:'';
			
			$content_Selector=isset($gen_settings['content_Selector'])?$gen_settings['content_Selector']:'.products';
			
			$next_Selector=isset($gen_settings['next_Selector'])?$gen_settings['next_Selector']:'.next';
			
			$item_Selector=isset($gen_settings['item_Selector'])?$gen_settings['item_Selector']:'.product';
			
			$product_shown=isset($gen_settings['product_shown'])?$gen_settings['product_shown']:'';
	
	if($content_Selector=='')
	{
		$content_Selector=".products";
	}
	
	if($next_Selector=='')
	{
		$next_Selector=".next";
	}
	
	
	if($item_Selector=='')
	{
		$item_Selector=".product";
	}
	$phoe_Ajax_Product_Filter_value = array(
		
		'enable_ajax'=>1,
		
		'content_Selector'=>$content_Selector,
		
		'next_Selector'=>$next_Selector,
		
		'item_Selector'=>$item_Selector
		
		
		);
		
		update_option('phoe_Ajax_Product_Filter_value',$phoe_Ajax_Product_Filter_value);
		
	}
	
	

	// Adding Preloader Active jQuery
	function phoeniixx_ajax_filter_loader_js() { 		?>

		<style>
		#phoeniixx_ajax_filter_loader{
				
			left: 50%;
			
			position: absolute;
			
			top: 50%;
			
			transform: translate(-50%,-50%);
			
			z-index: 9;
			
			background-color:red;
		}
			
		.products {
			
			position: relative;
		}
	
		.phoeniixx_ajax_filter_loader_html_main {
			
			background: rgba(255, 255, 255, 0.8) none repeat scroll 0 0;
			
			bottom: 0;
			
			left: 0;
			
			position: absolute;
			
			right: 0;
			
			top: 0;
		}
		</style>

		<?php	
	}

	add_action( 'woocommerce_before_shop_loop', 'phoe_loader_ajax_filter_display');
		
	add_action('woocommerce_before_shop_loop' , 'phoeniixx_ajax_filter_loader_js');
	
?>
