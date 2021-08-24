<script>
jQuery(document).ready(function() {

	// Uploading files

	jQuery('#upload_noImageAvailable_button').on( "click", function(event) {
		var file_frame;
		event.preventDefault();
		// If the media frame already exists, reopen it.
		if ( file_frame ) {
			file_frame.open();
			return;
		}
		// Create the media frame.
		file_frame = wp.media.frames.file_frame = wp.media({
			title: jQuery( this ).data( 'uploader_title' ),
			button: {
			text: jQuery( this ).data( 'uploader_button_text' ),
			},
			multiple: false // Set to true to allow multiple files to be selected
		});
		// When an image is selected, run a callback.
		file_frame.on( 'select', function() {
			// We set multiple to false so only get one image from the uploader
			attachment = file_frame.state().get('selection').first().toJSON();
			// Do something with attachment.id and/or attachment.url here
			jQuery('#noImageAvailable').val(attachment.url);
			jQuery('#noImageAvailable_preview').attr('src',attachment.url);
		});
		// Finally, open the modal
		file_frame.open();
	});




});
</script>
<div class="wrap">
	<div id="lbg_logo">
			<h2><?php esc_html_e( 'Player Settings for player:' , 'audio11-html5' );?> <span style="color:#FF0000; font-weight:bold;"><?php echo esc_html($_SESSION['xname'])?> - <?php esc_html_e( 'ID' , 'audio11-html5' );?> #<?php echo esc_html($_SESSION['xid'])?></span></h2>
 	</div>

	<div style="text-align:center; padding:0px 0px 20px 0px;"><img src="<?php echo esc_url(plugins_url('images/icons/magnifier.png', dirname(__FILE__)))?>" alt="add" align="absmiddle" /> <a href="javascript: void(0);" onclick="showDialogPreview(<?php echo esc_js($_SESSION['xid'])?>)"><?php esc_html_e( 'Preview Player' , 'audio11-html5' );?></a></div>

	<div id="previewDialog"><iframe id="previewDialogIframe" src="" width="100%" height="600" style="border:0;"></iframe></div>

  <form method="POST" enctype="multipart/form-data" id="form-player-settings">
	<script>
	jQuery(function() {
		var icons = {
			header: "ui-icon-circle-arrow-e",
			headerSelected: "ui-icon-circle-arrow-s"
		};
		jQuery( "#accordion" ).accordion({
			icons: icons,
			autoHeight: false
		});
	});
	</script>


<div id="accordion">
  <h3><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php esc_html_e( 'General Settings' , 'audio11-html5' );?></a></h3>
  <div style="padding:30px;">
	  <table class="wp-list-table widefat fixed pages" cellspacing="0">
		  <tr>
		    <td align="right" valign="top" class="row-title" width="35%"><?php esc_html_e( 'Player Name' , 'audio11-html5' );?></td>
		    <td align="left" valign="top" width="65%"><input name="name" type="text" size="40" id="name" value="<?php echo esc_attr($_SESSION['xname']);?>"/></td>
	    </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Radio Stream Link' , 'audio11-html5' );?></td>
		    <td align="left" valign="middle"><input name="radio_stream" type="text" size="60" id="radio_stream" value="<?php echo esc_attr($_POST['radio_stream']);?>"/></td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title">&nbsp;</td>
		    <td align="left" valign="top"><span class="small_text"><u><?php esc_html_e( 'Shoutcast link structure:' , 'audio11-html5' );?></u> http://[ip]:[port]/;<br />
	        <u><?php esc_html_e( 'Icecast link structure:' , 'audio11-html5' );?></u> http://[domain]:[port]/mountpoint</span></td>
	      </tr>
				<tr>
					<td align="right" valign="top" class="row-title"><?php esc_html_e( 'Player Width' , 'audio11-html5' );?></td>
					<td align="left" valign="middle"><input name="playerWidth" type="text" size="25" id="playerWidth" value="<?php echo esc_attr($_POST['playerWidth']);?>"/></td>
					</tr>
				<tr>
				    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Player Width 100%' , 'audio11-html5' );?></td>
				    <td align="left" valign="middle"><select name="width100Proc" id="width100Proc">
		              <option value="true" <?php echo (($_POST['width100Proc']=='true')?'selected="selected"':'')?>>true</option>
		              <option value="false" <?php echo (($_POST['width100Proc']=='false')?'selected="selected"':'')?>>false</option>
		            </select></td>
			    </tr>
					<tr>
						<td align="right" valign="top" class="row-title" width="35%"><?php esc_html_e( 'Player Left Padding' , 'audio11-html5' );?></td>
						<td align="left" valign="middle" width="65%"><input name="historyLeftPadding" type="text" size="25" id="historyLeftPadding" value="<?php echo esc_attr($_POST['historyLeftPadding']);?>"/> <?php esc_html_e( 'px' , 'audio11-html5' );?></td>
					</tr>
					<tr>
					    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Player Right Padding' , 'audio11-html5' );?></td>
					    <td align="left" valign="middle"><input name="historyRightPadding" type="text" size="25" id="historyRightPadding" value="<?php echo esc_attr($_POST['historyRightPadding']);?>"/> <?php esc_html_e( 'px' , 'audio11-html5' );?></td>
				  </tr>
					<tr>
						<td align="right" valign="top" class="row-title"><?php esc_html_e( 'Player Top Padding' , 'audio11-html5' );?></td>
						<td align="left" valign="middle"><input name="historyTopPadding" type="text" size="25" id="historyTopPadding" value="<?php echo esc_attr($_POST['historyTopPadding']);?>"/> <?php esc_html_e( 'px' , 'audio11-html5' );?></td>
					</tr>
					<tr>
					    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Player Bottom Padding' , 'audio11-html5' );?></td>
					    <td align="left" valign="middle"><input name="historyBottomPadding" type="text" size="25" id="historyBottomPadding" value="<?php echo esc_attr($_POST['historyBottomPadding']);?>"/> <?php esc_html_e( 'px' , 'audio11-html5' );?></td>
				  </tr>
					<tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Center Player' , 'audio11-html5' );?></td>
		    <td align="left" valign="middle"><select name="centerPlayer" id="centerPlayer">
              <option value="true" <?php echo (($_POST['centerPlayer']=='true')?'selected="selected"':'')?>>true</option>
              <option value="false" <?php echo (($_POST['centerPlayer']=='false')?'selected="selected"':'')?>>false</option>
            </select></td>
	    	</tr>
				<tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Sticky' , 'audio11-html5' );?></td>
		    <td align="left" valign="middle"><select name="sticky" id="sticky">
              <option value="true" <?php echo (($_POST['sticky']=='true')?'selected="selected"':'')?>>true</option>
              <option value="false" <?php echo (($_POST['sticky']=='false')?'selected="selected"':'')?>>false</option>
            </select></td>
	   </tr>
           <tr>
                <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Activate For Footer (it needs Sticky set to true)' , 'audio11-html5' );?></td>
                <td align="left" valign="middle"><select name="activateForFooter" id="activateForFooter">
                  <option value="true" <?php echo (($_POST['activateForFooter']=='true')?'selected="selected"':'')?>>true</option>
                  <option value="false" <?php echo (($_POST['activateForFooter']=='false')?'selected="selected"':'')?>>false</option>
                </select></td>
           </tr>
				<tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Auto Play' , 'audio11-html5' );?></td>
		    <td align="left" valign="middle"><select name="autoPlay" id="autoPlay">
              <option value="true" <?php echo (($_POST['autoPlay']=='true')?'selected="selected"':'')?>>true</option>
              <option value="false" <?php echo (($_POST['autoPlay']=='false')?'selected="selected"':'')?>>false</option>
            </select></td>
	    </tr>

		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Default "No Image Available"' , 'audio11-html5' );?></td>
		    <td align="left" valign="top"><input name="noImageAvailable" type="text" id="noImageAvailable" size="80" value="<?php echo esc_attr($_POST['noImageAvailable'])?>" /> <input name="upload_noImageAvailable_button" type="button" id="upload_noImageAvailable_button" value="Change Image" />
		      <br />
		      <?php esc_html_e( 'Enter an URL or upload an image' , 'audio11-html5' );?><br />
              <div id="noImageAvailable_preview_div" style="padding:5px 0;"> <img src="<?php echo esc_url($_POST['noImageAvailable'])?>" name="noImageAvailable_preview" id="noImageAvailable_preview" /> </div></td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Grab Artist Photo' , 'audio11-html5' );?></td>
		    <td align="left" valign="middle"><select name="grabArtistPhoto" id="grabArtistPhoto">
              <option value="true" <?php echo (($_POST['grabArtistPhoto']=='true')?'selected="selected"':'')?>>true</option>
              <option value="false" <?php echo (($_POST['grabArtistPhoto']=='false')?'selected="selected"':'')?>>false</option>
            </select></td>
	      </tr>
				<tr>
			    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Player Border Width' , 'audio11-html5' );?></td>
			    <td align="left" valign="middle"><input name="borderWidth" type="text" size="25" id="borderWidth" value="<?php echo esc_attr($_POST['borderWidth']);?>"/></td>
		      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Player Border Color' , 'audio11-html5' );?></td>
		    <td align="left" valign="middle"><input name="borderColor" type="text" size="25" id="borderColor" value="<?php echo esc_attr($_POST['borderColor']);?>" style="background-color:#<?php echo esc_attr($_POST['borderColor']);?>" />
            <script>
jQuery('#borderColor').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).css("background-color",'#'+hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	jQuery(this).ColorPickerSetColor(this.value);
});
              </script>            </td>
	      </tr>
			<tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Player Background Color' , 'audio11-html5' );?></td>
		    <td align="left" valign="middle"><input name="bgColor" type="text" size="25" id="bgColor" value="<?php echo esc_attr($_POST['bgColor']);?>" style="background-color:#<?php echo esc_attr($_POST['bgColor']);?>" />
            <script>
jQuery('#bgColor').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).css("background-color",'#'+hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	jQuery(this).ColorPickerSetColor(this.value);
});
              </script>            </td>
	      </tr>
				<tr>
					<td align="right" valign="top" class="row-title"><?php esc_html_e( 'Player Background Color Opacity/Alpha' , 'audio11-html5' );?></td>
					<td align="left" valign="middle"><script>
				jQuery(function() {
				jQuery( "#bgColorOpacity-slider-range-min" ).slider({
				range: "min",
				value: <?php echo esc_js($_POST['bgColorOpacity']);?>,
				min: 0,
				max: 100,
				slide: function( event, ui ) {
					jQuery( "#bgColorOpacity" ).val(ui.value );
				}
				});
				jQuery( "#bgColorOpacity" ).val( jQuery( "#bgColorOpacity-slider-range-min" ).slider( "value" ) );
				});
						</script>
									<div id="bgColorOpacity-slider-range-min" class="inlinefloatleft" style="width:200px;"></div>
						<div class="inlinefloatleft" style="padding-left:20px;">%
							<input name="bgColorOpacity" type="text" size="10" id="bgColorOpacity" style="border:0; color:#000000; font-weight:bold;"/>
							</div></td>
				</tr>
				<tr>
					<td align="right" valign="top" class="row-title"><?php esc_html_e( 'Total Number Of Elements Displayed (including the current playing one)' , 'audio11-html5' );?></td>
					<td align="left" valign="middle" width="65%"><input name="numberOfElementsDisplayed" type="text" size="25" id="numberOfElementsDisplayed" value="<?php echo esc_attr($_POST['numberOfElementsDisplayed']);?>"/></td>
				</tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Refresh Interval for Now-Playing Info' , 'audio11-html5' );?></td>
		    <td align="left" valign="middle"><input name="nowPlayingInterval" type="text" size="25" id="nowPlayingInterval" value="<?php echo esc_attr($_POST['nowPlayingInterval']);?>"/> <?php esc_html_e( 'seconds (This value cannot be smaller than 35s)' , 'audio11-html5' );?></td>
	      </tr>
			<tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Player Loading Delay' , 'audio11-html5' );?></td>
		    <td align="left" valign="middle"><input name="delay" type="text" size="25" id="delay" value="<?php echo esc_attr($_POST['delay']);?>"/> <?php esc_html_e( 'seconds' , 'audio11-html5' );?></td>
	      </tr>
				<tr>
				<td align="right" valign="top" class="row-title"><?php esc_html_e( 'Animated Bars Color' , 'audio11-html5' );?></td>
				<td align="left" valign="middle"><input name="barsColor" type="text" size="25" id="barsColor" value="<?php echo esc_attr($_POST['barsColor']);?>" style="background-color:#<?php echo esc_attr($_POST['barsColor']);?>" />
						<script>
				jQuery('#barsColor').ColorPicker({
				onSubmit: function(hsb, hex, rgb, el) {
				jQuery(el).val(hex);
				jQuery(el).css("background-color",'#'+hex);
				jQuery(el).ColorPickerHide();
				},
				onBeforeShow: function () {
				jQuery(this).ColorPickerSetColor(this.value);
				}
				})
				.bind('keyup', function(){
				jQuery(this).ColorPickerSetColor(this.value);
				});
							</script>            </td>
				</tr>
				<tr>
				<td align="right" valign="top" class="row-title"><?php esc_html_e( 'Play Button Color OFF State' , 'audio11-html5' );?></td>
				<td align="left" valign="middle"><input name="playButtonColor" type="text" size="25" id="playButtonColor" value="<?php echo esc_attr($_POST['playButtonColor']);?>" style="background-color:#<?php echo esc_attr($_POST['playButtonColor']);?>" />
						<script>
				jQuery('#playButtonColor').ColorPicker({
				onSubmit: function(hsb, hex, rgb, el) {
				jQuery(el).val(hex);
				jQuery(el).css("background-color",'#'+hex);
				jQuery(el).ColorPickerHide();
				},
				onBeforeShow: function () {
				jQuery(this).ColorPickerSetColor(this.value);
				}
				})
				.bind('keyup', function(){
				jQuery(this).ColorPickerSetColor(this.value);
				});
							</script>            </td>
				</tr>
				<tr>
				<td align="right" valign="top" class="row-title"><?php esc_html_e( 'Play Button Color ON State' , 'audio11-html5' );?></td>
				<td align="left" valign="middle"><input name="playButtonHoverColor" type="text" size="25" id="playButtonHoverColor" value="<?php echo esc_attr($_POST['playButtonHoverColor']);?>" style="background-color:#<?php echo esc_attr($_POST['playButtonHoverColor']);?>" />
						<script>
				jQuery('#playButtonHoverColor').ColorPicker({
				onSubmit: function(hsb, hex, rgb, el) {
				jQuery(el).val(hex);
				jQuery(el).css("background-color",'#'+hex);
				jQuery(el).ColorPickerHide();
				},
				onBeforeShow: function () {
				jQuery(this).ColorPickerSetColor(this.value);
				}
				})
				.bind('keyup', function(){
				jQuery(this).ColorPickerSetColor(this.value);
				});
							</script>            </td>
				</tr>
		 <tr>
		   <td align="right" valign="top" class="row-title">&nbsp;</td>
		   <td align="left" valign="middle">&nbsp;</td>
	      </tr>

      </table>
  </div>
  <h3><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php esc_html_e( 'History Settings' , 'audio11-html5' );?></a></h3>
  <div style="padding:30px;">
	  <table class="wp-list-table widefat fixed pages" cellspacing="0">
			<tr>
				<td align="right" valign="top" class="row-title" width="35%"><?php esc_html_e( 'History Record Title Characters Limit' , 'audio11-html5' );?></td>
				<td align="left" valign="middle"><input name="historyRecordTitleLimit" type="text" size="25" id="historyRecordTitleLimit" value="<?php echo esc_attr($_POST['historyRecordTitleLimit']);?>"/></td>
			</tr>
			<tr>
			    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'History Record Author Characters Limit' , 'audio11-html5' );?></td>
			    <td align="left" valign="middle"><input name="historyRecordAuthorLimit" type="text" size="25" id="historyRecordAuthorLimit" value="<?php echo esc_attr($_POST['historyRecordAuthorLimit']);?>"/></td>
		  </tr>

			<tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'History Record Time Color OFF State' , 'audio11-html5' );?></td>
		    <td align="left" valign="middle"><input name="historyRecordTimeOffColor" type="text" size="25" id="historyRecordTimeOffColor" value="<?php echo esc_attr($_POST['historyRecordTimeOffColor']);?>" style="background-color:#<?php echo esc_attr($_POST['historyRecordTimeOffColor']);?>" />
            <script>
jQuery('#historyRecordTimeOffColor').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).css("background-color",'#'+hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	jQuery(this).ColorPickerSetColor(this.value);
});
              </script>            </td>
	      </tr>


				<tr>
					<td align="right" valign="top" class="row-title"><?php esc_html_e( 'History Record Song Color OFF State' , 'audio11-html5' );?></td>
					<td align="left" valign="middle"><input name="historyRecordSongOffColor" type="text" size="25" id="historyRecordSongOffColor" value="<?php echo esc_attr($_POST['historyRecordSongOffColor']);?>" style="background-color:#<?php echo esc_attr($_POST['historyRecordSongOffColor']);?>" />
							<script>
	jQuery('#historyRecordSongOffColor').ColorPicker({
		onSubmit: function(hsb, hex, rgb, el) {
			jQuery(el).val(hex);
			jQuery(el).css("background-color",'#'+hex);
			jQuery(el).ColorPickerHide();
		},
		onBeforeShow: function () {
			jQuery(this).ColorPickerSetColor(this.value);
		}
	})
	.bind('keyup', function(){
		jQuery(this).ColorPickerSetColor(this.value);
	});
								</script>            </td>
					</tr>


					<tr>
						<td align="right" valign="top" class="row-title"><?php esc_html_e( 'History Record Author Color OFF State' , 'audio11-html5' );?></td>
						<td align="left" valign="middle"><input name="historyRecordAuthorOffColor" type="text" size="25" id="historyRecordAuthorOffColor" value="<?php echo esc_attr($_POST['historyRecordAuthorOffColor']);?>" style="background-color:#<?php echo esc_attr($_POST['historyRecordAuthorOffColor']);?>" />
								<script>
		jQuery('#historyRecordAuthorOffColor').ColorPicker({
			onSubmit: function(hsb, hex, rgb, el) {
				jQuery(el).val(hex);
				jQuery(el).css("background-color",'#'+hex);
				jQuery(el).ColorPickerHide();
			},
			onBeforeShow: function () {
				jQuery(this).ColorPickerSetColor(this.value);
			}
		})
		.bind('keyup', function(){
			jQuery(this).ColorPickerSetColor(this.value);
		});
									</script>            </td>
						</tr>
		      <tr>
					    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Line Separator Color (between Song Title & Song Author) OFF State' , 'audio11-html5' );?></td>
					    <td align="left" valign="middle"><input name="songAuthorLineSeparatorOffColor" type="text" size="25" id="songAuthorLineSeparatorOffColor" value="<?php echo esc_attr($_POST['songAuthorLineSeparatorOffColor']);?>" style="background-color:#<?php echo esc_attr($_POST['songAuthorLineSeparatorOffColor']);?>" />
			            <script>
			jQuery('#songAuthorLineSeparatorOffColor').ColorPicker({
				onSubmit: function(hsb, hex, rgb, el) {
					jQuery(el).val(hex);
					jQuery(el).css("background-color",'#'+hex);
					jQuery(el).ColorPickerHide();
				},
				onBeforeShow: function () {
					jQuery(this).ColorPickerSetColor(this.value);
				}
			})
			.bind('keyup', function(){
				jQuery(this).ColorPickerSetColor(this.value);
			});
			              </script>            </td>
			</tr>
<tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'History Record Background Color ON State' , 'audio11-html5' );?></td>
		    <td align="left" valign="middle"><input name="historyRecordBackgroundOnColor" type="text" size="25" id="historyRecordBackgroundOnColor" value="<?php echo esc_attr($_POST['historyRecordBackgroundOnColor']);?>" style="background-color:#<?php echo esc_attr($_POST['historyRecordBackgroundOnColor']);?>" />
            <script>
jQuery('#historyRecordBackgroundOnColor').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).css("background-color",'#'+hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	jQuery(this).ColorPickerSetColor(this.value);
});
              </script>            </td>
	      </tr>
<tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'History Record Time Color ON State' , 'audio11-html5' );?></td>
		    <td align="left" valign="middle"><input name="historyRecordTimeOnColor" type="text" size="25" id="historyRecordTimeOnColor" value="<?php echo esc_attr($_POST['historyRecordTimeOnColor']);?>" style="background-color:#<?php echo esc_attr($_POST['historyRecordTimeOnColor']);?>" />
            <script>
jQuery('#historyRecordTimeOnColor').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).css("background-color",'#'+hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	jQuery(this).ColorPickerSetColor(this.value);
});
              </script>            </td>
	      </tr>


				<tr>
					<td align="right" valign="top" class="row-title"><?php esc_html_e( 'History Record Song Color ON State' , 'audio11-html5' );?></td>
					<td align="left" valign="middle"><input name="historyRecordSongOnColor" type="text" size="25" id="historyRecordSongOnColor" value="<?php echo esc_attr($_POST['historyRecordSongOnColor']);?>" style="background-color:#<?php echo esc_attr($_POST['historyRecordSongOnColor']);?>" />
							<script>
	jQuery('#historyRecordSongOnColor').ColorPicker({
		onSubmit: function(hsb, hex, rgb, el) {
			jQuery(el).val(hex);
			jQuery(el).css("background-color",'#'+hex);
			jQuery(el).ColorPickerHide();
		},
		onBeforeShow: function () {
			jQuery(this).ColorPickerSetColor(this.value);
		}
	})
	.bind('keyup', function(){
		jQuery(this).ColorPickerSetColor(this.value);
	});
								</script>            </td>
					</tr>


					<tr>
						<td align="right" valign="top" class="row-title"><?php esc_html_e( 'History Record Author Color ON State' , 'audio11-html5' );?></td>
						<td align="left" valign="middle"><input name="historyRecordAuthorOnColor" type="text" size="25" id="historyRecordAuthorOnColor" value="<?php echo esc_attr($_POST['historyRecordAuthorOnColor']);?>" style="background-color:#<?php echo esc_attr($_POST['historyRecordAuthorOnColor']);?>" />
								<script>
		jQuery('#historyRecordAuthorOnColor').ColorPicker({
			onSubmit: function(hsb, hex, rgb, el) {
				jQuery(el).val(hex);
				jQuery(el).css("background-color",'#'+hex);
				jQuery(el).ColorPickerHide();
			},
			onBeforeShow: function () {
				jQuery(this).ColorPickerSetColor(this.value);
			}
		})
		.bind('keyup', function(){
			jQuery(this).ColorPickerSetColor(this.value);
		});
									</script>            </td>
						</tr>
		      <tr>
					    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Line Separator Color (between Song Title & Song Author) ON State' , 'audio11-html5' );?></td>
					    <td align="left" valign="middle"><input name="songAuthorLineSeparatorOnColor" type="text" size="25" id="songAuthorLineSeparatorOnColor" value="<?php echo esc_attr($_POST['songAuthorLineSeparatorOnColor']);?>" style="background-color:#<?php echo esc_attr($_POST['songAuthorLineSeparatorOnColor']);?>" />
			            <script>
			jQuery('#songAuthorLineSeparatorOnColor').ColorPicker({
				onSubmit: function(hsb, hex, rgb, el) {
					jQuery(el).val(hex);
					jQuery(el).css("background-color",'#'+hex);
					jQuery(el).ColorPickerHide();
				},
				onBeforeShow: function () {
					jQuery(this).ColorPickerSetColor(this.value);
				}
			})
			.bind('keyup', function(){
				jQuery(this).ColorPickerSetColor(this.value);
			});
			              </script>            </td>
			</tr>
		  <tr>
		    <td align="right" valign="top" class="row-title">&nbsp;</td>
		    <td align="left" valign="middle">&nbsp;</td>
	      </tr>

      </table>
  </div>



</div>

<div style="text-align:center; padding:20px 0px 20px 0px;"><input name="Submit" type="submit" id="Submit" class="button-primary" value="Update Player Settings"></div>

</form>
</div>
