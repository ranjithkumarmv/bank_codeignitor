<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="row">
		<div class="col-sm-1"></div>
		<div class="col-sm-10">
			<div class="page-header">
				<center><h4>My account transcations List</h4></center><br>
			</div>
			<p>
				<table class="table table-striped">
				    <thead>
				      <tr>
				        <th>ID</th>
				        <th>Froma Acc</th>
				        <th>To Acc</th>
				        <th>Transfer Amount</th>
				        <th>Status</th>
				        <th>Time</th>
				      </tr>
				    </thead>
				    <tbody>
				<?php
				foreach ($mytranscations as $row) {
					echo "<tr><td>";
					echo $row->id;
					echo "</td><td>";
					echo $row->fromaccount;
					echo "</td><td>";
					echo $row->toaccount;
					echo "</td><td>";
					echo $row->tfamount;
					echo "</td><td>";
					echo $row->status;
					echo "</td><td>";
					echo $row->Timestamp;
					echo "</td></tr>";
				}

				?>

				    </tbody>
				 </table>



			</p>
			<br>
          <h3><center>
          <a href="<?= base_url('myaccount/transcations') ?>" class="btn btn-warning" role="button">View My Transcations</a>
          <a href="<?= base_url('myaccount/credit') ?>" class="btn btn-primary" role="button">Credit Amount</a>
          <a href="<?= base_url('myaccount/debit') ?>" class="btn btn-success" role="button">Debit Amount</a>
          <a href="<?= base_url('myaccount/neft') ?>" class="btn btn-info" role="button">Transfer NEFT</a>      
        </center></h3>
        </div>
		<div class="col-sm-1"></div>
	</div><!-- .row -->
</div><!-- .container -->