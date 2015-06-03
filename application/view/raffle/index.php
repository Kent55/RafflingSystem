<div class="row">
<div class="span9">
		<h1 class="page-title">
			<i class="icon-th-list"></i>
			Raffle Listing					
		</h1>
        
		<?php $this->renderFeedbackMessages();
        if (!@$this->message) {
        ?>
		<div class="stat-container">
								
		
		<div class="widget widget-table">
								
			<div class="widget-header">
				<i class="icon-th-list"></i>
				<h3>Current Raffles</h3>
			</div> <!-- /widget-header -->
			
			<div class="widget-content">
			
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>#</th>
							<th>Swindon vs</th>
							<th>Last Entry</th>
							<th>Description</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<?php foreach ($this->raffles as $raffle) { ?>
					<tbody>
						<tr>
							<td><?= $raffle->id; ?></td>
							<td><?= $raffle->playing; ?></td>
							<td style="color: <?= $raffle->colour; ?>;"><strong>
                                <?php if ($raffle->colour == 'red'):
                                     echo 'Today';
                                elseif ($raffle->colour == 'orange'):
                                    echo 'Tomorrow';
                                else: 
                                    echo date('jS M Y', strtotime($raffle->last_entry));
                                endif; 
                                ?>
                            </strong></td>
							<td><?= $raffle->description; ?></td>
							<td class="action-td">
								<a href="raffle/enterRaffle/<?= $raffle->id; ?>" class="btn btn-small btn-warning">
									Buy Ticket(s)								
								</a>					
							</td>
						</tr>
					</tbody>
                    <?php } ?>
				</table>

                <?php } else {
                    echo '<span style="color: red;">' . $this->message . '</span><br /><br /><a href="' . Config::get('URL') . 'dashboard"><< Go to dashboard.</a>';
                     } ?>
			
			</div> <!-- /widget-content -->
			
		</div> <!-- /widget -->
		
		
		
	</div> <!-- /span9 -->
	
	
</div> <!-- /row -->

</div> <!-- /container -->

</div> <!-- /content -->






















  