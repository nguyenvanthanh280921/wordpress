<?php
/*
 * Plugin Name: Demo Plugin
 * Description: Demo plugin wordpress admin
 * Plugin URI: http://www.thanhnguyen.vn
 * Author: ThanhNV
 * Author URI: http://www.thanhnguyen.vn
 * version: 1.0.0
 * License: GPL2
*/
defined('ABSPATH') or die('Stop!');

class Demo{
    public function __construct()
    {
        $this->options = get_option('demo', []);
        $this->plugin_file = __FILE__;
        register_activation_hook($this->plugin_file, array(&$this, 'demo_init'));
        defined('DS') || define('DS', DIRECTORY_SEPARATOR);
        defined('UPLOADS_DIR') || define('UPLOADS_DIR', wp_upload_dir()['basedir']);
        defined('ILSAS_VERSION') || define('ILSAS_VERSION', time() );
        defined('ILSAS_PLUGIN_DIR') || define('ILSAS_PLUGIN_DIR', plugin_dir_path(__FILE__));
        defined('ILSAS_PLUGIN_URL') || define('ILSAS_PLUGIN_URL', plugin_dir_url(__FILE__));
        defined('ILSAS_PLUGIN_BASENAME') || define('ILSAS_PLUGIN_BASENAME', plugin_basename(__FILE__));
        defined('ILSAS_TRANSLATE_DOMAIN') || define('ILSAS_TRANSLATE_DOMAIN', 'ilsas');


        add_action('admin_menu', array($this , 'demo_admin_menu'), 1);
        add_action('admin_init', array($this , 'demo_init'), 1);

    }
    public function demo_init(){
        $this->defaults = array();
        if (!$this->options):
            $this->options = $this->defaults;
            add_option('demo', $this->options);
        endif;
    }
    public function deactivate_and_die($file)
    {
        $message = sprintf(__('ILSAs has been automatically deactivated because the file <strong>%s</strong> is missing. Please reinstall the plugin and reactivate.'),
            $file);
        if (!function_exists('deactivate_plugins')):
            include ABSPATH . 'wp-admin/includes/plugin.php';
        endif;
        deactivate_plugins(__FILE__);
        wp_die($message);
    }

    public function demo_admin_menu(){
        add_menu_page('Demo', 'Demo Setting', 'manage_options','demo_setting',array(&$this, 'demo_setting_content'));
        add_submenu_page( 'demo_setting', 'Manager Page', 'Manager Page', 'manage_options', 'list-settings', array(&$this, 'demo_page_content'));
        add_submenu_page( 'demo_setting', 'Manager Detail', 'Manager Detail', 'manage_options', 'detail-settings', array(&$this, 'detail_content'));
        add_submenu_page( 'demo_setting', 'Manager Add', 'Manager Add', 'manage_options', 'add-settings', array(&$this, 'add_content'));

    }

    public function demo_setting_content(){
        if(isset($_GET['tab']) && $_GET['tab'] == 'payment_setting'){
            include_once 'payment-amount-setting.php';
        }else{
            include_once 'demo-setting.php';
        }
    }
    public function demo_page_content(){
        include_once 'manager/demo-manager.php';
    }
    public function detail_content(){
        include_once 'manager/detail-manager.php';
    }
    public function add_content(){
        include_once 'manager/add_manager.php';
    }

}
$demo = new Demo;