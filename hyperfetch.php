<?php

/**
 * @package  HyperFetchPlugin
 */

/*
 Plugin Name: HyperFetch Plugin
 Plugin URI: http://www.userspace.org
 Description: Creates dynamic HTML loading areas with nav and sub-menu controls.
 Version: 0.8.5
 Author:  Daniel Yount IcarusFactor
 Author URI: http://www.userspace.org
 License: GPLv2 or later
 Text Domain: hyperfetch-plugin
 */

/*
 This program is free software; you can redistribute it and/or
 modify it under the terms of the GNU General Public License
 as published by the Free Software Foundation; either version 2
 of the License, or (at your option) any later version.
 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.
 You should have received a copy of the GNU General Public License
 along with this program; if not, write to the Free Software
 Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */
defined('ABSPATH')or die('Hey, what are you doing here? You silly human!');
if(!class_exists('HyperFetchPlugin')) {

    class HyperFetchPlugin {
        public $plugin;
        private $switchbox;

        function __construct() {
            $this->plugin = plugin_basename(__FILE__);
            global $switchbox;
            $switchbox =[[]];
        }

        public function __destruct() {
            unset($switchbox);
        }

        function register() {
            wp_enqueue_script('jquery');
            //add_action( 'admin_enqueue_scripts', array( $this, 'hyft_enqueue' ) );              
            add_action('wp_enqueue_scripts', array($this, 'hyft_enqueue'), 99999);
            add_action('admin_menu', array($this, 'add_admin_pages'));
            add_filter("plugin_action_links_$this->plugin", array($this, 'settings_link'));
        }

        public function settings_link($links) {
            $settings_link = '<a href="admin.php?page=hyperfetch_plugin">Settings</a>';
            array_push($links, $settings_link);
            return $links;
        }

        public function add_admin_pages() {
            add_menu_page('hyft', 'Hyper Fetch', 'manage_options', 'hyperfetch_plugin', array($this, 'admin_index'), 'dashicons-store', 110);
        }

        public function admin_index() {
            require_once plugin_dir_path(__FILE__). 'templates/admin.php';
        }

        function hyft_enqueue() {
            // enqueue all our scripts        
            wp_enqueue_script('hyftpluginscript', plugins_url('/assets/hyftscript.js', __FILE__));
        }

        function activate() {
            require_once plugin_dir_path(__FILE__). 'inc/hyperfetch-plugin-activate.php';
            HyperFetchPluginActivate::activate();
        }
    }

    function hyperswitch_insert($atts) {
        global $switchbox;     
        /*Parse attributes */
        $a = shortcode_atts(array('tag' => 'DISTRO', 'menu' => '1', 'url' => '', 'img' => ''), $atts);
        $tag = $a['tag'];
        $item_bar = $a['menu'];
        $site_url = $a['url'];
        $img_url = $a['img'];
        array_push($switchbox, $tag, $item_bar, $site_url, $img_url);
    }
    
    function hyperfetch_insert($atts, $content = null) {
        global $switchbox;
        //Make sure  switch box is clear when starting a new fetch.
        $switchbox =[[]];
        //Parse attributes 
        $a = shortcode_atts(array('class' => 'collections', 'initid' => - 1, 'controlsid' => 'work', 'containerid' => 'works', 'submenuid' => '', 'loadbr' => 6), $atts);        
        /*    Add js click listener   */
        $ctrls_class = $a['class'];
        $ctrls_id = $a['controlsid'];
        $container_id = $a['containerid'];
        $loading_br = $a['loadbr'];
        $subitem_id = $a['submenuid'];        
        /* Process global hyperswitch data*/
        do_shortcode($content);        
        /* Setup dynamic click event listener */
        ob_start("callback");        
        ?>               
              <!--  START HYPERFETCH  -->
             <script type="text/javascript" >               
$(document).ready(function(){
 /*  init element to hold image if used.   */  
 var el = "";   
    
$(".<?php
        echo $ctrls_class 
        ?>").click(function(e){
e.stopImmediatePropagation();
e.preventDefault();
switch(e.target.id) { 
<?php
        $max_items = 4;
        $count = 1;
        while($count < count($switchbox)) {            
            ?>
case "<?php
            echo $switchbox[$count] 
            ?>":
embedapp(  "<?php   echo $switchbox[$count + 2]  ?>" ,  "<?php  echo $switchbox[$count + 1] ?>" ,   "<?php echo $container_id ?>" , "<?php echo $ctrls_id ?>"  ,  "<?php echo $loading_br ?>"   ,  "<?php echo $subitem_id ?>"  ); 
return false;
break;                 
<?php
            $count = $count + $max_items;
        }        
        ?>
default:  
return false; 
            }  
             });     
 <?php
        $max_items = 4;
        $count = 1;
        while($count < count($switchbox)) {            
            ?>
 /* Check if image is used.*/ 
<?php
            if(strlen($switchbox[$count + 3])>= 5) {                
                ?>       
el = document.getElementById(  "<?php
                echo $switchbox[$count] 
                ?>"  );
el.innerHTML='<img id="<?php  echo $switchbox[$count] ?>" class="<?php echo $ctrls_class ?>"  src="<?php echo $switchbox[$count + 3] ?>" >';
<?php  } ?>  
 <?php
            $count = $count + $max_items;
        }        
        ?>
 /* Check if  init page is used.*/          
<?php
        if($a['initid'] >= 0) {            
            ?>
<?php
            $count = 1 +($max_items * $a['initid']);            
            ?>
embedapp(  "<?php echo $switchbox[$count + 2] ?>" ,  "<?php echo $switchbox[$count + 1] ?>" ,   "<?php echo $container_id ?>"   ,  "<?php echo $ctrls_id ?>"  ,  "<?php echo $loading_br ?>"  ,   "<?php echo $subitem_id ?>"  ); 
<?php
        }        
        ?>
             });   
            </script><!-- END HYPERFETCH -->      
            <?php
        ob_end_flush();        
        /*  Clear Global Array */
        unset($switchbox);
    }
    $hyperftPlugin = new HyperFetchPlugin();
    $hyperftPlugin->register();
    // activation
    register_activation_hook(__FILE__, array($hyperftPlugin, 'activate'));
    // deactivation
    require_once plugin_dir_path(__FILE__). 'inc/hyperfetch-plugin-deactivate.php';
    register_deactivation_hook(__FILE__, array('HyperFetchPluginDeactivate', 'deactivate'));
    //Use shortcode hooks for plugin.  
    add_shortcode('hyperfetch', 'hyperfetch_insert');
    add_shortcode('hyperswitch', 'hyperswitch_insert');
}
