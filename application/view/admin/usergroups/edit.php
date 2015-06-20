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
									<form id="edit-profile2" method="post" action="<?= Config::get('URL'); ?>admin/editGroup_Submit" class="form-horizontal">
										<fieldset>
											
											
											<table border="0" cellpadding="10" cellspacing="0">
            <tr><th></th><th>Allow</th><th>Deny</th><th>Ignore</th></tr>
            <?php 
            foreach ($this->aPerms as $k => $v)
            {
                echo "<tr><td><label>" . $v['name'] . "</label></td>";
                echo "<td><input type=\"radio\" name=\"perm_" . $v['id'] . "\" id=\"perm_" . $v['id'] . "_1\" value=\"1\"";
                if ($this->rPerms[$v['key']]['value'] === true) { echo " checked=\"checked\""; }
                echo " /></td>";
                echo "<td><input type=\"radio\" name=\"perm_" . $v['id'] . "\" id=\"perm_" . $v['id'] . "_0\" value=\"0\"";
                if ($this->rPerms[$v['key']]['value'] != true) { echo " checked=\"checked\""; }
                echo " /></td>";
				echo "<td><input type=\"radio\" name=\"perm_" . $v['id'] . "\" id=\"perm_" . $v['id'] . "_X\" value=\"X\"";
                if (!array_key_exists($v['key'],$this->rPerms)) { echo " checked=\"checked\""; }
                echo " /></td>";
                echo "</tr>";
            }
        ?>
    	</table>

											
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
										<?php if ($this->members) { ?>
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
					<?php foreach ($this->members AS $m) { ?>
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
										<?php } else { ?>
										<span style="color: red;">There are no current members of this usergroup.</span>
										<?php } ?>
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