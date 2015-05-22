

<footer class="text-center"><?php echo VERSION; ?></footer>


<div class="modal" id="addWidgetModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Add Widget</h4>
      </div>
      <div class="modal-body">
        <p>Add a widget stuff here..</p>
      </div>
      <div class="modal-footer">
        <a href="#" class="btn">Close</a>
        <a href="#" class="btn btn-primary">Save changes</a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dalog -->
</div><!-- /.modal -->



  
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="<?php echo Config::get('URL'); ?>js/bootstrap.min.js"></script>
		<script>
		$('div').tooltip();
		function calc_total(){
		    var sum = 0;
		    
		    if (reset_quantity == true) {
		    	sum = 0;
		    }
		    else {
		    	sum = document.getElementById("amount").value;
		    }   

		    $(".preview-total").text(sum);
		     
		}
		$(document).on('click', '.input-remove-row', function(){ 
		    var tr = $(this).closest('tr');
		    tr.fadeOut(200, function(){
		    	tr.remove();
		    	var reset_quantity = true;
			   	calc_total()
			});
		});

		$(function(){
		    $('.preview-add-button').click(function(){
		        var form_data = {};
		        form_data["playing"] = $('.payment-form input[name="playing"]').val();
		        form_data["last_entry"] = $('.payment-form input[name="last_entry"]').val();
		        form_data["draw_date"] = $('.payment-form input[name="draw_date"]').val();
		        form_data["amount"] = "&#163;" + parseFloat($('.payment-form input[name="amount"]').val()).toFixed(2);
		        form_data["remove-row"] = '<span class="glyphicon glyphicon-remove"></span>';
		        var row = $('<tr></tr>');
		        $.each(form_data, function( type, value ) {
		            $('<td class="input-'+type+'"></td>').html(value).appendTo(row);
		        });
		        $('.preview-table > tbody:last').append(row); 
		        calc_total();
		    });  
		});

		function disableFunction() {
		    document.getElementById("next_step").disabled = 'true';
		}
		</script>
	</body>
</html>