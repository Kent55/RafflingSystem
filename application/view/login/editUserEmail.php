<div class="container">
    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

    
    <form action="<?php echo Config::get('URL'); ?>login/editUserEmail_action" method="post">
                
                <div class="form-group col-lg-6">
                    <label for="user_name">New Email</label>
                    <input type="text" name="user_email" class="form-control" id="user_email" placeholder="" required>
                    <?php echo csrf_token_tag(); ?>
                  </div>
                  <br />
                  <p>
                  <button type="submit" class="btn btn-primary">Change email</button>
                  <a href="<?php echo Config::get('URL'); ?>dashboard" class="btn btn-default">Go back</a>
                  </p>
        </form>
    
</div>
