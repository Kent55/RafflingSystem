<div class="container">
    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>
    <style>
        .ticketVal {
    position: relative;
    outline: 1px solid #00f;
}

ticketVal:after {
    content: "";
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    position: absolute;
    outline: 1px solid red;
    width: 91%;
}
        
    </style>
    
    <script type="text/javascript">
         $(document).ready(function () {
             $(".numberinput").forceNumeric();
         });


         // forceNumeric() plug-in implementation
         jQuery.fn.forceNumeric = function () {

             return this.each(function () {
                 $(this).keydown(function (e) {
                     var key = e.which || e.keyCode;

                     if (!e.shiftKey && !e.altKey && !e.ctrlKey &&
                     // numbers   
                         key >= 48 && key <= 57 ||
                     // Numeric keypad
                         key >= 96 && key <= 105 ||
                     // comma, period and minus, . on keypad
                        key == 190 || key == 188 || key == 109 || key == 110 ||
                     // Backspace and Tab and Enter
                        key == 8 || key == 9 || key == 13 ||
                     // Home and End
                        key == 35 || key == 36 ||
                     // left and right arrows
                        key == 37 || key == 39 ||
                     // Del and Ins
                        key == 46 || key == 45)
                         return true;

                     return false;
                 });
             });
         }
     </script>
<?php if ($this->raffle) { ?>
<h2>Swindon Town vs <?= $this->raffle->playing; ?></h2>

<a href="<?= Config::get('URL')?>raffle"><- Go back</a>
<br />
<br />
    <p>Below is the form to enter the raffle. All raffle information is contained within the form in &quot;disabled&quot; fields.
    <span style="color: red;">The minimum amount to pay is &#163;1, which is 1 ticket</span>.</p>
    <br />

    <div class="row">
        <div class="col-sm-12">
            <legend><?= $this->user_title . ' ' . $this->user_first_name . ' ' . $this->user_last_name; ?> - Raffle Submission Form</legend>
        </div>
        <!-- panel preview -->
         <!-- / panel preview -->
        <div class="col-sm-12">
            <h4>Order Preview:</h4>
            <div class="row">
                <div class="col-xs-12">
                    <div class="table-responsive">
                        <table class="table preview-table">
                            <thead>
                                <tr>
                                    <th>Swindon vs</th>
                                    <th>Description</th>
                                    <th>Last Entry</th>
                                    <th>Draw Date</th>
                                    <th>Amount (&#163;)</th>
                                </tr>
                            </thead>
                            <tbody><tr><td><?= $this->raffle->playing; ?></td><td><?= $this->raffle->description; ?></td><td style="color: <?= $this->raffle->colour; ?>">
                            
                            <?php if ($this->raffle->colour == 'red'):
                                     echo 'Today';
                                elseif ($this->raffle->colour == 'orange'):
                                     echo 'Tomorrow';
                                else: 
                                     echo date('jS M Y', strtotime($this->raffle->last_entry));
                                endif; 
                            ?>
                            
                            </td>
                            
                            
                            <td><?= date('jS M Y', strtotime($this->raffle->draw_date)); ?></td><td>   <div class="form-group">
                        <div class="col-sm-7">
                        <form action="<?php echo Config::get('URL').'raffle/enterRaffle/' . $this->raffle->id . '/submitForm_action'?>" method="post">
                            <input type="number" style="width: 150px;" min="1" class="form-control numberinput" id="amount" name="amount" >
                            <?php echo csrf_token_tag(); ?>
                            <p class="help-block">&#163;1 = 1 ticket.</p>
                            <button type="submit" class="btn btn-primary">I&#39;m sure, take me to PayPal</button>
                            </form>
                        </div>
                    </div></td></tr></tbody> <!-- preview content goes here-->
                        </table>
                    </div>                            
                </div>
            </div>
            <div class="row">
                    <hr style="border:1px dashed #dddddd;">
                <div class="col-xs-4 col-md-offset-4">
                    
                    <a href="#confirmation" data-toggle="modal" class="btn btn-primary btn-block">Purchase Ticket(s)</a>
                </div>                
            </div>
        </div>
    
    </div>
    
    <div class="modal" id="confirmation">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h4 class="modal-title">Are you sure?</h4>
      </div>
      <div class="modal-body">
        <p>
            <strong>You are about to purchase a raffle ticket!</strong>
            <br /><br />
            Please check that you wish to carry out this action as it cannot be undone.
        </p>
      </div>
      <div class="modal-footer">
        <a href="#" data-dismiss="modal" class="btn">Cancel</a>
        <button type="submit" class="btn btn-primary">I&#39;m sure, take me to PayPal</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dalog -->
</div><!-- /.modal -->
    
    
  <?php } ?>      
</div>