<?php
/**
 * @package EvaldasPlugin
 */

/*
Plugin Name: Evaldas WP Plugin
Plugin URI: http://
Description: My first WP plugin
Version: 1.0.0
Author: Evaldas Vaitonis
Author URI: http://
License: GPLv3 or later
Text Domain: Evaldas WP Plugin
 */

/*
Evaldas WP Plugin stores and allows to view person's name, lastname, date of birth and address

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

 */

defined('ABSPATH') or die('You\'re not allowed to access this place');

define( 'EVALDAS__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once (EVALDAS__PLUGIN_DIR. 'class.evaldasplugin.php');


if(class_exists('EvaldasPlugin')) {
    $pluginInstance = new EvaldasPlugin();
}

register_activation_hook(__FILE__, array($pluginInstance,'activate'));

register_activation_hook(__FILE__, array($pluginInstance,'deactivate'));

register_activation_hook( __FILE__, array($pluginInstance,'evaldas_plugin_create_db'));

add_shortcode('user_data_input', array($pluginInstance,'create_form'));

add_action('wp_enqueue_scripts', array($pluginInstance, 'callback_for_setting_up_scripts'));




