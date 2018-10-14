				<p class="subtext">Welcome to ArrowChat.  Before proceeding, we need to make sure that your server meets the minimum requirements for installation.</p>

				<table class="form-table"> 
					<tr> 
						<td><img src="./images/reserve_tab_checked.png" alt="" /></td> 
						<th scope="row"><label for="phpver"><a href="javascript:;" class="vtip" title="Your PHP version must be greater than 4.3.3.">PHP version</a></label></th> 
						<td></td>
					</tr> 
					<!--<tr> 
						<td><?php if ($dbcheck) echo $pass_img; else echo $fail_img; ?></td> 
						<th scope="row"><label for="mysql"><a href="javascript:;" class="vtip" title="You must have mySQL installed on your server.">mySQL enabled</a></label></th> 
						<td></td>
					</tr>-->
					<tr> 
						<td><?php if ($cachewrite) echo $pass_img; else echo $fail_img; ?></td> 
						<th scope="row"><label for="cachewrite"><a href="javascript:;" class="vtip" title="The cache folder must be writable.  CHMOD it to 777.">cache/</a></label></th> 
						<td class="writable-td"><?php if (file_exists(dirname(dirname(dirname(__FILE__))) . '/cache/')) echo '<span class="pass-text">Found</span>'; else echo '<span class="fail-text">Not Found</span>'; ?>, <?php if ($cachewrite) echo '<span class="pass-text">Writable</span>'; else echo '<span class="fail-text">Unwritable</span>'; ?></td>
					</tr>   
					<tr> 
						<td><?php if ($includewrite) echo $pass_img; else echo $fail_img; ?></td> 
						<th scope="row"><label for="includewrite"><a href="javascript:;" class="vtip" title="The includes folder must be writable.  CHMOD it to 777.">includes/</a></label></th> 
						<td class="writable-td"><?php if (file_exists(dirname(dirname(dirname(__FILE__))) . '/includes/')) echo '<span class="pass-text">Found</span>'; else echo '<span class="fail-text">Not Found</span>'; ?>, <?php if ($includewrite) echo '<span class="pass-text">Writable</span>'; else echo '<span class="fail-text">Unwritable</span>'; ?></td>
					</tr>  
					<tr> 
						<td><?php if ($functionswrite) echo $pass_img; else echo $fail_img; ?></td> 
						<th scope="row"><label for="functionswrite"><a href="javascript:;" class="vtip" title="The includes/functions/integrations/ folder must be writable.  CHMOD it to 777.">includes/functions/integrations/</a></label></th> 
						<td class="writable-td"><?php if (file_exists(dirname(dirname(dirname(__FILE__))) . '/includes/functions/integrations/')) echo '<span class="pass-text">Found</span>'; else echo '<span class="fail-text">Not Found</span>'; ?>, <?php if ($functionswrite) echo '<span class="pass-text">Writable</span>'; else echo '<span class="fail-text">Unwritable</span>'; ?></td>
					</tr>  
					<tr class="no-border"> 
						<td><?php if ($configwrite) echo $pass_img; else echo $fail_img; ?></td> 
						<th scope="row"><label for="configwrite"><a href="javascript:;" class="vtip" title="The includes/config.new.php file must be writable.  CHMOD it to 777.">includes/config.new.php</a></label></th> 
						<td class="writable-td"><?php if (file_exists(dirname(dirname(dirname(__FILE__))) . '/includes/config.new.php')) echo '<span class="pass-text">Found</span>'; else echo '<span class="fail-text">Not Found</span>'; ?>, <?php if ($configwrite) echo '<span class="pass-text">Writable</span>'; else echo '<span class="fail-text">Unwritable</span>'; ?></td>
					</tr> 
				</table>