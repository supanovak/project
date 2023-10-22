<div class="container">
      <div class="col-4 offset-4">
		<script src="assets/js/script.js"></script>
			<?php echo form_open(base_url().'login/check_login'); ?>
				<h2 class="text-center">Welcome back!</h2>       
					<div class="form-group">
						<label for="email">Email</label>
						<input type="text" class="form-control" required="required" name="email">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" required="required" name="password">
						<input type="checkbox" onclick="showPassword()"> Show Password

					</div>
					<div class="form-group">
					<?php echo $error; ?>
					</div>
					<div class="clearfix">
						<label class="float-left form-check-label"><input type="checkbox" name="remember"> Remember me</label>
						<a href="#" class="float-right">Forgot Password?</a>
					</div> 
					<br>
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block">Log in</button>
					</div>
			<?php echo form_close(); ?>
	</div>
</div>