<div class="container">


    <div class="login-page-box">
        <div class="table-wrapper">

            <!-- login box on left side -->
            <div class="form-group col-lg-6">
                   <!-- echo out the system feedback (error and success messages) -->
                        <?php $this->renderFeedbackMessages(); ?>
                <h2>Please sign in</h2><br />
                <form action="<?php echo Config::get('URL'); ?>login/login" method="post">
                
                <div class="form-group">
                    <label for="user_name">Username or email</label>
                    <input type="text" name="user_name" class="form-control" id="user_name" placeholder="Username or email" required>
                  </div>
                  <div class="form-group">
                    <label for="user_password">Password</label>
                    <input type="password" name="user_password" class="form-control" id="user_password" placeholder="Password" required>
                </div>
                <?php echo csrf_token_tag(); ?>
                
                <div class="checkbox">
                    <label for="set_remember_me_cookie">
                      <input type="checkbox" id="set_remember_me_cookie" class="remember-me-checkbox" name="set_remember_me_cookie"> Remember me
                    </label>
              </div>
                <button type="submit" class="btn btn-info btn-large"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Sign in</button>
                </form>
                <br />
                <div class="link-forgot-my-password">
                    <a href="<?php echo Config::get('URL'); ?>login/requestPasswordReset" class="btn btn-link">I forgot my password</a>
                </div>
            </div>

            <!-- register box on right side -->
            <div class="register-box" style="float: right;">
            <h2>Need an Account?</h2>
                <a href="<?php echo Config::get('URL'); ?>login/register" class="btn btn-primary">Sign up now!</a>
            </div>

        </div>
    </div>
</div>
