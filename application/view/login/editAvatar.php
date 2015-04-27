<div class="container">

    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

    <div>
        <h3>Upload an Avatar</h3>

        <div class="feedback info">
            <strong style="color: red;">Tip*:</strong> If you still see your old avatar after you&#39;ve uploaded a new image, hard-refresh your browser
            by pressing F5.
        </div>
        <hr />
        <div class="form-group">
         <form action="<?php echo Config::get('URL'); ?>login/uploadAvatar_action" method="post" enctype="multipart/form-data">
            <label for="avatar_file">Select Avatar (Will be scaled to 44x44px)</label>
            <input type="file" name="avatar_file" id="exampleInputFile" required>
            <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
            <?php echo csrf_token_tag(); ?>
            <p class="help-block">Only .jpg files accepted.</p>
            <br />
            <button type="submit" class="btn btn-primary">Upload image</button>
            or
            <a href="<?php echo Config::get('URL'); ?>login/deleteAvatar_action">delete current one</a>
            </form>
        </div>
</div>
</div>
