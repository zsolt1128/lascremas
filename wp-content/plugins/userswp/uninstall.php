<?php
/**
 * Uninstall UsersWP
 *
 * Uninstalling UsersWP deletes tables and plugin options.
 *
 * @package userswp
 * @since 1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit;
}

global $wpdb;

if ( !class_exists( 'UsersWP' ) ) {
    // Load plugin file.
    include_once( 'userswp.php' );
}

if ( uwp_get_option('uninstall_erase_data') == '1' ) {
    $wpdb->hide_errors();
    
    // Delete options
    delete_option('uwp_settings');
    delete_option('uwp_activation_redirect');
    delete_option('uwp_flush_rewrite');
    delete_option('uwp_default_data_installed');
    //delete_option('uwp_db_version');


    $table_name = uwp_get_table_prefix() . 'uwp_form_fields';
    $rows = $wpdb->get_results("select * from " . $table_name . "");

    // Delete user meta for all users
    $meta_type  = 'user';
    $user_id    = 0; // This will be ignored, since we are deleting for all users.
    $meta_key   = 'uwp_usermeta';
    $meta_value = ''; // Also ignored. The meta will be deleted regardless of value.
    $delete_all = true;

    foreach ($rows as $row) {
        delete_metadata( $meta_type, $user_id, $row->htmlvar_name, $meta_value, $delete_all );
    }

    // Drop tables.
    // Drop form fields table
    $table_name = uwp_get_table_prefix() . 'uwp_form_fields';
    $sql = "DROP TABLE IF EXISTS $table_name";
    $wpdb->query($sql);

    // Drop form extras table
    $extras_table_name = uwp_get_table_prefix() . 'uwp_form_extras';
    $sql = "DROP TABLE IF EXISTS $extras_table_name";
    $wpdb->query($sql);

    // Drop usermeta table
    $meta_table_name = uwp_get_table_prefix() . 'uwp_usermeta';
    $sql = "DROP TABLE IF EXISTS $meta_table_name";
    $wpdb->query($sql);

}