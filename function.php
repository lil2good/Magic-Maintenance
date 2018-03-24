<?php
/*
Plugin Name: Magic Maintenance
Plugin URI: https://lil2good.com
Description: Easily set custom pages for maintenance and 404 errors.
Version: 1.0
Author: lil2good
Author URI: https://lil2good.com
*/




// =============================================================================
// Required Files -Start
// =============================================================================

require_once( 'inc/class-tgm-plugin-activation.php');
require_once( 'titan-framework-checker.php' );
require_once( 'inc/options_page/options_page.php');

// =============================================================================
// Required Files -End
// =============================================================================




// =============================================================================
// Plugin Check -Start
// =============================================================================
add_action( 'init', 'magic_maintenance_plugin_check' );
function magic_maintenance_plugin_check(){
// Check if Titan Framework is Active
		if ( is_plugin_active( 'titan-framework/titan-framework.php' ) == TRUE ) {
    // Run Setter Redirecter features
		include( 'inc/features.php');
		/* Include updater. */
		require_once( trailingslashit( plugin_dir_path( __FILE__ ) ) . 'inc/updater.php' );

} else {
		// Do Nothing

		}
	}





	// =============================================================================
	// Include the TGM_Plugin_Activation class. -Start
	// =============================================================================
	/**
	 * Register the required plugins for this theme.
	 *
	 * This function is hooked into tgmpa_init, which is fired within the
	 * TGM_Plugin_Activation class constructor.
	 *
	 */
	add_action( 'tgmpa_register', 'magic_maintenance_required_plugins' );
	function magic_maintenance_required_plugins() {
		/*
		 * Array of plugin arrays. Required keys are name and slug.
		 * If the source is NOT from the .org repo, then source is also required.
		 */
		$plugins = array(

		    array(
				'name'      => 'Titan Framework',
				'slug'      => 'titan-framework',
				'required'     => true,
			),

		);

		/*
		 * Array of configuration settings. Amend each line as needed.
		 *
		 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
		 * strings available, please help us make TGMPA even better by giving us access to these translations or by
		 * sending in a pull-request with .po file(s) with the translations.
		 *
		 * Only uncomment the strings in the config array if you want to customize the strings.
		 */
		$config = array(
			'id'           => 'SetterRedirecter',                 // Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => '',                      // Default absolute path to bundled plugins.
			'menu'         => 'setter-redirecter-required-plugins', // Menu slug.
			'parent_slug'  => 'plugins.php',            // Parent menu slug.
			'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
			'has_notices'  => true,                    // Show admin notices or not.
			'dismissable'  => false,                    // If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => false,                      // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => true,                   // Automatically activate plugins after installation or not.
			'message'      => '',                      // Message to output right before the plugins table.

			/*
			'strings'      => array(
				'page_title'                      => __( 'Install Required Plugins', 'listate' ),
				'menu_title'                      => __( 'Install Plugins', 'listate' ),
				'installing'                      => __( 'Installing Plugin: %s', 'listate' ), // %s = plugin name.
				'oops'                            => __( 'Something went wrong with the plugin API.', 'listate' ),
				'notice_can_install_required'     => _n_noop(
					'This theme requires the following plugin: %1$s.',
					'This theme requires the following plugins: %1$s.',
					'listate'
				), // %1$s = plugin name(s).
				'notice_can_install_recommended'  => _n_noop(
					'This theme recommends the following plugin: %1$s.',
					'This theme recommends the following plugins: %1$s.',
					'listate'
				), // %1$s = plugin name(s).
				'notice_cannot_install'           => _n_noop(
					'Sorry, but you do not have the correct permissions to install the %1$s plugin.',
					'Sorry, but you do not have the correct permissions to install the %1$s plugins.',
					'listate'
				), // %1$s = plugin name(s).
				'notice_ask_to_update'            => _n_noop(
					'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
					'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
					'listate'
				), // %1$s = plugin name(s).
				'notice_ask_to_update_maybe'      => _n_noop(
					'There is an update available for: %1$s.',
					'There are updates available for the following plugins: %1$s.',
					'listate'
				), // %1$s = plugin name(s).
				'notice_cannot_update'            => _n_noop(
					'Sorry, but you do not have the correct permissions to update the %1$s plugin.',
					'Sorry, but you do not have the correct permissions to update the %1$s plugins.',
					'listate'
				), // %1$s = plugin name(s).
				'notice_can_activate_required'    => _n_noop(
					'The following required plugin is currently inactive: %1$s.',
					'The following required plugins are currently inactive: %1$s.',
					'listate'
				), // %1$s = plugin name(s).
				'notice_can_activate_recommended' => _n_noop(
					'The following recommended plugin is currently inactive: %1$s.',
					'The following recommended plugins are currently inactive: %1$s.',
					'listate'
				), // %1$s = plugin name(s).
				'notice_cannot_activate'          => _n_noop(
					'Sorry, but you do not have the correct permissions to activate the %1$s plugin.',
					'Sorry, but you do not have the correct permissions to activate the %1$s plugins.',
					'listate'
				), // %1$s = plugin name(s).
				'install_link'                    => _n_noop(
					'Begin installing plugin',
					'Begin installing plugins',
					'listate'
				),
				'update_link' 					  => _n_noop(
					'Begin updating plugin',
					'Begin updating plugins',
					'listate'
				),
				'activate_link'                   => _n_noop(
					'Begin activating plugin',
					'Begin activating plugins',
					'listate'
				),
				'return'                          => __( 'Return to Required Plugins Installer', 'listate' ),
				'plugin_activated'                => __( 'Plugin activated successfully.', 'listate' ),
				'activated_successfully'          => __( 'The following plugin was activated successfully:', 'listate' ),
				'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'listate' ),  // %1$s = plugin name(s).
				'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'listate' ),  // %1$s = plugin name(s).
				'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'listate' ), // %s = dashboard link.
				'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'listate' ),

				'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
			),
	*/
		);


		tgmpa( $plugins, $config );
	}
	// =============================================================================
	// Include the TGM_Plugin_Activation class. -End
	// =============================================================================



// =============================================================================
// Plugin Check -End
// =============================================================================
