<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-md-6">
			<div class="page-header">
				<center><h4><b>Login success! Welcome to our online bank</b></h4></center>
			</div>
			<p><center>You are now logged in. You will be redirected to Dashboard Shortly<br>
				If not please click the following link<br>
			<a href="<?= base_url('myaccount') ?>">Redirect to my account Dashboard</center></a></p><br><br>
		</div>
		<div class="col-sm-3"></div>
	</div><!-- .row -->
</div><!-- .container -->
<?php 

redirect('myaccount', 'refresh');
?>