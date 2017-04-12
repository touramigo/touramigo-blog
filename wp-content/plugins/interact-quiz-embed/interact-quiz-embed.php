<?php
/*
Plugin Name: Interact Quiz Embed
Plugin URI: https://www.tryinteract.com
Description: Use this plugin to embed your Interact quiz into your Wordpress site.
Author: Matthew Clark
Version: 2.0.1
Author URI: https://www.tryinteract.com

Copyright 2014  Interact  (email : matthew@tryinteract.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function interact_quiz_embed($atts){
	shortcode_atts(array('user'=>'', 'id'=>'', 'w'=>'600', 'h'=>'500'), $atts);

	if(isset($atts['w']))
		$width = $atts['w'];
	else
		$width = '600';
	if(isset($atts['h']))
		$height = $atts['h'];
	else
		$height = '500';

	if (isset($atts['user'])) {
		$username = $atts['user'];
		$id = $atts['id'];
		return '
			<link rel="stylesheet" type="text/css" href="https://www.tryinteract.com/css/interact.css">
			<iframe src="https://quiz.tryinteract.com/#/'.$username.'/'.$id.'" class="interact-embed" width="'.$width.'" height="'.$height.'" frameborder="0"></iframe>
		';
	} else {
		$app_id = $atts['id'];
		return '<iframe src="https://quiz.tryinteract.com/#/'.$app_id.'" class="interact-embed" width="'.$width.'" height="'.$height.'" frameborder="0" style="margin:0;max-width:100%;"></iframe>';
	}
}

add_shortcode('interact-quiz','interact_quiz_embed');

function interact_option_page(){

	?>
	<div class="wrap">
		<?php screen_icon(); ?>
		<h2>Interact Embed Shortcode Generator</h2>
		<p>Use this plugin to generate a shortcode to embed your Interact quiz into your Wordpress site. After filling out the information, you will receive a shortcode that you can add to any post/page to embed your quiz!</p>
		<?php
		if($_POST['app_id']){
			$app_id = $_POST['app_id'];
			
			echo '<h3>Your shortcode: <pre>[interact-quiz id="'.$app_id.'"';
			
			if(isset($_POST['interact_size_w']) && !empty($_POST['interact_size_w'])){
				echo ' w="'.$_POST['interact_size_w'].'"';
			}
			if(isset($_POST['interact_size_h']) && !empty($_POST['interact_size_h'])){
				echo ' h="'.$_POST['interact_size_h'].'"';
			}
			
			echo ']</pre></h3>';
		}
		?>
		<hr>
		<form action="" method="post" id="interact-embed-form">
			<table class="form-table">
				<tr>
					<th scope="row"><label for="app_id">Interact Quiz URL</label></th>
					<td>https://quiz.tryinteract.com/#/<input name="app_id" type="text" id="app_id" value="" class="regular-text code" />
					<p class="description">The quiz URL can be found in your dashboard under 'Embed'. It should be in the form of https://quiz.tryinteract.com/#/[INTERACT APP ID]</p>
					</td>
					</tr>
				<tr>
					<th scope="row">Embed Size</th>
					<td>
						<label for="interact_size_w">Width</label>
						<input name="interact_size_w" type="number" step="1" min="0" id="interact_size_w" value="" class="small-text" />
						<label for="interact_size_h">Height</label>
						<input name="interact_size_h" type="number" step="1" min="0" id="interact_size_h" value="" class="small-text" />
						<p class="description">Default size is 600x500px</p>
					</td>
				</tr>
			</table>
			<p><input type="submit" name="submit" value="Generate Shortcode" class="button button-primary"></p>
		</form>
	</div>

	<?php
}

function interact_plugin_menu(){
	add_options_page('Interact Embed Shortcode Generator','Interact','manage_options','interact_plugin','interact_option_page');
}

add_action('admin_menu','interact_plugin_menu');