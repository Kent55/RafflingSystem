<div class="container">
    <div class="box">
                <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>
        
<?php if ($this->is_authenticated) {
?>
        <h2>Your details</h2>

        <div>Your username: <?= $this->user_name; ?></div>
        <div>Your email: <?= $this->user_email; ?></div>
        <div>Your avatar image:
            <?php if (Config::get('USE_GRAVATAR')) { ?>
                Your gravatar pic (on gravatar.com): <img src='<?= $this->user_gravatar_image_url; ?>' />
            <?php } else { ?>
                Your avatar pic (saved locally): <img src='<?= $this->user_avatar_file; ?>' />
            <?php } ?>
        </div>
        <div>Your account type is: <?= $this->user_account_type; ?></div>

<?php
}
else {
    ?>
    <form action="<?php echo Config::get('URL'); ?>login/requestMyDetailsAccess_action" method="post">
        <div class="form-group col-lg-6">
         <label for="auth_details_password">Enter your password</label>
        <input type="password" class="form-control" name="auth_details_password" required />
        <?php echo csrf_token_tag(); ?>
        </div>
        <br />
        <p>
        <button type="submit" class="btn btn-primary">Authenticate</button>
        </p>

    </form>
    <?php
}
?>
    </div>
</div>