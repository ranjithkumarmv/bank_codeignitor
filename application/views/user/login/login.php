<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="row">
		<div class="page-header">
				<center><h2>Welcome to ABC Bank Login</h2></center>
			</div>
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
					<label for="username">Username</label>
					<input type="text" class="form-control" id="username" name="username" placeholder="Your username">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Your password">
				</div>
				<div class="form-group">
					<center><input type="submit" class="btn btn-default" value="Login"></center>
				</div>
			</form>
		</div>
		<div class="col-sm-3"></div>
	</div><!-- .row -->
</div><!-- .container -->