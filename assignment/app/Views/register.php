<div class="container">
      <div class="col-4 offset-4">
        <script src="assets/js/script.js"></script>
			<?php echo form_open(base_url().'register/check_register'); ?>
                <h2 class="text-center">Come join us!</h2>   
                        <div class="form-group">
                            <label for="first">First Name</label>
                            <input type="text" class="form-control" required="required" name="first">
                        </div>
                        <div class="form-group">
                            <label for="last">Last Name</label>
                            <input type="text" class="form-control" required="required" name="last">
                        </div>    
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" required="required" name="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" required="required" name="password">
                            <input type="checkbox" onclick="showPassword()"> Show Password
                        </div>
                        <div class="clearfix">
						    <label class="float-left form-check-label"><input type="checkbox" name="remember"> Remember me</label>
					    </div>
                        <?php echo $error; ?>
                        <div class="form-group">
						    <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
					    </div>
                        <div>
                            Already have an account?<a href="<?php echo base_url(); ?>login" class="float-right"> Sign in</a>
                        </div>
            <?php echo form_close(); ?>
	</div>
</div>