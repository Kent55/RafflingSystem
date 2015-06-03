<div class="row">
					
					<div class="span9">
				
						<div class="widget">
													<?php $this->renderFeedbackMessages(); ?>
							<div class="widget-header">
								<h3>Edit Usergroup <?= $this->role_name; ?></h3>
							</div> <!-- /widget-header -->
									
							<div class="widget-content">
								
								
								
								<div class="tabbable">
						<ul class="nav nav-tabs">
						  <li class="active">
						    <a href="#details" data-toggle="tab">Details</a>
						  </li>
						  <li><a href="#permissions" data-toggle="tab">Permissions</a></li>
						  <li><a href="#members" data-toggle="tab">View Members</a></li>
						</ul>
						<br>
						
							<div class="tab-content">
								<div class="tab-pane active" id="details">
								<form id="edit-profile" name="profile_edit_form" method="post" action="<?= Config::get('URL');?>account/editProfile_action" class="form-horizontal">
									<fieldset>
                                        <div class="control-group">											
											<label class="control-label" for="password">Usergroup Name</label>
											<div class="controls">
												<input type="text" name="role_name" class="input-large" id="role_name" value="<?= $this->role_name; ?>">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->

											<br />
                                            
                                            <div class="control-group">
                                            <label class="control-label" for="role_desc">Usergroup Description</label>
                                            <div class="controls">
                                            <textarea class="form-control span4" rows="5" id="role_desc"><?= $this->role_desc; ?></textarea>
                                            </div>
                                          </div>
											
											<br />
											
											<div class="form-actions">
												<button type="submit" name="profile_edit_form_submit" class="btn btn-primary">Save Changes</button>
											</div>
										</fieldset>
									</form>
								</div>
                                
                                
                                
                                
                                
                                <div class="tab-pane" id="permissions">
									<form id="edit-profile2" class="form-horizontal">
										<fieldset>
											
											
											<div class="control-group">
												<label class="control-label" for="accounttype">Invisible Mode</label>
												<div class="controls">
													<label class="checkbox">
														<input type="checkbox" name="accountadvanced" value="option1" id="accountadvanced">
														Enabled <?php echo $this->user_settings->setting_key; ?>
													</label>
													<p class="help-block">This will prevent you from being included in the users online count.</p>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="accountusername">Account Username</label>
												<div class="controls">
													<input type="text" class="input-large" id="accountusername" value="rod.howard@example.com">
													<p class="help-block">Leave blank to use your profile email address.</p>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="emailserver">Email Server</label>
												<div class="controls">
													<input type="text" class="input-large" id="emailserver" value="mail.example.com">
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="accountpassword">Password</label>
												<div class="controls">
													<input type="text" class="input-large" id="accountpassword" value="password">
												</div>
											</div>
											
																						
											
											
											<div class="control-group">
												<label class="control-label" for="accountadvanced">Advanced Settings</label>
												<div class="controls">
													<label class="checkbox">
														<input type="checkbox" name="accountadvanced" value="option1" checked="checked" id="accountadvanced">
														User encrypted connection when accessing this server
													</label>
													<label class="checkbox">
														<input type="checkbox" name="accounttype" value="option2">
														Download all message on connection
													</label>
												</div>
											</div>

											
											<br />
											
											<div class="form-actions">
												<button type="submit" name="profile_edit_form_submit" class="btn btn-primary">Save Changes</button>
											</div>
										</fieldset>
									</form>
								</div>
                                
								
								
								
								
								<div class="tab-pane" id="members">
									<form id="edit-profile2" class="form-horizontal">
										<fieldset>

										<table class="table table-striped table-condensed">
                  <thead>
                  <tr>
					  <th># User ID</th>
                      <th>Username</th>
					  <th>Email</th>
                      <th>&nbsp</th>                                          
                  </tr>
              </thead>
              <tbody>
					<?php foreach ($this->members as $m) { ?>
                <tr>
					<td><?php echo $m->user_id; ?></td>
                    <td><?php echo $m->user_name; ?></td>
					<td><?php echo $m->user_email; ?></td>
                    <td class="action-td">
								<a href="<?= Config::get('URL'); ?>admin/users/<?= $m->user_id; ?>?do=edit" class="btn btn-small btn-warning hint--left" data-hint="Edit <?= $m->user_name; ?>">
									Edit								
								</a>					
								
							</td>                                   
				</tr>
				<?php } ?>
              </tbody>
            </table>
										</fieldset>
									</form>
								</div>
								
								
								
								
								
								
								
								
								
								
								
								
                                
                                
                                
                                
                                
								
							</div>
                            
                            
      
						</div>
								
								
							</div> <!-- /widget-content -->
							
						</div> <!-- /widget -->
						
					</div> <!-- /span9 -->
					
				</div> <!-- /row -->
				
				
				
				
				
				
				
				
				
			</div> <!-- /span9 -->
            
            			
		</div> <!-- /row -->
		
	</div> <!-- /container -->
	
</div> <!-- /content -->