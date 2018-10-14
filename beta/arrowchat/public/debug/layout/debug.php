<?php

	/*
	|| #################################################################### ||
	|| #                             ArrowChat                            # ||
	|| # ---------------------------------------------------------------- # ||
	|| #    Copyright ©2010-2012 ArrowSuites LLC. All Rights Reserved.    # ||
	|| # This file may not be redistributed in whole or significant part. # ||
	|| # ---------------- ARROWCHAT IS NOT FREE SOFTWARE ---------------- # ||
	|| #   http://www.arrowchat.com | http://www.arrowchat.com/license/   # ||
	|| #################################################################### ||
	*/

?>
			<p>If you are having trouble with getting ArrowChat running, this debug mode will help you find the problem.</p>

			<table class="form-table"> 
				<tr> 
					<td width="20"><img src="<?php echo $base_url; ?>public/debug/images/reserve_tab_<?php echo $test_userid_img; ?>.png" alt="" /></td> 
					<th scope="row"><label for="phpver"><a href="javascript:;" class="vtip" title="This makes sure that you are currently logged in. If a user is not being registered as logged in, the ArrowChat bar may not show.">User ID</a></label></th> 
					<td class="error-td"><?php echo $test_userid; ?></td>
					<td class="info-td">ID: <?php if (is_null($userid)) echo 'Null'; else echo $userid; ?></td>
				</tr> 
				<tr> 
					<td width="20"><img src="<?php echo $base_url; ?>public/debug/images/reserve_tab_<?php echo $test_buddylist_img; ?>.png" alt="" /></td> 
					<th scope="row"><label for="mysql"><a href="javascript:;" class="vtip" title="Checks to make sure that your buddy list function is a valid MySQL statement. This DOES NOT check whether it is successfully getting friends.">Buddy List</a></label></th> 
					<td class="error-td"><?php echo $test_buddylist; ?></td>
					<td class="info-td"><?php if ($disable_buddy_list == 1 OR NO_FREIND_SYSTEM == 1) echo "All Online"; else echo "Friend's Only"; ?></td>
				</tr> 
				<tr> 
					<td width="20"><img src="<?php echo $base_url; ?>public/debug/images/reserve_tab_<?php echo $test_banned_img; ?>.png" alt="" /></td> 
					<th scope="row"><label for="configwrite"><a href="javascript:;" class="vtip" title="This checks whether your username or IP address is currently banned.">Banned</a></label></th> 
					<td class="error-td"><?php echo $test_banned; ?></td>
					<td class="info-td"></td>
				</tr> 
				<tr> 
					<td width="20"><img src="<?php echo $base_url; ?>public/debug/images/reserve_tab_<?php echo $test_browser_img; ?>.png" alt="" /></td> 
					<th scope="row"><label for="configwrite"><a href="javascript:;" class="vtip" title="ArrowChat will not load in certain browsers. This is a check to make sure you are currently not using one of them.">Browser</a></label></th> 
					<td class="error-td"><?php echo $test_browser; ?></td>
					<td class="info-td"></td>
				</tr> 
				<tr> 
					<td width="20"><img src="<?php echo $base_url; ?>public/debug/images/reserve_tab_<?php echo $cache_img; ?>.png" alt="" /></td> 
					<th scope="row"><label for="cachewrite"><a href="javascript:;" class="vtip" title="A cache file must exist for ArrowChat to function.">Cache File</a></label></th> 
					<td class="error-td"><?php echo $cache_test; ?></td>
					<td class="info-td"></td>
				</tr>  
				<tr> 
					<td width="20"><img src="<?php echo $base_url; ?>public/debug/images/reserve_tab_<?php echo $integration_img; ?>.png" alt="" /></td> 
					<th scope="row"><label for="cachewrite"><a href="javascript:;" class="vtip" title="An integration file must exist for ArrowChat to function.">Integration File</a></label></th> 
					<td class="error-td"><?php echo $integration_test; ?></td>
					<td class="info-td"></td>
				</tr>   
				<tr class="no-border"> 
					<td width="20"><img src="<?php echo $base_url; ?>public/debug/images/reserve_tab_<?php echo $database_img; ?>.png" alt="" /></td> 
					<th scope="row"><label for="cachewrite"><a href="javascript:;" class="vtip" title="Checks to see if ArrowChat can connect to your database.">Database Connection</a></label></th> 
					<td class="error-td"><?php echo $database_test; ?></td>
					<td class="info-td"></td>
				</tr> 
			</table>
			<div id="cookie-data">
				<h3>Cookie Data</h3>
				<div id="cookie-output">
					<pre>
<?php print_r($_COOKIE); ?>
					</pre>
				</div>
			</div>