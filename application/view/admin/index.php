<div class="span9">
	
		<h1 class="page-title">
			<i class="icon-home"></i>
			Admin Dashboard					
		</h1>
		<?php $this->renderFeedbackMessages(); ?>
		
		<div class="widget widget-table">
								
			<div class="widget-header">
				<i class="icon-th-list"></i>
				<h3>Usergroups</h3>
			</div> <!-- /widget-header -->
			
			<div class="widget-content">
			
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th># ID</th>
							<th>Title</th>
                            <th>Users</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<?php foreach ($this->roles AS $k => $v) { ?>
					<tbody>
						<tr>
							<td><?= $v['id']; ?></td>
							<td><?= $v['name']; ?></td>
                            <td><?= $v['user_count']; ?></td>
							<td class="action-td">
								<a href="<?= Config::get('URL'); ?>admin/usergroups/<?= $v['id']; ?>?do=edit" class="btn btn-small btn-warning hint--left" data-hint="Edit <?= $v['name']; ?>">
									Edit								
								</a>					
								<a href="<?= Config::get('URL'); ?>admin/usergroups/<?= $v['id']; ?>?do=delete" class="btn btn-small hint--left" data-hint="Delete <?= $v['name']; ?>">
									<i class="icon-remove"></i>						
								</a>
								
							</td>
						</tr>
					</tbody>
                    <?php } ?>
				</table>
			
			</div> <!-- /widget-content -->
			
		</div> <!-- /widget -->
		
		
		
		
		<div class="row">
			
			<div class="span5">
            <div class="widget widget-table">
								
			<div class="widget-header">
				<i class="icon-th-list"></i>
				<h3>Statistics</h3>
			</div> <!-- /widget-header -->
			
			<div class="widget-content">
			
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>System Info</th>
							<th>Total Users</th>
                            <th>Banned Users</th>
                            <th>Active Raffles</th>
						</tr>
					</thead>
					
					<tbody>
						<tr>
							<td>PHP Version: 5.6.11</td>
							<td>2</td>
                            <td>0</td>
                            <td>0</td>
						</tr>
                        <tr>
							<td>MySQL Version: 5.5.10</td>
							<td></td>
                            <td></td>
                            <td></td>
						</tr>
					</tbody>
				</table>
			
			</div> <!-- /widget-content -->
			
		</div> <!-- /widget -->
            </div>
            
            <div class="span4">
            <div class="widget widget-table">
								
			<div class="widget-header">
				<i class="icon-th-list"></i>
				<h3>Credits</h3>
			</div> <!-- /widget-header -->
			
			<div class="widget-content">
			
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Project Management</th>
							<th>Development</th>
						</tr>
					</thead>
					
					<tbody>
						<tr>
							<td>James Craig</td>
							<td>Matt Kent</td>
						</tr>
                        <tr>
							<td></td>
							<td>Dan Jones</td>
						</tr>
                        <tr>
							<td></td>
							<td>Ryan Wild</td>
						</tr>
					</tbody>
				</table>
			
			</div> <!-- /widget-content -->
			
		</div> <!-- /widget -->
            </div>
            
		</div> <!-- /row -->
		
	</div> <!-- /span9 -->
</div> <!-- /row -->

</div> <!-- /container -->

</div> <!-- /content -->






