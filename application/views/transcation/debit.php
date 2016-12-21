<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="page-header">
				<center><h4>Amount DEBIT from own account</h4></center>
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
					<label for="debitby" >Amount Debit By </label><br>
					    <label class="radio-inline">
					 	<input type="radio"  id="debitby" value="DEBIT  SELF CASH" name="debitby">Cash
					    </label>
					    <label class="radio-inline">
					      <input type="radio" id="debitby" value="DEBIT  SELF CHECK" name="debitby">Check
					    </label>
					    <label class="radio-inline">
					      <input type="radio" id="debitby" value="DEBIT  SELF ATM" name="debitby">ATM
					    </label>
				</div>
				<div class="form-group">
					<label for="">Amount to Debit</label>
					<input type="debit_amount" class="form-control" id="debit_amount" name="debit_amount" placeholder="Enter a debit amount">
					<p class="help-block">Cannot debit more than Rs 99999</p>
				</div>
				<div class="form-group">
					<label for="debit_amount_confirm">Confirm Amount</label>
					<input type="debit_amount" class="form-control" id="debit_amount_confirm" name="debit_amount_confirm" placeholder="Confirm your debit amount">
					<p class="help-block">Must match your debit amount</p>
				</div>
				<div class="form-group">
					<center><input type="submit" class="btn btn-default" value="Debit Amount"></center>
				</div>
			</form>
		</div>
		<div class="col-sm-3"></div>
	</div><!-- .row -->
</div><!-- .container -->