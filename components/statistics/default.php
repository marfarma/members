<?php
/**
 * Stats package for the plugin.  This component displays stats for individual roles. On the main stats
 * page, each role is listed.  Each role then has its own stats page, which lists users by month.  Each
 * month should list all of the users that signed up for that particular month for with that role.
 *
 * To view the stats page, a user must have a role with the 'view_stats' capability.
 *
 * @package Members
 * @subpackage Components
 */

/* Add the stats page to the admin. */
add_action( 'admin_menu', 'members_component_add_stats_page' );

/* Additional capabilities required by the component. */
add_filter( 'members_get_capabilities', 'members_component_stats_capabilities' );

/**
 * Adds the stats page to the admin menu.
 *
 * @since 0.2
 */
function members_component_add_stats_page() {
	global $members;

	$members->stats_page = add_submenu_page( 'users.php', __( 'Members Statistics', 'members' ), __( 'Members Stats', 'members' ), 'view_stats', 'stats', 'members_component_stats_page' );
}

/**
 * Loads the stats page.
 *
 * @since 0.2
 */
function members_component_stats_page() {
	require_once( MEMBERS_COMPONENTS . '/statistics/statistics.php' );
}

/**
 * Adds additional capabilities required by the stats component.
 *
 * @since 0.2
 */
function members_component_stats_capabilities( $capabilities ) {

	$capabilities['view_stats'] = 'view_stats';

	return $capabilities;
}

?>