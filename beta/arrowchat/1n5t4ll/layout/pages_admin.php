				<form method="post" id="admin_form" action="<?php echo $_SERVER['PHP_SELF']; ?>?mode=admin">
					<p class="subtext">This information is what you'll use to login to the ArrowChat admin panel with. Make sure it's secure so that no one can change your settings.</p>
					<table class="form-table3"> 
						<tr> 
							<th scope="row"><label for="phpver">Admin username</label></th> 
							<td class="col2"><span class="formwrap"><input autofocus type="text" name="admin_username" value="<?php echo $_SESSION['admin_username']; ?>" /></span></td> 
							<td class="col3">The username you want to use to login to the admin panel with.</td>
						</tr> 
						<tr> 
							<th scope="row"><label for="mysql">Admin password</label></th> 
							<td class="col2"><span class="formwrap"><input type="password" name="admin_password" value="<?php echo $_SESSION['admin_password']; ?>" /></span></td>  
							<td class="col3">The password you want to use to login to the admin panel with.</td>
						</tr> 
						<tr> 
							<th scope="row"><label for="configwrite">Confirm password</label></th> 
							<td class="col2"><span class="formwrap"><input type="password" name="admin_password_confirm" value="<?php echo $_SESSION['admin_password_confirm']; ?>" /></span></td> 
							<td class="col3">...the password again.</td>
						</tr>  
						<tr> 
							<th scope="row"><label for="configwrite">Admin email</label></th> 
							<td class="col2"><span class="formwrap"><input type="text" name="admin_email" value="<?php echo $_SESSION['admin_email']; ?>" /></span></td>
							<td class="col3">The email you wish to use for administration reasons.</td>
						</tr>  
						<tr class="no-border"> 
							<th scope="row"><label for="configwrite">Confirm email</label></th> 
							<td class="col2"><span class="formwrap"><input type="text" name="admin_email_confirm" value="<?php echo $_SESSION['admin_email_confirm']; ?>" /></span></td> 
							<td class="col3">...the email again.</td>
						</tr>  
					</table>
				</form>