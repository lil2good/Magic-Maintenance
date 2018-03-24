<?php

add_action( 'tf_create_options', 'magic_maintenance_create_options' );
function magic_maintenance_create_options() {
$titan = TitanFramework::getInstance( 'magic_maintenance' );
$Panel = $titan->createAdminPanel( array(
    'name' => 'Magic Maintenance',
    'title' => 'Magic Settings',
    'icon' => 'dashicons-slides',
    'id' => 'magic-maintenance',
) );


// =============================================================================
// Create tabs -Start
// =============================================================================
$tab = $Panel->createTab( array(
    'name' => 'Maintenance Options',
) );

$tab2 = $Panel->createTab( array(
    'name' => '404 Error Options',
) );

$tab4 = $Panel->createTab( array(
    'name' => 'Help',
) );

// =============================================================================
// Create tabs -End
// =============================================================================




// =============================================================================
// Maintenance Tab -Start
// =============================================================================
$tab->createOption( array(
'name' => 'Maintenance Mode',
'type' => 'heading',
) );
$tab->createOption( array(
	'name' => 'Select Maintenance Page',
	'id' => 'maintenance_page',
	'type' => 'select-pages',
	'desc' => 'Select a page to use for Maintenance Mode'
) );
$tab->createOption( array(
    'name' => 'Maintenance Mode',
    'id' => 'mm_enabled',
    'type' => 'enable',
    'default' => false,
    'desc' => 'Enable or disable Maintenance Mode',
) );
$tab->createOption( array(
    'type' => 'note',
    'desc' => '<b>Note:</b> Anyone who has the role to edit pages can bypass Maintenance mode.'
) );
$tab->createOption( array(
'type' => 'save',
) );
// =============================================================================
// Maintenance Tab -End
// =============================================================================




// =============================================================================
// 404 Error Tab -Start
// =============================================================================
$tab2->createOption( array(
'name' => '404 Error',
'type' => 'heading',
) );
$tab2->createOption( array(
	'name' => 'Select 404 Error Page',
	'id' => '404_error_page',
	'type' => 'select-pages',
	'desc' => 'Select a page to use for 404 Errors'
) );
$tab2->createOption( array(
    'name' => '404 Error Mode',
    'id' => '404_enabled',
    'type' => 'enable',
    'default' => false,
    'desc' => 'Enable or disable Custom 404 Page',
) );
$tab2->createOption( array(
'type' => 'save',
) );
// =============================================================================
// 404 Error Tab -End
// =============================================================================







// =============================================================================
// Help -Start
// =============================================================================
$tab4->createOption( array(
'name' => 'Help',
'type' => 'heading',
) );
$tab4->createOption( array(
'name' => 'Help',
'type' => 'custom',
'custom' => '<div><h1>Work In Progress, will be updated as features are added.</h1>

<table style="border: 1px solid #000; border-collapse: collapse; width:80%; height:100%; margin: 80px; box-shadow: rgba(0, 0, 0, 0.2) 0 0 30px 0px;"><tr>
<th style="border: 1px solid #000; background:#000; color:#fff; font-size: 20px; font-weight: bold;">Maintenance Mode</th>
<th style="border: 1px solid #000; background:#000; color:#fff; font-size: 20px; font-weight: bold;">404 Error Mode</th>
<tr>
<td style="border: 1px solid #000; font-size: 16px;"><b>All pages will be redirected to a page you choose, Be sure to turn it off. "This is intended as a short term option."</b></td>
<td style="border: 1px solid #000; font-size: 16px;"><b>Crate a custom 404 page then apply that page in the settings, It will overide the default and redirect to your page.</b></td>
</tr>
<tr>
<td style="border: 1px solid #000; font-size: 16px;">1.) Create a Maintenance Page.</td>
<td style="border: 1px solid #000; font-size: 16px;">1.) Create a 404 Error Page.</td>
</tr>
<tr>
<td style="border: 1px solid #000; font-size: 16px;">2.) Select the page you would to redirect traffic to.</td>
<td style="border: 1px solid #000; font-size: 16px;">2.) Select the page you would to redirect 404 Errors to.</td>
</tr>
<tr>
<td style="border: 1px solid #000; font-size: 16px;">3.) Turn on Maintenance Mode.</td>
<td style="border: 1px solid #000; font-size: 16px;">3.) Turn on 404 Error Mode.</td>
</tr>
<tr>
<td style="border: 1px solid #000; font-size: 16px;">4.) When Done Remember to turn off Maintenance Mode.</td>
<td style="border: 1px solid #000; font-size: 16px;"></td>
</tr>
<tr>
<td style="border: 1px solid #000; font-size: 16px;"></td>
<td style="border: 1px solid #000; font-size: 16px;"></td>
</tr>
<tr>
<td style="border: 1px solid #000; font-size: 16px;"></td>
<td style="border: 1px solid #000; font-size: 16px;"></td>
</tr>
<tr>
<td style="border: 1px solid #000; font-size: 16px;"></td>
<td style="border: 1px solid #000; font-size: 16px;"></td>
</tr>
<tr>
<td style="border: 1px solid #000; font-size: 16px;"></td>
<td style="border: 1px solid #000; font-size: 16px;"></td>
</tr>
<tr>
<td style="border: 1px solid #000; font-size: 16px;"></td>
<td style="border: 1px solid #000; font-size: 16px;"></td>
</tr>
</table>
</div>',
) );
// =============================================================================
// Help -Start
// =============================================================================


}















?>
