<?php
/*

	SEO Warning - Adds an admin toolbar warning when indexing is off
	Copyright (C) 2025 Andrew Hoyer

	This program is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program.  If not, see <https://www.gnu.org/licenses/>.

	* Plugin Name:       SEO Warning
	* Plugin URI:        https://andrewhoyer.com/seo-warning/
	* Description:       Adds an admin toolbar warning when site indexing is discouraged.
	* Version:           0.1
	* Author:            Andrew Hoyer
	* Author URI:        https://andrewhoyer.com
	* License:           GPL-3.0
	* License URI:       https://www.gnu.org/licenses/gpl-3.0.html#license-text
	* Text Domain:       seo-warning
	* Requires at least: 5.2
	* Requires PHP:      7.0

*/

// Only add the admin menu item if the site settings do not allow indexing.
// More specifically, if the "Search engine visibility" checkbox is checked
// on the Settings > Reading page.
if (get_option('blog_public') == '0') {
    add_filter('admin_bar_menu', 'add_seo_warning_to_admin_bar_menu', 9);
}

function add_seo_warning_to_admin_bar_menu($wp_admin_bar) {
    
    $wp_admin_bar->add_node( 
		array(
        	'id'    => 'seo-warning',
        	'title' => '🚨 SEO',
        	'href'  => home_url('/wp-admin/options-reading.php'),
        	'meta'  => array(
            	'class' => 'seo-warning',
            	'title' => 'Site does not allow indexing',
        	),
    	)
	);

}

?>
