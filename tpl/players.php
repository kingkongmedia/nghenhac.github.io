<div class="wrap">
	<div id="lbg_logo">
			<h2><?php esc_html_e( 'Manage Players' , 'audio11-html5' );?></h2>
 	</div>
    <div><p><?php esc_html_e( 'From this section you can add multiple players.' , 'audio11-html5' );?></p></div>

    <div id="previewDialog"><iframe id="previewDialogIframe" src="" width="100%" height="600" style="border:0;"></iframe></div>

<div style="text-align:center; padding:0px 0px 20px 0px;"><img src="<?php echo esc_url(plugins_url('images/icons/add_icon.gif', dirname(__FILE__)))?>" alt="add" align="absmiddle" /> <a href="?page=LBG_AUDIO11_HTML5_SHOUTCAST_Add_New"><?php esc_html_e( 'Add new (player)' , 'audio11-html5' );?></a></div>

<table width="100%" class="widefat">

			<thead>
				<tr>
					<th scope="col" width="6%"><?php esc_html_e( 'ID' , 'audio11-html5' );?></th>
					<th scope="col" width="28%"><?php esc_html_e( 'Name' , 'audio11-html5' );?></th>
					<th scope="col" width="30%"><?php esc_html_e( 'Shortcode' , 'audio11-html5' );?></th>
					<th scope="col" width="25%"><?php esc_html_e( 'Action' , 'audio11-html5' );?></th>
					<th scope="col" width="11%"><?php esc_html_e( 'Preview' , 'audio11-html5' );?></th>
				</tr>
			</thead>

<tbody>
<?php foreach ( $result as $row )
	{
		$row=lbg_audio11_html5_shoutcast_unstrip_array($row); ?>
							<tr class="alternate author-self status-publish" valign="top">
					<td><?php echo esc_html($row['id'])?></td>
					<td><?php echo esc_html($row['name'])?></td>
					<td>[lbg_audio11_html5_shoutcast settings_id='<?php echo esc_html($row['id'])?>']</td>
					<td>
						<a href="?page=LBG_AUDIO11_HTML5_SHOUTCAST_Settings&amp;id=<?php echo esc_attr($row['id'])?>&amp;name=<?php echo esc_attr($row['name'])?>"><?php esc_html_e( 'Player Settings' , 'audio11-html5' );?></a> &nbsp;&nbsp;|&nbsp;&nbsp;

                        <a href="?page=LBG_AUDIO11_HTML5_SHOUTCAST_Manage_Players&id=<?php echo esc_attr($row['id'])?>" onclick="return confirm('Are you sure?')" style="color:#F00;"><?php esc_html_e( 'Delete' , 'audio11-html5' );?></a> &nbsp;&nbsp;|&nbsp;&nbsp;
                        <a href="?page=LBG_AUDIO11_HTML5_SHOUTCAST_Duplicate_Player&amp;id=<?php echo esc_attr($row['id'])?>&amp;name=<?php echo esc_attr($row['name'])?>"><?php esc_html_e( 'Duplicate' , 'audio11-html5' );?></a>
                        </td>
					<td><a href="javascript: void(0);" onclick="showDialogPreview(<?php echo esc_attr($row['id'])?>)"><img src="<?php echo plugins_url('images/icons/magnifier.png', dirname(__FILE__))?>" alt="preview" border="0" align="absmiddle" /></a></td>
	            </tr>
<?php } ?>
						</tbody>
		</table>





</div>
