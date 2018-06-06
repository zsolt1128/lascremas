<?php
if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Manages custom design settings
 *
 * Here custom design settings are defined and managed.
 *
 * @version		1.1.4
 * @package		post-type-x/core/functions
 * @author 		impleCode
 */
function design_menu() {
	?>
	<a id="design-settings" class="nav-tab" href="<?php echo admin_url( 'edit.php?post_type=al_product&page=product-settings.php&tab=design-settings&submenu=archive-design' ) ?>"><?php _e( 'Catalog Design', 'post-type-x' ); ?></a>
	<?php
}

add_action( 'settings-menu', 'design_menu', 40 );

function design_settings() {
	register_setting( 'product_design', 'archive_template' );
	register_setting( 'product_design', 'modern_grid_settings' );
	register_setting( 'product_design', 'classic_grid_settings' );
	register_setting( 'product_design', 'classic_list_settings' );
	register_setting( 'single_design', 'catalog_lightbox' );
	register_setting( 'single_design', 'multi_single_options' );
	register_setting( 'single_design', 'default_product_thumbnail' );
	register_setting( 'design_schemes', 'design_schemes' );
}

add_action( 'product-settings-list', 'design_settings' );

function custom_design_content() {
	?>
	<div class="design-product-settings settings-wrapper">
		<div class="settings-submenu">
			<h3>
				<a id="archive-design" class="element current" href="<?php echo admin_url( 'edit.php?post_type=al_product&page=product-settings.php&tab=design-settings&submenu=archive-design' ) ?>"><?php _e( 'Listing Design', 'post-type-x' ); ?></a>
				<a id="single-design" class="element" href="<?php echo admin_url( 'edit.php?post_type=al_product&page=product-settings.php&tab=design-settings&submenu=single-design' ) ?>"><?php _e( 'Single Page Design', 'post-type-x' ); ?></a>
				<a id="design-schemes" class="element" href="<?php echo admin_url( 'edit.php?post_type=al_product&page=product-settings.php&tab=design-settings&submenu=design-schemes' ) ?>"><?php _e( 'Design Schemes', 'post-type-x' ); ?></a>
				<?php do_action( 'custom-design-submenu' ); ?>
			</h3>
		</div>
		<div class="setting-content submenu"><?php do_action( 'custom-design-settings' ); ?>
		</div>
		<div class="helpers"><div class="wrapper"><?php
				main_helper();
				$submenu = $_GET[ 'submenu' ];
				if ( $submenu == 'single-design' ) {
					doc_helper( __( 'gallery', 'post-type-x' ), 'product-gallery' );
				}
				?>
			</div></div>
	</div>
	<?php
}

add_action( 'custom-design-settings', 'archive_custom_design' );

function archive_custom_design() {
	//$tab	 = $_GET[ 'tab' ];
	$submenu = $_GET[ 'submenu' ];
	if ( $submenu == 'archive-design' ) {
		?>
		<script>
			jQuery( '.settings-submenu a' ).removeClass( 'current' );
			jQuery( '.settings-submenu a#archive-design' ).addClass( 'current' );
		</script>
		<h2><?php _e( 'Design Settings', 'post-type-x' ); ?></h2>
		<form method="post" action="options.php">
			<?php
			settings_fields( 'product_design' );
			ic_listing_design_settings();
			?>
			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save changes', 'post-type-x' ); ?>" />
			</p>
		</form>
		<?php
	}
}

function ic_listing_design_settings() {
	$archive_template		 = get_product_listing_template();
	$modern_grid_settings	 = get_modern_grid_settings();
	$classic_grid_settings	 = get_classic_grid_settings();
	$classic_list_settings	 = get_classic_list_settings();
	$item_name				 = ic_catalog_item_name();
	do_action( 'listing_design_settings_start', $archive_template, $modern_grid_settings, $classic_grid_settings, $classic_list_settings, $item_name );
	?>
	<h3><?php _e( 'Listing Design', 'post-type-x' ); ?></h3>
	<table class="design-table">
		<thead></thead>
		<tbody>
			<tr id="default-theme">
				<td class="with-additional-styling theme-name">
					<input type="radio" name="archive_template" value="default" <?php checked( 'default' == $archive_template ); ?>><?php _e( 'Modern Grid', 'post-type-x' ); ?></td>
				<td rowspan="2" class="theme-example"><?php example_default_archive_theme(); ?></td>
			</tr>
			<tr>
				<td class="additional-styling">
					<strong><?php _e( 'Additional Settings', 'post-type-x' ); ?></strong><br>
					<?php _e( 'Per row', 'post-type-x' ) ?>: <input type="number" min="1" max="5" step="1" class="number_box" name="modern_grid_settings[per-row]" value="<?php echo $modern_grid_settings[ 'per-row' ] ?>"><?php echo $item_name ?><br>
					<?php _e( 'Per row', 'post-type-x' ) ?>: <input type="number" min="1" max="5" step="1" class="number_box" name="modern_grid_settings[per-row-categories]" value="<?php echo $modern_grid_settings[ 'per-row-categories' ] ?>"><?php _e( 'categories', 'post-type-x' ); ?><br>
					<?php
					do_action( 'modern_grid_additional_settings', $modern_grid_settings, 'modern_grid' );
					?>
				</td>
			</tr>
			<tr><td colspan="2" class="separator"></td></tr>
			<tr id="list-theme">
				<td class="with-additional-styling theme-name"><input type="radio" name="archive_template" value="list" <?php checked( 'list' == $archive_template ); ?>><?php _e( 'Classic List', 'post-type-x' ); ?></td>
				<td rowspan="2" class="theme-example"><?php example_list_archive_theme(); ?></td>
			</tr>
			<tr>
				<td class="additional-styling">
					<strong><?php _e( 'Additional Settings', 'post-type-x' ); ?></strong><br>
					<?php
					do_action( 'classic_list_additional_settings', $classic_list_settings, 'classic_list' );
					?>
				</td>
			</tr>
			<tr><td colspan="2" class="separator"></td></tr>
			<tr id="grid-theme">
				<td class="with-additional-styling theme-name">
					<input type="radio" name="archive_template" value="grid" <?php checked( 'grid' == $archive_template ); ?>><?php _e( 'Classic Grid', 'post-type-x' ); ?></td>
				<td rowspan="2" class="theme-example"><?php example_grid_archive_theme(); ?></td>
			</tr>
			<tr>
				<td class="additional-styling">
					<strong><?php _e( 'Additional Settings', 'post-type-x' ); ?></strong><br>
					<?php _e( 'Per row', 'post-type-x' ) ?>: <input type="number" min="1" step="1" class="number_box" title="<?php _e( 'The product listing element width will adjust accordingly to your theme content width.', 'post-type-x' ) ?>" name="classic_grid_settings[entries]" value="<?php echo $classic_grid_settings[ 'entries' ] ?>"><?php echo $item_name ?><br>
					<?php _e( 'Per row', 'post-type-x' ) ?>: <input type="number" min="1" step="1" class="number_box" title="<?php _e( 'The product listing element width will adjust accordingly to your theme content width.', 'post-type-x' ) ?>" name="classic_grid_settings[per-row-categories]" value="<?php echo $classic_grid_settings[ 'per-row-categories' ] ?>"><?php _e( 'categories', 'post-type-x' ); ?><br>
					<?php
					do_action( 'classic_grid_additional_settings', $classic_grid_settings, 'classic_grid' );
					?>
				</td>
			</tr>
			<tr><td colspan="2" class="separator"></td></tr>
			<?php do_action( 'product_listing_theme_settings', $archive_template ) ?>
		</tbody>
	</table>
	<?php
}

add_action( 'custom-design-settings', 'single_custom_design' );

function single_custom_design() {
	$tab	 = $_GET[ 'tab' ];
	$submenu = $_GET[ 'submenu' ];
	if ( $submenu == 'single-design' ) {
		?>
		<script>
			jQuery( '.settings-submenu a' ).removeClass( 'current' );
			jQuery( '.settings-submenu a#single-design' ).addClass( 'current' );
		</script>
		<form method="post" action="options.php">
			<?php
			settings_fields( 'single_design' );
			ic_product_page_design_settings();
			?>
			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save changes', 'post-type-x' ); ?>" />
			</p>
		</form>
		<?php
	}
}

function ic_product_page_design_settings() {
	$enable_catalog_lightbox = get_option( 'catalog_lightbox', 1 );
	$single_options			 = get_product_page_settings();
	?>
	<h2><?php _e( 'Design Settings', 'post-type-x' ); ?></h2>
	<?php do_action( 'page_design_settings_start', $single_options, $enable_catalog_lightbox ); ?>
	<h3><?php _e( 'Default Product Image', 'post-type-x' ); ?></h3><?php
	implecode_upload_image( __( 'Upload Default Image', 'post-type-x' ), 'default_product_thumbnail', get_default_product_image_src() )
	?>
	<h3><?php _e( 'Product Gallery', 'post-type-x' ); ?></h3>
	<table>
		<?php
		implecode_settings_checkbox( __( 'Enable image', 'post-type-x' ), 'multi_single_options[enable_product_gallery]', $single_options[ 'enable_product_gallery' ], 1, __( 'The image will be used only on the listing when unchecked.', 'post-type-x' ) );
		implecode_settings_checkbox( __( 'Enable lightbox gallery', 'post-type-x' ), 'catalog_lightbox', $enable_catalog_lightbox, 1, __( 'The image on single page will not be linked when unchecked.', 'post-type-x' ) );
		implecode_settings_checkbox( __( 'Enable image only when inserted', 'post-type-x' ), 'multi_single_options[enable_product_gallery_only_when_exist]', $single_options[ 'enable_product_gallery_only_when_exist' ], 1, __( 'The default image will be used on the listing only when unchecked.', 'post-type-x' ) );
		do_action( 'ic_product_gallery_settings', $single_options );
		?>
	</table>
	<h3><?php _e( 'Single Page Template', 'post-type-x' ) ?></h3>
	<table>
		<?php
		implecode_settings_radio( __( 'Select template', 'post-type-x' ), 'multi_single_options[template]', $single_options[ 'template' ], array( 'boxed' => __( 'Formatted', 'post-type-x' ), 'plain' => __( 'Plain', 'post-type-x' ) ) );
		?>
	</table>
	<?php
	do_action( 'single_product_design' );
}

function color_schemes() {
	$tab	 = $_GET[ 'tab' ];
	$submenu = $_GET[ 'submenu' ];
	if ( $submenu == 'design-schemes' ) {
		?>
		<script>
			jQuery( '.settings-submenu a' ).removeClass( 'current' );
			jQuery( '.settings-submenu a#design-schemes' ).addClass( 'current' );
		</script>
		<form method="post" action="options.php">
			<?php
			settings_fields( 'design_schemes' );
			$design_schemes = ic_get_design_schemes();
			?>
			<h2><?php _e( 'Design Settings', 'post-type-x' ); ?></h2>
			<h3><?php _e( 'Design Schemes', 'post-type-x' ); ?></h3>
			<div class="al-box info"><p><?php _e( "Changing design schemes has almost always impact on various elements. For example changing price color has impact on single product page and archive page price color.", 'post-type-x' ); ?></p><p><?php _e( 'You can figure it out by checking "impact" column.', 'post-type-x' ); ?></p></div>
			<table style="clear:right" class="wp-list-table widefat product-settings-table">
				<thead><tr>
						<th><strong><?php _e( 'Setting', 'post-type-x' ); ?></strong></th>
						<th><strong><?php _e( 'Value', 'post-type-x' ); ?></strong></th>
						<th><strong><?php _e( 'Example Effect', 'post-type-x' ); ?></strong></th>
						<th><strong><?php _e( 'Impact', 'post-type-x' ); ?></strong></th>
					</tr></thead>
				<tbody>
					<?php do_action( 'inside_color_schemes_settings_table', $design_schemes ) ?>
					<tr>
						<td><?php _e( 'Boxes Color', 'post-type-x' ); ?></td>
						<td>
							<select id="box_schemes" name="design_schemes[box-color]">
								<option name="design_schemes[red-box]" value="red-box"<?php selected( 'red-box', $design_schemes[ 'box-color' ] ); ?>><?php _e( 'Red', 'post-type-x' ); ?></option>
								<option name="design_schemes[orange-box]" value="orange-box"<?php selected( 'orange-box', $design_schemes[ 'box-color' ] ); ?>><?php _e( 'Orange', 'post-type-x' ); ?></option>
								<option name="design_schemes[green-box]" value="green-box"<?php selected( 'green-box', $design_schemes[ 'box-color' ] ); ?>><?php _e( 'Green', 'post-type-x' ); ?></option>
								<option name="design_schemes[blue-box]" value="blue-box"<?php selected( 'blue-box', $design_schemes[ 'box-color' ] ); ?>><?php _e( 'Blue', 'post-type-x' ); ?></option>
								<option name="design_schemes[grey-box]" value="grey-box"<?php selected( 'grey-box', $design_schemes[ 'box-color' ] ); ?>><?php _e( 'Grey', 'post-type-x' ); ?></option>
							</select>
						</td>
						<td><div class="product-name example <?php design_schemes( 'box' ); ?>">Exclusive Red Lamp</div></td>
						<td><?php _e( 'product archive title', 'post-type-x' ); ?>, <?php _e( 'archive pagination', 'post-type-x' ); ?></td>
					</tr>
				</tbody>
			</table>
			<?php do_action( 'color_schemes_settings' ); ?>
			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save changes', 'post-type-x' ); ?>" />
			</p>
		</form>
		<?php
	}
}

add_action( 'custom-design-settings', 'color_schemes' );

function ic_get_design_schemes() {
	$design_schemes					 = get_option( 'design_schemes' );
	$design_schemes[ 'price-color' ] = isset( $design_schemes[ 'price-color' ] ) ? $design_schemes[ 'price-color' ] : 'red-price';
	$design_schemes[ 'price-size' ]	 = isset( $design_schemes[ 'price-size' ] ) ? $design_schemes[ 'price-size' ] : 'big-price';
	$design_schemes[ 'box-color' ]	 = isset( $design_schemes[ 'box-color' ] ) ? $design_schemes[ 'box-color' ] : 'green-box';
	return $design_schemes;
}

function get_default_product_image_src() {
	$default_image	 = AL_PLUGIN_BASE_PATH . 'img/no-default-thumbnail.png';
	$defined_image	 = get_option( 'default_product_thumbnail' );
	$defined_image	 = empty( $defined_image ) ? $default_image : $defined_image;
	return $defined_image;
}

function get_modern_grid_settings() {
	$settings = wp_parse_args( get_option( 'modern_grid_settings' ), array( 'attributes' => 0, 'per-row' => 2, 'per-row-categories' => 2, 'attributes_num' => 6 ) );
	return $settings;
}

function get_product_page_settings() {
	$single_options												 = get_option( 'multi_single_options', array(
		'enable_product_gallery' => 1,
		'template'				 => 'boxed'
	) );
	$single_options[ 'enable_product_gallery' ]					 = isset( $single_options[ 'enable_product_gallery' ] ) ? $single_options[ 'enable_product_gallery' ] : '';
	$single_options[ 'enable_product_gallery_only_when_exist' ]	 = isset( $single_options[ 'enable_product_gallery_only_when_exist' ] ) ? $single_options[ 'enable_product_gallery_only_when_exist' ] : '';
	$single_options[ 'template' ]								 = isset( $single_options[ 'template' ] ) ? $single_options[ 'template' ] : 'boxed';
	return apply_filters( 'ic_product_page_settings', $single_options );
}

/**
 * Returns currently selected product listing settings
 *
 * @return type
 */
function get_current_product_listing_settings() {
	$archive_template	 = get_product_listing_template();
	$settings			 = '';
	if ( $archive_template == 'default' ) {
		$settings = get_modern_grid_settings();
	} else if ( $archive_template == 'grid' ) {
		$settings = get_classic_grid_settings();
	} else if ( $archive_template == 'list' ) {
		$settings = get_classic_list_settings();
	}
	return apply_filters( 'current_product_listing_settings', $settings, $archive_template );
}

/**
 * Returns currently selected listing design per row for categories
 *
 * @return int
 */
function get_current_category_per_row() {
	$settings = get_current_product_listing_settings();
	if ( !empty( $settings[ 'per-row-categories' ] ) ) {
		return $settings[ 'per-row-categories' ];
	}
	return '';
}
