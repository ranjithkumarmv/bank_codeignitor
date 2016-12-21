<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-md-6">
			<div class="page-header">
				<center><h4><b>Logout success! Thanks for using our bank</b></h4></center>
			</div>
			<center><p>You are now logged out. You will be redirected to HomePage Shortly<br>
				If Not Please click the below link <br>
				<a href="<?= base_url('user') ?>">Redirect to my account</a></p></center><br><br>
		</div>
		<div class="col-sm-3"></div>
	</div><!-- .row -->
</div><!-- .container -->
<?php header('Refresh: 5;url =');?>