<div class="container">
    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>
<h2>Current raffles</h2><br />
    <?php if (!@$this->message) {?>
    
    <style>
.foo {   
    float: left;
    width: 20px;
    height: 20px;
    margin: 5px 5px 5px 5px;
    border-width: 1px;
    border-style: solid;
    border-color: rgba(0,0,0,.2);
}
    </style>
    
    <p>Below is a table of current raffles being held, you may enter as many of these as you wish.</p>
    <em>Hover for details</em>
    <br />
    <div style="float: left;">
    <div class="foo top" style="background-color:green; cursor: pointer;" title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Green symbolises that
    the closing date for this raffle isn't for at least another 2 days."></div>
    <div class="foo top" style="background-color:orange; cursor: pointer;" title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Orange/Amber symbolises that
    the raffle closing date is tomorrow."></div>
    <div class="foo top" style="background-color:red; cursor: pointer;" title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Red symbolises that
    the closing date for the raffle is today!"></div>
    </div>
    </p><br />
      <div class="col-md-12">
      
      <table class="table table-striped">
        <thead>
          <tr><th>Raffle No</th><th>Swindon vs</th><th>Last entries</th><th>Description and prizes</th><th>Action</th></tr>
        </thead>
        <?php foreach ($this->raffles as $raffle) {?>
        <tbody>
          <tr><td>#<?= $raffle->id; ?></td><td><?= $raffle->playing; ?></td><td style="background-color: <?= $raffle->colour; ?>;"><strong>
          
          <?php if ($raffle->colour == 'red'):
                echo 'Today';
          elseif ($raffle->colour == 'orange'):
                echo 'Tomorrow';
          else: 
              echo date('jS M Y', strtotime($raffle->last_entry));
          endif; 
          ?>
          
          </strong></td><td style="width: 600px;"><?= $raffle->description; ?></td><td><a href="raffle/enterRaffle/<?= $raffle->id; ?>">Enter Raffle</a></td></tr>
        </tbody>
        <?php } ?>
      </table>
      <?php } else {
          
          echo '<span style="color: red;">' . $this->message . '</span><br /><br /><a href="' . Config::get('URL') . 'dashboard">Go to dashboard.</a>';
          
      } ?>
      
      
  
    </div>
    
    
</div>
