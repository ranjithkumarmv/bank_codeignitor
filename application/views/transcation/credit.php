<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="page-header">
				<center><h4>Amount credit to my own account</h4></center>
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
					<label for="creditby" >Amount Credit By </label><br>
					    <label class="radio-inline">
					 	<input type="radio"  id="creditby" value="CREDIT SELF CASH" name="creditby">Cash
					    </label>
					    <label class="radio-inline">
					      <input type="radio" id="creditby" value="CREDIT SELF CHECK" name="creditby">Check
					    </label>
					    <label class="radio-inline">
					      <input type="radio" id="creditby" value="CREDIT SELF DD" name="creditby">Demand Draft
					    </label>
				</div>
				<div class="form-group">
					<label for="">Amount to Credit</label>
					<input type="credit_amount" class="form-control" id="credit_amount" name="credit_amount" placeholder="Enter a credit amount">
					<p class="help-block">Cannot credit more than Rs 99999</p>
				</div>
				<div class="form-group">
					<label for="credit_amount_confirm">Confirm Amount</label>
					<input type="credit_amount" class="form-control" id="credit_amount_confirm" name="credit_amount_confirm" placeholder="Confirm your credit amount">
					<p class="help-block">Must match your credit amount</p>
				</div>
				<div class="form-group">
					<center><input type="submit" class="btn btn-default" value="Credit Amount"></center>
				</div>
			</form>
		</div>
		<div class="col-sm-3"></div>
	</div><!-- .row -->
</div><!-- .container -->