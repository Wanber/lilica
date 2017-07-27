<?php
/*
Plugin Name: PureTheme Slide Social Tabs
Plugin URI: http://plugins.zinan.me/puretheme-slide-social-tabs
Description: Eye caching jQuery social tabs for Facebook, Twitter, Google+ & Youtube.
Version: 1.4.0
Author: Developer Zinan
Author URI: http://www.zinan.me/
License: GPLv2 or later
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


/* Adding Latest jQuery from Wordpress */
function pure_social_tabs_latest_jquery() {
	wp_enqueue_script('jquery');
}
add_action('init', 'pure_social_tabs_latest_jquery');

/* Main Setting Class */
class PTSSTTest {

    private $plugin_path;
    private $plugin_url;
    private $l10n;
    private $PTSST;

    function __construct() 
    {	
        $this->plugin_path = plugin_dir_path( __FILE__ );
        $this->plugin_url = plugin_dir_url( __FILE__ );
        $this->l10n = 'pure-theme-slide-social-tabs-settings-framework';
        add_action( 'admin_menu', array(&$this, 'admin_menu'), 99 );
        
        // Include and create a new Pure_Slide_Social_Settings_Framework
        require_once( $this->plugin_path .'pure-theme-slide-social-tabs-settings-framework.php' );
		
		/*Some Set-up*/

		define('PURE_SLIDE_SOCIAL_TABS_HOOK', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
		wp_enqueue_script('pure_slide_social_tab_active', PURE_SLIDE_SOCIAL_TABS_HOOK.'js/social.js', array('jquery'));
		wp_enqueue_style('pure_slide_social_tab_css', PURE_SLIDE_SOCIAL_TABS_HOOK.'css/plugins-main.css');

		function pure_social_tabs_active_hook() {
			include_once( 'puretheme-social.php' );
		}
		add_action('wp_footer', 'pure_social_tabs_active_hook');
		
		function pure_social_tabs_font_awesome_css() {?>
			<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">		
		<?php
		}
		add_action('wp_head', 'pure_social_tabs_font_awesome_css');
		
		function pure_social_tabs_custom_css() {?>
			<style type="text/css">
				<?php echo PTSST_get_setting( 'pure_social_tabs', 'general', 'custom-css' ); ?>
			</style>		
		<?php
		}
		add_action('wp_head', 'pure_social_tabs_custom_css');
		
        $this->PTSST = new PTSST_Setting( $this->plugin_path .'settings/pure-theme-slide-social-tabs-settings-general.php' );
        // Add an optional settings validation filter (recommended)
        add_filter( $this->PTSST->get_option_group() .'_settings_validate', array(&$this, 'validate_settings') );
    }
    
    function admin_menu()
    {
        $page_hook = add_menu_page( __( 'PT Social Tab', $this->l10n ), __( 'PT Social Tab', $this->l10n ), 'update_core', 'PT Social Tab', array(&$this, 'settings_page') );
        add_submenu_page( 'PTSST', __( 'Settings', $this->l10n ), __( 'Settings', $this->l10n ), 'update_core', 'PTSST', array(&$this, 'settings_page') );
    }
    
    function settings_page()
	{
	    // Your settings page
	    ?>
		<div class="wrap">
			<div id="icon-options-general" class="icon32"></div>
			<h2>PureTheme Slide Social Tab Settings</h2>
			<?php 
			// Output your settings form
			$this->PTSST->settings(); 
			?>
		</div>
		<?php
		
		// Get settings
		//$settings = PTSST_get_settings( $this->plugin_path .'settings/settings-general.php' );
		//echo '<pre>'.print_r($settings,true).'</pre>';
		
		// Get individual setting
		//$setting = PTSST_get_setting( PTSST_get_option_group( $this->plugin_path .'settings/settings-general.php' ), 'general', 'text' );
		//var_dump($setting);
	}
	
	function validate_settings( $input )
	{
	    // Do your settings validation here
	    // Same as $sanitize_callback from http://codex.wordpress.org/Function_Reference/register_setting
    	return $input;
	}

}

new PTSSTTest();

?>