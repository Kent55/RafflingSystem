<div class="container">

    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

    <div>
        <div>

            <!-- login box on left side -->
            <div>
                <form action="<?php echo Config::get('URL'); ?>login/logout" method="post">
                    <?php echo csrf_token_tag(); ?>
                    <p>
                        <button type="submit" class="btn btn-primary">Confirm Sign Out</button>
                        <a class="btn btn-default" href="<?php echo Config::get('URL'); ?>dashboard">Go back</a>
                    </p>
                </form>
                <div>
                </div>
            </div>
        </div>
    </div>
</div>
