<?php
/*
Plugin Name: CLEVER - HTML5 Radio Player With History - Shoutcast and Icecast
Description: This plugin will allow you to insert an advanced HTML5 Radio Player with history support
Version: 1.1
Author: Lambert Group
Author URI: https://codecanyon.net/user/LambertGroup/portfolio?ref=LambertGroup
Text Domain: audio11-html5
*/

$lbg_audio11_html5_shoutcast_path = trailingslashit(dirname(__FILE__));  //empty

//all the messages
$lbg_audio11_html5_shoutcast_messages = array(
		'version' => esc_html( '<div class="error">CLEVER - HTML5 Radio Player With History - Shoutcast and Icecast plugin requires WordPress 3.0 or newer. <a href="https://codex.wordpress.org/Upgrading_WordPress">Please update!</a></div>' , 'audio11-html5' ),
		'data_saved' => esc_html( 'Data Saved!', 'audio11-html5' ),
		'empty_name' => esc_html( 'Name - required', 'audio11-html5' ),
		'empty_stream' => esc_html( 'Stream - required', 'audio11-html5' ),
		'empty_mp3' => esc_html( 'MP3 - required', 'audio11-html5' ),
		'empty_ogg' => esc_html( 'OGG - required', 'audio11-html5' ),
		'empty_categ' => esc_html( 'Category - required', 'audio11-html5' ),
		'invalid_request' => esc_html( 'Invalid Request!', 'audio11-html5' ),
		'generate_for_this_player' => esc_html( 'You can start customizing this player.', 'audio11-html5' ),
		'duplicate_complete' => esc_html( 'Duplication process is complete!', 'audio11-html5' )
	);


global $wp_version;

if ( !version_compare($wp_version,"3.0",">=")) {
	wp_die (esc_html($lbg_audio11_html5_shoutcast_messages['version'], 'audio11-html5' ));
}




function lbg_audio11_html5_shoutcast_activate() {
	//db creation, create admin options etc.
	global $wpdb;

	$lbg_audio11_html5_shoutcast_collate = ' COLLATE utf8_general_ci';

	$sql0 = "CREATE TABLE `" . $wpdb->prefix . "lbg_audio11_html5_shoutcast_players` (
			`id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
			`name` VARCHAR( 255 ) NOT NULL ,
			PRIMARY KEY ( `id` )
			) ENGINE=MyISAM  DEFAULT CHARSET=utf8";

	$sql1 = "CREATE TABLE `" . $wpdb->prefix . "lbg_audio11_html5_shoutcast_settings` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `playerWidth` smallint(5) unsigned NOT NULL DEFAULT '760',
	`width100Proc` varchar(8) NOT NULL DEFAULT 'false',
  `radio_stream` varchar(255) NOT NULL DEFAULT '',
	`historyFile` varchar(255) NOT NULL DEFAULT '',
	`nowPlayingFile` varchar(255) NOT NULL DEFAULT '',
	`nextFile` varchar(255) NOT NULL DEFAULT '',
  `borderWidth` smallint(5) unsigned NOT NULL DEFAULT '1',
	`autoPlay` varchar(8) NOT NULL DEFAULT 'true',
	`borderColor` varchar(10) NOT NULL DEFAULT 'bfbfbf',
	`bgColor` varchar(10) NOT NULL DEFAULT 'ffffff',
	`bgColorOpacity` smallint(5) unsigned NOT NULL DEFAULT '100',
	`barsColor` varchar(10) NOT NULL DEFAULT 'ffffff',
	`playButtonColor` varchar(10) NOT NULL DEFAULT 'ffffff',
	`playButtonHoverColor` varchar(10) NOT NULL DEFAULT 'd7d7d7',
  `centerPlayer` varchar(8) NOT NULL DEFAULT 'true',
  `nowPlayingInterval` smallint(5) unsigned NOT NULL DEFAULT '35',
	`delay` smallint(5) unsigned NOT NULL DEFAULT '1',
	`grabArtistPhoto` varchar(8) NOT NULL DEFAULT 'true',
	`noImageAvailable` text,
	`sticky` varchar(8) NOT NULL DEFAULT 'false',
	`activateForFooter` varchar(8) NOT NULL DEFAULT 'false',
	`numberOfElementsDisplayed` smallint(5) unsigned NOT NULL DEFAULT '6',
	`historyLeftPadding` smallint(5) NOT NULL DEFAULT '25',
	`historyRightPadding` smallint(5) NOT NULL DEFAULT '25',
	`historyTopPadding` smallint(5) NOT NULL DEFAULT '30',
	`historyBottomPadding` smallint(5) NOT NULL DEFAULT '30',
	`historyRecordTitleLimit` smallint(5) NOT NULL DEFAULT '24',
	`historyRecordAuthorLimit` smallint(5) NOT NULL DEFAULT '34',
	`songAuthorLineSeparatorOffColor` varchar(20) NOT NULL DEFAULT 'bfbfbf',
	`historyRecordTimeOffColor` varchar(20) NOT NULL DEFAULT '000000',
	`historyRecordSongOffColor` varchar(20) NOT NULL DEFAULT '000000',
	`historyRecordAuthorOffColor` varchar(20) NOT NULL DEFAULT '575757',
	`songAuthorLineSeparatorOnColor` varchar(20) NOT NULL DEFAULT 'transparent',
	`historyRecordTimeOnColor` varchar(20) NOT NULL DEFAULT 'FFFFFF',
	`historyRecordSongOnColor` varchar(20) NOT NULL DEFAULT 'FFFFFF',
	`historyRecordAuthorOnColor` varchar(20) NOT NULL DEFAULT 'FFFFFF',
	`historyRecordBackgroundOnColor` varchar(20) NOT NULL DEFAULT 'dd0060',
	  PRIMARY KEY  (`id`)
	) ENGINE=MyISAM  DEFAULT CHARSET=utf8";



	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta($sql0.$lbg_audio11_html5_shoutcast_collate);
	dbDelta($sql1.$lbg_audio11_html5_shoutcast_collate);


	//initialize the players table with the first player type
	$rows_count = $wpdb->get_var( "SELECT COUNT(*) FROM ". $wpdb->prefix ."lbg_audio11_html5_shoutcast_players" );
	if (!$rows_count) {
		$wpdb->insert(
			$wpdb->prefix . "lbg_audio11_html5_shoutcast_players",
			array(
				'name' => 'Default'
			),
			array(
				'%s'
			)
		);
	}

	// initialize the settings
	$rows_count = $wpdb->get_var( "SELECT COUNT(*) FROM ". $wpdb->prefix ."lbg_audio11_html5_shoutcast_settings" );
	if (!$rows_count) {
		lbg_audio11_html5_shoutcast_insert_settings_record(1);
	}




}


function lbg_audio11_html5_shoutcast_insert_settings_record($player_id) {
	global $wpdb;
	$wpdb->insert(
			$wpdb->prefix . "lbg_audio11_html5_shoutcast_settings",
			array(
				'noImageAvailable' => plugins_url("", __FILE__).'/audio11_html5_radio_history/noimageavailable.jpg'
			),
			array(
				'%s'
			)
		);
}


function lbg_audio11_html5_shoutcast_init_sessions() {
	global $wpdb;
	if (is_admin()) {
		if (!session_id()) {
			session_start();

			//initialize the session
			if (!isset($_SESSION['xid'])) {
				$safe_sql="SELECT * FROM (".$wpdb->prefix."lbg_audio11_html5_shoutcast_players) LIMIT 0, 1";
				$row = $wpdb->get_row($safe_sql,ARRAY_A);
				$_SESSION['xid'] = $row['id'];
				$_SESSION['xname'] = $row['name'];
			}
		}
	}
}


function lbg_audio11_html5_shoutcast_load_styles() {
	if(strpos($_SERVER['PHP_SELF'], 'wp-admin') !== false) { //loads css in admin
		$page = (isset($_GET['page'])) ? $_GET['page'] : '';
		if(preg_match('/LBG_audio11_html5_SHOUTCAST/i', $page)) {
			wp_enqueue_style('jquery-ui-pepper-grinder', plugins_url('css/jquery-ui.min.css', __FILE__));
			wp_enqueue_style('lbg-audio11-html5-shoutcast-css', plugins_url('css/styles.css', __FILE__));
			wp_enqueue_style('lbg-audio11-html5-shoutcast-colorpicker-css', plugins_url('css/colorpicker/colorpicker.css', __FILE__));

			wp_enqueue_style('thickbox');
		}
	} else if (!is_admin()) { //loads css in front-end
		wp_enqueue_style('audio11-html5-site-css', plugins_url('audio11_html5_radio_history/audio11_html5.css', __FILE__));
	}
}

function lbg_audio11_html5_shoutcast_load_scripts() {
	$page = (isset($_GET['page'])) ? $_GET['page'] : '';
	if(preg_match('/LBG_audio11_html5_SHOUTCAST/i', $page)) {
		//loads scripts in admin
			wp_enqueue_script('jquery');
			wp_enqueue_script('jquery-ui-core');
			wp_enqueue_script('jquery-ui-widget');
			wp_enqueue_script('jquery-ui-mouse');
			wp_enqueue_script('jquery-ui-accordion');
			wp_enqueue_script('jquery-ui-autocomplete');
			wp_enqueue_script('jquery-ui-slider');
			wp_enqueue_script('jquery-ui-tabs');
			wp_enqueue_script('jquery-ui-sortable');
			wp_enqueue_script('jquery-ui-draggable');
			wp_enqueue_script('jquery-ui-droppable');
			wp_enqueue_script('jquery-ui-selectable');
			wp_enqueue_script('jquery-ui-position');
			wp_enqueue_script('jquery-ui-datepicker');
			wp_enqueue_script('jquery-ui-resizable');
			wp_enqueue_script('jquery-ui-dialog');
			wp_enqueue_script('jquery-ui-button');

			wp_enqueue_script('jquery-form');
			wp_enqueue_script('jquery-color');
			wp_enqueue_script('jquery-masonry');
			wp_enqueue_script('jquery-ui-progressbar');
			wp_enqueue_script('jquery-ui-tooltip');

			wp_enqueue_script('jquery-effects-core');
			wp_enqueue_script('jquery-effects-blind');
			wp_enqueue_script('jquery-effects-bounce');
			wp_enqueue_script('jquery-effects-clip');
			wp_enqueue_script('jquery-effects-drop');
			wp_enqueue_script('jquery-effects-explode');
			wp_enqueue_script('jquery-effects-fade');
			wp_enqueue_script('jquery-effects-fold');
			wp_enqueue_script('jquery-effects-highlight');
			wp_enqueue_script('jquery-effects-pulsate');
			wp_enqueue_script('jquery-effects-scale');
			wp_enqueue_script('jquery-effects-shake');
			wp_enqueue_script('jquery-effects-slide');
			wp_enqueue_script('jquery-effects-transfer');

			wp_register_script('lbg-admin-colorpicker', plugins_url('js/colorpicker/colorpicker.js', __FILE__));
			wp_enqueue_script('lbg-admin-colorpicker');

			wp_register_script('lbg-admin-editinplace', plugins_url('js/jquery.editinplace.js', __FILE__));
			wp_enqueue_script('lbg-admin-editinplace');


			wp_enqueue_script('media-upload'); // before w.p 3.5
			wp_enqueue_media();// from w.p 3.5
			wp_enqueue_script('thickbox');
	} else if (!is_admin()) { //loads scripts in front-end
		wp_enqueue_script('jquery');

			wp_enqueue_script('jquery-ui-core');
			wp_enqueue_script('jquery-ui-slider');
			wp_enqueue_script('jquery-effects-core');
		wp_register_script('lbg-mousewheel', plugins_url('audio11_html5_radio_history/js/jquery.mousewheel.min.js', __FILE__));
		wp_enqueue_script('lbg-mousewheel');

		wp_register_script('lbg-touchSwipe', plugins_url('audio11_html5_radio_history/js/jquery.touchSwipe.min.js', __FILE__));
		wp_enqueue_script('lbg-touchSwipe');

		wp_register_script('lbg-swfobject', plugins_url('audio11_html5_radio_history/js/swfobject.js', __FILE__));
		wp_enqueue_script('lbg-swfobject');

		wp_register_script('lbg-audio11-html5', plugins_url('audio11_html5_radio_history/js/audio11_html5.js', __FILE__));
		wp_enqueue_script('lbg-audio11-html5');
	}

}



// adds the menu pages
function lbg_audio11_html5_shoutcast_plugin_menu() {
	add_menu_page('LBG AUDIO11 HTML5 Admin Interface', 'LBG AUDIO11 HTML5', 'edit_posts', 'LBG_AUDIO11_HTML5_SHOUTCAST', 'lbg_audio11_html5_shoutcast_overview_page',
	plugins_url('images/lbg_audio11_icon.png', __FILE__));
	add_submenu_page( 'LBG_AUDIO11_HTML5_SHOUTCAST', 'LBG AUDIO11 HTML5 Overview', 'Overview', 'edit_posts', 'LBG_AUDIO11_HTML5_SHOUTCAST', 'lbg_audio11_html5_shoutcast_overview_page');
	add_submenu_page( 'LBG_AUDIO11_HTML5_SHOUTCAST', 'LBG AUDIO11 HTML5 Manage Players', 'Manage Players', 'edit_posts', 'LBG_AUDIO11_HTML5_SHOUTCAST_Manage_Players', 'lbg_audio11_html5_shoutcast_player_manage_players_page');
	add_submenu_page( 'LBG_AUDIO11_HTML5_SHOUTCAST', 'LBG AUDIO11 HTML5 Manage Players Add New', 'Add New', 'edit_posts', 'LBG_AUDIO11_HTML5_SHOUTCAST_Add_New', 'lbg_audio11_html5_shoutcast_player_manage_players_add_new_page');
	add_submenu_page( 'LBG AUDIO11 HTML5 Manage Players', 'LBG AUDIO11 HTML5 Player Settings', 'Player Settings', 'edit_posts', 'LBG_AUDIO11_HTML5_SHOUTCAST_Settings', 'lbg_audio11_html5_shoutcast_player_settings_page');
	add_submenu_page( 'LBG_AUDIO11_HTML5_SHOUTCAST_Settings', 'LBG AUDIO11 HTML5 Player Settings', 'Duplicate Player', 'edit_posts', 'LBG_AUDIO11_HTML5_SHOUTCAST_Duplicate_Player', 'lbg_audio11_html5_shoutcast_duplicate_player_page');
	add_submenu_page( 'LBG_AUDIO11_HTML5_SHOUTCAST', 'LBG AUDIO11 HTML5 Help', 'Help', 'edit_posts', 'LBG_AUDIO11_HTML5_SHOUTCAST_Help', 'lbg_audio11_html5_shoutcast_player_help_page');
}


//HTML content for overview page
function lbg_audio11_html5_shoutcast_overview_page()
{
	global $lbg_audio11_html5_shoutcast_path;
	include_once($lbg_audio11_html5_shoutcast_path . 'tpl/overview.php');
}

//HTML content for Manage Players
function lbg_audio11_html5_shoutcast_player_manage_players_page()
{
	global $wpdb;
	global $lbg_audio11_html5_shoutcast_messages;
	global $lbg_audio11_html5_shoutcast_path;

	//delete player
	if (isset($_GET['id'])) {
		//delete from wp_lbg_audio11_html5_shoutcast_players
		$wpdb->query($wpdb->prepare("DELETE FROM ".$wpdb->prefix."lbg_audio11_html5_shoutcast_players WHERE id = %d",$_GET['id']));

		//delete from wp_lbg_audio11_html5_shoutcast_settings
		$wpdb->query($wpdb->prepare("DELETE FROM ".$wpdb->prefix."lbg_audio11_html5_shoutcast_settings WHERE id = %d",$_GET['id']));

		//initialize the session
		$safe_sql="SELECT * FROM (".$wpdb->prefix ."lbg_audio11_html5_shoutcast_players) ORDER BY id";
		$row = $wpdb->get_row($safe_sql,ARRAY_A);
		$row=lbg_audio11_html5_shoutcast_unstrip_array($row);
		if ($row['id']) {
			$_SESSION['xid']=$row['id'];
			$_SESSION['xname']=$row['name'];
		}
	}


	$safe_sql="SELECT * FROM (".$wpdb->prefix ."lbg_audio11_html5_shoutcast_players) ORDER BY id";
	$result = $wpdb->get_results($safe_sql,ARRAY_A);
	include_once($lbg_audio11_html5_shoutcast_path . 'tpl/players.php');

}



//HTML content for Manage Players - Add New
function lbg_audio11_html5_shoutcast_player_manage_players_add_new_page()
{
	global $wpdb;
	global $lbg_audio11_html5_shoutcast_messages;
	global $lbg_audio11_html5_shoutcast_path;

	if(array_key_exists('Submit', $_POST) && $_POST['Submit'] == 'Add New') {
		$errors_arr=array();
		if (empty($_POST['name']))
			$errors_arr[]=$lbg_audio11_html5_shoutcast_messages['empty_name'];

		if (count($errors_arr)) {
				include_once($lbg_audio11_html5_shoutcast_path . 'tpl/add_player.php'); ?>
				<div id="error" class="error"><p><?php echo implode("<br>", $errors_arr);?></p></div>
		  	<?php } else { // no errors
					$wpdb->insert(
						$wpdb->prefix . "lbg_audio11_html5_shoutcast_players",
						array(
							'name' => sanitize_text_field($_POST['name'])
						),
						array(
							'%s'
						)
					);
					//insert default player settings for this new player
					lbg_audio11_html5_shoutcast_insert_settings_record($wpdb->insert_id);
					?>
						<div class="wrap">
							<div id="lbg_logo">
								<h2><?php esc_html_e( 'Manage Players - Add New Player' , 'audio11-html5' );?></h2>
				 			</div>
							<div id="message" class="updated"><p><?php esc_html_e($lbg_audio11_html5_shoutcast_messages['data_saved']);?></p><p><?php esc_html_e($lbg_audio11_html5_shoutcast_messages['generate_for_this_player']);?></p></div>
							<div>
								<p>&raquo; <a href="?page=LBG_AUDIO11_HTML5_SHOUTCAST_Add_New"><?php esc_html_e( 'Add New (player)' , 'audio11-html5' );?></a></p>
								<p>&raquo; <a href="?page=LBG_AUDIO11_HTML5_SHOUTCAST_Manage_Players"><?php esc_html_e( 'Back to Manage Players' , 'audio11-html5' );?></a></p>
							</div>
						</div>
		  	<?php }
	} else {
		include_once($lbg_audio11_html5_shoutcast_path . 'tpl/add_player.php');
	}

}




//HTML content for playersettings
function lbg_audio11_html5_shoutcast_player_settings_page()
{
	global $wpdb;
	global $lbg_audio11_html5_shoutcast_messages;
	global $lbg_audio11_html5_shoutcast_path;

	if (isset($_GET['id']) && isset($_GET['name'])) {
		$_SESSION['xid']=$_GET['id'];
		$_SESSION['xname']=$_GET['name'];
	}

	if(array_key_exists('Submit', $_POST) && $_POST['Submit'] == 'Update Player Settings') {
		$_GET['xmlf']='';
		$except_arr=array('Submit','name','page_scroll_to_id_instances','pll_ajax_backend','page_scroll_to_id_instances');
			$wpdb->update(
				$wpdb->prefix .'lbg_audio11_html5_shoutcast_players',
				array(
				'name' => sanitize_text_field($_POST['name'])
				),
				array( 'id' => $_SESSION['xid'] )
			);
			$_SESSION['xname']=stripslashes($_POST['name']);


			foreach ($_POST as $key=>$val){
				if (in_array($key,$except_arr)) {
					unset($_POST[$key]);
				}
			}

			$wpdb->update(
				$wpdb->prefix .'lbg_audio11_html5_shoutcast_settings',
				$_POST,
				array( 'id' => sanitize_text_field($_SESSION['xid']) )
			);

			?>
			<div id="message" class="updated"><p><?php esc_html_e($lbg_audio11_html5_shoutcast_messages['data_saved']);?></p></div>
	<?php
	}

	$safe_sql=$wpdb->prepare( "SELECT * FROM (".$wpdb->prefix ."lbg_audio11_html5_shoutcast_settings) WHERE id = %d",$_SESSION['xid'] );
	$row = $wpdb->get_row($safe_sql,ARRAY_A);
	$row=lbg_audio11_html5_shoutcast_unstrip_array($row);
	$_POST = $row;
	$_POST=lbg_audio11_html5_shoutcast_unstrip_array($_POST);


	include_once($lbg_audio11_html5_shoutcast_path . 'tpl/settings_form.php');

}




//HTML duplicate player
function lbg_audio11_html5_shoutcast_duplicate_player_page()
{
	global $wpdb;
	global $lbg_audio11_html5_shoutcast_messages;
	global $lbg_audio11_html5_shoutcast_path;

	if (isset($_GET['id']) && isset($_GET['name'])) {
		$_SESSION['xid']=$_GET['id'];
		$_SESSION['xname']=$_GET['name'];
	}

	//insert player
	$wpdb->insert(
			$wpdb->prefix . "lbg_audio11_html5_shoutcast_players",
			array(
				'name' => 'Duplicate of Player '.sanitize_text_field($_SESSION['xid'])
			),
			array(
				'%s'
			)
		);

	//duplicate settings
	$safe_sql=$wpdb->prepare( "INSERT INTO ".$wpdb->prefix ."lbg_audio11_html5_shoutcast_settings (`playerWidth`, `radio_stream`, `historyFile`, `nowPlayingFile`, `nextFile`, `borderWidth`, `autoPlay`, `borderColor`, `bgColor`, `bgColorOpacity`, `barsColor`, `playButtonColor`, `playButtonHoverColor`, `centerPlayer`, `nowPlayingInterval`, `grabArtistPhoto`, `noImageAvailable`, `historyLeftPadding`, `historyRightPadding`, `historyTopPadding`, `historyBottomPadding`, `historyRecordTitleLimit`, `historyRecordAuthorLimit`, `songAuthorLineSeparatorOffColor`, `historyRecordTimeOffColor`, `historyRecordSongOffColor`, `historyRecordAuthorOffColor`, `songAuthorLineSeparatorOnColor`, `historyRecordTimeOnColor`, `historyRecordSongOnColor`, `historyRecordAuthorOnColor`, `historyRecordBackgroundOnColor`, `delay`, `width100Proc`, `sticky`, `activateForFooter`, `numberOfElementsDisplayed`) SELECT `playerWidth`, `radio_stream`, `historyFile`, `nowPlayingFile`, `nextFile`, `borderWidth`, `autoPlay`, `borderColor`, `bgColor`, `bgColorOpacity`, `barsColor`, `playButtonColor`, `playButtonHoverColor`, `centerPlayer`, `nowPlayingInterval`, `grabArtistPhoto`, `noImageAvailable`, `historyLeftPadding`, `historyRightPadding`, `historyTopPadding`, `historyBottomPadding`, `historyRecordTitleLimit`, `historyRecordAuthorLimit`, `songAuthorLineSeparatorOffColor`, `historyRecordTimeOffColor`, `historyRecordSongOffColor`, `historyRecordAuthorOffColor`, `songAuthorLineSeparatorOnColor`, `historyRecordTimeOnColor`, `historyRecordSongOnColor`, `historyRecordAuthorOnColor`, `historyRecordBackgroundOnColor`, `delay`, `width100Proc`, `sticky`, `activateForFooter`, `numberOfElementsDisplayed` FROM (".$wpdb->prefix ."lbg_audio11_html5_shoutcast_settings) WHERE id = %d",$_SESSION['xid'] );
	$wpdb->query($safe_sql);
	?>
	<div id="message" class="updated"><p><?php esc_html_e($lbg_audio11_html5_shoutcast_messages['duplicate_complete']);?></p></div>
	<?php

	$safe_sql="SELECT * FROM (".$wpdb->prefix ."lbg_audio11_html5_shoutcast_players) ORDER BY id";
	$result = $wpdb->get_results($safe_sql,ARRAY_A);
	include_once($lbg_audio11_html5_shoutcast_path . 'tpl/players.php');


}


function lbg_audio11_html5_shoutcast_player_help_page()
{
	global $lbg_audio11_html5_shoutcast_path;
	include_once($lbg_audio11_html5_shoutcast_path . 'tpl/help.php');
}

function lbg_audio11_html5_shoutcast_player_color_parameter($the_param)
{
	$to_return="#";
	if ($the_param=="transparent") {
		$to_return="";
	}
	return $to_return;
}


function lbg_audio11_html5_shoutcast_generate_preview_code($sliderID) {
	global $wpdb;

	$safe_sql=$wpdb->prepare( "SELECT * FROM (".$wpdb->prefix ."lbg_audio11_html5_shoutcast_settings) WHERE id = %d",$sliderID );
	$row = $wpdb->get_row($safe_sql,ARRAY_A);
	$row=lbg_audio11_html5_shoutcast_unstrip_array($row);


	$path_to_plugin = plugin_dir_url(__FILE__);
	$preload_aux='metadata';


	//download
	$pathToAjaxFiles_aux=$path_to_plugin.'audio11_html5_radio_history/';

	$playlist_str='';

	$new_div_start='';
	$new_div_end='';


	$content='<script>
		jQuery(function() {
setTimeout(function(){
			jQuery("#lbg_audio11_html5_shoutcast_'.$row["id"].'").audio11_html5({
				radio_stream:"'.$row["radio_stream"].'",
				playerWidth:'.$row["playerWidth"].',
				width100Proc:'.$row["width100Proc"].',
				sticky:'.$row["sticky"].',
				centerPlayer:'.$row["centerPlayer"].',
				grabArtistPhoto:'.$row["grabArtistPhoto"].',
				autoPlay:'.$row["autoPlay"].',
				borderWidth:'.$row["borderWidth"].',
				borderColor:"'.lbg_audio11_html5_shoutcast_player_color_parameter($row["borderColor"]).$row["borderColor"].'",
				bgColor:"'.lbg_audio11_html5_shoutcast_player_color_parameter($row["bgColor"]).$row["bgColor"].'",
				bgColorOpacity:'.($row["bgColorOpacity"]/100).',
				barsColor:"'.lbg_audio11_html5_shoutcast_player_color_parameter($row["barsColor"]).$row["barsColor"].'",
				playButtonColor:"'.lbg_audio11_html5_shoutcast_player_color_parameter($row["playButtonColor"]).$row["playButtonColor"].'",
				playButtonHoverColor:"'.lbg_audio11_html5_shoutcast_player_color_parameter($row["playButtonHoverColor"]).$row["playButtonHoverColor"].'",
				numberOfElementsDisplayed:'.$row["numberOfElementsDisplayed"].',
				historyLeftPadding:'.$row["historyLeftPadding"].',
				historyRightPadding:'.$row["historyRightPadding"].',
				historyTopPadding:'.$row["historyTopPadding"].',
				historyBottomPadding:'.$row["historyBottomPadding"].',
				historyRecordTitleLimit:'.$row["historyRecordTitleLimit"].',
				historyRecordAuthorLimit:'.$row["historyRecordAuthorLimit"].',
				songAuthorLineSeparatorOffColor:"'.lbg_audio11_html5_shoutcast_player_color_parameter($row["songAuthorLineSeparatorOffColor"]).$row["songAuthorLineSeparatorOffColor"].'",
				historyRecordTimeOffColor:"'.lbg_audio11_html5_shoutcast_player_color_parameter($row["historyRecordTimeOffColor"]).$row["historyRecordTimeOffColor"].'",
				historyRecordSongOffColor:"'.lbg_audio11_html5_shoutcast_player_color_parameter($row["historyRecordSongOffColor"]).$row["historyRecordSongOffColor"].'",
				historyRecordAuthorOffColor:"'.lbg_audio11_html5_shoutcast_player_color_parameter($row["historyRecordAuthorOffColor"]).$row["historyRecordAuthorOffColor"].'",
				songAuthorLineSeparatorOnColor:"'.lbg_audio11_html5_shoutcast_player_color_parameter($row["songAuthorLineSeparatorOnColor"]).$row["songAuthorLineSeparatorOnColor"].'",
				historyRecordTimeOnColor:"'.lbg_audio11_html5_shoutcast_player_color_parameter($row["historyRecordTimeOnColor"]).$row["historyRecordTimeOnColor"].'",
				historyRecordSongOnColor:"'.lbg_audio11_html5_shoutcast_player_color_parameter($row["historyRecordSongOnColor"]).$row["historyRecordSongOnColor"].'",
				historyRecordAuthorOnColor:"'.lbg_audio11_html5_shoutcast_player_color_parameter($row["historyRecordAuthorOnColor"]).$row["historyRecordAuthorOnColor"].'",
				historyRecordBackgroundOnColor:"'.lbg_audio11_html5_shoutcast_player_color_parameter($row["historyRecordBackgroundOnColor"]).$row["historyRecordBackgroundOnColor"].'",
				pathToAjaxFiles:"'.$pathToAjaxFiles_aux.'",
				nowPlayingInterval:'.$row["nowPlayingInterval"].',
				noImageAvailable:"'.$row["noImageAvailable"].'"
			});

}, '.($row["delay"]*1000).');
		});
	</script>
    '.$new_div_start.'<div class="audio11_html5">
            <audio id="lbg_audio11_html5_shoutcast_'.$row["id"].'" preload="'.$preload_aux.'">
              No HTML5 audio playback capabilities for this browser. Use <a href="https://www.google.com/intl/en/chrome/browser/">Chrome Browser!</a>
            </audio>
     </div>
		 <br style="clear:both;">
	'.$new_div_end;

	return str_replace("\r\n", '', $content);
}

function lbg_audio11_html5_shoutcast_shortcode($atts, $content=null) {
	global $wpdb;

	shortcode_atts( array('settings_id'=>''), $atts);
	if ($atts['settings_id']=='')
		$atts['settings_id']=1;


	return lbg_audio11_html5_shoutcast_generate_preview_code($atts['settings_id']);
}



register_activation_hook(__FILE__,"lbg_audio11_html5_shoutcast_activate"); //activate plugin and create the database
add_action('init', 'lbg_audio11_html5_shoutcast_init_sessions');	// initialize sessions
add_action('init', 'lbg_audio11_html5_shoutcast_load_styles');	// loads required styles
add_action('init', 'lbg_audio11_html5_shoutcast_load_scripts');			// loads required scripts
add_action('admin_menu', 'lbg_audio11_html5_shoutcast_plugin_menu'); // create menus
add_shortcode('lbg_audio11_html5_shoutcast', 'lbg_audio11_html5_shoutcast_shortcode');				// LBG AUDIO11 HTML5 shortcode



/** OTHER FUNCTIONS **/

//stripslashes for an entire array
function lbg_audio11_html5_shoutcast_unstrip_array($array){
	if (is_array($array)) {
		foreach($array as &$val){
			if(is_array($val)){
				$val = unstrip_array($val);
			} else {
				$val = stripslashes($val);

			}
		}
	}
	return $array;
}



function lbg_audio11_html5_footer_function() {
	global $wpdb;
	$safe_sql="SELECT `id`,`activateForFooter`,`sticky` FROM (".$wpdb->prefix ."lbg_audio11_html5_shoutcast_settings)";
	$result = $wpdb->get_results($safe_sql,ARRAY_A);


	$shortcode_id=0;
	foreach ( $result as $row ) {
		$row=lbg_audio11_html5_shoutcast_unstrip_array($row);
		if ($row['activateForFooter']==='true' && $row['sticky']==='true') {
			$shortcode_id=$row['id'];
		}
	}
	if ($shortcode_id>0)
    	echo do_shortcode("[lbg_audio11_html5_shoutcast settings_id='".$shortcode_id."']");;
}
add_action( 'wp_footer', 'lbg_audio11_html5_footer_function', 100 );





/* ajax update playlist record */
add_action('admin_head', 'lbg_audio11_html5_shoutcast_update_playlist_record_javascript');

function lbg_audio11_html5_shoutcast_update_playlist_record_javascript() {
	global $wpdb;
	//Set Your Nonce
	$lbg_audio11_html5_shoutcast_update_playlist_record_ajax_nonce = wp_create_nonce("lbg_audio11_html5_shoutcast_update_playlist_record-special-string");
	$lbg_audio11_html5_shoutcast_preview_record_ajax_nonce = wp_create_nonce("lbg_audio11_html5_shoutcast_preview_record-special-string");

	if(strpos($_SERVER['PHP_SELF'], 'wp-admin') !== false) {
			$page = (isset($_GET['page'])) ? $_GET['page'] : '';
			if(preg_match('/LBG_AUDIO11_HTML5_SHOUTCAST/i', $page)) {
?>



<script type="text/javascript" >
//delete the entire record
function lbg_audio11_html5_shoutcast_delete_entire_record (delete_id) {
	if (confirm('Are you sure?')) {
		jQuery("#lbg_audio11_html5_shoutcast_sortable").sortable('disable');
		jQuery("#"+delete_id).css("display","none");
		jQuery("#lbg_audio11_html5_shoutcast_updating_witness").css("display","block");
		var data = "action=lbg_audio11_html5_shoutcast_update_playlist_record&security=<?php echo esc_js($lbg_audio11_html5_shoutcast_update_playlist_record_ajax_nonce); ?>&updateType=lbg_audio11_html5_shoutcast_delete_entire_record&delete_id="+delete_id;
		// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
		jQuery.post(ajaxurl, data, function(response) {
			jQuery("#lbg_audio11_html5_shoutcast_sortable").sortable('enable');
			jQuery("#lbg_audio11_html5_shoutcast_updating_witness").css("display","none");
		});
	}
}




function showDialogPreview(theSliderID) {  //load content and open dialog
	var data ="action=lbg_audio11_html5_shoutcast_preview_record&security=<?php echo esc_js($lbg_audio11_html5_shoutcast_preview_record_ajax_nonce); ?>&theSliderID="+theSliderID;

	// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
	jQuery.post(ajaxurl, data, function(response) {
		jQuery('#previewDialogIframe').attr('src','<?php echo plugins_url("tpl/preview.html?d=".time(), __FILE__)?>');
		jQuery("#previewDialog").dialog("open");
	});
}


jQuery(document).ready(function($) {
	/*PREVIEW DIALOG BOX*/
	jQuery( "#previewDialog" ).dialog({
	  minWidth:1200,
	  minHeight:500,
	  title:"Plugin Preview",
	  modal: true,
	  autoOpen:false,
	  hide: "fade",
	  resizable: false,
	  open: function() {
	  },
	  close: function() {
		jQuery('#previewDialogIframe').attr('src','');
	  }
	});

});
</script>
<?php
		}
	}
}







add_action('wp_ajax_lbg_audio11_html5_shoutcast_preview_record', 'lbg_audio11_html5_shoutcast_preview_record_callback');

function lbg_audio11_html5_shoutcast_preview_record_callback() {
	check_ajax_referer( 'lbg_audio11_html5_shoutcast_preview_record-special-string', 'security' );
  global $wp_filesystem;
	if (empty($wp_filesystem)) {
    require_once (ABSPATH . '/wp-admin/includes/file.php');
    WP_Filesystem();
	}
	$aux_val='<html>
					<head>
						<link href="'.plugins_url('audio11_html5_radio_history/audio11_html5.css', __FILE__).'" rel="stylesheet" type="text/css">

						<script src="'.plugins_url('js/jquery-1.11.0.js', __FILE__).'" type="text/javascript"></script>
						<script src="'.plugins_url('js/jquery-ui-1.10.4.js', __FILE__).'"></script>
						<script src="'.plugins_url('audio11_html5_radio_history/js/jquery.mousewheel.min.js', __FILE__).'" type="text/javascript"></script>
						<script src="'.plugins_url('audio11_html5_radio_history/js/jquery.touchSwipe.min.js', __FILE__).'" type="text/javascript"></script>
						<script src="'.plugins_url('audio11_html5_radio_history/js/audio11_html5.js', __FILE__).'" type="text/javascript"></script>

					</head>
					<body style="padding:0px;margin:0px;">';

	$aux_val.=lbg_audio11_html5_shoutcast_generate_preview_code($_POST['theSliderID']);
	$aux_val.="</body>
				</html>";
	$filename=plugin_dir_path(__FILE__) . 'tpl/preview.html';
	if ( ! $wp_filesystem->put_contents(  $filename, $aux_val, FS_CHMOD_FILE) ) {
    echo "error saving file!";
  }


	wp_die(); // this is required to return a proper result
}



?>
