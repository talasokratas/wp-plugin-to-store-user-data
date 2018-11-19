<?php

class EvaldasPlugin
{
   function __construct() {

   }

    function activate() {

       $this->custom_post_type();

       flush_rewrite_rules();
    }

    function  deactivate() {

       flush_rewrite_rules();
    }

    function uninstall() {

    }

    function custom_post_type () {
        register_post_type('profile', ['public'=> true, 'label' => 'User\'s Profile by Evaldas']);
    }

    function evaldas_plugin_create_db() {

        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();
        $table_name = $wpdb->prefix . 'evaldas_users';

        $sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		name varchar(16) NOT NULL,
		lastname varchar(16) NOT NULL,
		birthdate datetime DEFAULT '0000-00-00' NOT NULL,
		address varchar (30) NOT NULL,
		UNIQUE KEY id (id)
	) $charset_collate;";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    }

    function create_form(){
        require_once (EVALDAS__PLUGIN_DIR . '/views/create.php');
    }

    function callback_for_setting_up_scripts() {
        wp_enqueue_script( 'script', plugins_url('js/script.js', __FILE__),  'jquery', null, true);
    }


}