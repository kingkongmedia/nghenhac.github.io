<style type="text/css">
.lbg_subtitle {color:#21759b;
	font-weight:bold;
	font-size:14px;
}
.regGray {	font-weight:normal;
	color:#555555;
}
.regb {	font-weight:bold;
}
</style>
<div class="wrap">
<div id="lbg_logo">
			<h2><?php esc_html_e( 'Help' , 'audio11-html5' );?></h2>
  </div>
<p><?php esc_html_e( 'This plugin requires at least WordPress 3.0' , 'audio11-html5' );?></p>
<ul class="lbg_list-1">
	<li><a href="#videotutorials"><?php esc_html_e( 'Video Tutorials' , 'audio11-html5' );?></a></li>
  <li><a href="#manage"><?php esc_html_e( 'Manage Players' , 'audio11-html5' );?></a></li>
  <li><a href="#settings"><?php esc_html_e( 'Player Settings' , 'audio11-html5' );?></a></li>
  <li><a href="#shoutcast"><?php esc_html_e( 'Shoutcast and Iceast Link Structure' , 'audio11-html5' );?></a></li>
  <li><a href="#shortcode"><?php esc_html_e( 'ShortCode' , 'audio11-html5' );?></a></li>
</ul>
<p>&nbsp;</p>
<p><span class="lbg_subtitle"><a name="videotutorials" id="videotutorials"></a><?php esc_html_e( 'Video Tutorials' , 'audio11-html5' );?></span></p>
<p><?php esc_html_e( 'How to install plugin' , 'audio11-html5' );?> - <a href="https://www.youtube.com/watch?v=bldyjPkJvvo" target="_blank">https://www.youtube.com/watch?v=bldyjPkJvvo</a><br />
	<?php esc_html_e( 'How to use the plugin' , 'audio11-html5' );?> - <a href="https://www.youtube.com/watch?v=SV7xkVEYXjM" target="_blank">https://www.youtube.com/watch?v=SV7xkVEYXjM</a>
</p>
<p>&nbsp;</p
<p class="lbg_subtitle"><a name="manage" id="manage"></a><?php esc_html_e( 'Manage Players' , 'audio11-html5' );?></p>
<p class=""><?php esc_html_e( 'From this section you can:' , 'audio11-html5' );?><br />
- <?php esc_html_e( 'add a new player' , 'audio11-html5' );?><br />
- <?php esc_html_e( 'select the player you want to edit by clicking "Player Settings"' , 'audio11-html5' );?><br />
- <?php esc_html_e( 'duplicate and existing player by clicking "Duplicate"' , 'audio11-html5' );?><br />
- <?php esc_html_e( 'delete an existing player by clicking "Delete"' , 'audio11-html5' );?>
</p>
<p class="">&nbsp;</p>
<p class="lbg_subtitle"><a name="settings" id="settings"></a><?php esc_html_e( 'Player Settings' , 'audio11-html5' );?></p>
<p><?php esc_html_e( 'From this section you can define the radio player settings.' , 'audio11-html5' );?></p>
<table class="wp-list-table widefat fixed pages" cellspacing="0">
  <tr>
    <td align="left" valign="top" width="25%">&nbsp;</td>
    <td align="left" valign="top" width="75%">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="left" valign="top" class="regb"><span class="regGray"><?php esc_html_e( 'General settings' , 'audio11-html5' );?></span></td>
  </tr>
  <tr>
    <td width="16%" align="left" valign="top" class="row-title"><?php esc_html_e( 'Radio Stream Link' , 'audio11-html5' );?></td>
    <td width="69%" align="left" valign="top"><?php esc_html_e( 'The radio stream you want to play. Please check ' , 'audio11-html5' );?><a href="#shoutcast"><?php esc_html_e( 'Shoutcast and Iceast link structure' , 'audio11-html5' );?></a> <?php esc_html_e( 'section for additional details.' , 'audio11-html5' );?></td>
  </tr>
	<tr>
    <td align="left" valign="top" class="row-title"><?php esc_html_e( 'Player Width' , 'audio11-html5' );?></td>
    <td align="left" valign="top"><?php esc_html_e( 'player width' , 'audio11-html5' );?></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="row-title"><?php esc_html_e( 'Player Width 100%' , 'audio11-html5' );?></td>
    <td align="left" valign="top"><?php esc_html_e( 'Possible values:' , 'audio11-html5' );?><br />
      <strong>true</strong> - <?php esc_html_e( 'the player width will be the width parent div where the player is inserted' , 'audio11-html5' );?><br />
      <strong>false</strong> - <?php esc_html_e( 'the player width will not be what you have set for "Player Width" parameter' , 'audio11-html5' );?></td>
  </tr>
	<tr>
		<td align="left" valign="top" class="row-title"><?php esc_html_e( 'Player Left Padding' , 'audio11-html5' );?></td>
		<td align="left" valign="top"><?php esc_html_e( 'player area left inner padding (in pixels)' , 'audio11-html5' );?></td>
	</tr>
	<tr>
		<td align="left" valign="top" class="row-title"><?php esc_html_e( 'Player Right Padding' , 'audio11-html5' );?></td>
		<td align="left" valign="top"><?php esc_html_e( 'player area right inner padding (in pixels)' , 'audio11-html5' );?></td>
	</tr>
	<tr>
		<td align="left" valign="top" class="row-title"><?php esc_html_e( 'Player Top Padding' , 'audio11-html5' );?></td>
		<td align="left" valign="top"><?php esc_html_e( 'player area top inner padding (in pixels)' , 'audio11-html5' );?></td>
	</tr>
	<tr>
		<td align="left" valign="top" class="row-title"><?php esc_html_e( 'Player Bottom Padding' , 'audio11-html5' );?></td>
		<td align="left" valign="top"><?php esc_html_e( 'player area bottom inner padding (in pixels)' , 'audio11-html5' );?></td>
	</tr>
	<tr>
		<td align="left" valign="top" class="row-title"><?php esc_html_e( 'Center Player' , 'audio11-html5' );?></td>
		<td align="left" valign="top"><?php esc_html_e( 'Possible values:' , 'audio11-html5' );?><br />
			<strong>true</strong> - <?php esc_html_e( 'the radio player will be centered in your layout containing div' , 'audio11-html5' );?><br />
			<strong>false</strong> - <?php esc_html_e( 'the radio player will be centered' , 'audio11-html5' );?></td>
	</tr>
	<tr>
    <td align="left" valign="top" class="row-title"><?php esc_html_e( 'Sticky' , 'audio11-html5' );?></td>
    <td align="left" valign="top"><?php esc_html_e( 'Possible values:' , 'audio11-html5' );?><br />
      <strong>true</strong> - <?php esc_html_e( 'the radio player will be positioned on the right-bottom corner beeing fixed while the page scrolls' , 'audio11-html5' );?><br />
      <strong>false</strong> - <?php esc_html_e( 'the radio player will NOT be sticky and it will behave like any other element on the page.' , 'audio11-html5' );?></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="row-title"><?php esc_html_e( 'Activate For Footer' , 'audio11-html5' );?></td>
    <td align="left" valign="top"><?php esc_html_e( 'Possible values:' , 'audio11-html5' );?><br />
      <strong>true</strong> - <?php esc_html_e( 'the player will be added in the website footer and it will be present on all pages' , 'audio11-html5' );?><br />
      <strong>false</strong> - <?php esc_html_e( 'the player will be added in the website footer and it will be present only on the pages where the shortcode has been added' , 'audio11-html5' );?></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="row-title"><?php esc_html_e( 'Auto Play' , 'audio11-html5' );?></td>
    <td align="left" valign="top"><?php esc_html_e( 'Possible values:' , 'audio11-html5' );?><br />
      <strong>true</strong> - <?php esc_html_e( 'autoplays audio file' , 'audio11-html5' );?><br />
      <strong>false</strong> - <?php esc_html_e( 'does not autoplay the audio file' , 'audio11-html5' );?></td>
  </tr>
	<tr>
		<td align="left" valign="top" class="row-title"><?php esc_html_e( 'Default "No Image Available"' , 'audio11-html5' );?></td>
		<td align="left" valign="top"><?php esc_html_e( 'The path to "No Image Available" image which will appear when there is no artist image found in the database' , 'audio11-html5' );?></td>
	</tr>
	<tr>
		<td align="left" valign="top" class="row-title"><?php esc_html_e( 'Grab Artist Photo' , 'audio11-html5' );?></td>
		<td align="left" valign="top"><?php esc_html_e( 'Possible values:' , 'audio11-html5' );?><br />
			<strong>true</strong> - <?php esc_html_e( 'it will grab the artist photo' , 'audio11-html5' );?><br />
		<strong>false</strong> - <?php esc_html_e( 'it will always use the image specified by ' , 'audio11-html5' );?><span class="regb"><?php esc_html_e( '"No Image Available"' , 'audio11-html5' );?></span> <?php esc_html_e( 'parameter' , 'audio11-html5' );?></td>
	</tr>
  <tr>
    <td align="left" valign="top" class="row-title"><?php esc_html_e( 'Player Border Size' , 'audio11-html5' );?></td>
    <td align="left" valign="top"><?php esc_html_e( 'The size for entire player border (including history area)' , 'audio11-html5' );?></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="row-title"><?php esc_html_e( 'Player Border Color' , 'audio11-html5' );?></td>
    <td align="left" valign="top"><?php esc_html_e( 'The player border color (hexa or "transparent")' , 'audio11-html5' );?></td>
  </tr>
	<tr>
		<td align="left" valign="top" class="row-title"><?php esc_html_e( 'Player Background Color' , 'audio11-html5' );?></td>
		<td align="left" valign="top"><?php esc_html_e( 'The player background color (hexa or "transparent")' , 'audio11-html5' );?></td>
	</tr>
	<tr>
		<td align="left" valign="top" class="row-title"><?php esc_html_e( 'Player Background Color Opacity/Alpha' , 'audio11-html5' );?></td>
		<td align="left" valign="top"><?php esc_html_e( 'The player background color opacity. It takes vales from 0 to 100.' , 'audio11-html5' );?></td>
	</tr>
	<tr>
		<td align="left" valign="top" class="row-title"><?php esc_html_e( 'Total Number Of Elements Displayed (including the current playing one)' , 'audio11-html5' );?></td>
		<td align="left" valign="top"><?php esc_html_e( 'The total number of songs shown in the history, including the current playing one' , 'audio11-html5' );?></td>
	</tr>
  <tr>
    <td align="left" valign="top" class="row-title"><?php esc_html_e( 'Refresh Interval for Now-Playing Info' , 'audio11-html5' );?></td>
    <td align="left" valign="top"><?php esc_html_e( 'The calling interval (in seconds) for the file which reads the current playing song' , 'audio11-html5' );?></td>
  </tr>
	<tr>
    <td align="left" valign="top" class="row-title"><?php esc_html_e( 'Player Loading Delay' , 'audio11-html5' );?></td>
    <td align="left" valign="top"><?php esc_html_e( 'The timeout delay (in seconds) for player loading' , 'audio11-html5' );?></td>
  </tr>
	<tr>
		<td align="left" valign="top" class="row-title"><?php esc_html_e( 'Animated Bars Color' , 'audio11-html5' );?></td>
		<td align="left" valign="top"><?php esc_html_e( 'The animated bars color (hexa or "transparent"). The animated bars will appear near the play button or the current playing song.' , 'audio11-html5' );?></td>
	</tr>
	<tr>
		<td align="left" valign="top" class="row-title"><?php esc_html_e( 'Play Button Color OFF State' , 'audio11-html5' );?></td>
		<td align="left" valign="top"><?php esc_html_e( 'The play/pause buttons color (hexa or "transparent"), off state' , 'audio11-html5' );?></td>
	</tr>
	<tr>
		<td align="left" valign="top" class="row-title"><?php esc_html_e( 'Play Button Color ON State' , 'audio11-html5' );?></td>
		<td align="left" valign="top"><?php esc_html_e( 'The play/pause buttons color (hexa or "transparent"), hover state' , 'audio11-html5' );?></td>
	</tr>
  <tr>
    <td align="left" valign="top" class="row-title">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="left" valign="top" class="regGray"><?php esc_html_e( 'History  Settings' , 'audio11-html5' );?></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="row-title"><?php esc_html_e( 'History Record Title Characters Limit' , 'audio11-html5' );?></td>
    <td align="left" valign="top"><?php esc_html_e( 'The history record title characters limit. All the other characters will be removed and replaced with ...' , 'audio11-html5' );?></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="row-title"><?php esc_html_e( 'History Record Author Characters Limit' , 'audio11-html5' );?></td>
    <td align="left" valign="top"><?php esc_html_e( 'The history record author characters limit. All the other characters will be remoeved and replaced with ...' , 'audio11-html5' );?></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="row-title"><?php esc_html_e( 'History Record Time Color OFF State' , 'audio11-html5' );?></td>
    <td align="left" valign="top"><?php esc_html_e( 'The history record time color (hexa or "transparent"), OFF state.' , 'audio11-html5' );?></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="row-title"><?php esc_html_e( 'History Record Song Color OFF State' , 'audio11-html5' );?></td>
    <td align="left" valign="top"><?php esc_html_e( 'The history record song title color (hexa or "transparent"), OFF state.' , 'audio11-html5' );?></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="row-title"><?php esc_html_e( 'History Record Author Color OFF State' , 'audio11-html5' );?></td>
    <td align="left" valign="top"><?php esc_html_e( 'The history record author/singer color (hexa or "transparent"), OFF state.' , 'audio11-html5' );?></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="row-title"><?php esc_html_e( 'Line Separator Color (between Song Title & Song Author) OFF State' , 'audio11-html5' );?></td>
    <td align="left" valign="top"><?php esc_html_e( 'The history record line separator color (hexa or "transparent"), between Song Title & Song Author, OFF state.' , 'audio11-html5' );?></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="row-title"><?php esc_html_e( 'History Record Background Color ON State' , 'audio11-html5' );?></td>
    <td align="left" valign="top"><?php esc_html_e( 'The history record background color (hexa or "transparent"), OFF state.' , 'audio11-html5' );?></td>
  </tr>
	<tr>
    <td align="left" valign="top" class="row-title"><?php esc_html_e( 'History Record Time Color ON State' , 'audio11-html5' );?></td>
    <td align="left" valign="top"><?php esc_html_e( 'The history record time color (hexa or "transparent"), OFF state.' , 'audio11-html5' );?></td>
  </tr>
	<tr>
    <td align="left" valign="top" class="row-title"><?php esc_html_e( 'History Record Song Color ON State' , 'audio11-html5' );?></td>
    <td align="left" valign="top"><?php esc_html_e( 'The history record song title color (hexa or "transparent"), OFF state.' , 'audio11-html5' );?></td>
  </tr>
	<tr>
    <td align="left" valign="top" class="row-title"><?php esc_html_e( 'History Record Author Color ON State' , 'audio11-html5' );?></td>
    <td align="left" valign="top"><?php esc_html_e( 'The history record author/singer color (hexa or "transparent"), ON state.' , 'audio11-html5' );?></td>
  </tr>
	<tr>
    <td align="left" valign="top" class="row-title"><?php esc_html_e( 'Line Separator Color (between Song Title & Song Author) ON State' , 'audio11-html5' );?></td>
    <td align="left" valign="top"><?php esc_html_e( 'The history record line separator color (hexa or "transparent"), between Song Title & Song Author, ON state.' , 'audio11-html5' );?></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="row-title">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>

<p><span class="lbg_subtitle"><a name="shoutcast" id="shoutcast"></a><?php esc_html_e( 'Shoutcast and Iceast Link Structure' , 'audio11-html5' );?></span></p>
<p><strong>- <u><?php esc_html_e( 'SHOUTCAST LINK' , 'audio11-html5' );?></u></strong></p>
<p>http://[domain]:[port] <?php esc_html_e( 'OR' , 'audio11-html5' );?></p>
<p>http://[ip]:[port]</p>
<p>Ex: http://83.169.60.45:80</p>
<p><strong><?php esc_html_e( 'IMPORTANT:' , 'audio11-html5' );?></strong> <?php esc_html_e( 'For the vast majority of the shoutcast streams, try appending "/" to the stream so it looks like this:' , 'audio11-html5' );?></p>
<p>http://[ip]:[port]/;</p>
<p>Ex: http://83.169.60.45:80/;</p>
<p><strong>- <u><?php esc_html_e( 'ICECAST LINK' , 'audio11-html5' );?></u></strong></p>
<p>http://[domain]:[port]/mountpoint</p>
<p>Ex: http://87.230.59.20:80/iloveradio2.mp3</p>
<p>&nbsp;</p>
<p><strong>- <u><?php esc_html_e( 'RADIONOMY LINK' , 'audio11-html5' );?></u></strong></p>
<p><?php esc_html_e( 'For radio hosted by radionomy.com, the link looks like this:' , 'audio11-html5' );?> http://streaming.radionomy.com/ABC-Piano</p>
<p><?php esc_html_e( 'Due to the fact that the IP is unknown, the player can not access current playing song name and artist photo. It will play it and it will display the radio name.' , 'audio11-html5' );?></p>
<p>&nbsp;</p>
<p><strong><?php esc_html_e( 'NOTE:' , 'audio11-html5' );?></strong> <?php esc_html_e( 'Radio Stream should be MP3 type, the support for AAC/AAC+ stream depends on the browser support.' , 'audio11-html5' );?></p>
<p>&nbsp;</p>
<p><span class="lbg_subtitle"><a name="shortcode" id="shortcode"></a><?php esc_html_e( 'ShortCode' , 'audio11-html5' );?></span></p>
<p><?php esc_html_e( 'The shortcode is:' , 'audio11-html5' );?> <br />
[lbg_audio11_html5_shoutcast settings_id='1']<br />
<?php esc_html_e( 'where' , 'audio11-html5' );?> <br />
 <?php esc_html_e( 'settings_id is the player ID defined in "Manage Players" section' , 'audio11-html5' );?></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>
