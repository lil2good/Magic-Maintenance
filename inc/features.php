<?php





// =============================================================================
// Maintenance Mode -Start
// =============================================================================
// Check if page exist
function magic_maintenance_plugin_m(){
	// Check Options
	$titan = TitanFramework::getInstance( 'magic_maintenance' );
  $MMP_Option = $titan->getOption( 'maintenance_page' );
	$MME_Option = $titan->getOption( 'mm_enabled' );
	// ...
	$page = get_post_field('post_name', $MMP_Option); // PAGE ID
	$post = get_post();
	$pagename = get_query_var('pagename');

	// Check Page Status - Published = ON / Draft = OFF
	if ( $MME_Option == true && $pagename != $page && current_user_can('edit_pages') == false ) {

		 $location = get_site_url() . ('/' . $page .'/');
		 wp_redirect( $location );
		 exit;
    }
	// Letting the bots know we are down for now TEMP
	if (( "HTTP/1.0" == $_SERVER["SERVER_PROTOCOL"]) && ($MME_Option == true) && (current_user_can('edit_pages') == false)){
				$protocol = "HTTP/1.1";
				header( "$protocol 503 Service Unavailable", true, 503 );
				header( "Retry-After: 3600" );

				}
}
add_action( 'get_header', 'magic_maintenance_plugin_m');
register_activation_hook(__FILE__, 'magic_maintenance_plugin_m');
// =============================================================================
// Maintenance Mode -End
// =============================================================================





// =============================================================================
// 404 Error Mode -Start
// =============================================================================
add_filter( 'template_include', 'magic_maintenance_plugin_e', 99 );

function magic_maintenance_plugin_e( $template ) {
	// Check Options
	$titan = TitanFramework::getInstance( 'magic_maintenance' );
  $EP_Option = $titan->getOption( '404_error_page' );
	$EN_Option = $titan->getOption( '404_enabled' );
	// ...
	$page = get_post_field('post_name', $EP_Option); // PAGE ID
	$post = get_post();
	$pagename = get_query_var('pagename');

	if ( $EN_Option == true && $pagename != $page && is_404() == true ) {
    $location = get_site_url() . ('/' . $page .'/');
		 wp_redirect( $location );
		 exit;
  }

	return $template;
}
// =============================================================================
// 404 Error Mode -End
// =============================================================================









// =============================================================================
// Backend Notices -Start
// =============================================================================
add_action( 'admin_notices', 'magic_maintenance_plugin__error' );
function magic_maintenance_plugin__error() {
	// Check Options
	$titan = TitanFramework::getInstance( 'magic_maintenance' );
	$MME_Option = $titan->getOption( 'mm_enabled' );
	$EN_Option = $titan->getOption( '404_enabled' );

	if ( $MME_Option == true ){
	$class = 'notice notice-warning';
	$message = __( '<b>Maintenance mode</b> is ON, remember to turn off to allow access to your website.', 'notice-maintenance' );

	printf( '<div class="%1$s"><p>%2$s</p></div>', $class, $message );
	}
}
// =============================================================================
// Backend Notices -End
// =============================================================================
