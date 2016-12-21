<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6">
			<div class="page-header">
				<center><h4>Amount Debited Successfully</h4></center><br>
			</div>
			<p>To Account No:<b><?php echo $myaccount['accountno']; ?></b><br>
			Debited Amount Rs:<b><?php echo $debit_amount; ?></b><br>
			Mode of Payment:<b><?php echo $status; ?></b><br>
			Net Available Balance:<b><?php echo $myaccount['netbalance']; ?></b><br>
			</p>
			<br>
          <h3><center>
          <a href="<?= base_url('myaccount/transcations') ?>" class="btn btn-warning" role="button">View My Transcations</a>
          <a href="<?= base_url('myaccount/credit') ?>" class="btn btn-primary" role="button">Credit Amount</a>
          <a href="<?= base_url('myaccount/debit') ?>" class="btn btn-success" role="button">Debit Amount</a>
          <a href="<?= base_url('myaccount/neft') ?>" class="btn btn-info" role="button">Transfer NEFT</a>   
        </center></h3>
        </div>
		<div class="col-sm-3"></div>
	</div><!-- .row -->
</div><!-- .container -->