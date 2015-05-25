<div class="container">

    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

        <form action="<?php echo Config::get('URL'); ?>login/editUserName_action" method="post">
                
                <div class="form-group col-lg-6">
                        <label for="user_password">Enter your current password</label>
                        <input type="password" name="user_password" class="form-control" id="user_password" placeholder="" required>
                    <label for="user_name">New Username</label>
                    <input type="text" name="user_name" class="form-control" id="user_name" placeholder="" required>
                    <?php echo csrf_token_tag(); ?>
                  </div>
                  <br />
                  <p>
                  <button type="submit" class="btn btn-primary">Change username</button>
                  <a href="<?php echo Config::get('URL'); ?>dashboard" class="btn btn-default">Go back</a>
                  </p>
        </form>
</div>
