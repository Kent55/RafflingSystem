<div class="container">
    <div class="box">
                <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>
        
<?php if ($this->is_authenticated) {
?>

<div class="container">
   <div class="cover-container">
      <div class="social-cover"></div>
      <div class="social-desc">
         <div class="visible-md visible-sm">
            <h1 class="fg-white">Empire State, NY, USA</h1>
            <h5 class="fg-white">- Aug 20th, 2014</h5>
            <div style="margin-top:50px;">
            </div>
         </div>
      </div>
      <div class="social-avatar" >
         <img class="img-avatar" src="http://bootdey.com/img/Content/user-453533-fdadfd.png" height="100" width="100">
         <h4 class="fg-white text-center">Marting lowenyert</h4>
         <h5 class="fg-white text-center" style="opacity:0.8;">DevOps Engineer, NY</h5>
         <hr class="border-black75" style="border-width:2px;" >
         <div class="text-center">
         	<button role="button" class="btn btn-inverse btn-outlined btn-retainBg btn-brightblue" type="button">
         		<span>follow me</span>
         	</button>
         </div>
      </div>
   </div>
</div>                    


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