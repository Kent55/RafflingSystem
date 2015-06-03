<div id="login-container">
	
		<?php $this->renderFeedbackMessages(); ?>
	<div id="login-header">
		<h3>Login</h3>
		
	</div> <!-- /login-header -->
	<div id="login-content" class="clearfix">
	
	<form action="<?php echo Config::get('URL'); ?>login/login" method="post">
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="user_name">Username or Email</label>
						<div class="controls">
							<input type="text" name="user_name" class="" id="user_name" placeholder="Username">
						</div>
					</div>
                    <?php echo csrf_token_tag(); ?>
					<div class="control-group">
						<label class="control-label" for="user_password">Password</label>
						<div class="controls">
							<input type="password" name="user_password" class="" id="user_password" placeholder="Password">
						</div>
					</div>
				</fieldset>
				
				<div id="remember-me" class="pull-left">
					<input type="checkbox" name="remember" id="remember" />
					<label id="remember-label" for="remember">Remember Me</label>
				</div>
				
				<div class="pull-right">
					<button type="submit" class="btn btn-warning btn-large">
						Login
					</button>
				</div>
			</form>
			
		</div> <!-- /login-content -->
		
		
		<div id="login-extra">
			
			<p>Don't have an account? <a href="<?php echo Config::get('URL'); ?>login/register">Sign Up.</a></p>
			
			<p>Forgotten Password? <a href="<?php echo Config::get('URL'); ?>login/requestPasswordReset">Reset.</a></p>
			
		</div> <!-- /login-extra -->
	
</div> <!-- /login-wrapper -->
