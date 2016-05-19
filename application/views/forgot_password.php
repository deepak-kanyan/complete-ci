	<!-----login block----->
	<div class="login-outer">
		<div class="wrapper1">
			<div class="login-inner-block">
				<div class="login-left">
					<h1>Welcome</h1>
					<h5>Get the your own car <span> - Better then market price </span></h5>
					<div class="car-3-block">
						<div class="car-block1">
							<div class="icon-block-car"> <img src="<?php echo base_url() ?>assets/frontend/images/c1.png"/></div>
							<p>Live Demo</p>
						</div>
						<div class="car-block1">
							<div class="icon-block-car"> <img src="<?php echo base_url() ?>assets/frontend/images/c2.png"/></div>
							<p>Certified Inspection</p>
						</div>
						<div class="car-block1">
							<div class="icon-block-car"> <img src="<?php echo base_url() ?>assets/frontend/images/c3.png"/></div>
							<p>Save Time and Money</p>
						</div>
					</div>
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolore mque laudantium...</p>
					<a href="#">Create an account</a>
				</div>
				<div class="login-right">
					<div class="login-block">
						<div class="login-icon">
							<div class="icon-img">
								<img src="<?php echo base_url() ?>assets/frontend/images/login-icon.png"/>
							</div>
						</div>
						<form method="Post" id="login_form" name="login_form" role="form" novalidate="novalidate">
							<div class="login-form">
								<h2>Forgot Password</h2>
								<p>Reset password from here</p>
								
								<div class="full-block">
									<div class="input-block">
										<input type="text" class="name-icon" placeholder="Email" name="email" id="email">
									</div>
								</div>
								
								
								<div class="full-block">
									<div class="input-block">
										
										<div class="login-lock"><input type="Submit" class="login-btn" value="Submit"></div>
									</div>
								</div>
							</div>
							<div class="forgot-links">
								<a href="<?php echo base_url() ?>signup">Sign up</a>
								<a href="<?php echo base_url() ?>login">Login</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-----login block end----->
	<script>
		$('#login_form').validate({
		rules: {
				email: {
				  required: true,
				  email: true,
				  remote:{
					url:"<?php echo base_url(); ?>check_email_forgot_password"	,
					type:"post",
					data: { 
						email: function() { 
							return $("#email").val(); 
							}
						}		
					}
				},	
			},
		   
			messages: {
				email: {
					required:"Please enter email.",
					email:"Please enter valid email.",
					remote:"This email address is not registered."
				},
				
			},
			errorElement:"div",
			errorClass:"error-input",
			submitHandler: function(form) {
				form.submit();
				}
			
	});	
	</script>
