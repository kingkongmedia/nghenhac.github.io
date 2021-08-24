<div class="wrap">
	<div id="lbg_logo">
			<h2><?php esc_html_e( 'Manage Players - Add New Player' , 'audio11-html5' );?></h2>
 	</div>

    <form method="POST" enctype="multipart/form-data" id="form-add-playlist-record">
		<table class="wp-list-table widefat fixed pages" cellspacing="0">
		  <tr>
		    <td align="left" valign="middle" width="25%">&nbsp;</td>
		    <td align="left" valign="middle" width="77%"><a href="?page=LBG_AUDIO11_HTML5_SHOUTCAST_Manage_Players" style="padding-left:25%;"><?php esc_html_e( 'Back to Manage Players' , 'audio11-html5' );?></a></td>
		  </tr>
		  <tr>
		    <td width="25%" align="right" valign="middle" class="row-title"><?php esc_html_e( 'Name*' , 'audio11-html5' );?></td>
		    <td width="77%" align="left" valign="top"><input name="name" type="text" id="name" size="80" value="<?php echo (array_key_exists('name', $_POST))?esc_attr($_POST['name']):''?>" /></td>
		  </tr>
		  <tr>
		    <td colspan="2" align="left" valign="middle"><?php esc_html_e( '*Required fields' , 'audio11-html5' );?></td>
		  </tr>
		  <tr>
		    <td colspan="2" align="center" valign="middle"><input name="Submit" id="Submit" type="submit" class="button-primary" value="Add New"></td>
		  </tr>
		</table>
  </form>



</div>
