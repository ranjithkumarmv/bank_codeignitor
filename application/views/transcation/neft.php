<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="page-header">
				<center><h4>NEFT Transfer to another Account</h4></center>
			</div>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-md-6">

			<?php if (validation_errors()) : ?>
			
				<div class="alert alert-danger" role="alert">
					<?= validation_errors() ?>
				</div>
			
		<?php endif; ?>
		<?php if (isset($error)) : ?>
			
				<div class="alert alert-danger" role="alert">
					<?= $error ?>
				</div>
			
		<?php endif; ?>
			
			<?= form_open() ?>
				<div class="form-group">
					<label for="">Account No to NEFT</label>
					<input type="accountno" class="form-control" id="accountno" name="accountno" placeholder="Enter a Account no">
					<p class="help-block">Enter valid account no</p>
				</div>
				<div class="form-group">
					<label for="">Amount to Transfer</label>
					<input type="neft_amount" class="form-control" id="neft_amount" name="neft_amount" placeholder="Enter a neft amount">
					<p class="help-block">Cannot neft more than Rs 99999</p>
				</div>
				<div class="form-group">
					<label for="neft_amount_confirm">Confirm Amount</label>
					<input type="neft_amount" class="form-control" id="neft_amount_confirm" name="neft_amount_confirm" placeholder="Confirm your neft amount">
					<p class="help-block">Must match your neft amount</p>
				</div>
				<div class="form-group">
					<center><input type="submit" class="btn btn-default" value="Transfer Amount"></center>
				</div>
			</form>
		</div>
		<div class="col-sm-3"></div>
	</div><!-- .row -->
</div><!-- .container -->