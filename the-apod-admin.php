<?php
/**
*  Part of the THE APOD plugin.
*  This part is creating the admin interface, both menu item and the actual admin page
*/

function the_apod_create_plugin_menu() {
	add_menu_page( 'THE APOD', 'THE APOD', 'manage_options', 'THE APOD', 'the_apod_create_plugin_admin_page' );
}

function the_apod_create_plugin_admin_page() {

    //global $nasa_apod_db_version;

	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}

	wp_register_style('the-apod-style', plugin_dir_url( __FILE__ ) . 'css/the-apod-admin-interface.css', false, 1.0);
	wp_enqueue_style('the-apod-style');

	?>
	<div class="the-apod-admin-wrapper">
	<?php
	echo '<img class="the-apod-logo" alt="THE APOD" src="' . plugins_url( 'images/the_apod_logo.png', __FILE__ ) . '" >';
	echo '<img class="the-apod-gpl" alt="GPL" src="' . plugins_url( 'images/gpl.png', __FILE__ ) . '" >';
	?>

	<div class="the-apod-admin-button-wrapper">
	<button class="the-apod-reset-stored-data btn btn-info">Reset Stored Data</button>
	</div>

	<div class="the-apod-admin-text">
     <ul>
     <li><h3>THE APOD</h3></li>
     <li>Plugin URI: <a href="https://github.com/DaWoody/nasa-apod">https://github.com/DaWoody/the-apod</a></li>
     <li>Version: 1.0.0</li>
     <li>Author: <a href="https://github.com/DaWoody">Johan DaWoody Wedfelt</a></li>
     <li>License: <a href="https://www.gnu.org/licenses/old-licenses/gpl-2.0.html">GPLv2</a></li>
     <li>Dependencies: <a href="https://jquery.com/">jQuery</a> 1.X (supplied in Wordpress)</li>
     </ul>
     <div class="nasa-apod-admin-text-container">
     <h3>What is this plugin?</h3>
     <p>
     This is a plugin that shows the current daily space image with corresponding information published by NASA within your posts or pages. Technically the plugin uses the public <a href="https://sv.wikipedia.org/wiki/Application_Programming_Interface">API</a> from <a href="https://www.nasa.gov/">NASA</a> and fetches data connected to <a href="https://apod.nasa.gov/apod/astropix.html">Astronomy Picture of the Day (APOD)</a>.
     The plugin currently uses the public <code>DEMO_KEY</code> to make request towards the API, which in turn is limited to a number of requests per day from the same ip, so this plugin basically creates a cookie with the information that is stored within the
     browser for a day (24 hours), minimizing the amount of requests towards the API and also making the plugin more responsive to user rendering.
     </p>
	 <h3>How to use this plugin?</h3>
	 <p>
	 The plugin can be used by adding short-codes to your posts, pages etc.
	 There are currently two different short-codes that can be used either for fetching a <code>normal resolution</code> image or
	 one for fetching a <code>high-definition</code> image.
	 The structure that is returned in html is a div acting as a container with the class <b>the-apod-container</b> containing a
	 <code>h3</code> tag including the title with the class <b>the-apod-title</b> , an <code>img</code> tag with the class <b>the-apod-picture</b> and a  <code>p</code> tag with the class  <b>the-apod-explanation</b> containing
	 the explanation.


     <br>
     <br>
<h4> Select <code>text</code> mode within the editor in your posts/pages </h4>
	 By adding the short-code <code>[the-apod]</code> you get this structure with the image tag containing a reference to the normal resolution version,
	 and by instead adding the short-code <code>[the-apod-hd]</code> you get the high-definition version.
	</div>
    </div>

	<?php
}

?>