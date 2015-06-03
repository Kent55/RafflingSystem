<div class="row">
					
					<div class="span9">
				
						<div class="widget">
													<?php $this->renderFeedbackMessages(); ?>
							<div class="widget-header">
								<h3>My Account</h3>
							</div> <!-- /widget-header -->
									
							<div class="widget-content">
								
								
								
								<div class="tabbable">
						<ul class="nav nav-tabs">
						  <li class="active">
						    <a href="#profile" data-toggle="tab">Profile</a>
						  </li>
						  <li><a href="#settings" data-toggle="tab">Settings</a></li>
						</ul>
						<br>
						
							<div class="tab-content">
								<div class="tab-pane active" id="profile">
								<form id="edit-profile" name="profile_edit_form" method="post" action="<?= Config::get('URL');?>account/editProfile_action" class="form-horizontal">
									<fieldset>
                                        <div class="control-group">											
											<label class="control-label" for="password">Current Password</label>
											<div class="controls">
												<input type="password" name="password" class="input-large" id="password" value="">
                                        <p class="help-block">For security purposes please enter your current password.</p>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
                                        <hr />
										<h4>Account Details</h4>
										<div class="control-group">											
											<label class="control-label" for="username">Username</label>
											<div class="controls">
												<input type="text" name="username" class="input-medium disabled" id="username" value="<?= $this->account_data->user_name; ?>">
												
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
                                        
                                        <div class="control-group">											
											<label class="control-label" for="email">Email Address</label>
											<div class="controls">
												<input type="text" name="email" class="input-large" id="email" value="<?= $this->account_data->user_email; ?>">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
                                        <div class="control-group">											
											<label class="control-label" for="title">Title</label>
                                            <div class="controls">
                                                <select class="input-small" name="title">
															<?php
															foreach ($this->title_array AS $key => $value) {
																	?>
																	<option value="<?php echo $key; ?>"
																	<?php
																	if ($key == $this->account_data->user_title) {
																				echo 'selected="selected"';
																	}
																	?>
																	><?php echo $value; ?></option>
																	<?php
															}
															
															?>
												</select>
												</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										<div class="control-group">											
											<label class="control-label" for="firstname">First Name</label>
											<div class="controls">
												<input type="text" name="firstname" class="input-medium" id="firstname" value="<?= $this->account_data->user_first_name; ?>">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">											
											<label class="control-label" for="lastname">Last Name</label>
											<div class="controls">
												<input type="text" name="lastname" class="input-medium" id="lastname" value="<?= $this->account_data->user_last_name; ?>">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
                                        
                                        <div class="control-group">											
											<label class="control-label" for="addr_line_1">Address Line 1</label>
											<div class="controls">
												<input type="text" name="addr_line_1" class="input-large" id="addr_line_1" value="<?= $this->account_data->user_address_line_1; ?>">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
                                        <div class="control-group">											
											<label class="control-label" for="addr_line_2">Address Line 2</label>
											<div class="controls">
												<input type="text"name="addr_line_2" class="input-large" id="addr_line_2" value="<?= $this->account_data->user_address_line_2; ?>">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
                                        
                                        
                                        <div class="control-group">											
											<label class="control-label" for="towncity">Town/City</label>
											<div class="controls">
												<input type="text" name="towncity" class="input-medium" id="towncity" value="<?= $this->account_data->user_town_city; ?>">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										<div class="control-group">											
											<label class="control-label" for="postcode">Postcode</label>
											<div class="controls">
												<input type="text" name="postcode" class="input-small" id="postcode" value="<?= $this->account_data->user_postcode; ?>">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
                                        
                                        <div class="control-group">											
											<label class="control-label" for="lastname">County</label>
                                            <div class="controls">
                                                <select name="county">
                                                    <optgroup label="England">
                                                        <option>Bedfordshire</option>
                                                        <option>Berkshire</option>
                                                        <option>Bristol</option>
                                                        <option>Buckinghamshire</option>
                                                        <option>Cambridgeshire</option>
                                                        <option>Cheshire</option>
                                                        <option>City of London</option>
                                                        <option>Cornwall</option>
                                                        <option>Cumbria</option>
                                                        <option>Derbyshire</option>
                                                        <option>Devon</option>
                                                        <option>Dorset</option>
                                                        <option>Durham</option>
                                                        <option>East Riding of Yorkshire</option>
                                                        <option>East Sussex</option>
                                                        <option>Essex</option>
                                                        <option>Gloucestershire</option>
                                                        <option>Greater London</option>
                                                        <option>Greater Manchester</option>
                                                        <option>Hampshire</option>
                                                        <option>Herefordshire</option>
                                                        <option>Hertfordshire</option>
                                                        <option>Isle of Wight</option>
                                                        <option>Kent</option>
                                                        <option>Lancashire</option>
                                                        <option>Leicestershire</option>
                                                        <option>Lincolnshire</option>
                                                        <option>Merseyside</option>
                                                        <option>Norfolk</option>
                                                        <option>North Yorkshire</option>
                                                        <option>Northamptonshire</option>
                                                        <option>Northumberland</option>
                                                        <option>Nottinghamshire</option>
                                                        <option>Oxfordshire</option>
                                                        <option>Rutland</option>
                                                        <option>Shropshire</option>
                                                        <option>Somerset</option>
                                                        <option>South Yorkshire</option>
                                                        <option>Staffordshire</option>
                                                        <option>Suffolk</option>
                                                        <option>Surrey</option>
                                                        <option>Tyne and Wear</option>
                                                        <option>Warwickshire</option>
                                                        <option>West Midlands</option>
                                                        <option>West Sussex</option>
                                                        <option>West Yorkshire</option>
                                                        <option>Wiltshire</option>
                                                        <option>Worcestershire</option>
                                                    </optgroup>
                                                    <optgroup label="Wales">
                                                        <option>Anglesey</option>
                                                        <option>Brecknockshire</option>
                                                        <option>Caernarfonshire</option>
                                                        <option>Carmarthenshire</option>
                                                        <option>Cardiganshire</option>
                                                        <option>Denbighshire</option>
                                                        <option>Flintshire</option>
                                                        <option>Glamorgan</option>
                                                        <option>Merioneth</option>
                                                        <option>Monmouthshire</option>
                                                        <option>Montgomeryshire</option>
                                                        <option>Pembrokeshire</option>
                                                        <option>Radnorshire</option>
                                                    </optgroup>
                                                    <optgroup label="Scotland">
                                                        <option>Aberdeenshire</option>
                                                        <option>Angus</option>
                                                        <option>Argyllshire</option>
                                                        <option>Ayrshire</option>
                                                        <option>Banffshire</option>
                                                        <option>Berwickshire</option>
                                                        <option>Buteshire</option>
                                                        <option>Cromartyshire</option>
                                                        <option>Caithness</option>
                                                        <option>Clackmannanshire</option>
                                                        <option>Dumfriesshire</option>
                                                        <option>Dunbartonshire</option>
                                                        <option>East Lothian</option>
                                                        <option>Fife</option>
                                                        <option>Inverness-shire</option>
                                                        <option>Kincardineshire</option>
                                                        <option>Kinross</option>
                                                        <option>Kirkcudbrightshire</option>
                                                        <option>Lanarkshire</option>
                                                        <option>Midlothian</option>
                                                        <option>Morayshire</option>
                                                        <option>Nairnshire</option>
                                                        <option>Orkney</option>
                                                        <option>Peeblesshire</option>
                                                        <option>Perthshire</option>
                                                        <option>Renfrewshire</option>
                                                        <option>Ross-shire</option>
                                                        <option>Roxburghshire</option>
                                                        <option>Selkirkshire</option>
                                                        <option>Shetland</option>
                                                        <option>Stirlingshire</option>
                                                        <option>Sutherland</option>
                                                        <option>West Lothian</option>
                                                        <option>Wigtownshire</option>
                                                    </optgroup>
                                                    <optgroup label="Northern Ireland">
                                                        <option>Antrim</option>
                                                        <option>Armagh</option>
                                                        <option>Down</option>
                                                        <option>Fermanagh</option>
                                                        <option>Londonderry</option>
                                                        <option>Tyrone</option>
                                                    </optgroup>
                                                </select>
                                            </div> <!-- /controls -->				
										</div> <!-- /control-group -->
                                        
										
										<br /><hr />
										<h4>Change Avatar</h4>
										<div class="control-group">		
											
		<div class="controls fileupload fileupload-new" data-provides="fileupload">
  <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" /></div>
  <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
  <div>
    <span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input name="avatar" type="file" /></span>
    <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
  </div>

</div>
			  <p class="controls help-block"><a href="account/deleteAvatar_action">Delete current avatar</a></p>
											
</div>
											<hr />
											
                                        <h4>Change Password</h4>
										<div class="control-group">											
											<label class="control-label" for="new_password">New Password</label>
											<div class="controls">
												<input type="password" name="new_password" class="input-large" id="new_password" value="">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">											
											<label class="control-label" for="new_password_confirm">Confirm New Password</label>
											<div class="controls">
												<input type="password" name="new_password_confirm" class="input-large" id="new_password_confirm" value="">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
											
											<br />
										
											
										<div class="form-actions">
											<button type="submit" name="profile_edit_submit" class="btn btn-primary">Save Changes</button> 
										</div> <!-- /form-actions -->
									</fieldset>
								</form>
								</div>
								
								<div class="tab-pane" id="settings">
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