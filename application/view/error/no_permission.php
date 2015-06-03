<div class="span9">
				
		<h1 class="page-title" style="background: darkred;">
			<i class="icon-info-sign"></i>
			Error > No Permission					
		</h1>
		<?php $this->renderFeedbackMessages(); ?>
		<div class="row">
			
			<div class="span9">
							
				<div class="widget">
					
					<div class="widget-header">
						<h3>Sorry, you have have not been authorised to access this page.</h3>
					</div> <!-- /widget-header -->
														
					<div class="widget-content">
						<p>This could be due to one of many reasons:
                        <ul>
                            <li>You have not been authorised to access this area.</li>
                            <li>There has been a fault on our end that has caused this error.</li>
                            <li>You have tried to access a resource directly, rather than following relative links.</li>
                            <li>The resource you are trying to access no longer exists or has been disabled by a site administrator.</li>
                        </ul>
                        </p>
                        <p>
                        Please use the below links accordingly:
                        <ul>
                            <li>Contact support at <a href="">support@swindonraffle.co.uk</a>.</li>
                            <li>Go to your personal <a href="<?= Config::get('URL');?>dashboard">dashboard</a>.</li>
                        </ul>
                        </p>
					</div> <!-- /widget-content -->
					
				</div> <!-- /widget -->
				
			</div> <!-- /span9 -->
			
		</div> <!-- /row -->
		
	</div> <!-- /span9 -->
	
	
</div> <!-- /row -->

</div> <!-- /container -->

</div> <!-- /content -->






