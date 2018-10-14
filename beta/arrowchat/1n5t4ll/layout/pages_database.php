					<script type="text/javascript">
						function hideAll() {
			<?php
			foreach ($installs as $install) {
			?>
							document.getElementById("<?php echo $install[1]; ?>").style.display = "none";
			<?php
			}
			?>
						}
						function showDiv(sel) {
						  hideAll();
						  if (sel.selectedIndex != -1)
							{document.getElementById(sel.options[sel.selectedIndex].value).style.display = "block";}
						}
						$(document).ready(function() {
							$(".int_button_label").click(function() {
								$(".int_button_li").css("border", "5px solid #fff");
								$(this).parent().css("border", "5px solid #017fd6");
								$(".step2").removeClass("disabled");
								$(".database_input").removeAttr("disabled");
								$("#server").focus();
								var tmpStr = $("#server").val();
								$("#server").val('');
								$("#server").val(tmpStr);
							});
							$(".int_button_label").mouseover(function() {
								if ( ! $(this).children("input[type=radio]").is(":checked")) {
									$(this).parent().css("border", "5px solid #cecece");
								}
							});
							$(".int_button_label").mouseout(function() {
								if ( ! $(this).children("input[type=radio]").is(":checked")) {
									$(this).parent().css("border", "5px solid #fff");
								} else {
									$(this).parent().css("border", "5px solid #017fd6");
								}
							});
						});
					</script>
					<p class="subtext">Please choose your installation type first.  Then, fill out the required information so that arrowchat can connect to your database.  If you are unsure about these details, please contact your host.</p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<div class="step">
						<img src="./images/step1.png" alt="" /><strong> Choose an installation type</strong>
					</div>
					<form method="post" id="database" action="<?php echo $_SERVER['PHP_SELF']; ?>?mode=database">
					<div class="integrations">
						<ul>
							<li style="width:781px;height:69px;" class="int_button_li"><label style="padding-top: 10px; height:58px;" class="int_button_label"><input type="radio" name="version" id="standalone" value="standalone" /><div style="margin:0 auto;width:390px;"><div style="float:left;"><img src="./images/img-custom.png" alt="Custom Website" /></div><div style="float:left;line-height:1em;margin-left:15px;margin-top:12px;text-align:left;"><b>Not Listed</b><br /><span style="font-size:11px;color:#9c9c9c;">(Custom website, additional programming may be required)</span><input type="hidden" name="version_number_standalone" value="v1" /></div></div></label></li>
			<?php
				foreach ($installs as $install) {
					if ($install[1] != "standalone") {
						if ($install[1] == $_POST['version'])
							$s = "selected";
						else
							$s = "";
			?>
							<li class="int_button_li">
								<label class="int_button_label"><input type="radio" name="version" id="<?php echo $install[1]; ?>" value="<?php echo $install[1]; ?>" /><img src="./images/img-<?php echo $install[1]; ?>.png" alt="<?php echo $install[0]; ?>" /></label>
								<div class="version_select">
									<select id="version_number_<?php echo $install[1]; ?>" name="version_number_<?php echo $install[1]; ?>">
									<?php
										foreach($install[4] as $key => $versions) {
									?>
										<option value="<?php echo $key; ?>"><?php echo $versions[0]; ?></option>
									<?php
										}
									?>
									</select>
								</div>
							</li>
			<?php
						}
					}
			?>
						</ul>
						<br />
					</div>
					<div class="clear"></div>
					<div class="step2 disabled">
					<div class="step">
						<img src="./images/step2.png" alt="" /><strong> Complete your database details</strong>
					</div>
					<div style="padding-left: 32px">
				<p class="subtext"><span class="boldtext">Do not create a separate database for ArrowChat.</span> Complete the details below to connect to the same database that your users are currently located within.</p>
				<table class="form-table2"> 
					<tr> 
						<th scope="row"><label for="phpver">Database Host</label></th> 
						<td class="col2"><span class="formwrap"><input disabled="disabled" type="text" id="server" class="database_input" name="server" value="localhost" /></span></td> 
						<td class="col3">Your database server (e.g. localhost).</td> 
					</tr> 
					<tr> 
						<th scope="row"><label for="configwrite">Database Name</label></th> 
						<td class="col2"><span class="formwrap"><input disabled="disabled" type="text" class="database_input" name="dbname" value="<?php echo $_SESSION['db_name']; ?>" /></span></td> 
						<td class="col3">The name of your existing user database.</td> 
					</tr>  
					<tr> 
						<th scope="row"><label for="configwrite">Username</label></th> 
						<td class="col2"><span class="formwrap"><input disabled="disabled" type="text" class="database_input" name="dbusername" value="<?php echo $_SESSION['db_username']; ?>" /></span></td> 
						<td class="col3">Your username</td> 
					</tr>  
					<tr> 
						<th scope="row"><label for="configwrite">Password</label></th> 
						<td class="col2"><span class="formwrap"><input disabled="disabled" type="password" class="database_input" name="dbpassword" value="<?php echo $_SESSION['db_password']; ?>" /></span></td> 
						<td class="col3">...and password.</td> 
					</tr>  
					<tr class="no-border"> 
						<th scope="row"><label for="configwrite">MSSQL</label></th> 
						<td class="col2" style="padding-top:22px;padding-bottom:5px"><span class="formwrap"><input disabled="disabled" type="checkbox" class="database_input" style="width:auto;" name="dbtype" value="1" <?php if ($_SESSION['db_type'] == 1) echo 'checked="checked"'; ?> /></span></td> 
						<td class="col3">Check this only if you are running MSSQL instead of MySQL.</td> 
					</tr>  
				</table>
				<input type="hidden" name="form_submitted" value="1" />
				</div>
				</form>
			</div>
			<?php
				if (!empty($_SESSION['version'])) {
					$realid = explode("_", $_SESSION['version']);
			?>
				<script type="text/javascript">
					$(document).ready(function() {
						$(".step2").removeClass("disabled");
						$(".database_input").removeAttr("disabled");
						$("#<?php echo $realid[0]; ?>").attr("checked", "checked");
						$("#<?php echo $realid[0]; ?>").parent().parent().css("border", "5px solid #017fd6");
						$("#version_number_<?php echo $realid[0]; ?>").val('<?php echo $_SESSION['version_number']; ?>');
					});
				</script>
			<?php
				}
			?>